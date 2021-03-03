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
      }
	
	h1
	{
		text-align: center;
	}
</style>
<title>Updation page
</title>
</head>
<body>
	<a href="<?php echo base_url()?>main/userhome">Back To Home</a>
<h1>UPDATION FORM</h1>
<form method="post" action="<?php echo base_url()?>main/updatedetail">
	<?php
        if(isset($userdata))
        {
            foreach($userdata->result() as $row1) 
            {
                ?>
	<table>
		<tr><td>
			
Name:</td><td>
<input type="text" name="name" value="<?php echo $row1->name;?>"><br></td></tr>
<tr><td>Last Name::</td>
<td><input type="text" name="lastname" value="<?php echo $row1->lastname;?>"><br></td></tr>
<tr><td>Email:</td>
<td><input type="email" name="email"  value="<?php echo $row1->email;?>"><br></td></tr>
<tr><td>Moblie:</td>
<td><input type="text" name="mobile" value="<?php echo $row1->mobile;?>"><br></td></tr>
<tr><td>Dob:</td>
<td><input type="date" name="dob"  value="<?php echo $row1->dob;?>"><br></td></tr>
<tr><td>Address:</td>
<td><textarea  name="address" ><?php echo $row1->address;?></textarea><br></td></tr>
<tr><td>District:</td>
<td><input list="districts" name="district" value="<?php echo $row1->district;?>"><br></td></tr>
<datalist id="districts">
	<option value="kollam">
		<option value="Tvm">
			<option value="Alapuzha">
				<option value="kottayam">
					<option value="Idukki">
						</datalist>
</select>
<tr><td>pin:</td>
<td><input type="text" name="pin" value="<?php echo $row1->pin;?>"><br></td></tr>
<tr><td>username:</td>
<td><input type="text" name="username" value="<?php echo $row1->username;?>"><br></td></tr>
<tr><td>
<input type="submit" value="update" align="center" name="update"></td></tr>

         </table>
         <?php
            }         
             }
             ?>
</form>
</body>
</html>

