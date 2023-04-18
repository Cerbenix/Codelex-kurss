<?php declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use stdClass;

require_once 'config/api.php';

class RegistrySearchModel
{
  private Client $client;

  public function __construct()
  {
    $this->client = new Client(['verify' => false]);
  }

  public function getBusinessReport(int $registryCode): ?object
  {
    $api_key = BUSINESS_API_KEY;
    $url = "http://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$registryCode&resource_id=$api_key";
    $response = $this->client->request('GET', $url);
    $responseObj =  json_decode($response->getBody()->getContents());
    return $this->validateRequest($responseObj);
  }

  public function processBusinessReport(?object $response): ?object
  {
    if($response == null){
      return null;
    }
    $responseIndex = $response->result->records[0];
    $report = new stdClass();
    $report->companyName = $responseIndex->name;
    $report->location = $responseIndex->address;
    return $report;
  }

  public function getOwnerReport(int $registryCode): ?object
  {
    $api_key = OWNER_API_KEY;
    $url = "http://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$registryCode&resource_id=$api_key";
    $response = $this->client->request('GET', $url);
    $responseObj =  json_decode($response->getBody()->getContents());
    return $this->validateRequest($responseObj);
  }

  public function processOwnerReport(?object $response): ?object
  {
    if($response == null){
      return null;
    }
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

  public function validateRequest(object $responseObj): ?object
  {
    if($responseObj->result->total > 1 || $responseObj->result->total == 0){
      return null;
    }
    return $responseObj;
  }
}