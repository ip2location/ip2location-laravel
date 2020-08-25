<?php

namespace Ip2location\IP2LocationLaravel;

class IP2LocationLaravel
{
    public function __construct()
    {
        $this->db = new \IP2Location\Database($this->getDatabasePath(), \IP2Location\Database::FILE_IO);
    }

    private function getDatabasePath()
    {
        return config('ip2locationlaravel.ip2location.local.path');
    }

    public function get($ip)
    {
        $records = $this->db->lookup($ip, \IP2Location\Database::ALL);
        
        return $records;
    }
    
    public function query($ip, $apikey, $package = 'WS1', $ssl = false, $addons = [], $language = 'en') 
    {
        
        $ws = new \IP2Location\WebService($apikey, $package, $ssl);
        
        $records = $ws->lookup($ip, $addons, $language);
        
        return $records;
    }

}
