<?php
/**
 * Created by PhpStorm.
 * User: Ashik
 * Date: 23-Jun-18
 * Time: 11:08 AM
 */

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Admin{

    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAdminData($data){
        $adminUser = $this->fm->validation($data['adminUser']);
        $adminPass = $this->fm->validation($data['adminPass']);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

        if ($adminUser == "" || $adminPass == ""){
            $msg = "<div style='color: red'><strong>Error ! </strong>Field must not be Empty !</div>";
            return $msg;
        }else{
            $query = "select * from tbl_admin where adminUser = '$adminUser' and adminPass = '$adminPass'";
            $result = $this->db->select($query);
            if ($result != false){
                $value = $result->fetch_assoc();
                Session::init();
                Session::set("adminLogin", true);
                Session::set("adminUser", $value['adminUser']);
                Session::set("adminId", $value['adminId']);
                header("Location:index.php");
            }else{
                $msg = "<span class='error'>Username Or Password Not Matched !!</span>";
                return $msg;
            }
        }
    }
}