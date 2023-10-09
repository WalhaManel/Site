
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CNI</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="css/style.css" rel="stylesheet" />    
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
  <style type="text/css">
label
{ text-align: center;
  display: block;
}
.lienmenu{
  font-size:15px;
   margin-top:18px;
  }
.lienseconnecter{
  font-size:15px;
  margin-top:18px;
  border-color: #2ecbdb;
  border:1px solid #2ecbdb; margin-left: 20px;  
}
.logo-custom{
  width:200px;
height:500px;}
.signin-form{
  background-color:#f5f6f7; border-radius:10px; height:540px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.form-control{
  width: 540px;
  text-align: center;
}
.tde {height:20px;width:20px;cursor:pointer;}
#value {height:20px; width: <?=$value1;?>px; background:#E0E001;}
#glob {display: flex;}
body {
      font-family: 'Open Sans', sans-serif;background-color:#FBFCFC;}
.exception{
  outline-color: red;
  color:red;}
 </style>
}

</head>
<body >

<?php 
$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once("header.php");
$filepath= "view".ucfirst($controller);
$filename= "view".ucfirst($action).'.php';
require_once($filepath.$DS.$filename);
require_once("footer.php"); ?>
 