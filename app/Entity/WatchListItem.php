<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 18/01/2017
 * Time: 13:44
 */

namespace Entity;


class WatchListItem
{
    protected $iduser;
    protected $idmovie;

public function __construct($idmovie,$iduser)
{
    $this->idmovie= $idmovie;
    $this->iduser = $iduser;
}

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getIdmovie()
    {
        return $this->idmovie;
    }

    /**
     * @param mixed $idmovie
     */
    public function setIdmovie($idmovie)
    {
        $this->idmovie = $idmovie;
    }


}