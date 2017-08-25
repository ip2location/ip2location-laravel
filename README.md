# IP2Location Laravel Extension
[![Latest Stable Version](https://img.shields.io/packagist/v/ip2location/ip2location-laravel.svg)](https://packagist.org/packages/ip2location/ip2location-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/ip2location/ip2location-laravel.svg?style=flat-square)](https://packagist.org/packages/ip2location/ip2location-laravel)

IP2Location Laravel extension enables the user to find the country, region, city, coordinates, zip code, time zone, ISP, domain name, connection type, area code, weather, MCC, MNC, mobile brand name, elevation and usage type that any IP address or hostname originates from. It has been optimized for speed and memory utilization.


## INSTALLATION

1. Run the command: `composer require ip2location/ip2location-laravel` to download the package into the Laravel platform.
2. Edit `config/app.php` and add the below line in 'providers' section:  
`Ip2location\IP2LocationLaravel\IP2LocationLaravelServiceProvider::class,`
3. Then publish the config file by:  
`php artisan vendor:publish --provider=Ip2location\IP2LocationLaravel\IP2LocationLaravelServiceProvider --force`
4. Download IP2Location BIN database
    - IP2Location free LITE database at http://lite.ip2location.com
    - IP2Location commercial database at http://www.ip2location.com
5. Create a folder named as `ip2location` in the `database` directory.
6. Unzip and copy the BIN file into `database/ip2location/` folder. 
7. Rename the BIN file to IP2LOCATION.BIN.


## USAGE

In this tutorial, we will show you on how to create a **TestController** to display the IP information.

1. Create a **TestController** in Laravel using the below command line
```
php artisan make:controller TestController
```
2. Open the **app/Http/Controllers/TestController.php** in any text editor.
3. Add the below lines into the controller file.
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IP2LocationLaravel;			//use IP2LocationLaravel class

class TestController extends Controller
{
	//Create a lookup function for display
        public function lookup(){
		//Try query the geolocation information of 8.8.8.8 IP address
		$records = IP2LocationLaravel::get('8.8.8.8');

		echo 'IP Number             : ' . $records['ipNumber'] . "<br>";
		echo 'IP Version            : ' . $records['ipVersion'] . "<br>";
		echo 'IP Address            : ' . $records['ipAddress'] . "<br>";
		echo 'Country Code          : ' . $records['countryCode'] . "<br>";
		echo 'Country Name          : ' . $records['countryName'] . "<br>";
		echo 'Region Name           : ' . $records['regionName'] . "<br>";
		echo 'City Name             : ' . $records['cityName'] . "<br>";
		echo 'Latitude              : ' . $records['latitude'] . "<br>";
		echo 'Longitude             : ' . $records['longitude'] . "<br>";
		echo 'Area Code             : ' . $records['areaCode'] . "<br>";
		echo 'IDD Code              : ' . $records['iddCode'] . "<br>";
		echo 'Weather Station Code  : ' . $records['weatherStationCode'] . "<br>";
		echo 'Weather Station Name  : ' . $records['weatherStationName'] . "<br>";
		echo 'MCC                   : ' . $records['mcc'] . "<br>";
		echo 'MNC                   : ' . $records['mnc'] . "<br>";
		echo 'Mobile Carrier        : ' . $records['mobileCarrierName'] . "<br>";
		echo 'Usage Type            : ' . $records['usageType'] . "<br>";
		echo 'Elevation             : ' . $records['elevation'] . "<br>";
		echo 'Net Speed             : ' . $records['netSpeed'] . "<br>";
		echo 'Time Zone             : ' . $records['timeZone'] . "<br>";
		echo 'ZIP Code              : ' . $records['zipCode'] . "<br>";
		echo 'Domain Name           : ' . $records['domainName'] . "<br>";
		echo 'ISP Name              : ' . $records['isp'] . "<br>";
	}
}
```
4. Add the following line into the *routes/web.php* file.
```
Route::get('test', 'TestController@lookup');
```
5. Enter the URL <your domain>/public/test and run. You should see the information of **8.8.8.8** IP address.

## DEPENDENCIES (IP2LOCATION BIN DATA FILE)

This library requires IP2Location BIN data file to function. You may download the BIN data file at
* IP2Location LITE BIN Data (Free): http://lite.ip2location.com
* IP2Location Commercial BIN Data (Comprehensive): http://www.ip2location.com


## SUPPORT

Email: support@ip2location.com

Website: http://www.ip2location.com
