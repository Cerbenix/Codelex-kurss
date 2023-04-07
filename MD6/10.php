<?php declare(strict_types=1);

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
    foreach ($this->videoStore->getVideos() as $video) {
      if ($video->getIsCheckedOut()) {
        $isAvailable = 'No';
      } else {
        $isAvailable = 'Yes';
      }
      echo "Title: {$video->getTitle()}, Rating: {$video->getAvgRating()}, Available: $isAvailable" . PHP_EOL;
    }
  }
}

class VideoStore
{
  private array $videos = [];

  public function addVideo(string $videoTitle): void
  {
    $video = new Video($videoTitle);
    $this->videos[] = $video;
  }

  public function checkOutVideo(string $videoTitle): bool
  {
    foreach ($this->videos as $video) {
      if ($video->getTitle() == $videoTitle && !$video->getIsCheckedOut()) {
        $video->checkedOut();
        return true;
      }
    }
    return false;
  }

  public function returnVideo(string $videoTitle): bool
  {
    foreach ($this->videos as $video) {
      if ($video->getTitle() == $videoTitle && $video->getIsCheckedOut()) {
        $video->returned();
        return true;
      }
    }
    return false;
  }

  public function userVideoRating(string $videoTitle, int $rating): bool
  {
    foreach ($this->videos as $video) {
      if ($video->getTitle() == $videoTitle) {
        $video->setReceivedRatings($rating);
        return true;
      }
    }
    return false;
  }

  public function getVideos(): array
  {
    return $this->videos;
  }
}

class Video
{

  private string $title;
  private string $avgRating;
  private bool $isCheckedOut;
  private int $numberOfRatings;
  private int $receivedRatings;

  public function __construct(string $title)
  {
    $this->title = $title;
    $this->avgRating = '-';
    $this->isCheckedOut = false;
    $this->numberOfRatings = 0;
    $this->receivedRatings = 0;
  }

  public function checkedOut(): void
  {
    $this->isCheckedOut = true;
  }

  public function returned(): void
  {
    $this->isCheckedOut = false;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getIsCheckedOut(): bool
  {
    return $this->isCheckedOut;
  }

  public function setReceivedRatings(int $receivedRatings): void
  {
    $this->receivedRatings += $receivedRatings;
    $this->numberOfRatings++;
    $this->avgRating = number_format($this->receivedRatings / $this->numberOfRatings, 1);
  }

  public function getAvgRating(): string
  {
    return $this->avgRating;
  }
}

$videoStore = new VideoStore();
$app = new Application($videoStore);
$app->run();

