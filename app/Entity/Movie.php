<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 16:07
 */

namespace Entity;


class Movie
{
    private $imdbId;
    private $title;
    private $year;
    private $cast;
    private $directors;
    private $writers;
    private $plot;
    private $rating;
    private $votes;
    private $runtime;
    private $trailerUrl;
    private $dateCreated;
    private $dateModified;
    private $id;

    private  $genres;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }

    /**
     * @param mixed $imdbId
     */
    public function setImdbId($imdbId)
    {
        $this->imdbId = $imdbId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * @param mixed $cast
     */
    public function setCast($cast)
    {
        $this->cast = $cast;
    }

    /**
     * @return mixed
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * @param mixed $directors
     */
    public function setDirectors($directors)
    {
        $this->directors = $directors;
    }

    /**
     * @return mixed
     */
    public function getWriters()
    {
        return $this->writers;
    }

    /**
     * @param mixed $writers
     */
    public function setWriters($writers)
    {
        $this->writers = $writers;
    }

    /**
     * @return mixed
     */
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * @param mixed $plot
     */
    public function setPlot($plot)
    {
        $this->plot = $plot;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return mixed
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * @param mixed $runtime
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;
    }

    /**
     * @return mixed
     */
    public function getTrailerUrl()
    {
        return $this->trailerUrl;
    }

    /**
     * @param mixed $trailerUrl
     */
    public function setTrailerUrl($trailerUrl)
    {
        $this->trailerUrl = $trailerUrl;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * @param mixed $dateModified
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $genres
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;
    }
    public function getPosterUrl()
    {
        return BASE_URL . "/img/poster/" .$this->getImdbId() .".jpg";
    }
}