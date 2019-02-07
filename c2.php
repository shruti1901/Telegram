<?php 
session_start();
$name=$_POST['name'];
$password=$_POST['password'];
include('db.php');
    /*$user=mysql_real_escape_string($_POST['username']);
    $pass=mysql_real_escape_string($_POST['password']);*/
    $fetch=mysql_query("SELECT * FROM company WHERE 
                         name='$name' AND password='$password' ");
    $count=mysql_num_rows($fetch);
    if($count=="1")
    {
    /*session_register("sessionusername");*/
    $_SESSION['name']=$username;
    header("Location:profile.php"); 
    }
    else
    {
       header('Location:company.php');
    }

?>