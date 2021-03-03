<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class first extends CI_Controller 
{
public function add()
{
	$this->load->view('add');
}
public function insert()
{
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules("name","name",'required');
    	$this->form_validation->set_rules("address","address",'required');
    	$this->form_validation->set_rules("district","district",'required');
    	$this->form_validation->set_rules("gender","gender",'required');
    	$this->form_validation->set_rules("email","email",'required');
 		$this->form_validation->set_rules("password","password",'required');
    	if($this->form_validation->run())
    	{
         $this->load->model('newmodel');
         $pass=$this->input->post("password");
         $encpass=$this->newmodel->encpassword($pass);
    	$a=array("name"=>$this->input->post("name"),
    	          "address"=>$this->input->post("address"),
    	            "district"=>$this->input->post("district"),
    	          "gender"=>$this->input->post("gender"));
    	$b=array("email"=>$this->input->post("email"),
                  "password"=>$encpass);
    	$this->newmodel->insert($a,$b);
  		redirect(base_url().'first/add');
    }
}

}
?>