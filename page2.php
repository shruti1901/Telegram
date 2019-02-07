<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
include('db.php');
    /*$user=mysql_real_escape_string($_POST['username']);
    $pass=mysql_real_escape_string($_POST['password']);*/
    $fetch=mysql_query("SELECT * FROM admin WHERE 
                         username='$username' AND password='$password' ");
    $count=mysql_num_rows($fetch);
    if($count=="1")
    {
    /*session_register("sessionusername");*/
    $_SESSION['username']=$username;
    header("Location:admin_profile.php"); 
    }
    else
    {
       header('Location:admin.php');
    }

?>