<?php
include_once("../connections.php");
session_start();
if(isset($_POST['submit']) || isset($_POST['user_name']) || isset($_POST['user_password'])) {

    $md5password = md5($_POST['user_password']);
    $qry = "select * from user_login_tbl where username='" . mysqli_escape_string($conn, $_POST['user_name']) . "' and password='$md5password'";
    $sql = mysqli_query($conn, $qry);
    if (mysqli_num_rows($sql) > 0) {
        $data = mysqli_fetch_assoc($sql);
        $_SESSION['user_name'] = $_POST['user_name'];
        header('Location: ../home.php');
    } else {
        $_SESSION['err'] = 1;
        header('Location: ../index.php');
    }
}