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
   background-image:url("../img/19.jpg");
  background-size:cover;
	}
	a
	{
		color:white;
		text-decoration: none;
	}
</style>
<title>Login page
</title>
</head>
<body class="bi">
	<a href="<?php echo base_url()?>main/index">Back To Home</a>
<h1>LOGIN FORM</h1>
<form method="post" action="<?php echo base_url()?>main/loginaction">
	<table>
<tr><td>Email/Username:</td>
<td><input type="text" name="email" required><br></td></tr>
<tr><td>Pssaword:</td>
<td><input type="password" name="password" required><br></td></tr>
<tr>
<td><a href="<?php echo base_url()?>main/forget">Forgot password</a></td></tr>
<tr><td>
<input type="submit" name="submit"  value="submit"></td></tr>
</table>
</form>
</body>
</html>

