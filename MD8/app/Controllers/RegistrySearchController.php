<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\RegistrySearchModel;
use App\View\RegistrySearch;

class RegistrySearchController
{
  private RegistrySearchModel $registrySearchModel;
  private RegistrySearch $registrySearch;

  public function __construct()
  {
    $this->registrySearchModel = new RegistrySearchModel();
    $this->registrySearch = new RegistrySearch();
  }

  public function handleBusinessRequest(int $registryCode): void
  {
    $registryReport = $this->registrySearchModel->getBusinessReport($registryCode);
    $report = $this->registrySearchModel->processBusinessReport($registryReport);
    $this->registrySearch->outputResults($report);
  }

  public function handleOwnerRequest(int $registryCode): void
  {
    $registryReport = $this->registrySearchModel->getOwnerReport($registryCode);
    $report = $this->registrySearchModel->processOwnerReport($registryReport);
    $this->registrySearch->outputResults($report);
  }

  public function handleAll(int $registryCode):void
  {
    $ownerReport = $this->registrySearchModel->getOwnerReport($registryCode);
    $report1 = $this->registrySearchModel->processOwnerReport($ownerReport);
    $businessReport = $this->registrySearchModel->getBusinessReport($registryCode);
    $report2 = $this->registrySearchModel->processBusinessReport($businessReport);
    $report = (object) array_merge((array)$report2, (array)$report1);
    $this->registrySearch->outputResults($report);
  }
  public function run(): void
  {
    while (true) {
      $input = $this->registrySearch->displayOptions();
      switch ($input) {
        case 0:
          $this->registrySearch->die();
          die;
        case 1:
          $registryCode = $this->registrySearch->inquire();
          $this->handleBusinessRequest($registryCode);
          break;
        case 2:
          $registryCode = $this->registrySearch->inquire();
          $this->handleOwnerRequest($registryCode);
          break;
        case 3:
          $registryCode = $this->registrySearch->inquire();
          $this->handleAll($registryCode);
          break;
        default:
          $this->registrySearch->invalidInput();
      }
    }
  }
}