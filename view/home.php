<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Migration Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<!--    boot grid plugin-->



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./plugin/bootstrap3.4.0.min.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="./plugin/fontawesome-solid.js"</script>
    <script defer src="./plugin/fontawsome.js"></script>


    <style>
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a, a:hover, a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar {
            /* don't forget to add all the previously mentioned styles here too */
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
            position:absolute !important;
            min-height:100%; !important;
            left:0; !important;
        }

        #sidebar .sidebar-header {
            padding: 7px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;

        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }
        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active > a, a[aria-expanded="true"] {
            color: #fff;
        }
        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;

        }
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #offbtn{
                text-align:right;
                float:right;
            }
            #container-table{
                positionL:relative;
                margin-left:55px !important;
                transition: all 0.3s;
                padding-right:55px !important;
            }
        }
        a[data-toggle="collapse"] {
            position: relative;
        }



        .wrapper {
            display: flex;
           position:relative;
            min-height:100vh;
        }

        #sidebar {
            width:300px;
            min-height:100% !important;
            position:relative;


        }

        #sidebar.active {
            margin-left: -250px;
        }
        #parentcircle{
            border-radius:50%;
            height:20px;
            width:20px;
            background-color: #1321ff;
            text-align:center;
        }
        #circlenum{
            font-size:12px;
            font-weight:bold;
            margin:0px;
            padding:0px;
            bottom:2px;
            position:relative;

        }
        #top-nav{
            position:absolute;
            width:100%;
            max-width:100%;
            height:70.1px;
            background-color:#dedee0;
            top:0;
            left:0;


        }
        .table-container{
            position:relative;
            width:100%;
            margin:0px 5px;
            padding:5px;

        }
        .dropdown-toggle::after{
            display:none !important;
        }
        .modal-body{
            background-color:#7386d587;
        }
        .modal-content{
            background-color:#7386d5;
        }
        .glyphicon-off:before{
            color:#ecebeb;
        }
        .sidebar-footer:hover{
            background-color:#5263af !important;

        }
        .sidebar-footer{
            position:absolute;
            bottom:0;
            left:0;
        }
        .card{
            position:relative;
            margin-top:100px;
            margin-left:0px;
            margin-right:10px;

        }
        .card .bg-light{
            margin-left:400px;
        }
        .card-header{
            background-color:#bcb3ff !important;
        }
        #exampleModalCenter{


        }
        .-col-div-{
            box-shadow: 0px 2px 3px 0px #4c4c4ccc;
            position:relative;
            height:100%;
            width:100%;
            padding-bottom:10px;
            padding-left:10px;
            border-right:none;
            border-top:none;
            border-left:none;
            border-radius:5px;
            margin-bottom:5px;
        }
        .error-container{
            height:95px;
            position:relative;

        }
        .active{
            text-decoration: none;
            transition: all 0.3s;
            background-color: white;
            color:#7386D5;
        }
        #logoutli:hover > #li{
            background-color:#e2edff;
        }
        .def-label{
            position:absolute;
            width:800px;
            height:400px;
            margin-left:400px;
            margin-top:100px;
        }
        #text-def{
            font-size:16px;
            color:red;

        }
    </style>
</head>
<body>

<script src="./plugin/jquery-3.4.1.min.js"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Popper.JS -->
<script src="./plugin/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="./plugin/bootstrap-4.1.0.min.js" ></script>
<link rel="stylesheet" type="text/css" href="./plugin/jquery.bootgrid.min.css"/>
<script src="./plugin/jquery.bootgrid.fa.min.js"></script>
<script src="./plugin/jquery.bootgrid.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="wrapper">
    <!-- Sidebar -->
    <?php

    session_start();
    ?>
    <nav id="top-nav">
        <div class="pull-right" style="position:relative;width:150px;margin-top:37px;">
            <div class="error-container" style="padding:0 !important;margin:0 !important;z-index:1;height:inherit">
                <ul class="list-unstyled components">
                    <li>

                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-info" style="text-transform: uppercase;font-size:16px;top:-10px;">Administrator           <i class="fa fa-angle-down fa-lg"></i></a>

                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li style="border:1px solid #b3b3b3;height:30px;margin-top:10px;margin-right:10px;background-color:#dedee0;border-top:none;">
                                <a href="./logout.php"style="font-size:18px !important;color:#5b57d6;">Logout &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <h3>M I G R A T I O N</h3>
        </div>
        <ul class="list-unstyled components">
            <?php


            foreach ($temp1 as $item =>$val) {
               ?><li>
                    <a href="home.php?menu=<?=$val['menu_name']?>" id="<?=$val['file_path']?>"class="collapse list-unstyled menu_name <?php
                        if($val['menu_name'] == $_GET['menu']){
                            echo "active";
                        }
                    ?>"><?=$val['menu_name']?>
                        <span class="pull-right" style="position:relative;">
                           <div id="parentcircle" style="<?php
                          if($val['total_undone'] > 0 ){
                              echo "background-color:#ff0000";
                          }else{
                              echo "background-color:#1200ff";
                          }
                           ?>">
                               <span id="circlenum"><?=$val['total_undone']?></span>
                           </div>

                        </span>

                       </a>
                        </li>
            <?php
            }
            ?>

        </ul>

        <div class="sidebar-footer btn" style="bottom:0px;width:300px;background-color:#38488e;text-align: center;" data-toggle="tooltip" data-placement="top" title="Log out">
            <a href="logout.php">
                <span class="glyphicon glyphicon-off" id="offbtn" aria-hidden="true" ></span>
            </a>
        </div>

    </nav>

