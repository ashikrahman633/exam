<?php
/**
 * Created by PhpStorm.
 * User: Ashik
 * Date: 23-Jun-18
 * Time: 2:22 PM
 */

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{

    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllQuestion(){
        $query = "SELECT * FROM tbl_ques ORDER by quesNo ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function delQuestion($queno){
        $tables = array("tbl_ques", "tbl_ans");
        foreach ($tables as $table){
            $query = "DELETE FROM $table WHERE quesNo = '$queno'";
            $result = $this->db->delete($query);
        }
        if ($result){
            $msg = "<span class='success'>Question Deleted Successfully !!</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Question Not Deleted</span>";
            return $msg;
        }
    }

    public function getQuestionData($data){
        $quesNo = $data['quesNo'];
        $ques = $data['ques'];
        $ques = $this->fm->validation($ques);
        $quesNo = $this->fm->validation($quesNo);
        $quesNo = mysqli_real_escape_string($this->db->link, $quesNo);
        $ques = mysqli_real_escape_string($this->db->link, $ques);
        $ans = array();
        $ans[1] = $data['ans1'];
        $ans[2] = $data['ans2'];
        $ans[3] = $data['ans3'];
        $ans[4] = $data['ans4'];
        $rightAns = $data['rightAns'];
        $query = "INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo', '$ques')";
        $result = $this->db->insert($query);
        if ($result){
            foreach ($ans as $key => $ansName){
                if ($ansName != ""){
                    if ($rightAns == $key){
                        $rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '1', '$ansName')";
                    }else{
                        $rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '0', '$ansName')";
                    }
                    $insertrow = $this->db->insert($rquery);
                    if ($insertrow){
                        continue;
                    }else{
                        die('Error........!!');
                    }
                }
            }
            $msg = "<span class='success'>Question Added Successfully !!</span>";
            return $msg;
        }

    }

    public function getTotalQuestionNumber(){
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        $total = $result->num_rows;
        return $total;
    }

    public function getQuestion(){
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        $getdata = $result->fetch_assoc();
        return $getdata;
    }

    public function getQuesByNumber($number){
        $query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
        $result = $this->db->select($query);
        $getdata = $result->fetch_assoc();
        return $getdata;
    }

    public function getAnswer($number){
        $query = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
        $getdata = $this->db->select($query);
        return $getdata;
    }
}