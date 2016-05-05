<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 20/02/2016
 * Time: 20:00
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Attendance for all student attendances
 * @package Itb
 */
class Attendance extends DatabaseTable
{
    /**
     * id
     * @var int
     */
    private $id;

    /**
     * time
     * @var String
     */
    private $time;

    /**
     * class
     * @var String
     */
    private $class;


    /**
     * sets the class
     * @param String $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * gets the class
     * @return String
     */
    public function getClass()
    {
        return $this->class;
    }


    /**
     * sets the id
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * gets the id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * sets the time
     * @param String $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }


    /**
     * gets the time
     * @return String
     */
    public function getTime()
    {
        return $this->time;
    }
}
