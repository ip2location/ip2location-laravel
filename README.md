# IP2Location Laravel Extension

IP2Location Laravel extension enables the user to find the country, region, city, coordinates, zip code, time zone, ISP, domain name, connection type, area code, weather, MCC, MNC, mobile brand name, elevation and usage type that any IP address or hostname originates from. It has been optimized for speed and memory utilization.


## INSTALLATION

1. Add the below line into your ```composer.json``` file.
```
{
  "require": {
    "ip2location/ip2location-laravel": "1.*"
  }
}
```
2. Run the command: ```composer update```.
3. Edit ```config/app.php``` and add the following line to providers.
```Ip2location\IP2LocationLaravel\IP2LocationLaravelServiceProvider::class,```
4. Add the alias to ```config/app.php```:
```'IP2LocationLaravel' => Ip2location\IP2LocationLaravel\Facade\IP2LocationLaravel::class,```
5. Then publish the config file by:
```php artisan vendor:publish```
6. Download IP2Location BIN database
    - IP2Location free LITE database at http://lite.ip2location.com
    - IP2Location commercial database at http://www.ip2location.com
7. Create a folder named as ```ip2location``` in the ```database``` directory.
8. Unzip and copy the BIN file into ```database/ip2location/``` folder. 
9. Rename the BIN file to IP2LOCATION.BIN.


## USAGE

```
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
```

## SUPPORT

Email: support@ip2location.com
Website: http://www.ip2location.com