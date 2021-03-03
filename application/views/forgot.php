<!DOCTYPE html>
<html>
<head>
<style>
	
	input
	{
		padding:10px;
		margin:20px;
	}
	form
	{
         border:1px dashed grey;
		margin-left:400px;
		width:550px;
          text-align:center;
          font-size:20px;
          background-color: black;
          color:white;
      }
	
	h1
	{
		text-align: center;
	}
	.bi
	{
   background-image:url("../img/33.jpg");
  background-size:cover;
	}
	a,h1
	{
		color:white;
		text-decoration: none;
	}
</style>
<title>Forgot Login page
</title>
</head>
<body class="bi">
	<a href="<?php echo base_url()?>main/login">Back To Home</a>
<h1>GET PASSWORD</h1>
<form method="post" action="">
	<table>
<tr><td>new password:</td>
<td><input type="text" name="npassword" required><br></td></tr>
<tr><td> confirm Password:</td>
<td><input type="password" name="cpassword" required><br></td></tr>
<tr><td>
<input type="submit" name="submit"  value="submit"></td></tr>
</table>
</form>
</body>
</html>