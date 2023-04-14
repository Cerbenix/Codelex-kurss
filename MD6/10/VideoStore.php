<?php declare(strict_types=1);

class VideoStore
{
  private array $videos = [];

  public function create(string $videoTitle): void
  {
    $video = new Video($videoTitle);
    $this->videos[] = $video;
  }

  public function rent(int $ID): void
  {
    $this->videos[$ID]->setAvailable(false);
  }

  public function return(int $ID): void
  {
    $this->videos[$ID]->setAvailable(true);
  }

  public function userVideoRating(string $ID, int $rating): void
  {
    $this->videos[$ID]->receiveRating($rating);
  }

  public function getVideos(): array
  {
    return $this->videos;
  }
  public function getAllAvailable(): array
  {
    $allAvailable = [];
    foreach ($this->videos as $key => $video){
      if($video->getAvailable()){
        $allAvailable[$key] = $video;
      }
    }
    return $allAvailable;
  }
  public function getAllReturnable(): array
  {
    $allReturnable = [];
    foreach ($this->videos as $key => $video){
      if(!$video->getAvailable()){
        $allReturnable[$key] = $video;
      }
    }
    return $allReturnable;
  }
}