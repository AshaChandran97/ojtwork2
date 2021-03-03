<?php
class mainmodel extends CI_model
{

	      /*insertion of registeration form
	      function is register
	       @author:asha chandran
		          @module 
		          @date:2/3/2021
	      */
 public function register($a,$b)
{
  $this->db->insert("login",$b);
  $loginid=$this->db->insert_id();
  $a['loginid']=$loginid;
  $this->db->insert("registration",$a);

}
		public function encpswrd($pass)
		{
  		return password_hash($pass,PASSWORD_BCRYPT);
		}
             /*view of userview page
             @author:asha chandran
		          @module 
		          @date:2/3/2021*/
             public function userview()
				{
  			$this->db->select('*');
  			$this->db->join('login','login.id=registration.loginid','inner');
  			$qry=$this->db->get("registration");
  			return $qry;
				}

               /*approve and reject
               @author:asha chandran
		          @module  admin
		          @date:2/3/2021*/
				public function approvedetail($id)
			{
  				$this->db->set('status','1');
  				$this->db->where('id',$id);
  				$this->db->update("login");
             }

		public function rejectdetail($id)
			{
  		$this->db->set('status','2');
  		$this->db->where('id',$id);
  			$this->db->update("login");
			}
			/*check the login action
			@author:asha chandran
		          @module admin
		          @date:2/3/2021*/

			public function selectpass($email,$pass)
  						{
			    $this->db->select('password');
			    $this->db->from("login");
			    $this->db->where("email",$email);
			    $qry=$this->db->get()->row('password');
			    return $this->verifypass($pass,$qry);
			  }
			  public function verifypass($pass,$qry)
			  {
			    return password_verify($pass,$qry);
			  }
			  public function getuserid($email)
			  {
			    $this->db->select('id');
			    $this->db->from("login");
			    $this->db->where("email",$email);
			    return $this->db->get()->row('id');

			  }
			  public function getuser($id)
			  {
			    $this->db->select('*');
			    $this->db->from("login");
			    $this->db->where("id",$id);
			    return $this->db->get()->row();
			}
			
				/*update details
				@author:asha chandran
		          @module user
		          @date:2/3/2021*/
				public function updatedetail1($id)
				{
			$this->db->select('*');
		$qry=$this->db->join('login','login.id=registration.loginid','inner');
		$qry=$this->db->where("registration.loginid",$id);
		$qry=$this->db->get("registration");
				  return $qry;
				}

	public function updatedetail2($a,$b,$id)
	{
	$this->db->select('*');
	$qry=$this->db->where("loginid",$id);
$qry=$this->db->join('registration','login.id=registration.loginid','inner');
	$qry=$this->db->update("registration",$a);
		$qry=$this->db->where("login.id",$id);
		$qry=$this->db->update("login",$b);
				        return $qry;
				}
				/*admin can delete  detail of user
				@author:asha chandran
		          @module admin
		          @date:2/3/2021*/
			public function deletedetail($id)
				{
				  
	$qry=$this->db->where("id",$id);
$qry=$this->db->join('registration','login.id=registration.loginid','inner');
	$qry=$this->db->delete("registration");
		$qry=$this->db->where("login.id",$id);
		$qry=$this->db->delete("login");
				}

		       /*ajax code running
		       @author:asha chandran
		          @ajax
		          @date:2/3/2021 */

     		function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("login");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
      public function is_mobile_available($mobile)  
      {  
           $this->db->where('mobile', $phno);  
           $query = $this->db->get("registration");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }
      public function is_username_available($username)
       {  
           $this->db->where('username', $uname);  
           $query = $this->db->get("registration");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }

         /*reset password code running
		       @author:asha chandran
		          @ajax
		          @date:3/3/2021 */






		

}
?>