<?php
include('../connections.php');
session_start();
$mysqlusername = "root";
$mysqlpassword = "r00tb33r";
if(isset($_POST['btnid'])){
    $file = $_POST['btnid'];
   $pathdirectory = $_POST['directory'];
   $prj = $_POST['prj'];
   $b = exec("mysql -u".$mysqlusername." -p".$mysqlpassword." < ".$pathdirectory."/".$file." 2>&1");
   if(empty($b)){
       //true
       //check if exist
       $qryselect = "select * from migration_sql_file_tbl where project_name = '".$prj."' and sql_file = '".$file."';";

       $res = mysqli_query($conn,$qryselect);

       if(mysqli_num_rows($res) > 0 ){
           //if exist then update
           $qryupdate = "UPDATE migration_sql_file_tbl set project_name='".$prj."',sql_file='".$file."' where project_name='".$prj."' and sql_file='".$file."';";
           mysqli_query($conn,$qryupdate);
           echo print_r(array(
               'file' =>$file,
               'sql_log' =>$b
           ));

       }else{
           //if no record then add
           $qry = "INSERT INTO migration_sql_file_tbl (`project_name`,`sql_file`) VALUES('".$prj."','".$file."');";
           mysqli_query($conn,$qry);
           echo print_r(array(
               'file' =>$file,
               'sql_log' =>$b
           ));
       }
       if(isset($_SESSION['sql_err']) || $_SESSION['sql_file']){

           unset($_SESSION['sql_err']);
       }

       $_SESSION['sql_err'] .= '<div class="-col-div-" id="show0">
                    <div class="row" style="margin:0 !important;">
                        <span style="position:relative;top:5px;">
                            <span class="text-success">
                                 <i class="fa fa-file fa-lg"></i>
                                 <b>SQL file : </b>
                                <span>'.$file.'</span>
                            </span>
                        </span>
                    </div>
                    <div class="row" style="margin:0 !important;">
                            <span style="position:relative;top:5px;">
                                <span class="text-success">
                                  <b>Run script : Success! </b>                   
                                </span>
                            </span>
                    </div>
                </div>';

   }else{
       // error
       $res = array(
           'file' => $file,
           'sql_log' => $b
       );
       $_SESSION['sql_err'] = '<div class="-col-div-" id="show0">
                    <div class="row" style="margin:0 !important;">
                        <span style="position:relative;top:5px;">
                            <span class="text-danger">
                                <i class="fa fa-file fa-lg"></i>
                                  <b>SQL file error in : </b>
                                <span>'.$res['file'].'</span>
                            </span>
                        </span>
                    </div>
                    <div class="row" style="margin:0 !important;">
                            <span style="position:relative;top:5px;">
                                <span class="text-danger">
                                    <b>SQL error msg: </b>
                                    <span>'.$res['sql_log'].'</span>
                                </span>
                            </span>
                    </div>
                </div>';

      echo json_encode($res);
   }
}

if(isset($_POST['mark_btn_id'])) {
    //check if exist
    $prj = $_POST['mark_prj'];
    $file = $_POST['mark_btn_id'];
   // die($file);
    $qryselect = "select * from migration_sql_file_tbl where project_name = '" . $prj . "' and sql_file = '" . $file . "';";
    $res = mysqli_query($conn, $qryselect);

    if (mysqli_num_rows($res) > 0) {
        //if exist then update
        $qryupdate = "UPDATE migration_sql_file_tbl set project_name='" . $prj . "',sql_file='" . $file . "',status = 1, markwhen = '".date("Y-m-d H:i:s")."' where project_name='" . $prj . "' and sql_file='" . $file . "';";
      echo $qryupdate;
        mysqli_query($conn, $qryupdate);
   //     die("AAA");
    } else {
        //if no record then add
        $qry = "INSERT INTO migration_sql_file_tbl (`project_name`,`sql_file`,`status`,`markwhen`) VALUES('" . $prj . "','" . $file . "',1,'".date("Y-m-d H:i:s")."');";

        mysqli_query($conn, $qry);


    }
}

