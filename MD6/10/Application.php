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
          $this->add_movies();
          break;
        case 2:
          $this->rent_video();
          break;
        case 3:
          $this->return_video();
          break;
        case 4:
          $this->rate_video();
          break;
        case 5:
          $this->list_inventory();
          break;
        default:
          echo "Sorry, I don't understand you..";
      }
    }
  }

  private function add_movies()
  {
    while (true) {
      $videoTitle = readline('Please input the title of a video you would like to add: ');
      $this->videoStore->addVideo($videoTitle);
      $toContinue = readline('Do you want to add more?(y/n): ');
      if ($toContinue == 'n') {
        break;
      }
    }
  }

  private function rent_video()
  {
    $videoTitle = readline('Please input the title of the video you would like to take: ');
    if ($this->videoStore->checkOutVideo($videoTitle)) {
      echo "Rented $videoTitle successfully.";
    } else {
      echo "Sorry video not found";
    }
    echo PHP_EOL;
  }

  private function return_video()
  {
    $videoTitle = readline('Please input the title of the video you would like to return: ');
    if ($this->videoStore->returnVideo($videoTitle)) {
      echo "$videoTitle returned successfully.";
    } else {
      echo "Sorry video not found";
    }
    echo PHP_EOL;
  }

  private function rate_video()
  {
    $videoTitle = readline('Please input the title of the video you would like to rate: ');
    $rating = (int)readline('Please input the rating: ');
    if ($this->videoStore->userVideoRating($videoTitle, $rating)) {
      echo "$videoTitle rated $rating successfully.";
    } else {
      echo "Sorry video not found";
    }
    echo PHP_EOL;
  }

  private function list_inventory()
  {
    foreach ($this->videoStore->getVideos() as $key => $video) {
      if ($video->getIsCheckedOut()) {
        $isAvailable = 'No';
      } else {
        $isAvailable = 'Yes';
      }
      echo "{[]}Title: {$video->getTitle()}, Rating: {$video->getAvgRating()}, Available: $isAvailable" . PHP_EOL;
    }
  }
}

$videoStore = new VideoStore();
$app = new Application($videoStore);
$app->run();

