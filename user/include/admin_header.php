<?php
	ob_start();
?>
<?php session_start(); ?>
<?php
	include "include/admin_db.php";
?>
<?php
	include "function.php";
?>
<?php
if(!isset($_SESSION['user_role'])){
	header("Location: ../index.php");
}
else{
	if($_SESSION['user_role'] !== 'Subscriber'){
		header("Location: ../index.php");
	}
}
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>N-Ras Mess Blog User</title>
	
	<link rel="icon" href="/cms/images/iconp.png" type="image/png" />
	<link rel="shortcut icon" href="/cms/images/icon.ico" />
	
	
    <!-- Bootstrap Core CSS -->
    <link href="/cms/user/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Custom CSS -->
    <link href="/cms/user/css/sb-admin.css" rel="stylesheet">
	

    <!-- Custom Fonts -->
    <link href="/cms/user/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link href="/cms/user/css/style1.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>