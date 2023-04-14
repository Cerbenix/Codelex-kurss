<?php declare(strict_types=1);

require_once 'Video.php';
require_once 'VideoStore.php';

class Application
{
  private VideoStore $videoStore;

  public function __construct(VideoStore $videoStore)
  {
    $this->videoStore = $videoStore;
  }

  function run()
  {
    while (true) {
      echo "Choose the operation you want to perform \n";
      echo "Choose 0 for EXIT\n";
      echo "Choose 1 to fill video store\n";
      echo "Choose 2 to rent video\n";
      echo "Choose 3 to return video\n";
      echo "Choose 4 to rate video\n";
      echo "Choose 5 to list inventory\n";

      $command = (int)readline();

      switch ($command) {
        case 0:
          echo "Bye!";
          die;
        case 1:
          $this->add();
          break;
        case 2:
          $this->rent();
          break;
        case 3:
          $this->return();
          break;
        case 4:
          $this->rate();
          break;
        case 5:
          $this->list();
          break;
        default:
          echo "Sorry, I don't understand you..";
      }
    }
  }

  private function add()
  {
    while (true) {
      $videoTitle = readline('Please input the title of a video you would like to add: ');
      $this->videoStore->create($videoTitle);
      $toContinue = readline('Do you want to add more?(y/n): ');
      if ($toContinue == 'n') {
        break;
      }
    }
  }

  private function rent()
  {
    foreach ($this->videoStore->getAllAvailable() as $key => $video) {
      echo "ID:[$key]Title: {$video->getTitle()}, Rating: {$video->getAvgRating()}" . PHP_EOL;
    }
    $ID = (int) readline('Please input the ID of the video you would like to take: ');
    if (array_key_exists($ID, $this->videoStore->getAllAvailable())) {
      echo "Rented {$this->videoStore->getAllAvailable()[$ID]->getTitle()} successfully.";
      $this->videoStore->rent($ID);
    } else {
      echo "Sorry video not found";
    }
    echo PHP_EOL;
  }

  private function return()
  {
    if(count($this->videoStore->getAllReturnable()) == 0){
      echo "Nothing to return" . PHP_EOL;
      return;
    }
    foreach ($this->videoStore->getAllReturnable() as $key => $video) {
      echo "ID:[$key]Title: {$video->getTitle()}, Rating: {$video->getAvgRating()}" . PHP_EOL;
    }
    $ID = (int) readline('Please input the ID of the video you would like to return: ');
    if (array_key_exists($ID, $this->videoStore->getAllReturnable())) {
      echo "{$this->videoStore->getAllReturnable()[$ID]->getTitle()} returned successfully.";
      $this->videoStore->return($ID);
    } else {
      echo "Sorry video not found";
    }
    echo PHP_EOL;
  }

  private function rate()
  {
    $this->list();
    $ID = readline('Please input the ID of the video you would like to rate: ');
    $rating = (int)readline('Please input the rating: ');
    if (array_key_exists($ID, $this->videoStore->getVideos()) && $rating <= 10 && $rating >= 0) {
      echo "{$this->videoStore->getVideos()[$ID]->getTitle()} rated $rating successfully.";
      $this->videoStore->userVideoRating($ID, $rating);
    } else {
      echo "Sorry invalid input";
    }
    echo PHP_EOL;
  }

  private function list()
  {
    foreach ($this->videoStore->getVideos() as $key => $video) {
      if ($video->getAvailable()) {
        $isAvailable = 'Yes';
      } else {
        $isAvailable = 'No';
      }
      echo "[$key]Title: {$video->getTitle()}, Rating: {$video->getAvgRating()}, Available: $isAvailable" . PHP_EOL;
    }
  }
}

$videoStore = new VideoStore();
$app = new Application($videoStore);
$app->run();

