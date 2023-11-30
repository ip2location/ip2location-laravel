# IP2Location Laravel Extension
[![Latest Stable Version](https://img.shields.io/packagist/v/ip2location/ip2location-laravel.svg)](https://packagist.org/packages/ip2location/ip2location-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/ip2location/ip2location-laravel.svg?style=flat-square)](https://packagist.org/packages/ip2location/ip2location-laravel)

IP2Location Laravel extension enables the user to find the country, region, city, coordinates, zip code, time zone, ISP, domain name, connection type, area code, weather, MCC, MNC, mobile brand name, elevation, usage type, IP address type and IAB advertising category from IP address using IP2Location database. It has been optimized for speed and memory utilization.

*Note: This extension works in Laravel 6, Laravel 7, Laravel 8 and Laravel 9.*


## INSTALLATION

Run the command: `composer require ip2location/ip2location-laravel` to download the package into the Laravel platform.

## USAGE

IP2Location Laravel extension is able to query the IP address information from either BIN database or web service. This section will explain how to use this extension to query from BIN database and web service.

### BIN DATABASE

1. Download IP2Location BIN database
    - IP2Location free LITE database at https://lite.ip2location.com
    - IP2Location commercial database at https://www.ip2location.com
2. To use IP2Location databases, create a folder named as `ip2location` in the `database` directory.
3. Unzip and copy the BIN file into `database/ip2location/` folder. 
4. Rename the BIN file to IP2LOCATION.BIN.
5. Create a **TestController** in Laravel using the below command line
```
php artisan make:controller TestController
```
6. Open the **app/Http/Controllers/TestController.php** in any text editor.
7. To use IP2Location databases, add the below lines into the controller file.
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IP2LocationLaravel;			//use IP2LocationLaravel class

class TestController extends Controller
{
	//Create a lookup function for display
	public function lookup(){

		//Try query the geolocation information of 8.8.8.8 IP address
		$records = IP2LocationLaravel::get('8.8.8.8', 'bin');

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
		echo 'Address Type          : ' . $records['addressType'] . "<br>";
		echo 'Category              : ' . $records['category'] . "<br>";
	}
}
```
8. Add the following line into the *routes/web.php* file.
```
Route::get('test', 'TestController@lookup');
```
9. Enter the URL <your domain>/public/test and run. You should see the information of **8.8.8.8** IP address.


### WEB SERVICE

1. To use IP2Location.io or IP2Location web service, create a new file called "site_vars.php" in `config` directory.
2. In the site_vars.php, save the following contents for IP2Location.io:
```
<?php
return [
    'IP2LocationioAPIKey' => 'your_api_key', // Required. Your IP2Location.io API key.
    'IP2LocationioLanguage' => 'en', // Optional. Refer to https://www.ip2location.io/ip2location-documentation for available languages.
];
```
Or save the following contents for IP2Location:
```php
<?php
return [
    'IP2LocationAPIKey' => 'your_api_key', // Required. Your IP2Location API key.
    'IP2LocationPackage' => 'WS1', // Required. Choose the package you would like to use.
    'IP2LocationUsessl' => false, // Optional. Use https or http.
    'IP2LocationAddons' => [], // Optional. Refer to https://www.ip2location.com/web-service/ip2location for the list of available addons.
    'IP2LocationLanguage' => 'en', // Optional. Refer to https://www.ip2location.com/web-service/ip2location for available languages.
];
```
3. Create a **TestController** in Laravel using the below command line
```
php artisan make:controller TestController
```
4. Open the **app/Http/Controllers/TestController.php** in any text editor.
5. To use IP2Location databases, add the below lines into the controller file.
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IP2LocationLaravel;			//use IP2LocationLaravel class

class TestController extends Controller
{
	//Create a lookup function for display
	public function lookup(){

		//Try query the geolocation information of 8.8.8.8 IP address
		$records = IP2LocationLaravel::get('8.8.8.8', 'ws');

		echo '<pre>';
		print_r($records);
		echo '</pre>';
	}
}

```
6. Add the following line into the *routes/web.php* file.
```
Route::get('test', 'TestController@lookup');
```
7. Enter the URL <your domain>/public/test and run. You should see the information of **8.8.8.8** IP address.

### IPTOOLS

1. Create a **TestController** in Laravel using the below command line
```
php artisan make:controller TestController
```
2. Open the **app/Http/Controllers/TestController.php** in any text editor.
3. To use IP2Location IPTools class, add the below lines into the controller file.
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IP2LocationLaravel;			//use IP2LocationLaravel class

class TestController extends Controller
{
	//Create a lookup function for display
	public function lookup(){

		var_dump(IP2LocationLaravel::isIpv4('8.8.8.8'));echo '<br>';
		var_dump(IP2LocationLaravel::isIpv6('2001:4860:4860::8888'));echo '<br>';
		print_r(IP2LocationLaravel::ipv4ToDecimal('8.8.8.8'));echo '<br>';
		print_r(IP2LocationLaravel::decimalToIpv4(134744072));echo '<br>';
		print_r(IP2LocationLaravel::ipv6ToDecimal('2001:4860:4860::8888'));echo '<br>';
		print_r(IP2LocationLaravel::decimalToIpv6('42541956123769884636017138956568135816'));echo '<br>';
		print_r(IP2LocationLaravel::ipv4ToCidr('8.0.0.0', '8.255.255.255'));echo '<br>';
		print_r(IP2LocationLaravel::cidrToIpv4('8.0.0.0/8'));echo '<br>';
		print_r(IP2LocationLaravel::ipv6ToCidr('2002:0000:0000:1234:abcd:ffff:c0a8:0000', '2002:0000:0000:1234:ffff:ffff:ffff:ffff'));echo '<br>';
		print_r(IP2LocationLaravel::cidrToIpv6('2002::1234:abcd:ffff:c0a8:101/64'));echo '<br>';
		print_r(IP2LocationLaravel::compressIpv6('2002:0000:0000:1234:FFFF:FFFF:FFFF:FFFF'));echo '<br>';
		print_r(IP2LocationLaravel::expandIpv6('2002::1234:FFFF:FFFF:FFFF:FFFF'));echo '<br>';
	}
}

```
4. Add the following line into the *routes/web.php* file.
```
Route::get('test', 'TestController@lookup');
```
5. Enter the URL <your domain>/public/test and run.

## DEPENDENCIES

This library requires either IP2Location BIN data file or IP2Location API key to function. You may download the BIN data file at
* IP2Location LITE BIN Data (Free): https://lite.ip2location.com
* IP2Location Commercial BIN Data (Comprehensive): https://www.ip2location.com

For IP2Location API key, you can sign up [IP2Location Web Service](https://www.ip2location.com/web-service/ip2location) to get one free API key.

## IPv4 BIN vs IPv6 BIN

Use the IPv4 BIN file if you just need to query IPv4 addresses.
Use the IPv6 BIN file if you need to query BOTH IPv4 and IPv6 addresses.

## SUPPORT

Email: support@ip2location.com

Website: https://www.ip2location.com
