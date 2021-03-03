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
	
	h1,a
	{
		text-align: center;
		color:white;
	}
	.bi{
  background-image:url("../img/14.jpg");
  background-size:cover;
}
</style>
<title>registration page
</title>
</head>
<body class="bi">
  <a href="<?php echo base_url()?>main/index">Back To Home</a>
<h1>REGISTRATION FORM</h1>
<form method="post" action="<?php echo base_url()?>main/register">
	<table>
		<tr><td>
Name:</td><td>
<input type="text" name="name" required maxlength="25" pattern="[a-zA-Z]+"><br></td></tr>
<tr><td>Last Name::</td>
<td><input type="text" name="lastname" required maxlength="25" pattern="[a-zA-Z]+"><br></td></tr>
<tr><td>Email:</td>
<td><input type="email" name="email" id="email" required>
	<br><span id="email_result"></span></td></tr>
<tr><td>Moblie:</td>
<td><input type="text" name="mobile" required id="mobile" pattern="[7-9]{1}[0-9]{9}" id="mobile"><br>
<span id="email_result"></span></td></tr>
<tr><td>Dob:</td>
<td><input type="date" name="dob" required><br></td></tr>
<tr><td>Address:</td>
<td><textarea  name="address" required>Address</textarea><br></td></tr>
<tr><td>District:</td>
<td><input list="districts" name="district"required><br></td></tr>
<datalist id="districts">
	<option value="kollam">
		<option value="Tvm">
			<option value="Alapuzha">
				<option value="kottayam">
					<option value="Idukki">
						</datalist>
</select>
<tr><td>pin:</td>
<td><input type="text" name="pin" required maxlength="10"><br></td></tr>
<tr><td>username:</td>
<td><input type="text" name="username" required maxlength="10" id="username"pattern="[a-zA-Z0-9]+"><br><span id="username_result"></span></td></tr>
<tr><td>Password:
<td><input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br></td></tr>
</table>
<input type="submit" value="Register" align="center" name="register">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/email_availibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  

      $('#mobile').change(function(){  
           var mobile = $('#mobile').val();  
           if(mobile != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/mobile_availability",  
                     method:"POST",  
                     data:{mobile:mobile},  
                     success:function(data){  
                          $('#mobile_result').html(data);  
                     }  
                });  
           }  
      });  
       $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/username_availability",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#username_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  

</form>
</body>
</html>



