<?php

class Season
{
    private $seasonNumber, $videos;

    public function __construct($seasonNumber, $videos)
    {
        $this->seasonNumber = $seasonNumber;
        $this->videos = $videos;
    }

    /**
     * Get the value of seasonNumber
     */ 
    public function getSeasonNumber()
    {
        return $this->seasonNumber;
    }

    /**
     * Get the value of videos
     */ 
    public function getVideos()
    {
        return $this->videos;
    }
}