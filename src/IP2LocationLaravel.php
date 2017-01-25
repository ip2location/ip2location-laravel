<?php

namespace Ip2location\IP2LocationLaravel;

class IP2LocationLaravel
{

    public function get($ip)
    {
        $db = new \IP2Location\Database($this->getDatabasePath(), \IP2Location\Database::FILE_IO);

        $records = $db->lookup($ip, \IP2Location\Database::ALL);

        return $records;
    }

    private function getDatabasePath()
    {
        return config('ip2locationlaravel.ip2location.local.path');
    }

}
