<?php

use DnsRecords\RecordHandler;
use PHPUnit\Framework\TestCase;

class DNSTest extends TestCase
{
	public function testQueryAndAnswer()
	{
        $dns_query = new RecordHandler();

        $host = "test.com"; // the domain name for which we want to receive DNS records
        $type = "A"; // the type of response(s) we want for this request

        $results = $dns_query->getDnsRecords($host, $type); // do the request
		$this->assertIsArray($results);

        foreach ($results as $result) {
            // only after A records
            $this->assertEquals('A', $result['type']);
            $this->assertEquals('IN', $result['class']);
            $this->assertEquals('test.com', $result['host']);
            $this->assertEquals('67.225.146.248', $result['ip']);
        }
    }

	public function testQueryAndAnswerErrorType()
	{
        $dns_query = new RecordHandler();

        $host = "test.com";
        $type = "Nonexistent_Type";

        $result = $dns_query->getDnsRecords($host, $type); // do the query

        $this->assertEquals('Invalid Type Nonexistent_Type', $result);
	}

	public function testQueryAndAnswerErrorServer()
	{
        $dns_query = new RecordHandler();
        $host = "";
        $type = "A";

        $result = $dns_query->getDnsRecords($host, $type); // do the query

        $this->assertEquals('Empty Domain Name', $result);
	}
}