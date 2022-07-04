<?php

namespace Ip2location\IP2LocationLaravel;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use IP2LocationLaravel;

class BasicTest extends TestCase
{

    public function testGet()
    {
        $result = IP2LocationLaravel::get('8.8.8.8');
        $this->assertEquals($result['countryCode'], 'US');
    }

    public function testIpv4()
    {
        $this->assertTrue(IP2LocationLaravel::isIpv4('8.8.8.8'));
    }

    public function testInvalidIpv4()
    {
        $this->assertFalse(IP2LocationLaravel::isIpv4('8.8.8.555'));
    }

    public function testIpv6()
    {
        $this->assertTrue(IP2LocationLaravel::isIpv6('2001:4860:4860::8888'));
    }

    public function testInvalidIpv6()
    {
        $this->assertFalse(IP2LocationLaravel::isIpv6('2001:4860:4860::ZZZZ'));
    }

    public function testIpv4Decimal()
    {
        $this->assertEquals(
            134744072,
            IP2LocationLaravel::ipv4ToDecimal('8.8.8.8')
        );
    }

    public function testDecimalIpv4()
    {
        $this->assertEquals(
            '8.8.8.8',
            IP2LocationLaravel::decimalToIpv4('134744072')
        );
    }

    public function testIpv6Decimal()
    {
        $this->assertEquals(
            '42541956123769884636017138956568135816',
            IP2LocationLaravel::ipv6ToDecimal('2001:4860:4860::8888')
        );
    }

    public function testDecimalIpv6()
    {
        $this->assertEquals(
            '2001:4860:4860::8888',
            IP2LocationLaravel::decimalToIpv6('42541956123769884636017138956568135816')
        );
    }

    public function testIpv4ToCidr()
    {
        $this->assertEqualsCanonicalizing(
            ['8.0.0.0/8'],
            IP2LocationLaravel::ipv4ToCidr('8.0.0.0', '8.255.255.255')
        );
    }

    public function testCidrToIpv4()
    {
        $this->assertEqualsCanonicalizing(
            [
                'ip_start' => '8.0.0.0',
                'ip_end'   => '8.255.255.255',
            ],
            IP2LocationLaravel::cidrToIpv4('8.0.0.0/8')
        );
    }

    public function testIpv6ToCidr()
    {
        $this->assertEqualsCanonicalizing(
            [
                '2002::1234:abcd:ffff:c0a8:0/109',
                '2002::1234:abcd:ffff:c0b0:0/108',
                '2002::1234:abcd:ffff:c0c0:0/106',
                '2002::1234:abcd:ffff:c100:0/104',
                '2002::1234:abcd:ffff:c200:0/103',
                '2002::1234:abcd:ffff:c400:0/102',
                '2002::1234:abcd:ffff:c800:0/101',
                '2002::1234:abcd:ffff:d000:0/100',
                '2002::1234:abcd:ffff:e000:0/99',
                '2002:0:0:1234:abce::/79',
                '2002:0:0:1234:abd0::/76',
                '2002:0:0:1234:abe0::/75',
                '2002:0:0:1234:ac00::/70',
                '2002:0:0:1234:b000::/68',
                '2002:0:0:1234:c000::/66',
            ],
            IP2LocationLaravel::ipv6ToCidr('2002:0000:0000:1234:abcd:ffff:c0a8:0000', '2002:0000:0000:1234:ffff:ffff:ffff:ffff')
        );
    }

    public function testCidrToIpv6()
    {
        $this->assertEqualsCanonicalizing(
            [
                'ip_start' => '2002:0000:0000:1234:abcd:ffff:c0a8:0101',
                'ip_end'   => '2002:0000:0000:1234:ffff:ffff:ffff:ffff',
            ],
            IP2LocationLaravel::cidrToIpv6('2002::1234:abcd:ffff:c0a8:101/64')
        );
    }

    public function testCompressIpv6()
    {
        $this->assertEquals(
            '2002::1234:ffff:ffff:ffff:ffff',
            IP2LocationLaravel::compressIpv6('2002:0000:0000:1234:ffff:ffff:ffff:ffff')
        );
    }

    public function testExpandIpv6()
    {
        $this->assertEquals(
            '2002:0000:0000:1234:ffff:ffff:ffff:ffff',
            IP2LocationLaravel::expandIpv6('2002::1234:ffff:ffff:ffff:ffff')
        );
    }

}
