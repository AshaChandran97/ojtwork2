<!DOCTYPE html>
<html>
<head>
<title>ojtwork2</title>
<link rel="stylesheet" href="css/style.css">
<style>
*
{
	padding:0px;
	margin:0px;
}
	
	.bi
{
	background-image:url("../img/30.jpg");
	background-size:cover;
}
.menubar
{
	background-color:black;
	text-align:center;
}
.menubar ul
{
	list-style:none;
	display:inline-flex;
	padding:15px;
	
}
.menubar ul li a
{
	color:red;
	text-decoration:none;
	padding:20px;

}
.menubar ul li
{

	padding:15px;
}
.menubar ul li a:hover
{
	background-color:white;
	border-radius:20px 20px 20px 20px;
}
	
.submenu
{
	display:none;
}
.menubar ul li:hover .submenu
{
	display:block;
	position:absolute;
	background-color:black;
	border-radius:10px;
	margin-top:20px;

}
.submenu ul 
{
	display:block;
}
.submenu ul li 
{
	border-bottom:2px solid red;
}
.st
{
	font-size: 50px;
	color:white;
	background-color: black;
	text-align:center;
	height:30px;
}
</style>
</head>
<body class="bi">
	<nav class="st">USER MANAGEMENT SYSTEM</nav>
	<nav class="menubar">
<ul><li><a href="<?php echo base_url()?>main/index">HOME</a></li>
<li><a href="<?php echo base_url()?>main/regview">REGISTRATION</a>
</li>
<li><a href="<?php echo base_url()?>main/login">LOGIN</a></li>
</ul>
</nav>
</body>
</html>
