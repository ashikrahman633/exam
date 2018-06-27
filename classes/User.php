<?php
/**
 * Created by PhpStorm.
 * User: Ashik
 * Date: 23-Jun-18
 * Time: 12:28 PM
 */

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllUser(){
        $query = "SELECT * FROM tbl_user ORDER BY userId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function disableUser($userid){
        $query =  "UPDATE tbl_user SET status = '1' WHERE userId = '$userid'";
        $result = $this->db->update($query);
        if ($result){
            $msg = "<span class='success'>User Disabled</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>User Not Disabled</span>";
            return $msg;
        }
    }

    public function enableUser($enaid){
        $query =  "UPDATE tbl_user SET status = '0' WHERE userId = '$enaid'";
        $result = $this->db->update($query);
        if ($result){
            $msg = "<span class='success'>User Enable</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>User Not Enabled</span>";
            return $msg;
        }
    }

    public function removeUser($removeid){
        $query = "DELETE FROM tbl_user WHERE userId = '$removeid'";
        $result = $this->db->delete($query);
        if ($result){
            $msg = "<span class='success'>User Removed Success !!</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>User Not Removed</span>";
            return $msg;
        }
    }

    public function getRegistration($name, $username, $password, $email){
        $name     = $this->fm->validation($name);
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        $email    = $this->fm->validation($email);

        $name     = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email    = mysqli_real_escape_string($this->db->link, $email);

        if ($name == "" || $username == ""  || $password == "" || $email == ""){
            $msg = "<span class='error'>Field Must Not be Empty..!!</span>";
            return $msg;
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = "<span class='error'>Invalid E-mail Address..!!</span>";
            return $msg;
        }else{
            $chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
            $chkresult = $this->db->select($chkquery);
            if ($chkresult != false){
                $msg = "<span class='error'>E-mail Address Alraedy Exists..!!</span>";
                return $msg;
            }else{
                $password = mysqli_real_escape_string($this->db->link, md5($password));
                $query = "INSERT INTO tbl_user(name, username, password, email) VALUES('$name', '$username', '$password', '$email')";
                $result = $this->db->insert($query);
                if ($result){
                    $msg = "<span class='success'>Registration Successfully Done..!!</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Error. Not Registered..!!</span>";
                    return $msg;
                }
            }
        }
    }

    public function getLogin($email, $password){
        $email    = $this->fm->validation($email);
        $password = $this->fm->validation($password);
        $email    = mysqli_real_escape_string($this->db->link, $email);
        if ($password == "" || $email == ""){
            echo "empty";
            exit();
        }else{
            $password = mysqli_real_escape_string($this->db->link, md5($password));
            $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
            $result = $this->db->select($query);
            if ($result != false){
                $value = $result->fetch_assoc();
                if ($value['status'] == '1'){
                    echo "disable";
                    exit();
                }else{
                    Session::init();
                    Session::set("login", true);
                    Session::set("username", $value['username']);
                    Session::set("userId", $value['userId']);
                    Session::set("name", $value['name']);
                    header("Location:index.php");

                }
            }else{
                echo "error";
                exit();
            }
        }
    }

    public function getUserData($userid){
        $query  = "SELECT * FROM tbl_user WHERE userId = '$userid'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getUpdateData($userid, $data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $name = $this->fm->validation($name);
        $username = $this->fm->validation($username);
        $email = $this->fm->validation($email);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);

        if ($name == "" || $username == "" || $email == ""){
            $msg = "<span class='error'>Error ! Field Must Not be Empty..!!</span>";
            return $msg;
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = "<span class='error'>Invalid E-mail Address..!!</span>";
            return $msg;
        }else{
                $query = "UPDATE tbl_user
                                SET
                                name = '$name',
                                username = '$username',
                                email = '$email'
                                WHERE userId = '$userid'";
                $result = $this->db->update($query);
                if ($result){
                    $msg = "<span class='success'>User Data Update Successfully..!!</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>User data not Updated..!!</span>";
                    return $msg;
                }
        }
    }
}