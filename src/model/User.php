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
 * Class User manages user login details
 * @package Itb
 */
class User extends DatabaseTable
{
    /**
     * user role
     * @var const
     */
    const ROLE_USER = 0;

    /**
     * admin role
     * @var const
     */
    const ROLE_ADMIN = 1;

    /**
     * id
     * @var int
     */
    private $id;

    /**
     * username
     * @var String
     */
    private $username;

    /**
     * password
     * @var String
     */
    private $password;

    /**
     * role
     * @var int
     */
    private $role;

    /**
     * gets id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * sets id
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * gets username
     * @return String
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * sets username
     * @param String $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * gets password
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * get role
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * sets role
     * @param int $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * hash the password before storing ...
     * @param String $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }

    /**
     * return success (or not) of attempting to find matching username/password in the repo
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = User::getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        return password_verify($password, $hashedStoredPassword);

/*        if($hashedStoredPassword == $password)
        {
            return true;
        }*/
    }


    /**
     * return role which matches username
     * @param $username
     *
     * @return int
     */
    public static function canFindMatchingUsernameAndRole($username)
    {
        $user = User::getOneByUsername($username);
        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        return $user->getRole();
    }

    /**
 * if record exists with $username, return User object for that record
 * otherwise return 'null'
 *
 * @param $username
 *
 * @return object|null
 */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM users WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