if(isset($_POST['arrData'])){
    unset($_SESSION['sql_err']);
    $_SESSION['sql_err'] = '';
$data = json_decode($_POST['arrData'],true);
foreach ($data as $index => $val) {
    $filename = $val['file_name'];
    $directory = $val['directory'];
    $project = $val['project_name'];
    $return = exec("mysql -u" . $mysqlusername . " -p" . $mysqlpassword . " < " . $directory . "/" . $filename . " 2>&1");
    if (empty($return)) {
        //execution success
        $qry = "select * from migration_sql_file_tbl where project_name = '" . $project . "' and sql_file = '" . $filename . "';";
           $qryres = mysqli_query($conn,$qry);
        if (mysqli_num_rows($qryres) > 0 ) {
            //if exist then update
            $qryupdate = "UPDATE migration_sql_file_tbl set project_name='" . $project . "',sql_file='" . $filename . "' where project_name='" . $project . "' and sql_file='" . $filename . "';";
            mysqli_query($conn, $qryupdate);
        } else {
            //if no record then add
            $qry = "INSERT INTO migration_sql_file_tbl (`project_name`,`sql_file`) VALUES('" . $project . "','" . $filename . "');";
            mysqli_query($conn, $qry);
        }
        echo 'success';
        $_SESSION['sql_err'] .= '<div class="-col-div-" id="show'.$index.'">
                    <div class="row" style="margin:0 !important;">
                        <span style="position:relative;top:5px;">
                            <span class="text-success">
                                 <i class="fa fa-file fa-lg"></i>
                                 <b>SQL file : </b>
                                <span>'.$filename.'</span>
                            </span>
                        </span>
                    </div>
                    <div class="row" style="margin:0 !important;">
                            <span style="position:relative;top:5px;">
                                <span class="text-success">
                                  <b>Run script : Success! </b>                   
                                </span>
                            </span>
                    </div>
                </div>';

    } else {
        //execution failed
        $_SESSION['sql_err'] .= '<div class="-col-div-" id="show'.$index.'">
                    <div class="row" style="margin:0 !important;">
                        <span style="position:relative;top:5px;">
                            <span class="text-danger">
                                 <i class="fa fa-file fa-lg"></i>
                                 <b>SQL file error in : </b>
                                <span>'.$filename.'</span>
                            </span>
                        </span>
                    </div>
                    <div class="row" style="margin:0 !important;">
                            <span style="position:relative;top:5px;">
                                <span class="text-danger">
                                  <b>SQL error msg: </b>
                                    <span>'.$return.'</span>
                                </span>
                            </span>
                    </div>
                </div>';
    }
}

}




if(isset($_POST['b'])){
    unset($_SESSION['sql_err']);
}

if(isset($_POST['urlmenu']) && isset($_POST['data'])){
    unset($_SESSION['sql_err']);
    $_SESSION['sql_err'] = '';
    $data = json_decode($_POST['data'],true);
    $url = $_POST['urlmenu'];
    $arrdata =  array();
    $path = '';

    foreach ($data as $index => $val) {

        if($val['menu_name'] ==  $url){
            $path = $val['file_path'];
            foreach ($val['sql'] as $c => $item) {
                $arrdata[] =$item['sql_file'];
            }
        }
    }
    $finaldata = array(
        'sql_file'=>$arrdata
    );
    $directorypath = $path;
    // echo print_r($finaldata);
    foreach ($finaldata['sql_file'] as $k => $v) {
        $bash = exec("mysql -u".$mysqlusername." -p".$mysqlpassword." < ".$directorypath."/".$v." 2>&1");
        if(empty($bash)){
            //true
            //check if exist
            $qry = "select * from migration_sql_file_tbl where project_name = '".$url."' and sql_file = '".$v."';";

            $result = mysqli_query($conn,$qry);

            if(mysqli_num_rows($result) > 0 ){
                //if exist then update
                $qryupdate = "UPDATE migration_sql_file_tbl set project_name='".$url."',sql_file='".$v."' where project_name='".$url."' and sql_file='".$v."';";
                mysqli_query($conn,$qryupdate);
                echo print_r(array(
                    'file' =>$v,
                    'sql_log' =>$bash
                ));

            }else
                 {
                    //if no record then add
                    $qry = "INSERT INTO migration_sql_file_tbl (`project_name`,`sql_file`) VALUES('".$url."','".$v."');";
                    mysqli_query($conn,$qry);
                    echo print_r(array(
                        'file' =>$v,
                        'sql_log' =>$bash
                    ));
                 }

            $_SESSION['sql_err'] .= '<div class="-col-div-" id="show0">
                    <div class="row" style="margin:0 !important;">
                        <span style="position:relative;top:5px;">
                            <span class="text-success">
                                 <i class="fa fa-file fa-lg"></i>
                                 <b>SQL file : </b>
                                <span>'.$v.'</span>
                            </span>
                        </span>
                    </div>
                    <div class="row" style="margin:0 !important;">
                            <span style="position:relative;top:5px;">
                                <span class="text-success">
                                  <b>Run script : Success! </b>                   
                                </span>
                            </span>
                    </div>
                </div>';


        }else{
            $_SESSION['sql_err'] = '<div class="-col-div-" id="show0">
                    <div class="row" style="margin:0 !important;">
                        <span style="position:relative;top:5px;">
                            <span class="text-danger">
                                <i class="fa fa-file fa-lg"></i>
                                  <b>SQL file error in : </b>
                                <span>'.$v.'</span>
                            </span>
                        </span>
                    </div>
                    <div class="row" style="margin:0 !important;">
                            <span style="position:relative;top:5px;">
                                <span class="text-danger">
                                    <b>SQL error msg: </b>
                                    <span>'.$bash.'</span>
                                </span>
                            </span>
                    </div>
                </div>';


        }



    }

}





