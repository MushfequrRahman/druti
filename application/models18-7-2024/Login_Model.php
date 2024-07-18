<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

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
	
	
	public function login($userid,$password)
	{
		$sql="SELECT * FROM user 
		WHERE user.userid='$userid' AND user.password='$password'";
		$query=$this->db->query($sql);
		if($query)
			{
				if($query->num_rows()==1)
					{
						//return true;
						return $query->result_array();
					}
				else
					{
						return false;
					}
			}
		
	}
	public function factory_list()
	{
		$query="SELECT * FROM factory";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
}
