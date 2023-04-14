<?php declare(strict_types=1);

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