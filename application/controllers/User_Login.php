<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guuseride/general/urls.html
	 */
	public function index()
		{
			if($this->session->userdata('userid')!='')
				{
					redirect('Dashboard');
				}
			if(!$this->session->userdata('userid'))
				{
					$this->load->database();
					$this->load->model('Login_Model');
					$data['title']='Druti';
					$this->load->view('admin/head',$data);
					//$data['allf']=$this->Login_Model->factory_list();
					$this->load->view('admin/login_form',$data);
				}
	 	}
	
	
	public function login_form()
		{
			if($this->session->userdata('userid')!='')
			{
				redirect('Dashboard');
			}
			if(!$this->session->userdata('userid'))
			{
				$data['title']='Login';
				$this->load->view('admin/head',$data);
				$data['allf']=$this->Login_Model->factory_list();
				$this->load->view('admin/login_form',$data);
			}
			
		 }
	 
	 public function login()
		{
			$this->load->database();
			$this->load->library('form_validation');
			$this->load->model('Login_Model');
			if($this->input->post('submit'))
				{
					$userid=$this->form_validation->set_rules('userid','User ID','required');
					$password=$this->form_validation->set_rules('password','Password','required');
					//$user_type=$this->form_validation->set_rules('user_type','User Type','required');
					//$unit=$this->form_validation->set_rules('unit','Unit','required');
					if($this->form_validation->run()==FALSE)
						{
							$data['title']='Fabric';
							$this->load->view('admin/head',$data);
							$data['allf']=$this->Login_Model->factory_list();
							$this->load->view('admin/login_form',$data);
						}
					else
						{
							$userid=$this->input->post('userid');
							$password=$this->input->post('password');
							//$user_type=$this->input->post('user_type');
							//$unit=$this->input->post('unit');
							$result=$this->Login_Model->login($userid,$password);
							if($result)
								{
									//$arr=print_r($result);
									//echo $arr[0]['name'];
									$userid=$result[0]['userid'];
									$name=$result[0]['name'];
									$user_type=$result[0]['user_type'];
									$factoryid=$result[0]['factoryid'];
									$session_data = array(  
                          			'userid'     =>     $userid,
									'name'     =>     $name,
									'user_type'     =>     $user_type,
									'factoryid'     =>     $factoryid
									);  
                     				$this->session->set_userdata($session_data);
								 	redirect('User_Login');
					 				//$this->load->view('login_view');
								}
						 	else
								{
									$this->session->set_flashdata('error', 'Invaluserid User ID and Password');
									$data['title']='Fabric';
									$this->load->view('admin/head',$data);
									$data['allf']=$this->Login_Model->factory_list();
									$this->load->view('admin/login_form',$data);
								}
						 }
					}
			}
		
		public function logout()  
      		{  
		   		//$this->session->sess_destroy();
		   		$this->session->unset_userdata('userid');  
           		redirect('User_Login');  
      		} 
			
			
}
