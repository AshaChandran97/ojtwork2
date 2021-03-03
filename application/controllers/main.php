<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
      $this->load->view('index');
	}

	                    /*registration form view
	                    page registration.php*/
	public function regview()
		{
  			$this->load->view('registration');
		}

		          /*registration insertion function
		          function register
		          @author:asha chandran
		          @module user
		          @date:2/3/2021*/
    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("lastname","lastname",'required');
        $this->form_validation->set_rules("mobile","mobile",'required');
        $this->form_validation->set_rules("dob","dob",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("pin","pin",'required');
        $this->form_validation->set_rules("username","username",'required');
         $this->form_validation->set_rules("email","email",'required');
         $this->form_validation->set_rules("password","password",'required');

        if($this->form_validation->run())
        {
         
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpass=$this->mainmodel->encpswrd($pass);
        $a=array("name"=>$this->input->post("name"),
                  "lastname"=>$this->input->post("lastname"),
                  "mobile"=>$this->input->post("mobile"),
                  "dob"=>$this->input->post("dob"),
                  "address"=>$this->input->post("address"),
                  "district"=>$this->input->post("district"),
                  "pin"=>$this->input->post("pin"));
        $b=array("username"=>$this->input->post("username"),
        	"email"=>$this->input->post("email"),
                  "password"=>$encpass,
                    "usertype"=>'1');
        $this->mainmodel->register($a,$b);
  
        redirect(base_url().'main/regview');
    }
}
                    /*adminhomepage view function 
                    function name adminhome
                    @author:asha chandran
		          @module admin
		          @date:2/3/2021*/
       public function adminhome()
		{
  			$this->load->view('adminhome');
		}

		/*user view function
		function name is userview
		@author:asha chandran
		          @module 1
		          @date:2/3/2021*/
		public function userview()
		{
			if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
			{

    $this->load->model('mainmodel');
    $data['n']=$this->mainmodel->userview();
    $this->load->view('userview',$data);
}
else
{
redirect(base_url().'main/login');	
}
		}
      public function approvedetail()
		{
		if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
			{	
    $this->load->model("mainmodel");
    $id=$this->uri->segment(3);
    $this->mainmodel->approvedetail($id);
    redirect('main/userview','refresh');

		}
		else
      {
     redirect(base_url().'main/login');	
      }
		}
	public function rejectdetail()
		{
		if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
			{	
    $this->load->model("mainmodel");
    $id=$this->uri->segment(3);
    $this->mainmodel->rejectdetail($id);
    redirect('main/userview','refresh');
		}
		else
      {
     redirect(base_url().'main/login');	
      }
		}

		/*login view performed
		function name is login
		         @author:asha chandran
		          @module 
		          @date:2/3/2021*/
        public function login()
		{
    	$this->load->view('login');
		}

		/*login action performed
		function name is loginaction
		@author:asha chandran
		          @module 1
		          @date:2/3/2021*/

		public function loginaction()
			{
       $this->load->library('form_validation');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
         $this->load->model('mainmodel');
         $email=$this->input->post("email");
         $pass=$this->input->post("password");
         $rslt=$this->mainmodel->selectpass($email,$pass);
         if($rslt)
         {
            $id=$this->mainmodel->getuserid($email);
            $user=$this->mainmodel->getuser($id);
            $this->load->library(array('session'));
            $this->session->set_userdata(array('id'=>(int)$user->id,
            	'status'=>$user->status,
                 'usertype'=>$user->usertype,'logged_in'=>(bool)true));

            if($_SESSION['status']=='1' && $_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
            {
                redirect(base_url().'main/adminhome');

            }
            elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='1' && $_SESSION['logged_in']==true)

            {
              redirect(base_url().'main/userhome');

            }
            else
            {
                echo "waiting for approval";

            }
        }
         else
          {
            echo "invalid user";

         }

    }
    else
    {
        redirect('main/login','refresh');
    }
}
                      /*view user home page 
                      @author:asha chandran
		          @module 1
		          @date:2/3/2021*/
		         public function userhome()
				{
		    	$this->load->view('userhome');
				}

				
				 /*update form view function
				  @author:asha chandran
		          @module 1
		          @date:2/3/2021*/
                 
                  public function edit()
			   {
			    if($_SESSION['logged_in']==true && $_SESSION['usertype']=='0')
			      {	
			    $this->load->model('mainmodel');    
			    $id=$this->session->id;
			    $data['userdata']=$this->mainmodel->updatedetail1($id);
			    $this->load->view('updateuser',$data);
			    }
			    else
                {
                 redirect(base_url().'main/login');	
                 }
		         }


			public function updatedetail()
			{
    			$a=array("name"=>$this->input->post("name"),
                  "lastname"=>$this->input->post("lastname"),
                  "mobile"=>$this->input->post("mobile"),
                  "dob"=>$this->input->post("dob"),
                  "address"=>$this->input->post("address"),
                  "district"=>$this->input->post("district"),
                  "pin"=>$this->input->post("pin"));
    $b=array("username"=>$this->input->post("username"),
    	"email"=>$this->input->post("email"));
    $this->load->model('mainmodel');

    if($this->input->post("update"))
    {
        $id=$this->session->id;
        $this->mainmodel->updatedetail2($a,$b,$id);
        redirect('main/edit','refresh');

    }
}
					/*delete details
					@asha chandran
		          @module 2
		          @2/3/2021*/
				public function deletedetail()
				 {
				  $this->load->model("mainmodel");
				  $id=$this->uri->segment(3);
				  $this->mainmodel->deletedetail($id);
				  redirect('main/userview','refresh');
				 }


				 /*ajax code running controller 
				 @uthor:asha chandran
		          @module 1
		          @date:2/3/2021*/

				 public function email_availibility()  
      			{  
      			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  

           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("mainmodel");  
                if($this->mainmodel->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }  
       

      }
      public function mobile_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_mobile_available($_POST["mobile"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Phone number Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }
      public function username_availability()
      {

                $this->load->model("mainmodel");  
                if($this->mainmodel->is_username_available($_POST["username"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> user name Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> </label>';  
                }  
           }

				   /****logout session
				   @author:asha chandran
		          @ajax
		          @date:2/3/2021***********/
public function logout()
    {
        $data=new stdClass();
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true)
        {
            foreach ($_SESSION as $key => $value)
            {
               unset($_SESSION[$key]);
            }
            $this->session->set_flashdata('logout_notification','logged_out');
            redirect('main/login','refresh');
        }
        else{
            redirect('main/login','refresh');
        }
    }
    /**********logout end**************/

                 /*forgot details 
                 email sends code
					@asha chandran
		          @module forgot
		          @2/3/2021*/
				    
        public function forget()
      {
    $this->load->view('forgetpswd');
       }

public function send()
{
    $to =  $this->input->post('from');  // User email pass here
    $subject = 'Welcome To Elevenstech';

    $from = 'techdudesyuva2020@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= $this->input->post('message');  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
               


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'techdudesyuva2020@gmail.com';    //Important
    $config['smtp_pass']    = 'techdudes@orisys';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('main/forget');
}
       public function forgot()
      {
    $this->load->view('forgot');
       }

}