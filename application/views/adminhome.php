<!DOCTYPE html>
<html>
<head>
<style>

	h1,h2
	{
		text-align: center;
		color:white;
	}
	.bi
	{
   background-image:url("../img/20.jpg");
  background-size:cover;
	}
	a
	{
		color:white;
		font-size: 30px;
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
	font-size: 40px;
	color:white;
	background-color: black;
	text-align:center;
	height:10px;
}

</style>
<title>Admin page
</title>
</head>
<body class="bi">
	<nav class="st">USER MANAGEMENT SYSTEM</nav>
	<nav class="menubar">
<ul>
<li><a href="<?php echo base_url()?>main/userview">VIEW DETAILS</a>
</li>
<li><a href="<?php echo base_url()?>main/logout">LOGOUT</a></li>
</ul>
</nav>
</body>
</html>