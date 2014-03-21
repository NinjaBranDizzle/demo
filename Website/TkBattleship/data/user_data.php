<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 11/19/13
 * Time: 6:48 PM
 */

namespace tk\data;

/**
 * Class UserData
 * Data access class for modifying users in the database.
 * @package tk_data
 */
class UserData
{
    private $conn = null;

    /**
     * @param $conn
     * Constructor that accepts a mysqli connection
     */
    function __construct(\mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @param $user_id
     * Determines if the user already exists in the database.
     * @return bool
     */
    public function user_exists($user_id)
    {
        $success = false;
        $sql = "select 1 "
            . "from BS_USER "
            . "where USER_ID='" . $user_id . "'";
        try {
            $success = mysql_num_rows(mysql_query($sql)) > 0;
        } catch (\mysqli_sql_exception $err) {
        }
        return $success;
    }

    /**
     * @param $user_id
     * Determines if a user record is locked in the database.
     * @return bool
     */
    public function is_user_locked($user_id)
    {
        $success = false;
        $locked = $user_id->locked ? 1 : 0;
        $sql = "select LOCKED=" . $locked
            . "from BS_USER"
            . "where USER_ID='" . $user_id . "'";
        try {
            $success = mysql_num_rows(mysql_query($sql)) > 0;
        } catch (\mysqli_sql_exception $err) {

        }
        return $success;
    }

}

?>
