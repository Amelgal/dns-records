<?php

namespace DnsRecords;

class Types
{

    private array $types = [
        1         => 'DNS_A',
        2         => 'DNS_NS',
        16        => 'DNS_CNAME',
        32        => 'DNS_SOA',
        2048      => 'DNS_PTR',
        4096      => 'DNS_HINFO',
        8192      => 'DNS_CAA',
        16384     => 'DNS_MX',
        32768     => 'DNS_TXT',
        16777216  => 'DNS_A6',
        33554432  => 'DNS_SRV',
        67108864  => 'DNS_NAPTR',
        134217728 => 'DNS_AAAA',
        251721779 => 'DNS_ALL',
        268435456 => 'DNS_ANY',
    ];

    /**
     * @param string $name
     *
     * @return false|int
     */
    public function getIDByName(string $name): false|int
    {
        return array_search($name, $this->types, true); // Searching type in array by name
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function getById(int $id): string
    {
        return $this->types[$id] ?? '';
    }

    /**
     * @return array
     */
    public function getAllTypeNamesSorted(): array
    {
        $types = array_values($this->types);
        sort($types);

        return $types;
    }
}
