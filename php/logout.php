<?php
include('../config/constant.php');
//destroy to session and redirect to login page
session_destroy();//unset $-session['user]
header('location:'.SITEURL.'php/login.php');
?>