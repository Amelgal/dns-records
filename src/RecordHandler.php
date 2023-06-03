<?php

namespace DnsRecords;

class RecordHandler
{
    private Types $types;

    public function __construct()
    {
        $this->types = new Types(); // Creating an instance of the Types class
    }

    /**
     * @param string $domainName
     * @param string $initType
     *
     * @return array|string|false
     */
    public function getDnsRecords(string $domainName, string $initType = 'DNS_ALL'): bool|string|array
    {

        if (empty($domainName)) { return 'Empty Domain Name'; } // Checking for an empty domain name

        $type = (str_contains($initType, 'DNS_')) ? $initType : 'DNS_' . $initType; // Checking for the presence of the DNS_ prefix

        $typeId = $this->types->getIDByName($type); // Getting the type ID

        if ($typeId === false) { return 'Invalid Type ' . $initType; } // Checking the correctness of the type

        return dns_get_record($domainName, $typeId); // Getting records
    }

}
