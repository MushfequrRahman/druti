<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model {

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
	
	
	

	public function exam_testname()
	{
		$query1="SELECT examname FROM examname";
		$result1=$this->db->query($query1);
		return $result1->result_array();
    }
	
	public function exam_test()
	{
		$query="SELECT exqusid,examname,type,qno,(qno) as qno1,ques,marks,amid FROM examques1";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function examresult_insert($data)
	{
		$sql="INSERT INTO examresult VALUES ('','$data[userid]','$data[mobileno]','$data[nidno]','$data[tinno]','$data[bgid]','$data[ans]',CURDATE())";
		$query=$this->db->query($sql);
		return $query;
	}
	public function bloodgroup_list()
	{
		$query1="SELECT bloodgroup FROM bloodgroup_insert";
		$result1=$this->db->query($query1);
		return $result1->result_array();
    }
	
	
	
}
