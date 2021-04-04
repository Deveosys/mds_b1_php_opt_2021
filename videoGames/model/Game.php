<?php

class Game
{
    private $_id;
    private $_name;
    private $_game_id;
    private $_cover;
    private $_summary;
    private $_rating;

    public function __construct(string $name, int $game_id, string $cover, string $summary, float $rating)
    {
        $this->_name = $name;
        $this->_game_id = $game_id;
        $this->_cover = $cover;
        $this->_summary = $summary;
        $this->_rating = $rating;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName(string $name)
    {
        $this->_name = $name;
    }

    public function getGameId(): int
    {
        return $this->_game_id;
    }

    public function setGameId(int $game_id)
    {
        $this->_game_id = $game_id;
    }

    public function getCover(): string
    {
        return $this->_cover;
    }

    public function setCover(string $cover)
    {
        $this->_cover = $cover;
    }

    public function getSummary(): string
    {
        return $this->_summary;
    }

    public function setSummary(string $summary)
    {
        $this->_summary = $summary;
    }

    public function getRating(): string
    {
        return $this->_rating;
    }

    public function setRating(string $rating)
    {
        $this->_rating = $rating;
    }
}
