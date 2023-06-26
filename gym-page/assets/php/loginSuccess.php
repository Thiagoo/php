<?php
//login_success.php
session_start();
if (isset($_SESSION["username"]))
{
    header("location:../html/home.html");
}
else
{
    header("location:loginPage.php");
}
?>
