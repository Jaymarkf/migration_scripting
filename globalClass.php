<?php
/**
 * Created by PhpStorm.
 * User: i3esolutions
 * Date: 10/24/19
 * Time: 4:22 PM
 */
class globalClass
{
    var $host = 'localhost';
    var $username = 'root';
    var $password = 'r00tb33r';
    var $db = 'migration_page';


    function selectOneQuery($str){
       $conn = mysqli_connect($this->host,$this->username,$this->password,$this->db);
        $sql = $str;
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) < 0 ){
            return 'no rows';
        }else{
            $data = mysqli_fetch_assoc($query);
            return $data;

        }



    }
    function selectAllQuery($str){

        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->db);
        $sql = $str;
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) < 0 ){

        }else{

            while($row = mysqli_fetch_assoc($query)){
                $data[] = $row;

            }

        }
        return $data;

    }
    function insertQuery($str){
        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->db);
        $qry = $str;
        mysqli_query($conn,$qry);

    }




    function p($arr = array()){

        print "<pre>";
        print_r($arr);
        print "</pre>";
    }
    function getMenus(){
        $data =  array();
        $data =  $this->selectAllQuery("select * from projects_menu_tbl");


         return $data;
    }
    function Search($search, $string){
        $position = strpos($string, $search, 0);
        if ($position == true){
            return $position;
        }
        else{
            return "Not Found";
        }
    }








}