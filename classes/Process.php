<?php
/**
 * Created by PhpStorm.
 * User: Ashik
 * Date: 23-Jun-18
 * Time: 9:07 PM
 */
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
    include_once ($filepath.'/../lib/Session.php');

class Process{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    private function getTotal(){
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        $total = $result->num_rows;
        return $total;
    }

    public function processData($data){
        $ans    = $data['ans'];
        $number = $data['number'];
        $ans    = $this->fm->validation($ans);
        $number = $this->fm->validation($number);
        $ans    = mysqli_real_escape_string($this->db->link, $ans);
        $number = mysqli_real_escape_string($this->db->link, $number);
        $next   = $number + 1;
        if (!isset($_SESSION['score'])){
            $_SESSION['score'] = '0';
        }
        $total = $this->getTotal();
        $right = $this->rightAns($number);
        if ($right == $ans){
            $_SESSION['score']++;
        }
        if ($number == $total){
            header("Location:final.php");
            exit();
        }else{
            header("Location:test.php?q=".$next);
        }
    }

    private function rightAns($number){
        $query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1'";
        $result = $this->db->select($query)->fetch_assoc();
        $value = $result['id'];
        return $value;
    }
}