<!--    body content-->
    <?php
    if(isset($_GET['menu'])){
        ?>
        <div class="" id="container-table" style="padding:0;margin-left:310px;width:100%;">

            <div class="card bg-light">
                <div class="card-header"><b style="color:white;text-transform: uppercase;font-size:24px;"><?=$_GET['menu']?></b></div>
                <div class="card-body">
                    <div class="table-container" style="width:90%;">
                        <div class="container-fluid">

                            <?=$_SESSION['sql_err'];?>
                            <button type="button" id="run_all" class="btn btn-danger pull-right"style="margin-left:100px;width:100px;" data-toggle="modal" data-target="#run-all-confirm">Run All</button>
                            <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#confirm" style="position:relative;left:80px;">Run Selected</button>
                        </div>
                        <table id="grid-selection" class="table table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th data-column-id="idf" data-type="numeric" data-identifier="true">#</th>
                                <th data-column-id="migration_name" data-order="asc">Migration Name</th>
                                <th data-column-id="status">Status</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                                <th data-column-id="projectname" data-type="string" data-visible="false"></th>
                                <th data-column-id="status_id"  data-type="string" data-visible="false"></th>
                            </tr>
                            </thead>
                            <tbody id="bodytable">
                            <?php
                            foreach ($arrfile as $key =>$val){
                                echo "<tr>";
                                echo "<td>".$key."</td>";
                                echo "<td>".$val['sql']."</td>";
                                echo "<td>".$val['status']."</td>";
                                echo "<td>".$directory."</td>";
                                echo "<td>".$projectname."</td>";
                                echo "<td>".$val['status_id']."</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
        if(!isset($_GET['menu'])){
            echo "<div class='def' style='position:relative;'>
        <div class='def-label'>
        <span id='text-def'>
        <b>Note</b> : There's no data or project folder data in database.
       <br>
       <br>
       Kindly go to <i>database <b>migration_page</b> &gt; projects_menu_tbl </i> ,
       <br>
       <br>
       
       Add new item to the folder path of the system.
       <br>
       <br>
       <b>e.g:</b> /var/www/html/hms1/dbmodel/migration <b class='text-info'>(linux user)</b>
       <br>
       <b>e.g:</b> c:/xampp/htdocs/hms1/dbmodel/migration <b class='text-info'>(windows user)</b>
</span>
</div>
</div>";
        }
    ?>

</>
<!-- Modal -->
<div class="modal fade in" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;color:white" aria-hidden="true" style="margin-bottom:4px">
                        <span class="sr-only" style="color:blue;">Loading...</span>
                    </div>
                </div>
                <div class="text-center">
                <label style="color:white">Please wait while executing migration script...</label>
                </div>
            </div>


        </div>
    </div>
</div>


<div class="modal fade" id="confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="text-warning font-weight-bold">
                        are you sure you want to run this script?
                    </p>
                    <label class="text-danger">
                        WARNING: <label class="text-warning">this cannot be undone</label>
                    </label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" id="btn_run_selected">RUN</button>
                    <button class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="run-all-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="font-weight-bold" style="color:#37ff80 !important;">
                      are you sure you want to <b class="text-danger">RUN</b> all this script?
                    </p>
                    <label class="text-danger">
                        <label style="font-size:18px;">WARNING: &nbsp&nbsp</label><label class="text-warning">this cannot be undone!!</label>
                    </label>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-danger btn-sm" id="btn_run_all">RUN</button>


                    <button class="btn btn-default btn-sm" data-dismiss="modal">CANCEL</button>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>

    function runme(btnid,directory,prj,status){
        if(status != "Undone"){
            if (confirm("This script is already run are you sure you want to run it again?")) {
                $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false});
                $.ajax({
                    url: './submit_post/run_script.php',
                    type: 'POST',
                    data: {btnid: btnid, directory: directory, prj: prj},
                    success: function () {
                        window.location.reload();
                    }
                });

            }

        }else {


            if (confirm("are you sure you want to run this migration script?")) {
                $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false});
                $.ajax({
                    url: './submit_post/run_script.php',
                    type: 'POST',
                    data: {btnid: btnid, directory: directory, prj: prj},
                    success: function () {
                        window.location.reload();
                    }
                });

            }

        }
    }

    function markdone(mark_btn_id,mark_prj){
        if(confirm("are you sure you want to mark as done??")){
            $.ajax({
                url:'./submit_post/run_script.php',
                type: 'POST',
                data:{mark_btn_id:mark_btn_id,mark_prj:mark_prj},
                success:function(){
                    window.location.reload();
                }
            });
        }
}


    $(document).ready(function(){

        $('#btn_run_all').click(function(){
            $('#run-all-confirm').modal('hide');
            $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false});
                var urlmenu = '<?php echo $_GET['menu']; ?>';
                var data = '<?php echo json_encode($temp1); ?>';
                $.ajax({
                    url: './submit_post/run_script.php',
                    type: 'POST',
                    data:{urlmenu:urlmenu,data:data},
                    success:function(){
                    window.location.reload();
                    }


                });
        });

        var divs = $("[id^=show]");
        var i = 0;
        var loop = window.setInterval(function () {


            $(divs[i]).fadeOut(3000);
            if (i == divs.length)
                clearInterval(loop);
            i++;
        }, 3000);

            var b = 'menu';
            //if the link on sidebar was click then unset all session error and success return
        $('.menu_name').click(function(e){
           $.ajax({
               url: './submit_post/run_script.php',
               type: 'POST',
               data:{b:b}
           });
        });


        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('.sidebar-footer').click(function(){
            window.location.href = 'logout.php';

        });

        $('#btn_run_selected').click(function () {
                    $('#confirm').modal('hide');
                    $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false});
                    var data = [];
                    $('#bodytable .select-box:checked').each(function (e) {

                        var elem = $(this).parent().siblings(':eq(3)').children(':eq(0)');
                        var file_name = elem.attr('file_name');
                        var directory = elem.attr('directory_name');
                        var project_name = elem.attr('project_name');

                        var arrdata = {file_name: file_name, directory: directory, project_name: project_name};
                        data.push(arrdata);


                    });
                    var arrData = JSON.stringify(data);
                    $.ajax({
                        url: './submit_post/run_script.php',
                        type: 'POST',
                        data: {arrData: arrData},
                        success: function () {
                            window.location.reload();
                        }
                    });

        });
   var grid =  $("#grid-selection").bootgrid({
        css:
            {
            pagination: 'pagination pagination-sm',
            table: 'table table-bordered'
        },
        selection: true,
        multiSelect: true,

        formatters: {
            "commands":function(row,e)
            {


            var file_name = e.migration_name;
            var directory_name = e.commands;
            var project_name = e.projectname;
            var btndisabled = '';
            if(e.status_id == 0){
              btndisabled = '';
            }else{
               btndisabled = 'disabled';
            }
                 return "<button type='button' class='btn btn-success btn-sm btn-run-me' onclick='runme(\""+e.migration_name+"\",\""+e.commands+"\",\""+e.projectname+"\",\""+e.status+"\")' file_name='"+file_name+"' directory_name='"+directory_name+"' project_name='"+project_name+"' id='"+ file_name +"'" +btndisabled+ ">Run</button>" +
                    "&nbsp&nbsp&nbsp<button type='button' class='btn btn-warning btn-sm markbtn' onclick='markdone(\""+e.migration_name+"\",\""+e.projectname+"\")'>Mark as Done</button>";
            }
        }
    }).on("selected.rs.jquery.bootgrid", function(e, rows)
    {

        var rowIds = [];
        for (var i = 0; i < rows.length; i++)
        {
            rowIds.push(rows[i].idf);

        }
        $('#bodytable .select-box').each(function(e,r){

            if(r.disabled == true){
              $(this).prop("checked",false);
            }
        });

    }).on("deselected.rs.jquery.bootgrid", function(e, rows)
    {
        var rowIds = [];
        for (var i = 0; i < rows.length; i++)
        {
            rowIds.push(rows[i].id);
        }


    }).on("loaded.rs.jquery.bootgrid", function(row,e)
    {
        /* Executes after data is loaded and rendered


         */
       $('ul.dropdown-menu').children(':eq(9)').hide();
        $('ul.dropdown-menu').children(':eq(8)').hide();

        grid.find('.btn-run-me').each(function(){

                // $(this).parent().siblings(':eq(0)').children(':eq(0)').attr("disabled","disabled");
               var btn = $(this).attr('disabled');
               var elem = $(this).parent().siblings(':eq(3)');

               if(elem.text() != "Undone"){
                   elem.css({"color":"blue","font-weight":"bold"});
               }else{
                   elem.css("font-weight","bold");
               }

               if(btn == 'disabled'){
                   $(this).parent().siblings(':eq(0)').children(':eq(0)').attr("disabled","disabled");
                   $(this).parent().children(':eq(1)').attr('disabled','disabled');
                   elem.css({"color":"red","font-weight":"bold"});

               }



            // if(flag != 'Undone'){ //run success disabled the checkbox;
            //    $(this).parent().siblings(':eq(0)').children(':eq(0)').attr("disabled","disabled");
            // }
        });

    });

    });


</script>
<?php unset($_SESSION['sql_err']); ?>

</html>