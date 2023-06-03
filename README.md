# DNS Records

A simple PHP library that allows you to get all DNS records for a specified domain name.

## Usage Guide

### Installation Guide

To install with Composer:

```
composer require eugenesh/dns-records
```

### Usage Guide

Below is an example script to get all DNS records for the domain "gmail.com"

```php
// A simple example
require("vendor/autoload.php"); 

use DnsRecords\RecordHandler;

$recordHandler = new RecordHandler();

// Domain Name
$domainName = "gmail.com"; 

// Record Type
$recordsType = "ALL";

// Get all DNS records
$records = $recordHandler->getDnsRecords($domainName, $recordsType);

//Print Result
echo '<pre style="border: 1px solid red; padding: 35px; width: 75%; margin: 20px auto; display: block;">';
var_dump( $records );
echo '</pre>';

```

As a result, you should get something like this:

```php 
array (size=16)
  0 => 
    array (size=5)
      'host' => string 'gmail.com' (length=9)
      'class' => string 'IN' (length=2)
      'ttl' => int 81
      'type' => string 'A' (length=1)
      'ip' => string '142.250.181.229' (length=15)
  1 => 
    array (size=5)
      'host' => string 'gmail.com' (length=9)
      'class' => string 'IN' (length=2)
      'ttl' => int 6685
      'type' => string 'NS' (length=2)
      'target' => string 'ns1.google.com' (length=14)
  2 => 
    array (size=5)
      'host' => string 'gmail.com' (length=9)
      'class' => string 'IN' (length=2)
      'ttl' => int 6685
      'type' => string 'NS' (length=2)
      'target' => string 'ns4.google.com' (length=14)
  3 => 
    array (size=5)
      'host' => string 'gmail.com' (length=9)
      'class' => string 'IN' (length=2)
      'ttl' => int 6685
      'type' => string 'NS' (length=2)
      'target' => string 'ns2.google.com' (length=14)
  ....
```
