<html>
	<head>
		<title>
		</title>
		<style>
			table,tr,td
			{
border: 2px  solid;
border-collapse: collapse;
padding:10px;
margin:10px;

			}
h1
{
    text-align: center;
}
.bi
{background-image:url("../img/13.jpg");
  background-size:cover;
}
		</style>
	</head>
	<body class="bi">
        
        <h1>USER DETAILS</h1>
         <a href="<?php echo base_url()?>main/adminhome">Back to Home</a>
		<form action="" method="post">
            <a href="<?php echo base_url()?>main/adminhome">Back to Home</a>
		<table>
		<tr>
			<td>Name</td>
			<td>Last Name</td>
			<td>Mobile</td>
			<td>DOB</td>
            <td>Address</td>
			<td>District</td>
			<td>Pin</td>
            <td>User Name</td>
                <td>Email</td>
                <td>Approved</td>
            <td>Rejected</td>
            <td>Action</td>

            

			
		</tr>
		<?php
		if($n->num_rows()>0)
		{
			foreach($n->result() as $row)
			{
        ?>
        <tr>
        	<td>
        		<?php echo $row->name;?></td>
        		<td>
        			<?php echo $row->lastname;?></td>
        			<td>
        				<?php echo $row->mobile;?></td>
        				<td>
        					<?php echo $row->dob;?></td>
                            <td>
                            <?php echo $row->address;?></td>
                            <td>
                            <?php echo $row->district;?></td>
                            <td>
                            <?php echo $row->pin;?></td>
                            <td>
                            <?php echo $row->username;?></td>

        					<td>
        						<?php echo $row->email;?></td>
                
                            <?php
                                if($row->status==1)
                                {
                                    ?>
                                    <td>Approved</td>
                                    <td><a href="<?php echo base_url()?>main/rejectdetail/<?php echo $row->id;?>">Reject</a></td>
                                    <?php 
                                }
                                elseif($row->status==2)
                                {
                                    ?>

                                    <td><a href="<?php echo base_url()?>main/approvedetail/<?php echo $row->id;?>">Approve</a></td>
                                    <td>Rejected</td>
                                    <?php
                                    }
                                        else
                                        {
                                            ?>
.                               <td>
                    
                        <a href="<?php echo base_url()?>main/approvedetail/<?php echo $row->id;?>">approve</a>
                    </td>
                                 <td>
                                <a href="<?php echo base_url()?>main/rejectdetail/<?php echo $row->id;?>">reject</a></td> 
                                <?php
                            }
                            ?>
                                <td>
                                <a href="<?php echo base_url()?>main/deletedetail/<?php echo $row->id;?>">Delete</a></td> 
                                </tr>
                                <?php

        					
                        }
                    }
                        ?>
	</table>
</form>
</body>
</html>
