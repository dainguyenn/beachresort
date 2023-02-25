<?php

include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR . '/repository/impl/Repository.php';
include_once PATH_DIR_RESORT . '/entity/User.php';


class UserRepo extends Repository
{
    public function __construct()
    {
        parent::__construct('account');
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE username='$username'" . " AND password= '$password'";
        $sql_roles = "SELECT role_name FROM roles INNER JOIN account INNER JOIN user_role WHERE account.username = '$username' AND user_role.role_id = roles.id AND user_role.user_id = account.id";

        $res = $this->conn->query($sql);
        if (!mysqli_num_rows($res) > 0) {
            return false;
        }
        $fetchRoles = $this->conn->query($sql_roles);
        $res = mysqli_fetch_object($res);
        $fetchRoles = mysqli_fetch_all($fetchRoles);
        $roles = [];
        foreach ($fetchRoles as $role => $value) {
            array_push($roles, $value[0]);
        }
        $res->roles = $roles;
        $_SESSION['user'] = serialize($res);
        return $res;
    }

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM account WHERE username = '$username'";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
