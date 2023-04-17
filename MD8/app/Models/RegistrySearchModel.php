<?php declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client;
use stdClass;

require_once 'config/api.php';

class RegistrySearchModel
{
  private Client $client;

  public function __construct()
  {
    $this->client = new Client(['verify' => false]);
  }

  public function getBusinessReport(int $registryCode): object
  {
    $api_key = BUSINESS_API_KEY;
    $url = "http://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$registryCode&resource_id=$api_key";
    $response = $this->client->request('GET', $url);
    return json_decode($response->getbody()->getContents());
  }

  public function processBusinessReport(object $response): object
  {
    $responseIndex = $response->result->records[0];
    $report = new stdClass();
    $report->companyName = $responseIndex->name;
    $report->location = $responseIndex->address;
    return $report;
  }

  public function getOwnerReport(int $registryCode): object
  {
    $api_key = OWNER_API_KEY;
    $url = "http://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$registryCode&resource_id=$api_key";
    $response = $this->client->request('GET', $url);
    return json_decode($response->getbody()->getContents());
  }

  public function processOwnerReport(object $response): object
  {
    $responseIndex = $response->result->records[0];
    $report = new stdClass();
    $report->ownerName = $responseIndex->forename . ' ' . $responseIndex->surname;
    if (!$responseIndex->birth_date) {
      $report->birthDate = $responseIndex->latvian_identity_number_masked;
    } else {
      $report->birthDate = $responseIndex->birth_date;
    }
    $report->nationality = $responseIndex->nationality;
    $report->residence = $responseIndex->residence;
    return $report;
  }
}