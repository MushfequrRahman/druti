<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

	public function fac_insert($facid, $facname, $fac_address)
	{
		$sql = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO factory VALUES ('$facid','$facname','$fac_address')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factory_list()
	{
		$query = "SELECT * FROM factory";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_list_up($facid)
	{
		$sql1 = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function flup($fid, $facid, $factoryname, $factory_address)
	{
		$sql = "UPDATE factory SET factoryid='$facid',factoryname='$factoryname',factory_address='$factory_address' WHERE factoryid='$fid'";
		$query = $this->db->query($sql);
	}
	public function department_insert($department)
	{
		$sql = "SELECT * FROM department WHERE departmentname='$department'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO department VALUES ('','$department')";
			$query = $this->db->query($sql);
			return $query;
		}
	}

	public function department_list()
	{
		$query = "SELECT * FROM department ORDER BY departmentname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function department_list_up($deptid)
	{
		$sql1 = "SELECT * FROM department 
		
		WHERE deptid='$deptid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function departmentlup($deptid, $departmentname)
	{
		$sql = "UPDATE department SET deptid='$deptid',departmentname='$departmentname' WHERE deptid='$deptid'";
		$query = $this->db->query($sql);
	}

	public function designation_insert($designation)
	{
		$sql = "SELECT * FROM designation WHERE designation='$designation'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO designation VALUES ('','$designation')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function designation_list()
	{
		$query = "SELECT * FROM designation ORDER BY designation ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function designation_list_up($designationid)
	{
		$sql1 = "SELECT * FROM designation WHERE designationid='$designationid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function designationlup($designationid, $designation)
	{

		$sql = "UPDATE designation SET designation='$designation' WHERE designationid='$designationid'";
		$query = $this->db->query($sql);
	}
	public function usertype_insert($usertype)
	{
		$sql = "SELECT * FROM usertype WHERE usertype='$usertype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO usertype VALUES ('','$usertype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function usertype_list()
	{
		$query = "SELECT * FROM usertype";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function usertype_list_up($usertypeid)
	{
		$sql1 = "SELECT * FROM usertype WHERE usertypeid='$usertypeid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function usertypelup($usertypeid, $usertype)
	{
		$sql = "UPDATE usertype SET usertype='$usertype' WHERE usertypeid='$usertypeid'";
		$query = $this->db->query($sql);
	}
	public function user_insert($factoryid, $departmentid, $name, $designationid, $oemail, $pmobile, $usertypeid, $userid, $password)
	{
		$sql = "SELECT * FROM user WHERE userid='$userid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO user VALUES ('$factoryid','$departmentid','$name','$designationid','$oemail','$pmobile','$usertypeid','$userid','$password','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factorywise_user_list($factoryid)
	{
		$query = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' ORDER BY user.userid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_list_up($userid)
	{
		$sql1 = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE userid='$userid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate)
	{
		$indate = date("Y-m-d", strtotime($indate));
		$sql = "UPDATE user SET factoryid='$factoryid',departmentid='$departmentid',designationid='$designationid',name='$name',email='$email',mobile='$mobile',user_type='$usertypeid',password='$password',ustatus='$userstatusid',indate='$indate' WHERE userid='$userid'";
		return $query = $this->db->query($sql);
	}


	public function userstatus_insert($userstatus)
	{
		$sql = "SELECT * FROM userstatus WHERE userstatus='$userstatus'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO userstatus VALUES ('','$userstatus')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function userstatus_list()
	{
		$query = "SELECT * FROM userstatus";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function userstatus_list_up($userstatusid)
	{
		$sql1 = "SELECT * FROM userstatus WHERE userstatusid='$userstatusid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function userstatuslup($userstatusid, $userstatus)
	{
		$sql = "UPDATE userstatus SET userstatus='$userstatus' WHERE userstatusid='$userstatusid'";
		$query = $this->db->query($sql);
	}

	public function product_uom_insert($puom)
	{
		$sql = "SELECT * FROM product_uom_insert WHERE puom='$puom'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO product_uom_insert VALUES ('','$puom')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function product_uom_list()
	{
		$query = "SELECT * FROM product_uom_insert";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function product_uom_list_up($puomid)
	{
		$sql1 = "SELECT * FROM product_uom_insert WHERE puomid='$puomid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function productuomlup($puomid, $puom)
	{
		$sql = "UPDATE product_uom_insert SET puom='$puom' WHERE puomid='$puomid'";
		return $query = $this->db->query($sql);
	}
	public function fabric_type_insert($fabrictype)
	{
		$sql = "SELECT * FROM fabric_type WHERE fabrictype='$fabrictype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO fabric_type VALUES ('','$fabrictype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function fabric_type_list()
	{
		$query = "SELECT * FROM fabric_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_part_insert($fabricpart)
	{
		$sql = "SELECT * FROM fabric_part WHERE fabricpart='$fabricpart'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO fabric_part VALUES ('','$fabricpart')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function fabric_part_list()
	{
		$query = "SELECT * FROM fabric_part";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function garments_part_insert($garmentspart)
	{
		$sql = "SELECT * FROM garments_part WHERE garmentspart='$garmentspart'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO garments_part VALUES ('','$garmentspart')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function garments_part_list()
	{
		$query = "SELECT * FROM garments_part";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function production_type_insert($productiontype)
	{
		$sql = "SELECT * FROM production_type WHERE productiontype='$productiontype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO production_type VALUES ('','$productiontype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function production_type_list()
	{
		$query = "SELECT * FROM production_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challan_type_insert($challantype)
	{
		$sql = "SELECT * FROM challan_type WHERE challantype='$challantype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO challan_type VALUES ('','$challantype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function challan_type_list()
	{
		$query = "SELECT * FROM challan_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rackno_insert($rackno)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM rackno WHERE rackno='$rackno'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO rackno VALUES ('$ccid','$rackno')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function rackno_list()
	{
		$query = "SELECT * FROM rackno";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function supplier_type_insert($supplirtype)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM supplier_type WHERE suppliertype='$supplirtype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO supplier_type VALUES ('$ccid','$supplirtype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function supplier_type_list()
	{
		$query = "SELECT * FROM supplier_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function supplier_insert($stiid, $supplier)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM supplier WHERE supplier='$supplier'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO supplier VALUES ('$ccid','$stiid','$supplier')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function supplier_list()
	{
		$query = "SELECT supplier_type.stiid,suppliertype,supplierid,supplier
					FROM supplier JOIN supplier_type
					ON supplier_type.stiid=supplier.stiid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function booking_type_list()
	{
		$query = "SELECT * FROM booking_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	/////////////////////////////////////////////////////////BUYER/////////////////////////////////////////////////////////////

	public function buyer_insert($buyername)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM buyer WHERE buyername='$buyername'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO buyer VALUES ('$ccid','$buyername')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function buyer_list()
	{
		$query = "SELECT * FROM buyer ORDER BY buyername";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////JOB NO/////////////////////////////////////////////////////////////

	public function jobno_insert($jobno, $buyerid,$factoryid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM jobno WHERE jobno='$jobno' AND buyerid='$buyerid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO jobno VALUES ('$ccid','$jobno','$buyerid','1','$factoryid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function jobno_list()
	{
		$query = "SELECT * FROM jobno
		JOIN buyer ON buyer.buyerid=jobno.buyerid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function jobno_status_shipped($jobnoid)
	{
		$sql = "UPDATE jobno SET jobnostatus='0' WHERE jobnoid='$jobnoid'";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE style SET stylestatus='0' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql1);

		$sql2 = "UPDATE border SET orderstatus='0' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql2);

		$sql3 = "UPDATE color SET colorstatus='0' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql3);

		$sql4 = "SELECT colorid FROM color WHERE jobnoid='$jobnoid'";
		$result4 = $this->db->query($sql4);
		$re4 = $result4->result_array();
		foreach ($re4 as $row4) {
			$colorid = $row4['colorid'];
		}

		$sql5 = "UPDATE color_wise_fabric_part SET colorpartstatus='0' WHERE colorid='$colorid'";
		$this->db->query($sql5);

		// $sql6 = "UPDATE fabric_received SET fabricreceivedstatus='0' WHERE jobnoid='$jobnoid'";
		// $this->db->query($sql6);

		// $sql7 = "SELECT fabricreceivedid FROM fabric_received WHERE jobnoid='$jobnoid'";
		// $result7 = $this->db->query($sql7);
		// $re7 = $result7->result_array();
		// foreach ($re7 as $row7) {
		// 	$fabricreceivedid = $row7['fabricreceivedid'];

		// 	$sql8 = "UPDATE fabric_delivery SET fabricdeliverystatus='0' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql8);

		// 	$sql9 = "UPDATE fabric_return SET fabricreturnstatus='0' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql9);

		// 	$sql10 = "UPDATE fabric_order_transfer SET fabricordertransferstatus='0' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql10);

		// 	$sql11 = "UPDATE fabric_rack_transfer SET fabricracktransferstatus='0' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql11);
		// }
		$sql14 = "UPDATE gsize SET sizestatus='0' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql14);
		$sql15 = "UPDATE challanm1_insert SET challanm1status='0' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql15);
		$sql16 = "SELECT chmid FROM challanm1_insert WHERE jobnoid='$jobnoid'";
		$result16 = $this->db->query($sql16);
		$re16 = $result16->result_array();
		foreach ($re16 as $row16) {
			$chmid = $row16['chmid'];

			$sql17 = "UPDATE challanm2_insert SET challanm2status='0' WHERE chmid='$chmid'";
			$this->db->query($sql17);
		}
		return $query;
	}
	public function jobno_status_running($jobnoid)
	{
		$sql = "UPDATE jobno SET jobnostatus='1' WHERE jobnoid='$jobnoid'";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE style SET stylestatus='1' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql1);

		$sql2 = "UPDATE border SET orderstatus='1' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql2);

		$sql3 = "UPDATE color SET colorstatus='1' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql3);

		$sql4 = "SELECT colorid FROM color WHERE jobnoid='$jobnoid'";
		$result4 = $this->db->query($sql4);
		$re4 = $result4->result_array();
		foreach ($re4 as $row4) {
			$colorid = $row4['colorid'];
		}

		$sql5 = "UPDATE color_wise_fabric_part SET colorpartstatus='1' WHERE colorid='$colorid'";
		$query5 = $this->db->query($sql5);

		// $sql6 = "UPDATE fabric_received SET fabricreceivedstatus='1' WHERE jobnoid='$jobnoid'";
		// $query6 = $this->db->query($sql6);

		// $sql7 = "SELECT fabricreceivedid FROM fabric_received WHERE jobnoid='$jobnoid'";
		// $result7 = $this->db->query($sql7);
		// $re7 = $result7->result_array();
		// foreach ($re7 as $row7) {
		// 	$fabricreceivedid = $row7['fabricreceivedid'];

		// 	$sql8 = "UPDATE fabric_delivery SET fabricdeliverystatus='1' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql8);

		// 	$sql9 = "UPDATE fabric_return SET fabricreturnstatus='1' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql9);

		// 	$sql10 = "UPDATE fabric_order_transfer SET fabricordertransferstatus='1' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql10);

		// 	$sql11 = "UPDATE fabric_rack_transfer SET fabricracktransferstatus='1' WHERE fabricreceivedid='$fabricreceivedid'";
		// 	$this->db->query($sql11);
		// }
		$sql14 = "UPDATE gsize SET sizestatus='1' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql14);
		$sql15 = "UPDATE challanm1_insert SET challanm1status='1' WHERE jobnoid='$jobnoid'";
		$this->db->query($sql15);

		$sql16 = "SELECT chmid FROM challanm1_insert WHERE jobnoid='$jobnoid'";
		$result16 = $this->db->query($sql16);
		$re16 = $result16->result_array();
		foreach ($re16 as $row16) {
			$chmid = $row16['chmid'];

			$sql17 = "UPDATE challanm2_insert SET challanm2status='1' WHERE chmid='$chmid'";
			$this->db->query($sql17);
		}

		return $query;
	}

	public function show_jobno($buyerid)
	{
		$query = "SELECT * FROM jobno WHERE buyerid='$buyerid' ORDER BY jobno ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////STYLE/////////////////////////////////////////////////////////////

	public function style_insert($jobno, $stylename, $buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM style WHERE jobnoid='$jobno' AND stylename='$stylename' AND buyerid='$buyerid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO style VALUES ('$ccid','$jobno','$stylename','$buyerid','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function style_list()
	{
		$query = "SELECT * FROM style
		JOIN buyer ON buyer.buyerid=style.buyerid
		JOIN jobno ON jobno.jobnoid=style.jobnoid
		WHERE stylestatus='1'
		ORDER BY jobno ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_styleno($jobno, $buyerid)
	{
		$query = "SELECT * FROM style WHERE jobnoid='$jobno' AND buyerid='$buyerid' AND stylestatus='1' ORDER BY stylename ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}


	/////////////////////////////////////////////////////////ORDER/////////////////////////////////////////////////////////////

	public function order_insert($jobno, $style, $ordername, $buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM border WHERE jobnoid='$jobno' AND styleid='$style' AND ordername='$ordername' AND buyerid='$buyerid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() >= 1) {
			return false;
		} else {
			$sql = "INSERT INTO border VALUES ('$ccid','$ordername','$jobno','$style','$buyerid','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function order_list()
	{
		$query = "SELECT * FROM border
		JOIN jobno ON jobno.jobnoid=border.jobnoid
		JOIN style ON style.styleid=border.styleid
		JOIN buyer ON buyer.buyerid=style.buyerid
		WHERE orderstatus='1'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_orderno($buyerid, $jobno, $style)
	{
		$query = "SELECT * FROM border WHERE buyerid='$buyerid' AND jobnoid='$jobno' AND styleid='$style' AND orderstatus='1' ORDER BY ordername ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////COLOR/////////////////////////////////////////////////////////////

	public function color_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['tod'] = date("Y-m-d", strtotime($data['tod']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$d2 = date('Y-m-d');
		$t2 = date("H:i:s");
		$d21 = str_replace("-", "", $d2);
		$t21 = str_replace(":", "", $t2);
		$ccid1 = $d21 . $t21;
		$ccid1 = $ccid1 . $data['i'];

		//foreach($data as $row)
		//		{
		//			$colorcode=$row['colorcode'];
		//			$orderno=$row['orderno'];
		//			$style=$row['style'];
		//			$jobno=$row['jobno'];
		//			$buyerid=$row['buyerid'];
		//			
		//		}
		//		
		//$sql2 = "SELECT * FROM color WHERE colorcode='$data[colorcode]' AND orderid='$data[orderno]' AND styleid='$data[style]' AND jobnoid='$data[jobno]' AND buyerid='$data[buyerid]'";
		//		$query2 = $this->db->query($sql2);
		//		if ($query2->num_rows() >= 1) {
		//			return false;
		//		} else {

		$sql = "INSERT INTO color VALUES ('$ccid','$data[colorcode]','$data[colorname]','$data[cwoqty]','$data[gsm]','$data[orderno]','$data[style]','$data[jobno]','$data[buyerid]','$data[tod]','1')";
		$query = $this->db->query($sql);

		$sql1 = "INSERT INTO color_wise_fabric_part VALUES ('$ccid1','$ccid','$data[bqty]','','$data[bdia]','$data[fabrictypeid]','$data[fabricpart]','$data[uom]','1')";
		$query1 = $this->db->query($sql1);

		return $query1;
		//}
	}

	public function color_wise_fabric_part_list()
	{
		$query = "SELECT * FROM color
		
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		
		LEFT JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		LEFT JOIN fabric_part ON fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		WHERE colorpartstatus='1'
		ORDER BY buyername,jobno,stylename,ordername,colorname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_colorno($buyerid, $jobno, $style, $orderid)
	{
		$query = "SELECT * FROM color WHERE buyerid='$buyerid' AND styleid='$style' AND jobnoid='$jobno' AND orderid='$orderid' AND colorstatus='1' ORDER BY colorname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function color_wise_fabric_part_up($cwfpid)
	{
		$query = "SELECT * FROM color
		
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		
		LEFT JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		LEFT JOIN fabric_part ON fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		WHERE cwfpid='$cwfpid'
		ORDER BY buyername,jobno,stylename,ordername,colorname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function color_wise_fabric_part_lup($cwfpid, $fabrictypeid, $bqty, $abqty, $bdia, $fabricpart, $uom)
	{
		$sql = "UPDATE color_wise_fabric_part SET bqty='$bqty',abqty='$abqty',bdia='$bdia',fabrictypeid='$fabrictypeid',fabricpartid='$fabricpart',puomid='$uom' WHERE cwfpid='$cwfpid'";
		$query = $this->db->query($sql);
	}
	public function color_list()
	{
		$query = "SELECT * FROM color
		
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		WHERE colorstatus='1'
		ORDER BY buyername,jobno,stylename,ordername,colorname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function color_up($colorid)
	{
		$query = "SELECT * FROM color
		
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		WHERE colorid='$colorid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function color_lup($colorid, $colorcode, $colorname, $cwoqty, $gsm)
	{
		$sql = "UPDATE color SET colorcode='$colorcode',colorname='$colorname',cwoqty='$cwoqty',gsm='$gsm' WHERE colorid='$colorid'";
		$query = $this->db->query($sql);
	}
	public function color_part($colorid)
	{
		$query = "SELECT * FROM color
		
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		WHERE colorid='$colorid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function color_part_add($colorid, $bqty, $bdia, $fabrictypeid, $fabricpart, $uom)
	{
		date_default_timezone_set('Asia/Dhaka');
		//$data['tod'] = date("Y-m-d", strtotime($data['tod']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "INSERT INTO color_wise_fabric_part VALUES ('$ccid','$colorid','$bqty','','$bdia','$fabrictypeid','$fabricpart','$uom','1')";
		$query1 = $this->db->query($sql1);

		return $query1;
	}
	public function color_details($colorid)
	{
		$query = "SELECT * FROM color
		
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		
		LEFT JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		LEFT JOIN fabric_part ON fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		WHERE color.colorid='$colorid'
		ORDER BY buyername,jobno,stylename,ordername,colorname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_color($buyerid, $jobno, $style, $orderno)
	{
		$query = "SELECT colorid,colorname FROM color WHERE buyerid='$buyerid' AND jobnoid='$jobno' AND styleid='$style' AND orderid='$orderno' ORDER BY colorname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////SIZE////////////////////////////////////

	public function size_insert($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];

		// $sql1 = "SELECT sizename FROM gsize WHERE sizename='$data[size]' AND colorid='$data[colorid]' AND jobnoid='$data[jobno]' AND styleid='$data[style]' AND orderid='$data[orderno]' AND buyerid='$data[buyerid]'";
		// $query1 = $this->db->query($sql1);
		// if ($query1->num_rows() >= 1) {
		// 	return false;
		// } else {
		$sql = "INSERT INTO gsize VALUES ('$ccid','$data[size]','$data[sbqty]','$data[uom]','$data[colorid]','$data[orderno]','$data[style]','$data[jobno]','$data[buyerid]','1')";
		return $query = $this->db->query($sql);
		//}
	}
	public function size_list()
	{
		$query = "SELECT * FROM gsize
		
		JOIN buyer ON buyer.buyerid=gsize.buyerid
		JOIN jobno ON jobno.jobnoid=gsize.jobnoid
		JOIN style ON style.styleid=gsize.styleid
		JOIN border ON border.orderid=gsize.orderid
		JOIN color ON color.colorid=gsize.colorid
		WHERE sizestatus='1'
		ORDER BY buyername,jobno,stylename,ordername,colorname,sizename ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function size_up($sizeid)
	{
		$query = "SELECT * FROM gsize
		WHERE sizeid='$sizeid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function size_lup($sizeid, $sizename, $swoqty)
	{
		$sql = "UPDATE gsize SET sizename='$sizename',swoqty='$swoqty' WHERE sizeid='$sizeid'";
		$query = $this->db->query($sql);
	}

	/////////////////////////////////////////FABRIC//////////////////////////////////////

	public function fabric_received_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');

		$data['frcdate'] = date("Y-m-d", strtotime($data['frcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO fabric_received VALUES ('$ccid','$data[frcdate]','$data[challanno]','$data[supplierid]','$data[buyerid]','$data[jobno]','$data[style]','$data[orderno]','$data[colorno]','$data[lotno]','$data[dia]','$data[fabricpart]','$data[rqty]','$data[rqty]','$data[racknoid]','1','$data[userid]','1')";
		$query = $this->db->query($sql);
		return $query;
	}
	public function jobno_wise_fabric_receive_form($jobno)
	{
		$query = "SELECT * FROM color 
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN fabric_part ON fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN border ON border.orderid=color.orderid
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN buyer ON buyer.buyerid=color.buyerid
		WHERE jobno='$jobno'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function jobno_wise_fabric_received_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');

		$data['frcdate'] = date("Y-m-d", strtotime($data['frcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO fabric_received VALUES ('$ccid','$data[frcdate]','$data[challanno]','$data[supplierid]','$data[buyerid]','$data[jobno]','$data[style]','$data[orderno]','$data[colorno]','$data[bookingtypeid]','$data[lotno]','$data[dia]','$data[fabricpart]','$data[rqty]','$data[rqty]','$data[racknoid]','1','$data[userid]','1')";
		$query = $this->db->query($sql);


		$sqlt = "INSERT INTO fabric_received_log VALUES ('$ccid','$data[frcdate]','$data[challanno]','$data[supplierid]','$data[buyerid]','$data[jobno]','$data[style]','$data[orderno]','$data[colorno]','$data[bookingtypeid]','$data[lotno]','$data[dia]','$data[fabricpart]','$data[rqty]','$data[rqty]','$data[racknoid]','1','$data[userid]','1')";
		$queryt = $this->db->query($sqlt);

		//$sqld="DELETE FROM fabric_received WHERE frqty='0' AND tfqty='0' AND frtypestatus='1'";
		//$this->db->query($sqld);
		return $query;
	}
	public function date_wise_fabric_received_list($pd, $wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT * FROM fabric_received
		JOIN color ON color.colorid=fabric_received.colorid
		LEFT JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		LEFT JOIN fab_delivery_dis_id ON fab_delivery_dis_id.dfabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN fabric_rack_transfer_dis_id ON fabric_rack_transfer_dis_id.rtfabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN supplier_view ON supplier_view.supplierid=fabric_received.supplierid
		WHERE frcdate BETWEEN '$pd' AND '$wd' AND frtypestatus='1' AND fabricreceivedstatus='1'
		ORDER BY frcdate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_fabric_delivery_list($pd, $wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT * FROM fabric_delivery 
JOIN fabric_received ON fabric_received.fabricreceivedid=fabric_delivery.fabricreceivedid
		JOIN color ON color.colorid=fabric_received.colorid
		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		WHERE ddate BETWEEN '$pd' AND '$wd' AND fabricreceivedstatus='1'
		ORDER BY ddate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rack_wise_fabric_received_list($racknoid)
	{
		//$query = "SELECT * FROM fabric_received
		//		JOIN color ON color.colorid=fabric_received.colorid
		//		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		//		JOIN fabric_type ON fabric_type.fabrictypeid=color.fabrictypeid
		//		JOIN border ON border.orderid=fabric_received.orderid
		//		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		//		JOIN style ON style.styleid=fabric_received.styleid
		//		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		//		JOIN fabric_delivery ON fabric_delivery.fabricreceivedid=fabric_received.fabricreceivedid
		//		WHERE fabric_received.racknoid= '$racknoid'
		//		GROUP BY fabric_received.fabricreceivedid";
		$query = "SELECT (total_fab_received.fabricreceivedid) AS fabricreceivedid,buyername,jobno,stylename,ordername,
		colorname,fabricpart,bqty,lotno,frqty,tfqty,deliveryamount,rackno FROM total_fab_received
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=total_fab_received.fabricreceivedid
		WHERE total_fab_received.racknoid= '$racknoid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rack_wise_fabric_current_status_list($racknoid)
	{
		$query = "SELECT (total_fab_received.fabricreceivedid) AS fabricreceivedid,buyername,jobno,stylename,ordername,colorname,fabricpart,
		lotno,
		SUM(tfqty) AS tfqty,
		SUM(deliveryamount) deliveryamount,frcdate,
		rackno 
		FROM total_fab_received
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=total_fab_received.fabricreceivedid
		WHERE total_fab_received.racknoid= '$racknoid' AND tfqty!='0'
		GROUP BY buyername,jobno,stylename,ordername,rackno,
		colorname,fabricpart,lotno
		ORDER BY frcdate DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rack_wise_fabric_current_status_list_all()
	{
		$query = "SELECT (total_fab_received.fabricreceivedid) AS fabricreceivedid,buyername,jobno,stylename,ordername,colorname,fabricpart,
		lotno,
		SUM(tfqty) AS tfqty,
		SUM(deliveryamount) deliveryamount,frcdate,
		rackno 
		FROM total_fab_received
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=total_fab_received.fabricreceivedid
		WHERE tfqty!='0'
		GROUP BY buyername,jobno,stylename,ordername,rackno,
		colorname,fabricpart,lotno
		ORDER BY frcdate DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function jobno_wise_fabric_received_list($jobno)
	{
		$query = "SELECT (total_fab_received.fabricreceivedid) AS fabricreceivedid,buyername,jobno,stylename,ordername,
		colorname,fabricpart,bqty,lotno,frqty,tfqty,deliveryamount,rackno FROM total_fab_received
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=total_fab_received.fabricreceivedid
		WHERE total_fab_received.jobno= '$jobno'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function jobno_wise_fabric_delivery_list($jobno)
	{
		$query = "SELECT (total_fab_received.fabricreceivedid) AS fabricreceivedid,buyername,jobno,stylename,ordername,
		colorname,fabricpart,bqty,bdia,lotno,frqty,tfqty,deliveryamount,rackno FROM total_fab_received
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=total_fab_received.fabricreceivedid
		WHERE total_fab_received.jobno='$jobno'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function buyer_wise_fabric_report($buyername)
	{
		$query = "SELECT fabric_order_wise_received_report.buyername,
					fabric_order_wise_received_report.stylename,
					fabric_order_wise_received_report.ordername,
					fabric_order_wise_received_report.colorname,fabric_order_wise_received_report.fabricpart,
					ltod,fabrictype,bqty,frqty,deliveryamount,total_fabric_return1.returnamount,otqty,tfqty 
					FROM fabric_order_wise_received_report
					LEFT JOIN fabric_order_wise_delivery_report 
					ON fabric_order_wise_delivery_report.ordername=fabric_order_wise_received_report.ordername AND 
					fabric_order_wise_delivery_report.colorname=fabric_order_wise_received_report.colorname AND
					fabric_order_wise_delivery_report.fabricpart=fabric_order_wise_received_report.fabricpart
					LEFT JOIN total_fabric_return1 ON total_fabric_return1.buyername=fabric_order_wise_received_report.buyername
					AND total_fabric_return1.jobno=fabric_order_wise_received_report.jobno
					AND total_fabric_return1.stylename=fabric_order_wise_received_report.stylename
					AND total_fabric_return1.ordername=fabric_order_wise_received_report.ordername
					AND total_fabric_return1.colorname=fabric_order_wise_received_report.colorname
					AND total_fabric_return1.fabricpart=fabric_order_wise_received_report.fabricpart
					WHERE fabric_order_wise_received_report.buyername= '$buyername'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function jobno_wise_fabric_report($jobno)
	{
		$query = "SELECT fabric_order_wise_received_report.buyername,fabric_order_wise_received_report.jobno,
					fabric_order_wise_received_report.stylename,
					fabric_order_wise_received_report.ordername,
					fabric_order_wise_received_report.colorname,fabric_order_wise_received_report.fabricpart,
					ltod,fabrictype,bqty,abqty,frqty,deliveryamount,total_fabric_return1.returnamount,otqty,tfqty 
					FROM fabric_order_wise_received_report
					LEFT JOIN fabric_order_wise_delivery_report 
					ON fabric_order_wise_delivery_report.ordername=fabric_order_wise_received_report.ordername AND 
					fabric_order_wise_delivery_report.colorname=fabric_order_wise_received_report.colorname AND
					fabric_order_wise_delivery_report.fabricpart=fabric_order_wise_received_report.fabricpart
					LEFT JOIN total_fabric_return1 ON total_fabric_return1.buyername=fabric_order_wise_received_report.buyername
					AND total_fabric_return1.jobno=fabric_order_wise_received_report.jobno
					AND total_fabric_return1.stylename=fabric_order_wise_received_report.stylename
					AND total_fabric_return1.ordername=fabric_order_wise_received_report.ordername
					AND total_fabric_return1.colorname=fabric_order_wise_received_report.colorname
					AND total_fabric_return1.fabricpart=fabric_order_wise_received_report.fabricpart
					WHERE fabric_order_wise_received_report.jobno= '$jobno'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function order_wise_fabric_report($ordername)
	{
		$query = "SELECT fabric_order_wise_received_report.buyername,
					fabric_order_wise_received_report.stylename,
					fabric_order_wise_received_report.ordername,
					fabric_order_wise_received_report.colorname,fabric_order_wise_received_report.fabricpart,
					ltod,fabrictype,bqty,frqty,deliveryamount,total_fabric_return1.returnamount,otqty,tfqty 
					FROM fabric_order_wise_received_report
					LEFT JOIN fabric_order_wise_delivery_report 
					ON fabric_order_wise_delivery_report.ordername=fabric_order_wise_received_report.ordername AND 
					fabric_order_wise_delivery_report.colorname=fabric_order_wise_received_report.colorname AND
					fabric_order_wise_delivery_report.fabricpart=fabric_order_wise_received_report.fabricpart
					LEFT JOIN total_fabric_return1 ON total_fabric_return1.buyername=fabric_order_wise_received_report.buyername
					AND total_fabric_return1.jobno=fabric_order_wise_received_report.jobno
					AND total_fabric_return1.stylename=fabric_order_wise_received_report.stylename
					AND total_fabric_return1.ordername=fabric_order_wise_received_report.ordername
					AND total_fabric_return1.colorname=fabric_order_wise_received_report.colorname
					AND total_fabric_return1.fabricpart=fabric_order_wise_received_report.fabricpart
					WHERE fabric_order_wise_received_report.ordername= '$ordername'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_delivery_type_list()
	{
		$query = "SELECT * FROM fabric_delivery_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_return_type_list()
	{
		$query = "SELECT * FROM fabric_return_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function fabric_delivery_insert($fabricreceivedid, $fabricideliverytypeid, $tfqty1, $amount, $challan, $dremarks, $ddate)
	{
		$ddate = date("Y-m-d", strtotime($ddate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			//$frcdate=$row['frcdate'];
			//			$challanno=$row['challanno'];
			//			$buyerid=$row['buyerid'];
			//			$jobnoid=$row['jobnoid'];
			//			$styleid=$row['styleid'];
			//			$orderid=$row['orderid'];
			//			$colorid=$row['colorid'];
			//			$lotno=$row['lotno'];
			//			$dia=$row['dia'];
			//$frqty=$row['frqty'];
			$tfqty = $row['tfqty'];
			//$racknoid1=$row['racknoid'];
			//			$frtypestatus=$row['frtypestatus'];
		}
		if ($tfqty1 >= $amount) {
			$tfqty = $tfqty - $amount;
			$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
			$this->db->query($sql2);

			$sql = "INSERT INTO fabric_delivery VALUES ('$ccid','$fabricreceivedid','$fabricideliverytypeid','$amount','$amount','$challan','$dremarks','$ddate','1')";
			$query = $this->db->query($sql);
			return $query;
		} else {
			return false;
		}
	}
	public function fabric_delivery_insert_all($data)
	{
		$data['ddate'] = date("Y-m-d", strtotime($data['ddate']));
		//$data['frcdate'] = date("Y-m-d", strtotime($data['frcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];

		$sql2 = "UPDATE fabric_received SET tfqty='$data[tfqty]' WHERE fabricreceivedid='$data[fabricreceivedid]'";
		$this->db->query($sql2);
		// echo $sql2="UPDATE  fabric_received
		//SET     tfqty = GREATEST(0, tfqty - $data[dqty])
		//WHERE   id = $data[fabricreceivedid]";
		//$this->db->query($sql2);

		$sql = "INSERT INTO fabric_delivery VALUES ('$ccid','$data[fabricreceivedid]','$data[fabricideliverytypeid]','$data[dqty]','$data[dqty]','$data[challan]','$data[dremarks]','$data[ddate]','1')";
		$query = $this->db->query($sql);
		//return $query;

		$sqld = "DELETE FROM fabric_delivery WHERE odeliveryamount='0' AND deliveryamount='0'";
		$this->db->query($sqld);
		return $query;
	}

	public function fabric_transfer_insert($fabricreceivedid, $tfqty1, $amount, $racknoid, $userid)
	{
		//$ddate = date("Y-m-d", strtotime($ddate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			$frcdate = $row['frcdate'];
			$challanno = $row['challanno'];
			$supplierid = $row['supplierid'];
			$buyerid = $row['buyerid'];
			$jobnoid = $row['jobnoid'];
			$styleid = $row['styleid'];
			$orderid = $row['orderid'];
			$colorid = $row['colorid'];
			$bookingtypeid = $row['bookingtypeid'];
			$lotno = $row['lotno'];
			$dia = $row['dia'];
			$fabricpartid = $row['fabricpartid'];
			$frqty = $row['frqty'];
			$tfqty = $row['tfqty'];
			$racknoid1 = $row['racknoid'];
			$frtypestatus = $row['frtypestatus'];
			$fabricreceivedstatus = $row['fabricreceivedstatus'];
		}
		if ($tfqty1 >= $amount) {
			if ($racknoid1 != $racknoid) {
				$tfqty = $tfqty - $amount;
				$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
				$this->db->query($sql2);

				$sql = "INSERT INTO fabric_received VALUES 	('$ccid','$frcdate','$challanno','$supplierid','$buyerid','$jobnoid','$styleid','$orderid','$colorid','$bookingtypeid','$lotno','$dia','$fabricpartid','','$amount','$racknoid','2','$userid','$fabricreceivedstatus')";
				$query = $this->db->query($sql);

				$sql = "INSERT INTO fabric_rack_transfer VALUES ('$ccid','$fabricreceivedid','$amount','$fabricreceivedstatus')";
				$query = $this->db->query($sql);

				return $query;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function lot_wise_fabric_report($buyerid, $jobno, $style, $orderno, $colorno)
	{
		$query = "SELECT buyername,jobno,stylename,ordername,colorcode,colorname,fabricpart,fabrictype,bqty,frqty,deliveryamount,
		otqty,returnamount,total_fab_delivery.fabricreceivedid,lotno FROM color
		
		JOIN fabric_received ON fabric_received.colorid=color.colorid
		LEFT JOIN total_fabric_return ON total_fabric_return.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=fabric_received.fabricreceivedid
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		LEFT JOIN total_fabric_order_transfer ON total_fabric_order_transfer.fabricreceivedid=fabric_received.fabricreceivedid
		WHERE color. buyerid= '$buyerid' AND color.jobnoid='$jobno' AND color.styleid='$style' AND color.orderid='$orderno' AND color.colorid='$colorno' AND frqty!='0'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function lot_wise_fabric_return_report()
	{
		$query = "SELECT buyername,jobno,stylename,ordername,colorcode,colorname,fabricpart,fabrictype,bqty,abqty,frqty,deliveryamount,
		otqty,returnamount,total_fab_delivery.fabricreceivedid,(fabric_received.fabricreceivedid) AS ffabricreceivedid,lotno,tfqty,texreturnamount FROM color
		
		JOIN fabric_received ON fabric_received.colorid=color.colorid
		LEFT JOIN total_fabric_return ON total_fabric_return.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fabric_return_to_textile ON total_fabric_return_to_textile.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=fabric_received.fabricreceivedid
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		LEFT JOIN total_fabric_order_transfer ON total_fabric_order_transfer.fabricreceivedid=fabric_received.fabricreceivedid
		WHERE fabric_received.fabricreceivedstatus='1'
		";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function lot_wise_fabric_details_report()
	{
		$query = "SELECT * FROM lot_wise_details_report_view ORDER BY buyername
		";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function rack_wise_fabric_current_report()
	{
		$query = "SELECT DATEDIFF(ltod,CURDATE()) AS remainingday,rackno,buyername,jobno,stylename,ordername,colorcode,colorname,fabricpart,fabrictype,bqty,abqty,frqty,tfqty,deliveryamount,
		cdeliveryamount,
tdeliveryamount,
sdeliveryamount,trtamount,
		otqty,returnamount,total_fab_delivery.fabricreceivedid,lotno,ltod,toreceive,texreturnamount
		 FROM color
		
		JOIN fabric_received ON fabric_received.colorid=color.colorid
		LEFT JOIN total_fabric_return ON total_fabric_return.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fabric_return_to_textile ON total_fabric_return_to_textile.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_delivery ON total_fab_delivery.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_delivery_cutting ON total_fab_delivery_cutting.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_delivery_tcutting ON total_fab_delivery_tcutting.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_delivery_sample ON total_fab_delivery_sample.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fab_order_transfer_receive ON total_fab_order_transfer_receive.fabricreceivedid=fabric_received.fabricreceivedid
		JOIN jobno ON jobno.jobnoid=color.jobnoid
		JOIN style ON style.styleid=color.styleid
		JOIN border ON border.orderid=color.orderid
		JOIN buyer ON buyer.buyerid=color.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		LEFT JOIN total_fabric_rack_transfer ON total_fabric_rack_transfer.fabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN total_fabric_order_transfer ON total_fabric_order_transfer.fabricreceivedid=fabric_received.fabricreceivedid
		WHERE jobnostatus='1' AND fabricreceivedstatus='1' AND tfqty!='0'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_current_report()
	{
		$query = "SELECT * FROM fabric_order_wise_received_report1
WHERE jobnostatus='1' AND fabricreceivedstatus='1' AND tfqty!='0' OR returnamount!='0' OR texreturnamount!='0'
ORDER BY buyername ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_details_report()
	{
		//$query = "SELECT * FROM fabric_details_report_view WHERE tfqty!='0' OR returnamount!='0' OR texreturnamount!='0'";
		$query = "SELECT * FROM fabric_details_report_view";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function fabric_receive_list_up($fabricreceivedid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT * FROM fabric_received
		JOIN color ON color.colorid=fabric_received.colorid
		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		LEFT JOIN supplier_view ON supplier_view.supplierid=fabric_received.supplierid
		WHERE fabricreceivedid='$fabricreceivedid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_receive_lup($fabricreceivedid, $frcdate, $frqty, $challanno, $supplierid, $lotno, $dia, $userid)
	{
		$frcdate = date("Y-m-d", strtotime($frcdate));
		//$sql = "SELECT * FROM fabric_delivery WHERE fabricreceivedid='$fabricreceivedid'";
		//		$query = $this->db->query($sql);
		//if ($query->num_rows() == 1) {
		//			$sql = "UPDATE fabric_received SET frcdate='$frcdate',challanno='$challanno',lotno='$lotno',dia='$dia' WHERE fabricreceivedid='$fabricreceivedid'";
		//		return $query = $this->db->query($sql);
		//		} 
		//		else {
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;


		$sql = "UPDATE fabric_received SET frcdate='$frcdate',challanno='$challanno',supplierid='$supplierid',lotno='$lotno',dia='$dia',frqty='$frqty',tfqty='$frqty' WHERE fabricreceivedid='$fabricreceivedid'";


		$sql1 = "INSERT INTO fabric_received_update_log VALUES ('$ccid','$fabricreceivedid','$challanno','$supplierid','$lotno','$dia','$frqty','$frqty','$userid',CURDATE(),CURTIME())";
		$query1 = $this->db->query($sql1);

		return $query = $this->db->query($sql);
		//}
	}

	public function fabric_transfer_list_up($fabricreceivedid)
	{
		$query = "SELECT fabricreceivedid,tfqty FROM fabric_received
		WHERE fabricreceivedid='$fabricreceivedid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function fabric_transfer_lup($fabricreceivedid, $tfqty, $userid)
	{
		$sql = "UPDATE fabric_received SET tfqty='$tfqty',userid='$userid' WHERE fabricreceivedid='$fabricreceivedid'";
		return $query = $this->db->query($sql);
	}



	//////////////////////////////////FABRIC RETURN/////////////////////////////////////////////	

	public function fabric_cutting_return_to_store()
	{
		$query = "SELECT fabric_received.fabricreceivedid,fabric_delivery.fabricdeliveryid,buyername,jobno,stylename,ordername,colorcode,colorname,fabrictype,
		gsm,dia,fabricpart,bqty,odeliveryamount,deliveryamount,returnamount,rackno,lotno,ddate,deliverychallanno
		FROM fabric_delivery 
JOIN fabric_received ON fabric_received.fabricreceivedid=fabric_delivery.fabricreceivedid
		JOIN color ON color.colorid=fabric_received.colorid
		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		LEFT JOIN total_fabric_return ON total_fabric_return.fabricdeliveryid=fabric_delivery.fabricdeliveryid
		
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		WHERE fabricreceivedstatus='1'
		GROUP BY fabric_received.buyerid,fabric_received.jobnoid,fabric_received.styleid,
		fabric_received.orderid,color.colorid,fabric_part.fabricpartid,fabric_received.lotno,
		fabric_received.racknoid,fabric_received.fabricreceivedid,fabric_delivery.fabricdeliveryid
		ORDER BY ddate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_cutting_return_to_store_insert($fabricreceivedid, $fabricdeliveryid, $amount, $challan, $rdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$rdate = date("Y-m-d", strtotime($rdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			$tfqty = $row['tfqty'];
		}

		$sql11 = "SELECT * FROM fabric_delivery WHERE fabricdeliveryid='$fabricdeliveryid'";
		$query11 = $this->db->query($sql11);
		$query11 = $query11->result_array();
		foreach ($query11 as $row) {
			$fabricdeliveryid = $row['fabricdeliveryid'];
			$deliveryamount = $row['deliveryamount'];
		}

		$tfqty = $tfqty + $amount;
		$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
		$this->db->query($sql2);

		$deliveryamount = $deliveryamount - $amount;
		$sql22 = "UPDATE fabric_delivery SET deliveryamount='$deliveryamount' WHERE fabricdeliveryid='$fabricdeliveryid'";
		$this->db->query($sql22);

		$sql = "INSERT INTO fabric_return VALUES ('$ccid','$fabricreceivedid','$fabricdeliveryid','$amount','$challan','$rdate','1')";
		$query = $this->db->query($sql);
		return $query;
	}

	public function fabric_cutting_return_to_textile()
	{

		$query = "SELECT * FROM fabric_delivery 
JOIN fabric_received ON fabric_received.fabricreceivedid=fabric_delivery.fabricreceivedid
		JOIN color ON color.colorid=fabric_received.colorid
		JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		WHERE fabricreceivedstatus='1'
		ORDER BY ddate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function fabric_cutting_return_to_textile_insert($fabricreceivedid, $amount, $challan, $rdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$rdate = date("Y-m-d", strtotime($rdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			$tfqty = $row['tfqty'];
		}

		//$tfqty=$tfqty+$amount;
		//		$sql2="UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
		//		$this->db->query($sql2);

		$sql = "INSERT INTO fabric_return_to_textile VALUES ('$ccid','$fabricreceivedid','202303201519050','$amount','$challan','$rdate','1')";
		$query = $this->db->query($sql);
		return $query;
	}

	public function fabric_store_return_to_textile()
	{
		$query = "SELECT fabric_received.fabricreceivedid,frcdate,challanno,supplier,buyername,
		jobno,stylename,ordername,colorcode,colorname,fabrictype,gsm,lotno,dia,fabricpart,bqty,
		frqty,texreturnamount,tfqty,rackno
		 FROM fabric_received
		JOIN color ON color.colorid=fabric_received.colorid
		LEFT JOIN rackno ON rackno.racknoid=fabric_received.racknoid
		LEFT JOIN total_fabric_return_to_textile ON total_fabric_return_to_textile.fabricreceivedid=fabric_received.fabricreceivedid
		
		JOIN border ON border.orderid=fabric_received.orderid
		JOIN jobno ON jobno.jobnoid=fabric_received.jobnoid
		JOIN style ON style.styleid=fabric_received.styleid
		JOIN buyer ON buyer.buyerid=fabric_received.buyerid
		JOIN fabric_part ON fabric_part.fabricpartid=fabric_received.fabricpartid
		JOIN color_wise_fabric_part ON color_wise_fabric_part.colorid=color.colorid
		AND fabric_part.fabricpartid=color_wise_fabric_part.fabricpartid
		JOIN fabric_type ON fabric_type.fabrictypeid=color_wise_fabric_part.fabrictypeid
		JOIN product_uom_insert ON product_uom_insert.puomid=color_wise_fabric_part.puomid
		LEFT JOIN fab_delivery_dis_id ON fab_delivery_dis_id.dfabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN fabric_rack_transfer_dis_id ON fabric_rack_transfer_dis_id.rtfabricreceivedid=fabric_received.fabricreceivedid
		LEFT JOIN supplier_view ON supplier_view.supplierid=fabric_received.supplierid
		WHERE fabricreceivedstatus='1'
		
		ORDER BY frcdate ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function fabric_store_return_to_textile_insert($fabricreceivedid, $amount, $challan, $rdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$rdate = date("Y-m-d", strtotime($rdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			$tfqty = $row['tfqty'];
		}

		$tfqty = $tfqty - $amount;
		$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
		$this->db->query($sql2);

		$sql = "INSERT INTO fabric_return_to_textile VALUES ('$ccid','$fabricreceivedid','202303201519051','$amount','$challan','$rdate','1')";
		$query = $this->db->query($sql);
		return $query;
	}

	public function fabric_return_insert($fabricreceivedid, $dqty, $reqty, $amount, $challan, $rdate)
	{
		date_default_timezone_set('Asia/Dhaka');
		$rdate = date("Y-m-d", strtotime($rdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			//$frcdate=$row['frcdate'];
			//			$challanno=$row['challanno'];
			//			$buyerid=$row['buyerid'];
			//			$jobnoid=$row['jobnoid'];
			//			$styleid=$row['styleid'];
			//			$orderid=$row['orderid'];
			//			$colorid=$row['colorid'];
			//			$lotno=$row['lotno'];
			//			$dia=$row['dia'];
			//$frqty=$row['frqty'];
			$tfqty = $row['tfqty'];
			//$racknoid1=$row['racknoid'];
			//			$frtypestatus=$row['frtypestatus'];
		}
		if (($dqty) >= ($amount + $reqty)) {
			$tfqty = $tfqty + $amount;
			$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
			$this->db->query($sql2);

			//$sql = "INSERT INTO fabric_return VALUES ('$ccid','$fabricreceivedid','$fabricideliverytypeid','$amount','$challan','$rdate','1')";
			$sql = "INSERT INTO fabric_return VALUES ('$ccid','$fabricreceivedid','$amount','$challan','$rdate','1')";
			$query = $this->db->query($sql);
			return $query;
		} else {
			return false;
		}
	}

	public function fabric_return_to_textile_insert($fabricreceivedid, $freturntypeid, $dqty, $reqty, $amount, $challan, $rdate)
	{
		$rdate = date("Y-m-d", strtotime($rdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			//$frcdate=$row['frcdate'];
			//			$challanno=$row['challanno'];
			//			$buyerid=$row['buyerid'];
			//			$jobnoid=$row['jobnoid'];
			//			$styleid=$row['styleid'];
			//			$orderid=$row['orderid'];
			//			$colorid=$row['colorid'];
			//			$lotno=$row['lotno'];
			//			$dia=$row['dia'];
			//$frqty=$row['frqty'];
			$tfqty = $row['tfqty'];
			//$racknoid1=$row['racknoid'];
			//			$frtypestatus=$row['frtypestatus'];
		}
		if ($freturntypeid == '202303201519051') {
			$tfqty = $tfqty - $amount;
			$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
			$this->db->query($sql2);
		}

		$sql = "INSERT INTO fabric_return_to_textile VALUES ('$ccid','$fabricreceivedid','$freturntypeid','$amount','$challan','$rdate','1')";
		$query = $this->db->query($sql);
		return $query;
		//}
		//else
		//{
		//return false;
		//}
	}

	//////////////////////////////////FABRIC ORDER TRANSFER/////////////////////////////////////////////	

	public function fabric_order_transfer_insert($frcdate, $fabricreceivedid, $rem, $buyerid, $jobno, $style, $orderno, $colorno, $rqty, $racknoid, $userid)
	{
		$frcdate = date("Y-m-d", strtotime($frcdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$sql1 = "SELECT * FROM fabric_received WHERE fabricreceivedid='$fabricreceivedid'";
		$query1 = $this->db->query($sql1);
		$query1 = $query1->result_array();
		foreach ($query1 as $row) {
			$fabricreceivedid = $row['fabricreceivedid'];
			//$frcdate=$row['frcdate'];
			$challanno = $row['challanno'];
			$supplierid = $row['supplierid'];
			$rbuyerid = $row['buyerid'];
			$rjobnoid = $row['jobnoid'];
			$rstyleid = $row['styleid'];
			$rorderid = $row['orderid'];
			$rcolorid = $row['colorid'];
			$bookingtypeid = $row['bookingtypeid'];
			$rlotno = $row['lotno'];
			$dia = $row['dia'];
			$fabricpartid = $row['fabricpartid'];
			//$frqty=$row['frqty'];
			$tfqty = $row['tfqty'];
			$fabricreceivedstatus = $row['fabricreceivedstatus'];
			//$racknoid1=$row['racknoid'];
			//			$frtypestatus=$row['frtypestatus'];
		}

		$tfqty = $tfqty - $rqty;
		$sql2 = "UPDATE fabric_received SET tfqty='$tfqty' WHERE fabricreceivedid='$fabricreceivedid'";
		$this->db->query($sql2);

		$sql = "INSERT INTO fabric_received VALUES ('$ccid','$frcdate','$challanno','$supplierid','$buyerid','$jobno','$style','$orderno','$colorno','$bookingtypeid','$rlotno','$dia','$fabricpartid','0','$rqty','$racknoid','3','$userid','$fabricreceivedstatus')";
		$query = $this->db->query($sql);

		$sql1 = "INSERT INTO fabric_order_transfer VALUES ('$ccid','$fabricreceivedid','$rqty','$frcdate','$fabricreceivedstatus')";
		$query1 = $this->db->query($sql1);
		return $query1;
	}

	//////////////////////////////////////ORDER WISE CHALLAN//////////////////////////

	public function order_wise_challan_create_form($colorid)
	{
		// $query = "SELECT * FROM color 
		// JOIN border ON border.orderid=color.orderid
		// JOIN jobno ON jobno.jobnoid=color.jobnoid
		// JOIN style ON style.styleid=color.styleid
		// JOIN buyer ON buyer.buyerid=color.buyerid
		// WHERE border.orderid='$orderid'";
		// $result = $this->db->query($query);
		// return $result->result_array();

		$query = "SELECT * FROM gsize 
		JOIN color ON color.colorid=gsize.colorid
		JOIN border ON border.orderid=gsize.orderid
		JOIN style ON style.styleid=gsize.styleid
		JOIN jobno ON jobno.jobnoid=gsize.jobnoid
		JOIN buyer ON buyer.buyerid=gsize.buyerid
		WHERE color.colorid='$colorid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function order_wise_challan_create($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');

		// $data['crcdate'] = date("Y-m-d", strtotime($data['crcdate']));
		// $fmy=strtotime($data['crcdate']);
		// $month=date("F",$fmy);
		// $year=date("Y",$fmy);
		// $d = date('Y-m-d');
		// $t = date("H:i:s");
		// $d1 = str_replace("-", "", $d);
		// $t1 = str_replace(":", "", $t);
		// $ccid = $d1 . $t1;
		// $ccid1 = $ccid . $data['i'];
		//echo $sql = "INSERT INTO challanm1_insert VALUES ('$data[ccid]','$data[sfactory]','$data[challanno]','$data[ptid]','$data[ctid]','$data[dfactory]','$data[buyerid]','$data[jobno]','$data[style]','$data[orderno]','$data[userid]','$data[crcdate]','$month','$year',CURDATE(),CURTIME(),'','','1')";
		//$query = $this->db->query($sql);
		// echo "<br/>";
		// echo "<br/>";
		// echo "<br/>";
		// $sql1 = "INSERT INTO challanm2_insert VALUES ('$data[ccid1]','$data[ccid]','$data[colorno]','$data[sizeid]','$data[gpid]','$data[rqty]','','$data[puomid]','$data[bag]','$data[sremarks]','','1')";
		$sql1 = "INSERT INTO challanm2_insert VALUES ('$data[ccid1]','$data[ccid]','$data[colorno]','$data[sizeid]','$data[gpid]','$data[rqty]','','$data[puomid]','','$data[sremarks]','','1')";
		$query1 = $this->db->query($sql1);
		// echo "<br/>";
		// echo "<br/>";
		// echo "<br/>";
		// $sqld = "DELETE FROM challanm2_insert WHERE sqty='0' AND chmid1='$data[ccid]'";
		// $queryd = $this->db->query($sqld);
		return $query1;
		// echo "<br/>";
		// echo "<br/>";
		// echo "<br/>";
	}
	public function date_wise_challan_list($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM challanm1_insert
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND (sfactoryid='$factoryid' OR dfactoryid='$factoryid') AND jobnostatus='1'
		ORDER BY chmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_challan_status($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM challanm1_insert
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND (sfactoryid='$factoryid' OR dfactoryid='$factoryid')
		ORDER BY challanm1_insert.chmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_challan_sent_status($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM challanm1_insert
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN gsize ON gsize.sizeid=challanm2_insert.sizeid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND sfactoryid='$factoryid'
		ORDER BY challanm1_insert.chmid,color.colorid,gsize.sizename DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_challan_recv_status($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM challanm1_insert
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN gsize ON gsize.sizeid=challanm2_insert.sizeid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND dfactoryid='$factoryid'
		ORDER BY challanm1_insert.chmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_pending_list($factoryid)
	{
		// $query = "SELECT * FROM challanm1_insert
		// JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		// JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		// JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		// JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		// JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		// JOIN style ON style.styleid=challanm1_insert.styleid
		// JOIN border ON border.orderid=challanm1_insert.orderid
		// JOIN color ON color.colorid=challanm2_insert.colorid
		// LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		// LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		// WHERE (sfactoryid='$factoryid' OR dfactoryid='$factoryid') AND (status='1' OR status='2') 
		// GROUP BY chmid ORDER BY chmid DESC";
		// $result = $this->db->query($query);
		// return $result->result_array();

		$query = "SELECT * FROM challanm1_insert
		
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		
		WHERE (sfactoryid='$factoryid' OR dfactoryid='$factoryid') AND (status='1' OR status='2') AND jobnostatus='1'
		GROUP BY chmid ORDER BY chmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_pending_list_out_count($factoryid)
	{
		$query = "SELECT COUNT(sfactoryid) AS opending FROM challanm1_insert
		WHERE sfactoryid='$factoryid' AND status='1' AND challanm1status='1'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_pending_list_in_count($factoryid)
	{
		$query = "SELECT COUNT(sfactoryid) AS ipending FROM challanm1_insert
		WHERE dfactoryid='$factoryid' AND status='2' AND challanm1status='1'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_challanm_sapproved($chmid,$factoryid)
	{
		$sql = "UPDATE challanm1_insert SET status='2' WHERE sfactoryid='$factoryid' AND challanm1status='1' AND chmid='$chmid' LIMIT 1";
		$this->db->query($sql);
	}

	public function factory_challanm_receive_form($chmid)
	{
		$query = "SELECT  chmid2,crcdate,dfactoryid,challanno,buyername,jobno,stylename,ordername,colorname,
		sizename,productiontype,garmentspart,challanm2_insert.sqty,challanm2_insert.rqty,puom,bag,rremarks 
		FROM challanm1_insert
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN gsize ON gsize.sizeid=challanm2_insert.sizeid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		WHERE chmid1='$chmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challanm_receive($data)
	{
		//$sql = "UPDATE challanm1_insert SET status='3',rdate=CURDATE(),rtime=CURTIME() WHERE chmid='$data[chmid]'";
		//$this->db->query($sql);
		//echo "<br/>";

		$sql2 = "UPDATE challanm2_insert SET rqty='$data[rqty]',rremarks='$data[rremarks]' WHERE challanm2status='1' AND chmid1='$data[chmid]' AND chmid2='$data[chmid2]'";
		return $query2 = $this->db->query($sql2);
		//echo "<br/>";
	}
	public function challanm_details_form_c1($chmid)
	{
		$query = "SELECT challanno,crcdate,production_type.ptid,
		productiontype,challan_type.ctid,challantype,sbag,sfactoryid,dfactoryid
		 FROM challanm1_insert
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		WHERE chmid='$chmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challanm_details_sfactory($chmid)
	{
		$query = "SELECT factoryname,factory_address FROM challanm1_insert
		JOIN factory ON factory.factoryid=challanm1_insert.sfactoryid
		WHERE chmid='$chmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challanm_details_dfactory($chmid)
	{
		$query = "SELECT factoryname,factory_address FROM challanm1_insert
		JOIN factory ON factory.factoryid=challanm1_insert.dfactoryid
		WHERE chmid='$chmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challanm_details_form($chmid)
	{
		$query = "SELECT * FROM challanm1_insert
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN gsize ON gsize.sizeid=challanm2_insert.sizeid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		WHERE chmid1='$chmid' AND challanm1_insert.status='1'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challanm_details_edit($data)
	{
		//date_default_timezone_set('Asia/Dhaka');
		//		
		//		$data['crcdate'] = date("Y-m-d", strtotime($data['crcdate']));
		//		$fmy=strtotime($data['crcdate']);
		//		$month=date("F",$fmy);
		//		$year=date("Y",$fmy);
		//		$d = date('Y-m-d');
		//		$t = date("H:i:s");
		//		$d1 = str_replace("-", "", $d);
		//		$t1 = str_replace(":", "", $t);
		//		$ccid = $d1 . $t1;
		//		$ccid1 = $ccid . $data['i'];
		$sql = "UPDATE challanm1_insert SET challanno='$data[challanno]',ptid='$data[ptid]',ctid='$data[ctid]',sbag='$data[sbag]',dfactoryid='$data[dfactory]' WHERE chmid='$data[chmid]'";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE challanm2_insert SET gpid='$data[gpid]',sqty='$data[rqty]',puomid='$data[puomid]',sremarks='$data[sremarks]' WHERE chmid2='$data[chmid2]'";
		$query1 = $this->db->query($sql1);


		$sqld = "DELETE FROM challanm2_insert WHERE sqty='0'";
		$queryd = $this->db->query($sqld);
		return $query;
	}
	public function challanm_details($chmid)
	{
		$query = "SELECT buyername,jobno,stylename,ordername,colorname,sizename,garmentspart,
		challanm2_insert.sqty,challanm2_insert.rqty,puom,bag,sremarks,rremarks 
		FROM challanm1_insert
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN gsize ON gsize.sizeid=challanm2_insert.sizeid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		WHERE chmid1='$chmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function challanm_print($chmid)
	{
		$query = "SELECT buyername,jobno,stylename,ordername,colorname,sizename,garmentspart,
		sqty,puom,bag,sremarks 
		FROM challanm1_insert
		JOIN factory ON factory.factoryid=challanm1_insert.sfactoryid
		JOIN challanm2_insert ON challanm1_insert.chmid=challanm2_insert.chmid1
		JOIN challan_type ON challan_type.ctid=challanm1_insert.ctid
		JOIN production_type ON production_type.ptid=challanm1_insert.ptid
		JOIN buyer ON buyer.buyerid=challanm1_insert.buyerid
		JOIN jobno ON jobno.jobnoid=challanm1_insert.jobnoid
		JOIN style ON style.styleid=challanm1_insert.styleid
		LEFT JOIN gsize ON gsize.sizeid=challanm2_insert.sizeid
		JOIN border ON border.orderid=challanm1_insert.orderid
		JOIN color ON color.colorid=challanm2_insert.colorid
		LEFT JOIN garments_part ON garments_part.gpid=challanm2_insert.gpid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=challanm2_insert.puomid
		
		WHERE chmid='$chmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}

					//////////////// NON PO WISE CHALLAN ////////////////////////

	public function non_po_product_category_insert($nppcname)
	{

		$sql = "SELECT * FROM non_po_product_category WHERE nppcname='$nppcname'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
		$sql1 = "INSERT INTO non_po_product_category VALUES ('','$nppcname')";
		$query1 = $this->db->query($sql1);
		return $query1;
		}
	}
	
	public function non_po_product_category()
	{
		$query = "SELECT * FROM non_po_product_category ORDER BY nppcname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po__wise_challan_create($data)
	{

		$sql1 = "INSERT INTO non_po_challanm2_insert VALUES ('$data[ccid1]','$data[ccid]','$data[nppcname]','$data[pname]','$data[pqty]','','$data[puom]','$data[challantype]','$data[remarks]','','1')";
		$query1 = $this->db->query($sql1);
		return $query1;
	}
	public function date_wise_non_po_challan_list($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM non_po_challanm1_insert
		
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND sfactoryid='$factoryid' AND non_po_challanm1status='1'
		ORDER BY nonpochmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_details_form_c1($nonpochmid)
	{
		$query = "SELECT * FROM non_po_challanm1_insert
		JOIN department ON department.deptid=non_po_challanm1_insert.deptid
		JOIN designation ON designation.desigid=non_po_challanm1_insert.desigid
		WHERE nonpochmid='$nonpochmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_details($nonpochmid)
	{
		$query = "SELECT nppcname,pname,spqty,rpqty,puom,challantype,
		non_po_challanm2_insert.puomid,non_po_challanm2_insert.ctid,non_po_challanm2_insert.nppcid,
		sremarks,rremarks,nonpochmid2 
		FROM non_po_challanm1_insert
		JOIN non_po_challanm2_insert ON non_po_challanm1_insert.nonpochmid=non_po_challanm2_insert.nonpochmid1
		JOIN challan_type ON challan_type.ctid=non_po_challanm2_insert.ctid
		LEFT JOIN non_po_product_category ON non_po_product_category.nppcid=non_po_challanm2_insert.nppcid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=non_po_challanm2_insert.puomid
		WHERE nonpochmid1='$nonpochmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_details_edit($data)
	{
		$sql = "UPDATE non_po_challanm1_insert SET challanno='$data[challanno]',deptid='$data[deptid]',desigid='$data[desigid]',user='$data[username]',dfactoryid='$data[dfactory]' WHERE nonpochmid='$data[nonpochmid]'";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE non_po_challanm2_insert SET nppcid='$data[nppcid]',pname='$data[pname]',spqty='$data[spqty]',puomid='$data[puomid]',ctid='$data[ctid]',sremarks='$data[sremarks]' WHERE nonpochmid2='$data[nonpochmid2]'";
		$query1 = $this->db->query($sql1);

		$sqld = "DELETE FROM non_po_challanm2_insert WHERE spqty='0'";
		$queryd = $this->db->query($sqld);
		return $query;
	}
	public function non_po_factory_challanm_pending_list_out_count($factoryid)
	{
		$query = "SELECT COUNT(sfactoryid) AS nonpoopending FROM non_po_challanm1_insert
		WHERE sfactoryid='$factoryid' AND status='1'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_factory_challanm_pending_list_in_count($factoryid)
	{
		$query = "SELECT COUNT(sfactoryid) AS nonpoipending FROM non_po_challanm1_insert
		WHERE dfactoryid='$factoryid' AND status='2'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_factory_challanm_pending_list($factoryid)
	{
		$query = "SELECT * FROM non_po_challanm1_insert
		WHERE (sfactoryid='$factoryid' OR dfactoryid='$factoryid') AND (status='1' OR status='2') 
		ORDER BY nonpochmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_factory_challanm_sapproved($nonpochmid)
	{
		$sql = "UPDATE non_po_challanm1_insert SET status='2' WHERE nonpochmid='$nonpochmid'";
		$this->db->query($sql);
	}
	public function non_po_factory_challanm_receive_form($nonpochmid)
	{
		$query = "SELECT nppcname,pname,spqty,rpqty,puom,challantype,crcdate,dfactoryid,challanno,
		non_po_challanm2_insert.puomid,non_po_challanm2_insert.ctid,non_po_challanm2_insert.nppcid,
		sremarks,rremarks,nonpochmid2 
		FROM non_po_challanm1_insert
		JOIN non_po_challanm2_insert ON non_po_challanm1_insert.nonpochmid=non_po_challanm2_insert.nonpochmid1
		JOIN challan_type ON challan_type.ctid=non_po_challanm2_insert.ctid
		LEFT JOIN non_po_product_category ON non_po_product_category.nppcid=non_po_challanm2_insert.nppcid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=non_po_challanm2_insert.puomid
		WHERE nonpochmid1='$nonpochmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_receive($data)
	{
		$sql = "UPDATE non_po_challanm1_insert SET status='3',rdate=CURDATE(),rtime=CURTIME() WHERE nonpochmid='$data[nonpochmid]'";
		$this->db->query($sql);

		$sql2 = "UPDATE non_po_challanm2_insert SET rpqty='$data[rpqty]',rremarks='$data[rremarks]' WHERE nonpochmid2='$data[nonpochmid2]'";
		return $query2 = $this->db->query($sql2);
	}
	public function date_wise_non_po_challan_sent_status($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM non_po_challanm1_insert
		JOIN non_po_challanm2_insert ON non_po_challanm1_insert.nonpochmid=non_po_challanm2_insert.nonpochmid1
		JOIN challan_type ON challan_type.ctid=non_po_challanm2_insert.ctid
		LEFT JOIN non_po_product_category ON non_po_product_category.nppcid=non_po_challanm2_insert.nppcid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=non_po_challanm2_insert.puomid
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND sfactoryid='$factoryid'
		ORDER BY non_po_challanm1_insert.nonpochmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_non_po_challan_recv_status($pd, $wd, $factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));

		$query = "SELECT * FROM non_po_challanm1_insert
		JOIN non_po_challanm2_insert ON non_po_challanm1_insert.nonpochmid=non_po_challanm2_insert.nonpochmid1
		JOIN challan_type ON challan_type.ctid=non_po_challanm2_insert.ctid
		LEFT JOIN non_po_product_category ON non_po_product_category.nppcid=non_po_challanm2_insert.nppcid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=non_po_challanm2_insert.puomid
		WHERE crcdate BETWEEN '$pd' AND '$wd' AND dfactoryid='$factoryid'
		ORDER BY non_po_challanm1_insert.nonpochmid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_details_sfactory($nonpochmid)
	{
		$query = "SELECT factoryname,factory_address FROM non_po_challanm1_insert
		JOIN factory ON factory.factoryid=non_po_challanm1_insert.sfactoryid
		WHERE nonpochmid='$nonpochmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_details_dfactory($nonpochmid)
	{
		$query = "SELECT factoryname,factory_address FROM non_po_challanm1_insert
		JOIN factory ON factory.factoryid=non_po_challanm1_insert.dfactoryid
		WHERE nonpochmid='$nonpochmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function non_po_challanm_print($nonpochmid)
	{
		$query = "SELECT nppcname,pname,spqty,rpqty,puom,challantype,
		non_po_challanm2_insert.puomid,non_po_challanm2_insert.ctid,non_po_challanm2_insert.nppcid,
		sremarks,rremarks,nonpochmid2 
		FROM non_po_challanm1_insert
		JOIN non_po_challanm2_insert ON non_po_challanm1_insert.nonpochmid=non_po_challanm2_insert.nonpochmid1
		JOIN challan_type ON challan_type.ctid=non_po_challanm2_insert.ctid
		LEFT JOIN non_po_product_category ON non_po_product_category.nppcid=non_po_challanm2_insert.nppcid
		LEFT JOIN product_uom_insert ON product_uom_insert.puomid=non_po_challanm2_insert.puomid
		
		WHERE nonpochmid='$nonpochmid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
}
