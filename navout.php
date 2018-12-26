<?php session_start(); ?>
<!-- navbar if no user is logged in -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>the Wars Star Social Network</title>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Bootstrap jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- AngularJS Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    <!-- Local styles for this page -->
    <link href="brianz_p3_styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body ng-app>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="login.php">Chirper</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> (Login)</a></li>
      </ul>
    </div>
  </div>
</nav>
<h1>&nbsp;</h1>
<div class="container">
<div class="jumbotron">
  <h1 class="text-center">@ Chirper *</h1>
  <br>
