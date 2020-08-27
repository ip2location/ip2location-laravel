<?php

namespace Ip2location\IP2LocationLaravel;

class IP2LocationLaravel
{
	public const QUERY_BIN = 10000;
	public const QUERY_WS = 10001;
	
    private function load($mode)
    {
        if ($mode == self::QUERY_BIN)
        {
            $this->db = new \IP2Location\Database($this->getDatabasePath(), \IP2Location\Database::FILE_IO);
        } else if ($mode == self::QUERY_WS)
        {
            $apikey = \Config::get('site_vars.IP2LocationAPIKey');
            $package = (null !== \Config::get('site_vars.IP2LocationPackage')) ? \Config::get('site_vars.IP2LocationPackage') : 'WS1';
            $ssl = (null !== \Config::get('site_vars.IP2LocationUsessl')) ? \Config::get('site_vars.IP2LocationUsessl') : false;
            $this->ws = new \IP2Location\WebService($apikey, $package, $ssl);
        }
    }

    private function getDatabasePath()
    {
        return config('ip2locationlaravel.ip2location.local.path');
    }

    public function get($ip, $mode = self::QUERY_BIN)
    {
        $this->load($mode);
        if ($mode == self::QUERY_BIN)
        {
            $records = $this->db->lookup($ip, \IP2Location\Database::ALL);
        } else if ($mode == self::QUERY_WS)
        {
            $addons = (null !== \Config::get('site_vars.IP2LocationAddons')) ? \Config::get('site_vars.IP2LocationAddons') : [];
            $language = (null !== \Config::get('site_vars.IP2LocationLanguage')) ? \Config::get('site_vars.IP2LocationLanguage') : 'en';
            $records = $this->ws->lookup($ip, $addons, $language);
        }
        
        return $records;
    }
}
