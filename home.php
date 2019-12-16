<?php
include_once('globalClass.php');
include_once('connections.php');

session_start();
$clsGlob = new globalClass();

if(!isset($_SESSION['user_name'])){
    header('Location: index.php');
}else{

$data = $clsGlob->getMenus();

$q = array();
$pos = array();
$filepath = array();
    $test = array();
    foreach ($data as $index => $val) {
      $filepath[] = $val['project_name'];
        $s = str_replace($_SERVER['DOCUMENT_ROOT']."/","",$val['project_name']);
        $pos[] = explode("/",$s);
    }
    $datax = array();
    $bc = array();
    foreach ($pos as $pos_key=> $item) {


        $datax[] = $item[0];
        $testfile = $filepath[$pos_key];
        $testsqlfile = glob($testfile. '/*sql');
        $testtrimfile = str_replace($testfile."/","",$testsqlfile);



        $test[] = array(
            'menu_name' => $datax[$pos_key],
            'file_path' => $filepath[$pos_key],
            'sql'=>$testtrimfile
        );
    }
    $temp1 = array();
    $totalundone = 0;
    foreach ($test as $index => $item) {

        foreach ($item['sql'] as $key => $value){
            $qry = "select * from migration_sql_file_tbl where sql_file ='".$item['sql'][$key]."'";
            $res = mysqli_query($conn,$qry);
            if(mysqli_num_rows($res) > 0 ){
                $status = 'DONE';

            }else{
                $status = 'UNDONE';
                $totalundone++;
            }
            $temp1[$index]['total_undone'] =$totalundone;
            $temp1[$index]['menu_name'] = $item['menu_name'];
            $temp1[$index]['file_path'] = $item['file_path'];
            $temp1[$index]['sql'][$key] = array(
                'sql_file' => $item['sql'][$key],
                'status'=> $status
            );
        }
        $totalundone = 0;
    }
//die($clsGlob->p($temp1));
$arr_item = $test;
    $menus = $data;
    if(isset($_GET['menu'])){

        foreach ($arr_item as $i => $item) {
            if($item['menu_name'] == $_GET['menu']){
              $file = $item['file_path'];
                    //full path file
                    $sqlfile = glob($file.'/*sql');
                    //sql file
                    $trimfile= str_replace($file."/","",$sqlfile);
            }
        }
        foreach ($arr_item as $item) {
            if($_GET['menu'] == $item['menu_name']){
                $directory = $item['file_path'];
                $projectname  = $item['menu_name'];
                break;
            }
        }
    }
      $status = 0;
    foreach ($trimfile as $index => $item) {
        $qry = "select * from migration_sql_file_tbl where sql_file ='{$item}'";
        $res = mysqli_query($conn,$qry);
        if(mysqli_num_rows($res) > 0 ){
            $status = 1;
        }else{
            $status = 0;
        }
        $data = mysqli_fetch_assoc($res);
        if($data['status'] == 1){
            $mark = "&nbsp;&nbsp;[Mark Done: ".$data['markwhen']."]";

        }else{
            $mark = "";
        }
        $arrfile[] = array(
            'sql'=>$item,
            'status'=>($status == 1 ? '[Date run: '.$data['runwhen']."]".$mark : 'Undone'),
            'status_id'=>$data['status']
        );

    }



    //die($clsGlob->p($arrfile));


    include_once('view/home.php');
    include_once('submit_post/run_script.php');

}
