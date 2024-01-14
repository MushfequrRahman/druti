<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		$this->load->helper('ratelimit');
		limitRequests($this->input->ip_address());

		if (!$this->session->userdata('userid')) {
			redirect('User_Login');
		}
	}
	public function index()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Dashboard';
		$this->load->view('admin/head', $data);
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav', $data);
		$this->load->view('admin/leftmenu');
		if ($usertype == 1) {
			$this->load->view('admin/dashboard', $data);
		} elseif ($usertype == 2) {
			$data['ul1'] = $this->Admin->factory_challanm_pending_list_out_count($factoryid);
			$data['ul2'] = $this->Admin->factory_challanm_pending_list_in_count($factoryid);
			$data['ul3'] = $this->Admin->non_po_factory_challanm_pending_list_out_count($factoryid);
			$data['ul4'] = $this->Admin->non_po_factory_challanm_pending_list_in_count($factoryid);
			//$data['ul'] = $this->Admin->factory_challanm_pending_list($factoryid);
			$this->load->view('admin/user_dashboard', $data);
		} elseif ($usertype == 3) {
			//$data['ul'] = $this->Admin->factory_challanm_pending_list($factoryid);
			$data['ul1'] = $this->Admin->factory_challanm_pending_list_out_count($factoryid);
			$data['ul2'] = $this->Admin->factory_challanm_pending_list_in_count($factoryid);
			$data['ul3'] = $this->Admin->non_po_factory_challanm_pending_list_out_count($factoryid);
			$data['ul4'] = $this->Admin->non_po_factory_challanm_pending_list_in_count($factoryid);
			$this->load->view('admin/security_dashboard', $data);
		}
	}
	public function factory_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/factory_insert_form', $data);
	}
	public function fac_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$facid = $this->form_validation->set_rules('facid', 'Factory ID', 'required');
			$facname = $this->form_validation->set_rules('facname', 'Factory Name', 'required');
			$fac_address = $this->form_validation->set_rules('fac_address', 'Factory Address', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fac_insert_form();
			} else {
				$facid = $this->input->post('facid');
				$facname = $this->input->post('facname');
				$fac_address = $this->input->post('fac_address');
				$ins = $this->Admin->fac_insert($facid, $facname, $fac_address);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/factory_insert_form', 'refresh');
			}
		}
	}
	public function factory_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/factory_list', $data);
	}
	public function factory_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Info Update';
		$facid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['all_line']=$this->Admin->all_line();
		//$data['opskill']=$this->Admin->opskill($opid);
		$data['flup'] = $this->Admin->factory_list_up($facid);
		$this->load->view('admin/factory_list_up', $data);
	}
	public function flup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fid = $this->input->post('fid');
			$facid = $this->input->post('facid');
			$factoryname = $this->input->post('factoryname');
			$factory_address = $this->input->post('factory_address');

			$ins = $this->Admin->flup($fid, $facid, $factoryname, $factory_address);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/factory_list', 'refresh');
		}
	}
	public function department_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/department_insert_form', $data);
	}
	public function department_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$department = $this->form_validation->set_rules('department', 'Department Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->department_insert_form();
			} else {
				$department = $this->input->post('department');
				$ins = $this->Admin->department_insert($department);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/department_insert_form', 'refresh');
			}
		}
	}
	public function department_list()
	{

		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->department_list();
		$this->load->view('admin/department_list', $data);
	}
	public function department_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Info Update';
		$deptid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->department_list_up($deptid);
		$this->load->view('admin/department_list_up', $data);
	}
	public function departmentlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$deptid = $this->input->post('deptid');
			$departmentname = $this->input->post('departmentname');

			$ins = $this->Admin->departmentlup($deptid, $departmentname);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/department_list', 'refresh');
		}
	}
	public function designation_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/designation_insert_form', $data);
	}
	public function designation_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->form_validation->set_rules('designation', 'Designation', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->designation_insert_form();
			} else {
				$designation = $this->input->post('designation');
				$ins = $this->Admin->designation_insert($designation);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/designation_insert_form', 'refresh');
			}
		}
	}
	public function designation_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->designation_list();
		$this->load->view('admin/designation_list', $data);
	}
	public function designation_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Update';
		$designationid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->designation_list_up($designationid);
		$this->load->view('admin/designation_list_up', $data);
	}
	public function designationlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->input->post('edesignation');
			$ins = $this->Admin->parentdesignationlup($designationid, $designation);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/designation_list', 'refresh');
		}
	}
	public function usertype_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/usertype_insert_form', $data);
	}
	public function usertype_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertype = $this->form_validation->set_rules('usertype', 'User type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->usertype_insert_form();
			} else {
				$usertype = $this->input->post('usertype');
				$ins = $this->Admin->usertype_insert($usertype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/usertype_insert_form', 'refresh');
			}
		}
	}
	public function usertype_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->usertype_list();
		$this->load->view('admin/usertype_list', $data);
	}
	public function usertype_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Update';
		$usertypeid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$data['dlup'] = $this->Admin->usertype_list_up($usertypeid);
		$this->load->view('admin/usertype_list_up', $data);
	}
	public function usertypelup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertypeid = $this->input->post('usertypeid');
			$usertype = $this->input->post('usertype');

			$ins = $this->Admin->usertypelup($usertypeid, $usertype);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/usertype_list', 'refresh');
		}
	}
	public function userstatus_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/userstatus_insert_form', $data);
	}
	public function userstatus_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatus = $this->form_validation->set_rules('userstatus', 'User Status', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->userstatus_insert_form();
			} else {
				$userstatus = $this->input->post('userstatus');

				$ins = $this->Admin->userstatus_insert($userstatus);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/userstatus_insert_form', 'refresh');
			}
		}
	}
	public function userstatus_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->userstatus_list();
		$this->load->view('admin/userstatus_list', $data);
	}
	public function userstatus_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Info Update';
		$userstatusid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->userstatus_list_up($userstatusid);
		$this->load->view('admin/userstatus_list_up', $data);
	}
	public function userstatuslup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatusid = $this->input->post('userstatusid');
			$userstatus = $this->input->post('userstatus');

			$ins = $this->Admin->userstatuslup($userstatusid, $userstatus);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/userstatus_list', 'refresh');
		}
	}
	public function user_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$this->load->view('admin/user_insert_form', $data);
	}
	public function user_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$oemail = $this->input->post('oemail');
			$pmobile = $this->input->post('pmobile');
			$usertypeid = $this->input->post('usertypeid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$ins = $this->Admin->user_insert($factoryid, $departmentid, $designationid, $name, $oemail, $pmobile, $usertypeid, $userid, $password);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Inserted');
			}
			redirect('Dashboard/user_insert_form', 'refresh');
		}
	}
	public function user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/user_list', $data);
	}
	public function factorywise_user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$factoryid = $this->input->post('factoryid');
		$data['ul'] = $this->Admin->factorywise_user_list($factoryid);
		$this->load->view('admin/factorywise_user_list', $data);
	}


	public function user_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Update';
		$userid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$data['ul4'] = $this->Admin->userstatus_list();
		$data['ulup'] = $this->Admin->user_list_up($userid);
		$this->load->view('admin/user_list_up', $data);
	}
	public function ulup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$usertypeid = $this->input->post('usertypeid');
			$userstatusid = $this->input->post('userstatusid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$indate = $this->input->post('indate');
			$userid = $this->input->post('userid');


			$ins = $this->Admin->ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/user_list', 'refresh');
		}
	}

	///////////////////////////////////////////////////////PRODUCT UOM/////////////////////////////////////////////

	public function product_uom_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/product_uom_insert_form', $data);
	}

	public function product_uom_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$puom = $this->form_validation->set_rules('puom', 'Product UOM', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->product_uom_insert_form();
			} else {
				$puom = $this->input->post('puom');
				$ins = $this->Admin->product_uom_insert($puom);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/product_uom_insert_form', 'refresh');
			}
		}
	}
	public function product_uom_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->product_uom_list();
		$this->load->view('admin/product_uom_list', $data);
	}
	public function product_uom_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM Update';
		$puomid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['plup'] = $this->Admin->product_uom_list_up($puomid);
		$this->load->view('admin/product_uom_list_up', $data);
	}
	public function productuomlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$puomid = $this->input->post('puomid');
			$puom = $this->input->post('puom');

			$ins = $this->Admin->productuomlup($puomid, $puom);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/product_uom_list', 'refresh');
		}
	}

	/////////////////////////////////////////////////////////BUYER/////////////////////////////////////////////////////////////

	public function buyer_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Buyer Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/buyer_insert_form', $data);
	}
	public function buyer_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$buyername = $this->form_validation->set_rules('buyername', 'Buyer', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->buyer_insert_form();
			} else {
				$buyername = $this->input->post('buyername');
				$ins = $this->Admin->buyer_insert($buyername);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/buyer_insert_form', 'refresh');
			}
		}
	}
	public function buyer_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Buyer List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/buyer_list', $data);
	}

	/////////////////////////////////////////////////////////JOB NO/////////////////////////////////////////////////////////////

	public function jobno_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Job No Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/jobno_insert_form', $data);
	}
	public function jobno_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno = $this->form_validation->set_rules('jobno', 'Job No', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->jobno_insert_form();
			} else {
				$buyerid = $this->input->post('buyerid');
				$jobno = $this->input->post('jobno');
				$ins = $this->Admin->jobno_insert($jobno, $buyerid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/jobno_insert_form', 'refresh');
			}
		}
	}
	public function jobno_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Job No List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->jobno_list();
		$this->load->view('admin/jobno_list', $data);
	}
	public function jobno_status_shipped()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$jobnoid = $this->uri->segment(3);
		$ins = $this->Admin->jobno_status_shipped($jobnoid);
		if ($ins == TRUE) {
			$this->session->set_flashdata('Successfully', 'Successfully Updated');
		} else {
			$this->session->set_flashdata('Successfully', 'Failed To Updated');
		}
		redirect('Dashboard/jobno_list', 'refresh');
	}
	public function jobno_status_running()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$jobnoid = $this->uri->segment(3);
		$ins = $this->Admin->jobno_status_running($jobnoid);
		if ($ins == TRUE) {
			$this->session->set_flashdata('Successfully', 'Successfully Updated');
		} else {
			$this->session->set_flashdata('Successfully', 'Failed To Updated');
		}
		redirect('Dashboard/jobno_list', 'refresh');
	}

	public function show_jobno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$data = $this->Admin->show_jobno($buyerid);
		echo json_encode($data);
	}

	/////////////////////////////////////////////////////////STYLE/////////////////////////////////////////////////////////////

	public function style_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Style Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/style_insert_form', $data);
	}
	public function style_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno = $this->form_validation->set_rules('jobno', 'Job No', 'required');
			$stylename = $this->form_validation->set_rules('stylename', 'Style', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->style_insert_form();
			} else {
				$buyerid = $this->input->post('buyerid');
				$jobno = $this->input->post('jobno');
				$stylename = $this->input->post('stylename');
				$ins = $this->Admin->style_insert($jobno, $stylename, $buyerid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/style_insert_form', 'refresh');
			}
		}
	}
	public function style_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Style List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->style_list();
		$this->load->view('admin/style_list', $data);
	}
	public function show_styleno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$jobno = $this->input->get('jobno');
		$buyerid = $this->input->get('buyerid');
		$data = $this->Admin->show_styleno($jobno, $buyerid);
		echo json_encode($data);
	}

	/////////////////////////////////////////////////////////ORDER/////////////////////////////////////////////////////////////



	public function order_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/order_insert_form', $data);
	}
	public function order_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno = $this->form_validation->set_rules('jobno', 'Job No', 'required');
			$style = $this->form_validation->set_rules('style', 'Style', 'required');
			$ordername = $this->form_validation->set_rules('ordername', 'Order', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->order_insert_form();
			} else {
				$buyerid = $this->input->post('buyerid');
				$jobno = $this->input->post('jobno');
				$style = $this->input->post('style');
				$ordername = $this->input->post('ordername');
				$ins = $this->Admin->order_insert($jobno, $style, $ordername, $buyerid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/order_insert_form', 'refresh');
			}
		}
	}
	public function order_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->order_list();
		$this->load->view('admin/order_list', $data);
	}
	public function order_list_for_challan()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->order_list();
		$this->load->view('admin/order_list_for_challan', $data);
	}

	public function show_orderno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$data = $this->Admin->show_orderno($buyerid, $jobno, $style);
		echo json_encode($data);
	}

	/////////////////////////////////////////////////////////COLOR/////////////////////////////////////////////////////////////



	public function color_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->product_uom_list();
		$data['ul3'] = $this->Admin->fabric_part_list();
		$this->load->view('admin/color_insert_form', $data);
	}

	public function color_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$orderno = $this->input->get('orderno');
		$fabrictypeid = $this->input->get('fabrictypeid');
		$gsm = $this->input->get('gsm');
		$cwoqty = $this->input->get('cwoqty');
		$colorcode = $this->input->get('colorcode');
		$colorname = $this->input->get('colorname');
		$tod = $this->input->get('tod');
		$bqty = $this->input->get('bqty');
		$bdia = $this->input->get('bdia');
		$fabricpart = $this->input->get('fabricpart');
		$uom = $this->input->get('uom');
		for ($i = 0; $i < count($fabricpart); $i++) {
			$data["i"] = $i;
			$data["buyerid"] = $buyerid;
			$data["jobno"] = $jobno;
			$data["style"] = $style;
			$data["orderno"] = $orderno;
			$data["fabrictypeid"] = $fabrictypeid[$i];
			$data["gsm"] = $gsm;
			$data["cwoqty"] = $cwoqty;
			$data["colorcode"] = $colorcode;
			$data["colorname"] = $colorname;
			$data["tod"] = $tod;
			$data["bqty"] = $bqty[$i];
			$data["bdia"] = $bdia[$i];
			$data["fabricpart"] = $fabricpart[$i];
			$data["uom"] = $uom[$i];

			$ins = $this->Admin->color_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function color_available()
	{
		$this->load->database();
		$this->load->model('Admin');
		// $data['title']='Color Wise Part List';
		// $this->load->view('admin/head',$data);
		// $this->load->view('admin/toprightnav');
		// $this->load->view('admin/leftmenu');
		$colorcode = $this->input->get('colorcode');
		$orderno = $this->input->get('orderno');
		$style = $this->input->get('style');
		$jobno = $this->input->get('jobno');
		$buyerid = $this->input->get('buyerid');
		$sql = "SELECT COUNT(colorcode) AS colorcode FROM color WHERE colorcode='$colorcode' AND orderid='$orderno' AND styleid='$style' AND jobnoid='$jobno' AND buyerid='$buyerid'";
		$query = $this->db->query($sql);
		$query = $query->result_array();
		foreach ($query as $row) {
			$colorcode = $row['colorcode'];
		}
		if ($colorcode > 0) {

			//$response = "<span style='color: red;'>This Info Already Inserted.</span>";
			$response = '<span style="color: red;">This Info Already Inserted.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" disabled="disabled" />';
			//$sql = "INSERT INTO test VALUES ('$colorcode')";
			//$query = $this->db->query($sql);
		} else {
			//$response = "<span style='color: green;'>Available.</span>";
			$response = '<span style="color: green;">Available.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" />';
		}

		echo $response;
		die;
	}
	public function color_wise_fabric_part_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color Wise Part List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->color_wise_fabric_part_list();
		$this->load->view('admin/color_wise_fabric_part_list', $data);
	}
	public function color_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->color_list();
		$this->load->view('admin/color_list', $data);
	}
	public function show_colorno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$orderid = $this->input->get('orderno');
		$data = $this->Admin->show_colorno($buyerid, $jobno, $style, $orderid);
		echo json_encode($data);
	}

	public function color_wise_fabric_part_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color Info Update';
		$cwfpid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->product_uom_list();
		$data['ul3'] = $this->Admin->fabric_part_list();
		$data['ul'] = $this->Admin->color_wise_fabric_part_up($cwfpid);
		$this->load->view('admin/color_wise_fabric_part_up', $data);
	}

	public function color_wise_fabric_part_lup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$cwfpid = $this->input->post('cwfpid');
			$fabrictypeid = $this->input->post('fabrictypeid');
			$bqty = $this->input->post('bqty');
			$abqty = $this->input->post('abqty');
			$bdia = $this->input->post('bdia');
			$fabricpart = $this->input->post('fabricpart');
			$uom = $this->input->post('uom');
			$ins = $this->Admin->color_wise_fabric_part_lup($cwfpid, $fabrictypeid, $bqty, $abqty, $bdia, $fabricpart, $uom);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/color_list', 'refresh');
		}
	}
	public function color_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color Info Update';
		$colorid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//		$data['ul1']=$this->Admin->fabric_type_list();
		//		$data['ul2']=$this->Admin->product_uom_list();
		//		$data['ul3']=$this->Admin->fabric_part_list();
		$data['ul'] = $this->Admin->color_up($colorid);
		$this->load->view('admin/color_up', $data);
	}
	public function color_lup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$colorid = $this->input->post('colorid');
			$colorcode = $this->input->post('colorcode');
			$colorname = $this->input->post('colorname');
			$cwoqty = $this->input->post('cwoqty');
			$gsm = $this->input->post('gsm');
			//			$fabricpart=$this->input->post('fabricpart');
			//			$uom=$this->input->post('uom');
			$ins = $this->Admin->color_lup($colorid, $colorcode, $colorname, $cwoqty, $gsm);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/color_list', 'refresh');
		}
	}
	public function color_part()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color Info Update';
		$colorid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->product_uom_list();
		$data['ul3'] = $this->Admin->fabric_part_list();
		$data['ul'] = $this->Admin->color_part($colorid);
		$this->load->view('admin/color_part', $data);
	}
	public function color_part_add()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$colorid = $this->form_validation->set_rules('colorid', 'Color ID', 'required');
			//$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
			//			$style=$this->form_validation->set_rules('style', 'Style', 'required');
			//			$ordername=$this->form_validation->set_rules('ordername', 'Order', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->color_list();
			} else {
				$colorid = $this->input->post('colorid');
				$fabrictypeid = $this->input->post('fabrictypeid');
				$fabricpart = $this->input->post('fabricpart');
				$bqty = $this->input->post('bqty');
				$bdia = $this->input->post('bdia');
				$uom = $this->input->post('uom');
				$ins = $this->Admin->color_part_add($colorid, $bqty, $bdia, $fabrictypeid, $fabricpart, $uom);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/color_list', 'refresh');
			}
		}
	}
	public function color_details()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Color Wise Part List';
		$colorid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->color_details($colorid);
		$this->load->view('admin/color_wise_fabric_part_list', $data);
	}
	public function show_color()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$orderno = $this->input->get('orderno');
		$data = $this->Admin->show_color($buyerid, $jobno, $style, $orderno);
		echo json_encode($data);
	}

	///////////////////////////////////////////////SIZE//////////////////////////////////////////

	public function size_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Size Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$data['ul2'] = $this->Admin->product_uom_list();
		$this->load->view('admin/size_insert_form', $data);
	}

	public function size_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$orderno = $this->input->get('orderno');
		$colorid = $this->input->get('colorid');
		$size = $this->input->get('size');
		$sbqty = $this->input->get('sbqty');
		$uom = $this->input->get('uom');
		for ($i = 0; $i < count($size); $i++) {
			$data["i"] = $i;
			$data["buyerid"] = $buyerid;
			$data["jobno"] = $jobno;
			$data["style"] = $style;
			$data["orderno"] = $orderno;
			$data["colorid"] = $colorid;
			$data["size"] = $size[$i];
			$data["sbqty"] = $sbqty[$i];
			$data["uom"] = $uom[$i];

			$ins = $this->Admin->size_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function size_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Size List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->size_list();
		$this->load->view('admin/size_list', $data);
	}

	public function size_available()
	{
		$this->load->database();
		$this->load->model('Admin');
		$colorid = $this->input->get('colorid');
		$orderno = $this->input->get('orderno');
		$style = $this->input->get('style');
		$jobno = $this->input->get('jobno');
		$buyerid = $this->input->get('buyerid');
		$sql = "SELECT COUNT(colorid) AS colorid FROM gsize WHERE colorid='$colorid' AND orderid='$orderno' AND styleid='$style' AND jobnoid='$jobno' AND buyerid='$buyerid'";
		$query = $this->db->query($sql);
		$query = $query->result_array();
		foreach ($query as $row) {
			$colorid = $row['colorid'];
		}
		if ($colorid > 0) {

			//$response = "<span style='color: red;'>This Info Already Inserted.</span>";
			$response = '<span style="color: red;">This Info Already Inserted.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" disabled="disabled" />';
			//$sql = "INSERT INTO test VALUES ('$colorcode')";
			//$query = $this->db->query($sql);
		} else {
			//$response = "<span style='color: green;'>Available.</span>";
			$response = '<span style="color: green;">Available.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" />';
		}

		echo $response;
		die;
	}

	///////////////////////////////////////////////////////FABRIC TYPE/////////////////////////////////////////////

	public function fabric_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_type_insert_form', $data);
	}

	public function fabric_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabrictype = $this->form_validation->set_rules('fabrictype', 'Fabric Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_type_insert_form();
			} else {
				$fabrictype = $this->input->post('fabrictype');
				$ins = $this->Admin->fabric_type_insert($fabrictype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_type_insert_form', 'refresh');
			}
		}
	}
	public function fabric_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_type_list();
		$this->load->view('admin/fabric_type_list', $data);
	}
	///////////////////////////////////////////////////////FABRIC PART/////////////////////////////////////////////

	public function fabric_part_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Part Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_part_insert_form', $data);
	}

	public function fabric_part_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricpart = $this->form_validation->set_rules('fabricpart', 'Fabric Part', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_part_insert_form();
			} else {
				$fabricpart = $this->input->post('fabricpart');
				$ins = $this->Admin->fabric_part_insert($fabricpart);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_part_insert_form', 'refresh');
			}
		}
	}
	public function fabric_part_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Part List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_part_list();
		$this->load->view('admin/fabric_part_list', $data);
	}

	///////////////////////////////////////////////////////GARMENTS PART/////////////////////////////////////////////

	public function garments_part_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Garments Part Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/garments_part_insert_form', $data);
	}
	public function garments_part_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$garmentspart = $this->form_validation->set_rules('garmentspart', 'Garments Part', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->garments_part_insert_form();
			} else {
				$garmentspart = $this->input->post('garmentspart');
				$ins = $this->Admin->garments_part_insert($garmentspart);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/garments_part_insert_form', 'refresh');
			}
		}
	}
	public function garments_part_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Garments Part List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->garments_part_list();
		$this->load->view('admin/garments_part_list', $data);
	}
	///////////////////////////////////////////////////////PRODUCTION TYPE/////////////////////////////////////////////

	public function production_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Production Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/production_type_insert_form', $data);
	}
	public function production_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$productiontype = $this->form_validation->set_rules('productiontype', 'Production Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->production_type_insert_form();
			} else {
				$productiontype = $this->input->post('productiontype');
				$ins = $this->Admin->production_type_insert($productiontype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/production_type_insert_form', 'refresh');
			}
		}
	}
	public function production_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Production Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->production_type_list();
		$this->load->view('admin/production_type_list', $data);
	}
	///////////////////////////////////////////////////////Challan TYPE/////////////////////////////////////////////

	public function challan_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Challan Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/challan_type_insert_form', $data);
	}
	public function challan_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$challantype = $this->form_validation->set_rules('challantype', 'Challan Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->challan_type_insert_form();
			} else {
				$challantype = $this->input->post('challantype');
				$ins = $this->Admin->challan_type_insert($challantype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/challan_type_insert_form', 'refresh');
			}
		}
	}
	public function challan_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Challan Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->challan_type_list();
		$this->load->view('admin/challan_type_list', $data);
	}
	///////////////////////////////////////////////////////SUPPLIER/////////////////////////////////////////////

	public function supplier_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/supplier_type_insert_form', $data);
	}

	public function supplier_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$suppliertype = $this->form_validation->set_rules('suppliertype', 'Supplier Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->supplier_type_insert_form();
			} else {
				$suppliertype = $this->input->post('suppliertype');
				$ins = $this->Admin->supplier_type_insert($suppliertype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/supplier_type_insert_form', 'refresh');
			}
		}
	}
	public function supplier_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_type_list();
		$this->load->view('admin/supplier_type_list', $data);
	}
	public function supplier_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_type_list();
		$this->load->view('admin/supplier_insert_form', $data);
	}
	public function supplier_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$stiid = $this->form_validation->set_rules('stiid', 'Supplier Type', 'required');
			$supplier = $this->form_validation->set_rules('supplier', 'Supplier', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->supplier_insert_form();
			} else {
				$stiid = $this->input->post('stiid');
				$supplier = $this->input->post('supplier');
				$ins = $this->Admin->supplier_insert($stiid, $supplier);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/supplier_insert_form', 'refresh');
			}
		}
	}
	public function supplier_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_list();
		$this->load->view('admin/supplier_list', $data);
	}

	public function show_supplier()
	{
		$this->load->database();
		$this->load->model('Admin');
		$stiid = $this->input->get('stiid');
		$data = $this->Admin->show_supplier($stiid);
		echo json_encode($data);
	}

	/////////////////////////////////////////////////////////FABRIC RECEIVED//////////////////////////////////////////////



	public function fabric_received_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Received Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$data['ul3'] = $this->Admin->fabric_part_list();
		$data['ul1'] = $this->Admin->rackno_list();
		$data['sl'] = $this->Admin->supplier_list();
		$this->load->view('admin/fabric_received_insert_form', $data);
	}
	//public function fabric_received_insert()
	//	 {
	//		$this->load->database();
	//		$this->load->library('form_validation');
	//		$this->load->model('Admin');
	//		if($this->input->post('submit'))
	//		{
	//			$rcdate=$this->form_validation->set_rules('frcdate', 'Challan Date', 'required');
	//			$challanno=$this->form_validation->set_rules('challanno', 'Challan No', 'required');
	//			$buyerid=$this->form_validation->set_rules('buyerid', 'Buyer', 'required');
	//			$jobno=$this->form_validation->set_rules('jobno', 'Job No', 'required');
	//			$style=$this->form_validation->set_rules('style', 'Style No', 'required');
	//			$orderno=$this->form_validation->set_rules('orderno', 'Order', 'required');
	//			$colorno=$this->form_validation->set_rules('colorno', 'Color', 'required');
	//			$lotno=$this->form_validation->set_rules('lotno', 'Lot No', 'required');
	//			$dia=$this->form_validation->set_rules('dia', 'Dia', 'required');
	//			$rqty=$this->form_validation->set_rules('rqty', 'Received Qty', 'required');
	//			$racknoid=$this->form_validation->set_rules('racknoid', 'Rack No', 'required');
	//			if($this->form_validation->run()==FALSE)
	//				{
	//					$this->fabric_received_insert_form();
	//				}
	//			else
	//				{
	//					$frcdate=$this->input->post('frcdate');
	//					$challanno=$this->input->post('challanno');
	//					$buyerid=$this->input->post('buyerid');
	//					$jobno=$this->input->post('jobno');
	//					$style=$this->input->post('style');
	//					$orderno=$this->input->post('orderno');
	//					$colorno=$this->input->post('colorno');
	//					$lotno=$this->input->post('lotno');
	//					$dia=$this->input->post('dia');
	//					$rqty=$this->input->post('rqty');
	//					$racknoid=$this->input->post('racknoid');
	//					$userid=$this->session->userdata('userid');
	//					$ins=$this->Admin->fabric_received_insert($frcdate,$challanno,$buyerid,$jobno,$style,$orderno,$colorno,$lotno,$dia,$rqty,$racknoid,$userid);
	//			
	//					if($ins==TRUE)
	//						{
	//							$this->session->set_flashdata('Successfully','Successfully Inserted');
	//						}
	//					else
	//						{
	//							$this->session->set_flashdata('Successfully','Failed To Inserted');
	//						}
	//					redirect('Dashboard/fabric_received_insert_form','refresh');
	//				}
	//		}
	//	}

	public function fabric_received_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$frcdate = $this->input->get('frcdate');
		$challanno = $this->input->get('challanno');
		$supplierid = $this->input->get('supplierid');
		$buyerid = $this->input->get('buyerid');
		$jobno = $this->input->get('jobno');
		$style = $this->input->get('style');
		$orderno = $this->input->get('orderno');
		$colorno = $this->input->get('colorno');
		$lotno = $this->input->get('lotno');
		$dia = $this->input->get('dia');
		$rqty = $this->input->get('rqty');
		$fabricpart = $this->input->get('fabricpart');
		$racknoid = $this->input->get('racknoid');
		$userid = $this->session->userdata('userid');

		for ($i = 0; $i < count($fabricpart); $i++) {
			$data["i"] = $i;
			$data["frcdate"] = $frcdate;
			$data["challanno"] = $challanno;
			$data["supplierid"] = $supplierid;
			$data["buyerid"] = $buyerid;
			$data["jobno"] = $jobno;
			$data["style"] = $style;
			$data["orderno"] = $orderno;
			$data["colorno"] = $colorno;
			$data["lotno"] = $lotno;
			$data["userid"] = $userid;
			$data["rqty"] = $rqty[$i];
			$data["fabricpart"] = $fabricpart[$i];
			$data["dia"] = $dia[$i];
			$data["racknoid"] = $racknoid[$i];
			$ins = $this->Admin->fabric_received_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function fabric_received_insert_by_jobno_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Received Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_received_insert_by_jobno_form', $data);
	}
	public function jobno_wise_fabric_receive_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$jobno = $this->input->post('jobno');
		$data['sl'] = $this->Admin->supplier_list();
		$data['rl'] = $this->Admin->rackno_list();
		$data['bl'] = $this->Admin->booking_type_list();
		$data['ul'] = $this->Admin->jobno_wise_fabric_receive_form($jobno);
		$this->load->view('admin/jobno_wise_fabric_receive_form', $data);
	}
	public function jobno_wise_fabric_receive_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$frcdate = $this->input->post('frcdate');
		$challanno = $this->input->post('challanno');
		$supplierid = $this->input->post('supplierid');
		$buyerid = $this->input->post('buyerid');
		$jobno = $this->input->post('jobnoid');
		$style = $this->input->post('styleid');
		$orderno = $this->input->post('orderid');
		$colorno = $this->input->post('colorid');
		$bookingtypeid = $this->input->post('bookingtypeid');
		$lotno = $this->input->post('lotno');
		$dia = $this->input->post('dia');
		$rqty = $this->input->post('rqty');
		$fabricpart = $this->input->post('fabricpartid');
		$racknoid = $this->input->post('racknoid');
		$userid = $this->session->userdata('userid');

		for ($i = 0; $i < count($fabricpart); $i++) {
			$data["i"] = $i;
			$data["j"] = $i + 1;
			$data["frcdate"] = $frcdate;
			$data["challanno"] = $challanno;
			$data["supplierid"] = $supplierid;
			$data["buyerid"] = $buyerid[$i];
			$data["jobno"] = $jobno[$i];
			$data["style"] = $style[$i];
			$data["orderno"] = $orderno[$i];
			$data["colorno"] = $colorno[$i];
			$data["bookingtypeid"] = $bookingtypeid[$i];
			$data["lotno"] = $lotno[$i];
			$data["userid"] = $userid;
			$data["rqty"] = $rqty[$i];
			$data["fabricpart"] = $fabricpart[$i];
			$data["dia"] = $dia[$i];
			$data["racknoid"] = $racknoid[$i];
			$ins = $this->Admin->jobno_wise_fabric_received_insert($data);
		}
		if ($ins) {
			$this->session->set_flashdata('Successfully', 'Successfully Inserted--' . $data['j'] . "--Row");
		} else {
			$this->session->set_flashdata('UnSuccessfully', "This Data Inserted--" . $data['j'] . "--Others Are Not");
		}
		redirect('Dashboard/fabric_received_insert_by_jobno_form', 'refresh');
	}
	public function date_wise_fabric_received_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Fabric Received List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_fabric_received_form', $data);
	}
	public function date_wise_fabric_received_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['ul'] = $this->Admin->date_wise_fabric_received_list($pd, $wd);
		$this->load->view('admin/date_wise_fabric_received_list', $data);
	}
	public function rack_wise_fabric_received_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Rack Wise Current Fabric Stock';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->rackno_list();
		$this->load->view('admin/rack_wise_fabric_received_form', $data);
	}
	public function rack_wise_fabric_received_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$racknoid = $this->input->post('racknoid');
		$data['ul'] = $this->Admin->rack_wise_fabric_received_list($racknoid);
		$this->load->view('admin/rack_wise_fabric_received_list', $data);
	}
	public function rack_wise_fabric_current_status_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Rack Wise Current Fabric Stock';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->rackno_list();
		$this->load->view('admin/rack_wise_fabric_current_status_form', $data);
	}
	public function rack_wise_fabric_current_status_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$racknoid = $this->input->post('racknoid');
		if ($racknoid != '') {
			$data['ul'] = $this->Admin->rack_wise_fabric_current_status_list($racknoid);
			$this->load->view('admin/rack_wise_fabric_current_status_list', $data);
		} else {
			$data['ul'] = $this->Admin->rack_wise_fabric_current_status_list_all();
			$this->load->view('admin/rack_wise_fabric_current_status_list', $data);
		}
	}
	public function buyer_wise_fabric_report_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Buyer Wise Fabric Report';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/buyer_wise_fabric_report_form', $data);
	}
	public function buyer_wise_fabric_report()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyername = $this->input->post('buyername');
		$data['ul'] = $this->Admin->buyer_wise_fabric_report($buyername);
		$this->load->view('admin/buyer_wise_fabric_report', $data);
	}
	public function rack_wise_fabric_current_report()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Rack Wise Current fabric Report';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->rack_wise_fabric_current_report();
		$this->load->view('admin/rack_wise_fabric_current_report', $data);
	}
	public function fabric_current_report()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Current fabric Report';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_current_report();
		$this->load->view('admin/fabric_current_report', $data);
	}
	public function fabric_details_report()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Details fabric Report';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_details_report();
		$this->load->view('admin/fabric_details_report', $data);
	}
	public function jobno_wise_fabric_report_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Job No Wise Fabric Report';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->jobno_list();
		$this->load->view('admin/jobno_wise_fabric_report_form', $data);
	}
	public function jobno_wise_fabric_report()
	{
		$this->load->database();
		$this->load->model('Admin');
		$jobno = $this->input->post('jobno');
		$data['ul'] = $this->Admin->jobno_wise_fabric_report($jobno);
		$this->load->view('admin/jobno_wise_fabric_report', $data);
	}

	public function order_wise_fabric_report_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order Wise Fabric Report';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->order_list();
		$this->load->view('admin/order_wise_fabric_report_form', $data);
	}
	public function order_wise_fabric_report()
	{
		$this->load->database();
		$this->load->model('Admin');
		$ordername = $this->input->post('ordername');
		$data['ul'] = $this->Admin->order_wise_fabric_report($ordername);
		$this->load->view('admin/order_wise_fabric_report', $data);
	}
	public function jobno_wise_fabric_received_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Job No Wise Current Fabric Stock';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->jobno_list();
		$this->load->view('admin/jobno_wise_fabric_received_form', $data);
	}
	public function jobno_wise_fabric_received_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$jobno = $this->input->post('jobno');
		$data['ul'] = $this->Admin->jobno_wise_fabric_received_list($jobno);
		$this->load->view('admin/jobno_wise_fabric_received_list', $data);
	}
	public function jobno_wise_fabric_delivery_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Job No Wise Current Fabric Stock';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->jobno_list();
		$this->load->view('admin/jobno_wise_fabric_delivery_form', $data);
	}
	public function jobno_wise_fabric_delivery_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$jobno = $this->input->post('jobno');
		$lotno = $this->input->post('lotno');
		$data['ul1'] = $this->Admin->fabric_delivery_type_list();
		$data['ul'] = $this->Admin->jobno_wise_fabric_delivery_list($jobno);
		$this->load->view('admin/jobno_wise_fabric_delivery_list', $data);
	}
	public function fabric_receive_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Received Info Update';
		$fabricreceivedid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul1'] = $this->Admin->buyer_list();
		$data['ul2'] = $this->Admin->fabric_part_list();
		//$data['ul3']=$this->Admin->fabric_type_list();
		$data['ul4'] = $this->Admin->product_uom_list();
		$data['ul5'] = $this->Admin->fabric_part_list();
		$data['sl'] = $this->Admin->supplier_list();

		$data['ul'] = $this->Admin->fabric_receive_list_up($fabricreceivedid);
		$this->load->view('admin/fabric_receive_list_up', $data);
	}
	public function fabric_receive_lup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricreceivedid = $this->input->post('fabricreceivedid');
			$frcdate = $this->input->post('frcdate');
			$frqty = $this->input->post('frqty');
			//$tfqty=$this->input->post('tfqty');
			$challanno = $this->input->post('challanno');
			$supplierid = $this->input->post('supplierid');
			//$fabrictypeid=$this->input->post('fabrictypeid');
			//$fabricpartid=$this->input->post('fabricpartid');
			$lotno = $this->input->post('lotno');
			$dia = $this->input->post('dia');
			$userid = $this->session->userdata('userid');
			$ins = $this->Admin->fabric_receive_lup($fabricreceivedid, $frcdate, $frqty, $challanno, $supplierid, $lotno, $dia, $userid);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/date_wise_fabric_received_form', 'refresh');
		}
	}

	public function fabric_transfer_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Transfer Info Update';
		$fabricreceivedid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_transfer_list_up($fabricreceivedid);
		$this->load->view('admin/fabric_transfer_list_up', $data);
	}

	public function fabric_transfer_lup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricreceivedid = $this->input->post('fabricreceivedid');
			$tfqty = $this->input->post('tfqty');
			$userid = $this->session->userdata('userid');
			$ins = $this->Admin->fabric_transfer_lup($fabricreceivedid, $tfqty, $userid);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/rack_wise_fabric_current_status_form', 'refresh');
		}
	}

	/////////////////////////////////////////////////////////FABRIC DELIVERY//////////////////////////////////////////////

	public function fabric_delivery_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Delivery';
		$fabricreceivedid = $this->uri->segment(3);
		$tfqty = $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['tfqty'] = $tfqty;
		$data['ul'] = $this->Admin->fabric_delivery_type_list();
		$this->load->view('admin/fabric_delivery_form', $data);
	}
	public function fabric_delivery_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricideliverytypeid = $this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->rack_wise_fabric_received_form();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				$fabricideliverytypeid = $this->input->post('fabricideliverytypeid');
				$tfqty1 = $this->input->post('tfqty1');
				$amount = $this->input->post('amount');
				$challan = $this->input->post('challan');
				$dremarks = $this->input->post('dremarks');
				$ddate = $this->input->post('ddate');
				$ins = $this->Admin->fabric_delivery_insert($fabricreceivedid, $fabricideliverytypeid, $tfqty1, $amount, $challan, $dremarks, $ddate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/rack_wise_fabric_received_form', 'refresh');
			}
		}
	}
	public function fabric_delivery_insert_all()
	{
		error_reporting(0);
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricideliverytypeid = $this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			//$tfqty=$this->form_validation->set_rules('tfqty', 'Tfqty', 'required');
			$dqty = $this->form_validation->set_rules('dqty[]', 'Dqty', 'required');
			//$this->form_validation->set_rules('tfqty[]', 'Tfqty', 'required|callback_validate_tfqty');
			//$this->form_validation->set_rules('tfqty[]', 'Tfqty', 'greater_than[dqty[]]');
			//$this->form_validation->set_rules('published_at','Published at','trim|callback_published_at');
			if ($this->form_validation->run() == FALSE) {
				$this->jobno_wise_fabric_delivery_form();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				$fabricideliverytypeid = $this->input->post('fabricideliverytypeid');
				$dqty = $this->input->post('dqty');
				$tfqty = $this->input->post('tfqty');
				$tfqty1 = $this->input->post('tfqty');
				//$tfqty=$tfqty-$dqty;
				$challan = $this->input->post('challan');
				$dremarks = $this->input->post('dremarks');
				$ddate = $this->input->post('ddate');
				for ($i = 0; $i < count($fabricreceivedid); $i++) {
					if ($tfqty1[$i] >= $dqty[$i]) {
						$data["i"] = $i;
						$data["fabricreceivedid"] = $fabricreceivedid[$i];
						$data["fabricideliverytypeid"] = $fabricideliverytypeid;
						$data["dqty"] = $dqty[$i];
						$data["tfqty"] = $tfqty[$i] - $dqty[$i];
						$data["tfqty1"] = $tfqty1[$i];
						$data["challan"] = $challan;
						$data["ddate"] = $ddate;
					} else {
						//echo "Some Of Data Failed To Inserted";
						//break;
						$this->session->set_flashdata('UnSuccessfully', "This Data Inserted.'$data[i]'. Others Are Not");
						redirect('Dashboard/jobno_wise_fabric_delivery_form', 'refresh');
					}
					//$ins=$this->Admin->fabric_delivery_insert_all($fabricreceivedid,$fabricideliverytypeid,$dqty,$tfqty,$challan,$ddate);

					$ins = $this->Admin->fabric_delivery_insert_all($data);
				}
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', "This Data Inserted.'$data[i]'. Others Are Not");
				}
				redirect('Dashboard/jobno_wise_fabric_delivery_form', 'refresh');
			}
		}
	}
	//public function validate_tfqty($string)
	//    {
	//        $tfqty=$this->input->post('tfqty');
	//		$dqty=$this->input->post('dqty');
	//		if($dqty>$tfqty)
	//		{
	//        return false;
	//		}
	//    }
	public function date_wise_fabric_delivery_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Fabric Delivery List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_fabric_delivery_form', $data);
	}
	public function date_wise_fabric_delivery_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['ul'] = $this->Admin->date_wise_fabric_delivery_list($pd, $wd);
		$this->load->view('admin/date_wise_fabric_delivery_list', $data);
	}

	/////////////////////////////////////////////////////////FABRIC TRANSFER//////////////////////////////////////////////

	public function fabric_transfer_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Transfer';
		$fabricreceivedid = $this->uri->segment(3);
		$tfqty = $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['tfqty'] = $tfqty;
		//$data['ul']=$this->Admin->fabric_transfer();
		$data['ul'] = $this->Admin->rackno_list();
		$this->load->view('admin/fabric_transfer_form', $data);
	}

	public function fabric_transfer_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$racknoid = $this->form_validation->set_rules('racknoid', 'Rack No', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->rack_wise_fabric_received_form();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				$tfqty1 = $this->input->post('tfqty1');
				$amount = $this->input->post('amount');
				$racknoid = $this->input->post('racknoid');
				$userid = $this->session->userdata('userid');
				$ins = $this->Admin->fabric_transfer_insert($fabricreceivedid, $tfqty1, $amount, $racknoid, $userid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/rack_wise_fabric_received_form', 'refresh');
			}
		}
	}

	/////////////////////////////////////////////////////////FABRIC RETURN////////////////////////////////////////////// 

	public function lot_wise_fabric_report_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Batch/Lot Wise fabric Report';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->product_uom_list();
		$this->load->view('admin/lot_wise_fabric_report_form', $data);
	}
	public function lot_wise_fabric_report()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Batch/Lot Wise fabric Report';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$buyerid = $this->input->post('buyerid');
		$jobno = $this->input->post('jobno');
		$style = $this->input->post('style');
		$orderno = $this->input->post('orderno');
		$colorno = $this->input->post('colorno');
		$data['ul'] = $this->Admin->lot_wise_fabric_report($buyerid, $jobno, $style, $orderno, $colorno);
		$this->load->view('admin/lot_wise_fabric_report', $data);
	}
	public function lot_wise_fabric_return_report()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Batch/Lot Wise fabric Report';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$buyerid=$this->input->post('buyerid');
		//		$jobno=$this->input->post('jobno');
		//		$style=$this->input->post('style');
		//		$orderno=$this->input->post('orderno');
		//		$colorno=$this->input->post('colorno');
		$data['ul'] = $this->Admin->lot_wise_fabric_return_report();
		$this->load->view('admin/lot_wise_fabric_return_report', $data);
	}
	public function lot_wise_fabric_details_report()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Batch/Lot Wise fabric Report';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$buyerid=$this->input->post('buyerid');
		//		$jobno=$this->input->post('jobno');
		//		$style=$this->input->post('style');
		//		$orderno=$this->input->post('orderno');
		//		$colorno=$this->input->post('colorno');
		$data['ul'] = $this->Admin->lot_wise_fabric_details_report();
		$this->load->view('admin/lot_wise_fabric_details_report', $data);
	}
	public function fabric_return_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Return';
		$fabricreceivedid = $this->uri->segment(3);
		$dqty = $this->uri->segment(4);
		$reqty = $this->uri->segment(5);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['dqty'] = $dqty;
		$data['reqty'] = $reqty;
		$data['ul'] = $this->Admin->fabric_delivery_type_list();
		$this->load->view('admin/fabric_return_form', $data);
	}
	public function fabric_return_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			//$fabricideliverytypeid=$this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->lot_wise_fabric_return_report();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				//$fabricideliverytypeid=$this->input->post('fabricideliverytypeid');
				$dqty = $this->input->post('dqty');
				$reqty = $this->input->post('reqty');
				$amount = $this->input->post('amount');
				$challan = $this->input->post('challan');
				$rdate = $this->input->post('rdate');
				$ins = $this->Admin->fabric_return_insert($fabricreceivedid, $dqty, $reqty, $amount, $challan, $rdate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/lot_wise_fabric_return_report', 'refresh');
			}
		}
	}

	public function fabric_return_to_textile_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Return';
		$fabricreceivedid = $this->uri->segment(3);
		$dqty = $this->uri->segment(4);
		$reqty = $this->uri->segment(5);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['dqty'] = $dqty;
		$data['reqty'] = $reqty;
		$data['ul'] = $this->Admin->fabric_return_type_list();
		$this->load->view('admin/fabric_return_to_textile_form', $data);
	}

	public function fabric_return_to_textile_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$freturntypeid = $this->form_validation->set_rules('freturntypeid', 'Type', 'required');
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->lot_wise_fabric_return_report();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				$freturntypeid = $this->input->post('freturntypeid');
				$dqty = $this->input->post('dqty');
				$reqty = $this->input->post('reqty');
				$amount = $this->input->post('amount');
				$challan = $this->input->post('challan');
				$rdate = $this->input->post('rdate');
				$ins = $this->Admin->fabric_return_to_textile_insert($fabricreceivedid, $freturntypeid, $dqty, $reqty, $amount, $challan, $rdate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/lot_wise_fabric_return_report', 'refresh');
			}
		}
	}

	public function fabric_cutting_return_to_store()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Fabric Cutting Return To Store';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_cutting_return_to_store();
		$this->load->view('admin/fabric_cutting_return_to_store', $data);
	}

	public function fabric_cutting_return_to_store_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Return Cutting To Store';
		$fabricreceivedid = $this->uri->segment(3);
		$dqty = $this->uri->segment(4);
		$fabricdeliveryid = $this->uri->segment(5);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['dqty'] = $dqty;
		$data['fabricdeliveryid'] = $fabricdeliveryid;
		//$data['reqty']=$reqty;
		//$data['ul']=$this->Admin->fabric_delivery_type_list();
		$this->load->view('admin/fabric_cutting_return_to_store_form', $data);
	}

	public function fabric_cutting_return_to_store_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			//$fabricideliverytypeid=$this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_cutting_return_to_store();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				$fabricdeliveryid = $this->input->post('fabricdeliveryid');
				//$fabricideliverytypeid=$this->input->post('fabricideliverytypeid');
				//$dqty=$this->input->post('dqty');
				//$reqty=$this->input->post('reqty');
				$amount = $this->input->post('amount');
				$challan = $this->input->post('challan');
				$rdate = $this->input->post('rdate');
				$ins = $this->Admin->fabric_cutting_return_to_store_insert($fabricreceivedid, $fabricdeliveryid, $amount, $challan, $rdate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_cutting_return_to_store', 'refresh');
			}
		}
	}



	public function fabric_cutting_return_to_textile()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Fabric Cutting Return To Textile';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_cutting_return_to_textile();
		$this->load->view('admin/fabric_cutting_return_to_textile', $data);
	}

	public function fabric_cutting_return_to_textile_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Return Cutting To Textile';
		$fabricreceivedid = $this->uri->segment(3);
		$dqty = $this->uri->segment(4);
		//$reqty= $this->uri->segment(5);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['dqty'] = $dqty;
		//$data['reqty']=$reqty;
		//$data['ul']=$this->Admin->fabric_delivery_type_list();
		$this->load->view('admin/fabric_cutting_return_to_textile_form', $data);
	}

	public function fabric_cutting_return_to_textile_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			//$fabricideliverytypeid=$this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_cutting_return_to_store();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				//$fabricideliverytypeid=$this->input->post('fabricideliverytypeid');
				//$dqty=$this->input->post('dqty');
				//$reqty=$this->input->post('reqty');
				$amount = $this->input->post('amount');
				$challan = $this->input->post('challan');
				$rdate = $this->input->post('rdate');
				$ins = $this->Admin->fabric_cutting_return_to_textile_insert($fabricreceivedid, $amount, $challan, $rdate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_cutting_return_to_textile', 'refresh');
			}
		}
	}

	public function fabric_store_return_to_textile()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$data['title'] = 'Fabric Store Return To Textile';
		//$fabricreceivedid= $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_store_return_to_textile();
		$this->load->view('admin/fabric_store_return_to_textile', $data);
	}

	public function fabric_store_return_to_textile_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Return Store To Textile';
		$fabricreceivedid = $this->uri->segment(3);
		$dqty = $this->uri->segment(4);
		//$reqty= $this->uri->segment(5);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['dqty'] = $dqty;
		//$data['reqty']=$reqty;
		//$data['ul']=$this->Admin->fabric_delivery_type_list();
		$this->load->view('admin/fabric_store_return_to_textile_form', $data);
	}

	public function fabric_store_return_to_textile_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			//$fabricideliverytypeid=$this->form_validation->set_rules('fabricideliverytypeid', 'Type', 'required');
			$amount = $this->form_validation->set_rules('amount', 'Amount', 'required');
			$challan = $this->form_validation->set_rules('challan', 'Challan', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_cutting_return_to_store();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				//$fabricideliverytypeid=$this->input->post('fabricideliverytypeid');
				//$dqty=$this->input->post('dqty');
				//$reqty=$this->input->post('reqty');
				$amount = $this->input->post('amount');
				$challan = $this->input->post('challan');
				$rdate = $this->input->post('rdate');
				$ins = $this->Admin->fabric_store_return_to_textile_insert($fabricreceivedid, $amount, $challan, $rdate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_store_return_to_textile', 'refresh');
			}
		}
	}

	/////////////////////////////////////////////////////////FABRIC ORDER TRANSFER//////////////////////////////////////////////

	public function fabric_order_transfer_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Order Transfer';
		$fabricreceivedid = $this->uri->segment(3);
		$rem = $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fabricreceivedid'] = $fabricreceivedid;
		$data['rem'] = $rem;
		$data['ul'] = $this->Admin->buyer_list();
		$data['ul1'] = $this->Admin->rackno_list();
		$this->load->view('admin/fabric_order_transfer_form', $data);
	}

	public function fabric_order_transfer_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$rcdate = $this->form_validation->set_rules('frcdate', 'Transfer Date', 'required');
			//$challanno=$this->form_validation->set_rules('challanno', 'Challan No', 'required');
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$jobno = $this->form_validation->set_rules('jobno', 'Job No', 'required');
			$style = $this->form_validation->set_rules('style', 'Style No', 'required');
			$orderno = $this->form_validation->set_rules('orderno', 'Order', 'required');
			$colorno = $this->form_validation->set_rules('colorno', 'Color', 'required');
			//$lotno=$this->form_validation->set_rules('lotno', 'Lot No', 'required');
			//$dia=$this->form_validation->set_rules('dia', 'Dia', 'required');
			$rqty = $this->form_validation->set_rules('rqty', 'Transfer Qty', 'required');
			$racknoid = $this->form_validation->set_rules('racknoid', 'Rack No', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->rack_wise_fabric_received_form();
			} else {
				$fabricreceivedid = $this->input->post('fabricreceivedid');
				$rem = $this->input->post('rem');
				$frcdate = $this->input->post('frcdate');
				//$challanno=$this->input->post('challanno');
				$buyerid = $this->input->post('buyerid');
				$jobno = $this->input->post('jobno');
				$style = $this->input->post('style');
				$orderno = $this->input->post('orderno');
				$colorno = $this->input->post('colorno');
				//$lotno=$this->input->post('lotno');
				//$dia=$this->input->post('dia');
				$rqty = $this->input->post('rqty');
				$racknoid = $this->input->post('racknoid');
				$userid = $this->session->userdata('userid');
				$ins = $this->Admin->fabric_order_transfer_insert($frcdate, $fabricreceivedid, $rem, $buyerid, $jobno, $style, $orderno, $colorno, $rqty, $racknoid, $userid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/jobno_wise_fabric_received_form', 'refresh');
			}
		}
	}
	/////////////////////////////////ORDER WISE CHALLAN//////////////////////////////////////

	public function order_wise_challan_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order Wise Challan';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$orderid = $this->uri->segment(3);
		// $data['sl']=$this->Admin->supplier_list();
		// $data['rl']=$this->Admin->rackno_list();
		// $data['bl']=$this->Admin->booking_type_list();
		$data['pul'] = $this->Admin->product_uom_list();
		$data['gl'] = $this->Admin->garments_part_list();
		$data['ptl'] = $this->Admin->production_type_list();
		$data['ctl'] = $this->Admin->challan_type_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['ul'] = $this->Admin->order_wise_challan_create_form($orderid);
		$this->load->view('admin/order_wise_challan_create_form', $data);
	}
	public function order_wise_challan_available()
	{
		$this->load->database();
		$this->load->model('Admin');
		$sfactory = $this->input->get('sfactory');
		$challanno = $this->input->get('challanno');
		$sql = "SELECT COUNT(challanno) AS challanno FROM challanm1_insert WHERE sfactoryid='$sfactory' AND challanno='$challanno'";
		$query = $this->db->query($sql);
		$query = $query->result_array();
		foreach ($query as $row) {
			$challanno = $row['challanno'];
		}
		if ($challanno > 0) {

			//$response = "<span style='color: red;'>This Info Already Inserted.</span>";
			$response = '<span style="color: red;">This Info Already Inserted.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" disabled="disabled" />';
			//$sql = "INSERT INTO test VALUES ('$colorcode')";
			//$query = $this->db->query($sql);
		} else {
			//$response = "<span style='color: green;'>Available.</span>";
			$response = '<span style="color: green;">Available.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" />';
		}

		echo $response;
		die;
	}
	public function order_wise_challan_create()
	{
		//error_reporting('0');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		//$this->load->library('pdf');
		if ($this->input->post('submit')) {
			date_default_timezone_set('Asia/Dhaka');
			$crcdate = $this->input->post('crcdate');
			$crcdate = date("Y-m-d", strtotime($crcdate));
			$fmy = strtotime($crcdate);
			$month = date("F", $fmy);
			$year = date("Y", $fmy);
			$d = date('Y-m-d');
			$t = date("H:i:s");
			$d1 = str_replace("-", "", $d);
			$t1 = str_replace(":", "", $t);
			$ccid = $d1 . $t1;
			//$ccid1 = $ccid . $data['i'];
			$sfactory = $this->input->post('sfactory');
			$challanno = $this->input->post('challanno');
			$ptid = $this->input->post('ptid');
			$ctid = $this->input->post('ctid');
			$dfactory = $this->input->post('dfactory');
			$buyerid = $this->input->post('buyerid');
			$jobno = $this->input->post('jobnoid');
			$style = $this->input->post('styleid');
			$orderno = $this->input->post('orderid');
			$colorno = $this->input->post('colorid');
			$sizeid = $this->input->post('sizeid');
			$gpid = $this->input->post('gpid');
			$rqty = $this->input->post('rqty');
			$puomid = $this->input->post('puomid');
			$bag = $this->input->post('bag');
			$sremarks = $this->input->post('sremarks');
			$userid = $this->session->userdata('userid');
			$sql = "INSERT INTO challanm1_insert VALUES ('$ccid','$sfactory','$challanno','$ptid','$ctid','$dfactory','$buyerid[0]','$jobno[0]','$style[0]','$orderno[0]','$userid','$crcdate','$month','$year',CURDATE(),CURTIME(),'','','1','1')";
			$query = $this->db->query($sql);

			for ($i = 0; $i < count($buyerid); $i++) {
				$data["i"] = $i;
				$data["j"] = $i + 1;
				$data["ccid"] = $ccid;
				$data["ccid1"] = $ccid . $i;
				$data["crcdate"] = $crcdate;
				$data["sfactory"] = $sfactory;
				$data["challanno"] = $challanno;
				$data["ptid"] = $ptid;
				$data["ctid"] = $ctid;
				$data["dfactory"] = $dfactory;
				$data["buyerid"] = $buyerid[$i];
				$data["jobno"] = $jobno[$i];
				$data["style"] = $style[$i];
				$data["orderno"] = $orderno[$i];
				$data["colorno"] = $colorno[$i];
				$data["sizeid"] = $sizeid[$i];
				$data["gpid"] = $gpid[$i];
				$data["rqty"] = $rqty[$i];
				$data["puomid"] = $puomid[$i];
				$data["bag"] = $bag[$i];
				$data["sremarks"] = $sremarks[$i];
				$data["userid"] = $userid;
				//var_dump($data);
				//echo "<br/>";
				$ins = $this->Admin->order_wise_challan_create($data);
			}
		}
		if ($ins) {
			$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			//$data['ul'] = $this->Admin->movement_bill_print();
			//$html = $this->load->view('admin/movementbillpdf', $data, true);
			//$this->pdf->createPDF($html, 'Out Of Office Bill', false);
		} else {
			$this->session->set_flashdata('UnSuccessfully', "Not Inserted");
		}
		redirect('Dashboard/order_list_for_challan', 'refresh');
	}
	public function po_wise_gateout_gatein()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Dashboard';
		$this->load->view('admin/head', $data);
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav', $data);
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_challanm_pending_list($factoryid);
		$this->load->view('admin/po_wise_gateout_gatein', $data);
	}
	public function date_wise_challan_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_list_form', $data);
		}
		if ($usertype == 2) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_challan_list_form', $data);
		}
		if ($usertype == 3) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_challan_list_form', $data);
		}
	}
	public function date_wise_challan_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_challan_list($pd, $wd, $factoryid);
		$usertype = $this->session->userdata('user_type');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_list', $data);
		}
		if ($usertype == 2) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_challan_list', $data);
		}
		if ($usertype == 3) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_challan_list_security', $data);
		}
	}
	public function date_wise_challan_status_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_status_form', $data);
		}
		if ($usertype == 3) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_challan_status_form', $data);
		}
	}
	public function date_wise_challan_status()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_challan_status($pd, $wd, $factoryid);
		$this->load->view('admin/date_wise_challan_status', $data);
	}
	public function factory_challanm_sapproved()
	{
		$this->load->database();
		$this->load->model('Admin');
		$chmid = $this->uri->segment(3);
		$ins = $this->Admin->factory_challanm_sapproved($chmid);
		if ($ins) {
			$this->session->set_flashdata('Successfully', 'Successfully Inserted');
		} else {
			$this->session->set_flashdata('UnSuccessfully', "Not Inserted");
		}
		redirect('Dashboard/po_wise_gateout_gatein', 'refresh');
	}
	public function factory_challanm_receive_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Challan Receive';
		$chmid = $this->uri->segment(3);
		//$data['sqty']= $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['chmid'] = $chmid;
		$data['ul'] = $this->Admin->factory_challanm_receive_form($chmid);
		$this->load->view('admin/factory_challanm_receive_form', $data);
	}
	public function challanm_receive()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$chmid = $this->input->post('chmid');
			$chmid2 = $this->input->post('chmid2');
			$rqty = $this->input->post('rqty');
			$rremarks = $this->input->post('rremarks');
			for ($i = 0; $i < count($chmid2); $i++) {
				$data["i"] = $i;
				$data["chmid"] = $chmid;
				$data["chmid2"] = $chmid2[$i];
				$data["rqty"] = $rqty[$i];
				$data["rremarks"] = $rremarks[$i];
				$ins = $this->Admin->challanm_receive($data);
				//print_r($data);
			}
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Inserted');
			}
			redirect('Dashboard', 'refresh');
		}
	}
	public function date_wise_challan_sent_status_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Sent Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_sent_status_form', $data);
		}
		if ($usertype == 2) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_sent_status_form', $data);
		}
		if ($usertype == 3) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_sent_status_form', $data);
		}
	}
	public function date_wise_challan_sent_status()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_challan_sent_status($pd, $wd, $factoryid);
		$this->load->view('admin/date_wise_challan_sent_status', $data);
	}
	public function date_wise_challan_recv_status_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Receive Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_recv_status_form', $data);
		}
		if ($usertype == 2) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_recv_status_form', $data);
		}
		if ($usertype == 3) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_challan_recv_status_form', $data);
		}
	}
	public function date_wise_challan_recv_status()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_challan_recv_status($pd, $wd, $factoryid);
		$this->load->view('admin/date_wise_challan_recv_status', $data);
	}
	public function challanm_details_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order Wise Challan';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$chmid = $this->uri->segment(3);
		$data['chmid'] = $chmid;
		$data['pul'] = $this->Admin->product_uom_list();
		$data['gl'] = $this->Admin->garments_part_list();
		$data['ptl'] = $this->Admin->production_type_list();
		$data['ctl'] = $this->Admin->challan_type_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['cl1'] = $this->Admin->challanm_details_form_c1($chmid);
		$data['ul'] = $this->Admin->challanm_details_form($chmid);
		$this->load->view('admin/challanm_details_form', $data);
	}
	public function challanm_details_edit()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		//$this->load->library('pdf');

		$chmid = $this->input->post('chmid');
		$crcdate = $this->input->post('crcdate');
		$sfactory = $this->input->post('sfactory');
		$challanno = $this->input->post('challanno');
		$ptid = $this->input->post('ptid');
		$ctid = $this->input->post('ctid');
		$dfactory = $this->input->post('dfactory');
		$chmid2 = $this->input->post('chmid2');
		$buyerid = $this->input->post('buyerid');
		$jobno = $this->input->post('jobnoid');
		$style = $this->input->post('styleid');
		$orderno = $this->input->post('orderid');
		$colorno = $this->input->post('colorid');
		$sizeid = $this->input->post('sizeid');
		$gpid = $this->input->post('gpid');
		$rqty = $this->input->post('rqty');
		$puomid = $this->input->post('puomid');
		$bag = $this->input->post('bag');
		$sremarks = $this->input->post('sremarks');
		$userid = $this->session->userdata('userid');

		for ($i = 0; $i < count($buyerid); $i++) {
			$data["i"] = $i;
			$data["j"] = $i + 1;
			$data["chmid"] = $chmid;
			$data["crcdate"] = $crcdate;
			$data["sfactory"] = $sfactory;
			$data["challanno"] = $challanno;
			$data["ptid"] = $ptid;
			$data["ctid"] = $ctid;
			$data["dfactory"] = $dfactory;
			$data["chmid2"] = $chmid2[$i];
			$data["buyerid"] = $buyerid[$i];
			$data["jobno"] = $jobno[$i];
			$data["style"] = $style[$i];
			$data["orderno"] = $orderno[$i];
			$data["colorno"] = $colorno[$i];
			$data["sizeid"] = $sizeid[$i];
			$data["gpid"] = $gpid[$i];
			$data["rqty"] = $rqty[$i];
			$data["puomid"] = $puomid[$i];
			$data["bag"] = $bag[$i];
			$data["sremarks"] = $sremarks[$i];
			$data["userid"] = $userid;
			//var_dump($data);
			//echo "<br/>";
			$ins = $this->Admin->challanm_details_edit($data);
		}
		if ($ins) {
			$this->session->set_flashdata('Successfully', 'Successfully Updated');
		} else {
			$this->session->set_flashdata('UnSuccessfully', "Not Updated");
		}
		redirect('Dashboard/date_wise_challan_list_form', 'refresh');
	}
	public function challanm_details()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order Wise Challan';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$chmid = $this->uri->segment(3);
		$data['chmid'] = $chmid;
		$data['pul'] = $this->Admin->product_uom_list();
		$data['gl'] = $this->Admin->garments_part_list();
		$data['ptl'] = $this->Admin->production_type_list();
		$data['ctl'] = $this->Admin->challan_type_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['cl1'] = $this->Admin->challanm_details_form_c1($chmid);
		$data['ul'] = $this->Admin->challanm_details($chmid);
		$this->load->view('admin/challanm_details', $data);
	}
	public function challanm_print()
	{
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('pdf');
		$data['title'] = 'Order Wise Challan';
		$chmid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$data['cl1'] = $this->Admin->challanm_details_form_c1($chmid);
		$data['sf'] = $this->Admin->challanm_details_sfactory($chmid);
		$data['df'] = $this->Admin->challanm_details_dfactory($chmid);
		$data['ul'] = $this->Admin->challanm_print($chmid);
		//$html = $this->load->view('admin/challanmpdf', $data, true);
		//$this->pdf->createPDF($html, 'Order Wise Challan', false);
		$this->load->view('admin/challanmpdf_html', $data);
	}

	//////////////////////////////////////////// NON PO CHALLAN ////////////////////////////////////////

	public function non_po_product_category_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Non Product Category Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/non_po_product_category_insert_form', $data);
	}
	public function non_po_product_category_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$nppcname = $this->form_validation->set_rules('nppcname', 'Product Category', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->non_po_product_category_insert_form();
			} else {
				$nppcname = $this->input->post('nppcname');
				$ins = $this->Admin->non_po_product_category_insert($nppcname);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/non_po_product_category_insert_form', 'refresh');
			}
		}
	}
	public function non_po_product_category_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Non Product Category List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->non_po_product_category();
		$this->load->view('admin/non_po_product_category_list', $data);
	}
	
	
	
	public function non_po_challan_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Challan Create';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['pul'] = $this->Admin->product_uom_list();
		$data['nl'] = $this->Admin->non_po_product_category();
		$data['ctl'] = $this->Admin->challan_type_list();
		$data['dl'] = $this->Admin->department_list();
		$data['del'] = $this->Admin->designation_list();
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/non_po_challan_create_form', $data);
	}

	public function non_po_wise_challan_available()
	{
		$this->load->database();
		$this->load->model('Admin');
		$sfactory = $this->input->get('sfactory');
		$challanno = $this->input->get('challanno');
		$sql = "SELECT COUNT(challanno) AS challanno FROM non_po_challanm1_insert WHERE sfactoryid='$sfactory' AND challanno='$challanno'";
		$query = $this->db->query($sql);
		$query = $query->result_array();
		foreach ($query as $row) {
			$challanno = $row['challanno'];
		}
		if ($challanno > 0) {

			//$response = "<span style='color: red;'>This Info Already Inserted.</span>";
			$response = '<span style="color: red;">This Info Already Inserted.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" disabled="disabled" />';
			//$sql = "INSERT INTO test VALUES ('$colorcode')";
			//$query = $this->db->query($sql);
		} else {
			//$response = "<span style='color: green;'>Available.</span>";
			$response = '<span style="color: green;">Available.</span><br/><input type="submit" class="btn btn-primary" name="submit" value="Submit" />';
		}

		echo $response;
		die;
	}

	public function non_po_wise_challan_create()
	{

		date_default_timezone_set('Asia/Dhaka');
		$crcdate = $this->input->get('crcdate');
		$crcdate = date("Y-m-d", strtotime($crcdate));
		$fmy = strtotime($crcdate);
		$month = date("F", $fmy);
		$year = date("Y", $fmy);
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;


		$this->load->database();
		$this->load->model('Admin');
		$sfactory = $this->input->get('sfactory');
		$challanno = $this->input->get('challanno');
		$deptid = $this->input->get('deptid');
		$desigid = $this->input->get('desigid');
		$username = $this->input->get('username');
		$dfactory = $this->input->get('dfactory');
		$userid = $this->session->userdata('userid');
		$nppcname = $this->input->get('nppcname');
		$pname = $this->input->get('pname');
		$pname =  str_replace("'", "\'", $pname);
		$pqty = $this->input->get('pqty');
		$puom = $this->input->get('puom');
		$challantype = $this->input->get('challantype');
		$remarks = $this->input->get('remarks');
		$remarks =  str_replace("'", "\'", $remarks);

		$sql = "INSERT INTO non_po_challanm1_insert VALUES ('$ccid','$sfactory','$challanno','$deptid','$desigid','$username','$dfactory','$userid','$crcdate','$month','$year',CURDATE(),CURTIME(),'','','1','1')";
		$query = $this->db->query($sql);


		for ($i = 0; $i < count($nppcname); $i++) {
			$data["i"] = $i;
			$data["ccid"] = $ccid;
			$data["ccid1"] = $ccid . $i;
			$data["nppcname"] = $nppcname[$i];
			$data["pname"] = $pname[$i];
			$data["pqty"] = $pqty[$i];
			$data["puom"] = $puom[$i];
			$data["challantype"] = $challantype[$i];
			$data["remarks"] = $remarks[$i];
			$ins = $this->Admin->non_po__wise_challan_create($data);
		}

		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function non_po_wise_gateout_gatein()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Dashboard';
		$this->load->view('admin/head', $data);
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav', $data);
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->non_po_factory_challanm_pending_list($factoryid);
		$this->load->view('admin/non_po_wise_gateout_gatein', $data);
	}
	public function date_wise_non_po_challan_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_list_form', $data);
		}
		if ($usertype == 2) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_non_po_challan_list_form', $data);
		}
		if ($usertype == 3) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_non_po_challan_list_form', $data);
		}
	}
	public function date_wise_non_po_challan_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_non_po_challan_list($pd, $wd, $factoryid);
		$usertype = $this->session->userdata('user_type');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_list', $data);
		}
		if ($usertype == 2) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_non_po_challan_list', $data);
		}
		if ($usertype == 3) {
			$factoryid = $this->session->userdata('factoryid');
			$this->load->view('admin/date_wise_non_po_challan_list_security', $data);
		}
	}
	public function non_po_challanm_details()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Non PO Wise Challan';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$nonpochmid = $this->uri->segment(3);
		$data['nonpochmid'] = $nonpochmid;
		$data['pul'] = $this->Admin->product_uom_list();
		$data['npl'] = $this->Admin->non_po_product_category();
		$data['ctl'] = $this->Admin->challan_type_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['cl1'] = $this->Admin->non_po_challanm_details_form_c1($nonpochmid);
		$data['ul'] = $this->Admin->non_po_challanm_details($nonpochmid);
		$this->load->view('admin/non_po_challanm_details', $data);
	}
	public function non_po_challanm_details_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'NON PO Wise Challan';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$nonpochmid = $this->uri->segment(3);
		$data['nonpochmid'] = $nonpochmid;
		$data['pul'] = $this->Admin->product_uom_list();
		$data['npl'] = $this->Admin->non_po_product_category();
		$data['ctl'] = $this->Admin->challan_type_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['dl'] = $this->Admin->department_list();
		$data['del'] = $this->Admin->designation_list();
		$data['cl1'] = $this->Admin->non_po_challanm_details_form_c1($nonpochmid);
		$data['ul'] = $this->Admin->non_po_challanm_details($nonpochmid);
		$this->load->view('admin/non_po_challanm_details_form', $data);
	}
	public function non_po_challanm_details_edit()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		$nonpochmid = $this->input->post('nonpochmid');
		$crcdate = $this->input->post('crcdate');
		$sfactory = $this->input->post('sfactory');
		$challanno = $this->input->post('challanno');
		$deptid = $this->input->post('deptid');
		$desigid = $this->input->post('desigid');
		$username = $this->input->post('username');
		$dfactory = $this->input->post('dfactory');
		$nonpochmid2 = $this->input->post('nonpochmid2');
		$nppcid = $this->input->post('nppcid');
		$pname = $this->input->post('pname');
		$spqty = $this->input->post('spqty');
		$puomid = $this->input->post('puomid');
		$ctid = $this->input->post('ctid');
		$sremarks = $this->input->post('sremarks');
		$userid = $this->session->userdata('userid');

		for ($i = 0; $i < count($nppcid); $i++) {
			$data["i"] = $i;
			$data["j"] = $i + 1;
			$data["nonpochmid"] = $nonpochmid;
			$data["crcdate"] = $crcdate;
			$data["sfactory"] = $sfactory;
			$data["challanno"] = $challanno;
			$data["deptid"] = $deptid;
			$data["desigid"] = $desigid;
			$data["username"] = $username;
			$data["dfactory"] = $dfactory;
			$data["nonpochmid2"] = $nonpochmid2[$i];
			$data["nppcid"] = $nppcid[$i];
			$data["pname"] = $pname[$i];
			$data["spqty"] = $spqty[$i];
			$data["puomid"] = $puomid[$i];
			$data["ctid"] = $ctid[$i];
			$data["sremarks"] = $sremarks[$i];
			$data["userid"] = $userid;
			$ins = $this->Admin->non_po_challanm_details_edit($data);
		}
		if ($ins) {
			$this->session->set_flashdata('Successfully', 'Successfully Updated');
		} else {
			$this->session->set_flashdata('UnSuccessfully', "Not Updated");
		}
		redirect('Dashboard/date_wise_non_po_challan_list_form', 'refresh');
	}
	public function non_po_factory_challanm_sapproved()
	{
		$this->load->database();
		$this->load->model('Admin');
		$nonpochmid = $this->uri->segment(3);
		$ins = $this->Admin->non_po_factory_challanm_sapproved($nonpochmid);
		if ($ins) {
			$this->session->set_flashdata('Successfully', 'Successfully Inserted');
		} else {
			$this->session->set_flashdata('UnSuccessfully', "Not Inserted");
		}
		redirect('Dashboard/non_po_wise_gateout_gatein', 'refresh');
	}
	public function non_po_factory_challanm_receive_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Challan Receive';
		$nonpochmid = $this->uri->segment(3);
		//$data['sqty']= $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['nonpochmid'] = $nonpochmid;
		$data['ul'] = $this->Admin->non_po_factory_challanm_receive_form($nonpochmid);
		$this->load->view('admin/non_po_factory_challanm_receive_form', $data);
	}
	public function non_po_challanm_receive()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$nonpochmid = $this->input->post('nonpochmid');
			$nonpochmid2 = $this->input->post('nonpochmid2');
			$rpqty = $this->input->post('rpqty');
			$rremarks = $this->input->post('rremarks');
			for ($i = 0; $i < count($nonpochmid2); $i++) {
				$data["i"] = $i;
				$data["nonpochmid"] = $nonpochmid;
				$data["nonpochmid2"] = $nonpochmid2[$i];
				$data["rpqty"] = $rpqty[$i];
				$data["rremarks"] = $rremarks[$i];
				$ins = $this->Admin->non_po_challanm_receive($data);
				//print_r($data);
			}
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Inserted');
			}
			redirect('Dashboard', 'refresh');
		}
	}
	public function date_wise_non_po_challan_sent_status_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Sent Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_sent_status_form', $data);
		}
		if ($usertype == 2) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_sent_status_form', $data);
		}
		if ($usertype == 3) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_sent_status_form', $data);
		}
	}
	public function date_wise_non_po_challan_sent_status()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_non_po_challan_sent_status($pd, $wd, $factoryid);
		$this->load->view('admin/date_wise_non_po_challan_sent_status', $data);
	}
	public function date_wise_non_po_challan_recv_status_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Challan Receive Status';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		if ($usertype == 1) {
			$data['fl'] = $this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_recv_status_form', $data);
		}
		if ($usertype == 2) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_recv_status_form', $data);
		}
		if ($usertype == 3) {
			//$data['fl']=$this->Admin->factory_list();
			$this->load->view('admin/date_wise_non_po_challan_recv_status_form', $data);
		}
	}
	public function date_wise_non_po_challan_recv_status()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$data['factoryid'] = $factoryid;
		$data['ul'] = $this->Admin->date_wise_non_po_challan_recv_status($pd, $wd, $factoryid);
		$this->load->view('admin/date_wise_non_po_challan_recv_status', $data);
	}
	public function non_po_challanm_print()
	{
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('pdf');
		$data['title'] = 'Order Wise Challan';
		$nonpochmid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$data['cl1'] = $this->Admin->non_po_challanm_details_form_c1($nonpochmid);
		$data['sf'] = $this->Admin->non_po_challanm_details_sfactory($nonpochmid);
		$data['df'] = $this->Admin->non_po_challanm_details_dfactory($nonpochmid);
		$data['ul'] = $this->Admin->non_po_challanm_print($nonpochmid);
		//$html = $this->load->view('admin/challanmpdf', $data, true);
		//$this->pdf->createPDF($html, 'Order Wise Challan', false);
		$this->load->view('admin/non_po_challanmpdf_html', $data);
	}
}
