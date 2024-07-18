<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//require 'PHPMailer/PHPMailer.php';

class Home extends CI_Controller {

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
	
	
	/////////////////////////////////////////////////////////////COMMON LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function send(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		//$mail->addAddress('akbar@babylon-bd.com');
		$mail->addAddress('sultan@babylon-bd.com');
		$mail->addAddress('apuhrd@babylon-bd.com');
		//$mail->addAddress('mahmudhrd@babylon-bd.com');
		$mail->addAddress('arifhrd@babylon-bd.com');
		$mail->addAddress('mostafiz@babylon-bd.com');
		$mail->addAddress('parvezhrd@babylon-bd.com');
		$mail->addAddress('simulnath@babylon-bd.com');
		$mail->addAddress('arifkhan@babylon-bd.com');
		$mail->addAddress('jahangir@babylon-bd.com');
		$mail->addAddress('sohelrana@babylon-bd.com');
		$mail->addAddress('zakir@babylon-bd.com');
		$mail->addAddress('anasul@babylon-bd.com');
		$mail->addAddress('atladmin@babylon-bd.com');
		//$mail->addAddress('azhar@babylon-bd.com');
		$mail->addAddress('masud@babylon-bd.com');
		$mail->addAddress('ferdous@babylon-bd.com');
		$mail->addAddress('manjurulems@babylon-bd.com');
		$mail->addAddress('rumana@babylon-bd.com');
		$mail->addAddress('firesafety@babylon-bd.com');
        //$mail->addAddress('arifhrd@babylon-bd.com');
		//$mail->addAddress('mamunhrd@babylon-bd.com');
//		//$mail->addAddress('ranahrd@babylon-bd.com');
//		$mail->addAddress('arifulhrd@babylon-bd.com');
//		$mail->addAddress('almamunhrd@babylon-bd.com');
//		$mail->addAddress('julfikar@babylon-bd.com');
//		$mail->addAddress('atlhrd@babylon-bd.com');
//		$mail->addAddress('sohelhrd@babylon-bd.com');
//		$mail->addAddress('arefeen@babylon-bd.com');
//		$mail->addAddress('bclcompliance@babylon-bd.com');
//		$mail->addAddress('tanvirhussain@babylon-bd.com');
//		$mail->addAddress('kazisumon@babylon-bd.com');
//		$mail->addAddress('tanikbtlhrd@babylon-bd.com');
//		$mail->addAddress('arifacc@babylon-bd.com');
//		$mail->addAddress('bplhrd@babylon-bd.com');
//		$mail->addAddress('jelhrd@babylon-bd.com');
//		$mail->addAddress('trendzhrd@babylon-bd.com');
//		$mail->addAddress('mostafiz@babylon-bd.com');
//		$mail->addAddress('atladmin@babylon-bd.com');
//		$mail->addAddress('masud@babylon-bd.com');
//		$mail->addAddress('simulnath@babylon-bd.com');
//		$mail->addAddress('azhar@babylon-bd.com');
        
        // Add cc or bcc 
        //$mail->addCC('akbar@babylon-bd.com');
//		$mail->addCC('apuhrd@babylon-bd.com');
//		$mail->addCC('mahmudhrd@babylon-bd.com');
//		$mail->addCC('arifhrd@babylon-bd.com');
//		$mail->addCC('parvezhrd@babylon-bd.com');
//		$mail->addCC('mshahedhrd@babylon-bd.com');
//		$mail->addCC('jahangir@babylon-bd.com');
//		$mail->addCC('arifkhan@babylon-bd.com');
//		$mail->addCC('anasul@babylon-bd.com ');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE status!='0' ";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////BGL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbgl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('mamunhrd@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('kadir@babylon-bd.com');
		$mail->addCC('maksudahrd@babylon-bd.com');
		$mail->addCC('bglhrdwf@babylon-bd.com');
		$mail->addCC('bglhrd1@babylon-bd.com');
		$mail->addCC('bglhrd3@babylon-bd.com');
		$mail->addCC('bglhrd2@babylon-bd.com');
		$mail->addCC('bglhrd4@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BGL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////TRENDZ LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendtnz(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('trendzhrd@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('malam@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='TNZ' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////AKL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendakl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('arifulhrd@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('almamunhrd@babylon-bd.com');
		$mail->addCC('fakaruddin@babylon-bd.com');
		$mail->addCC('mofazzal@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='AKL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	
	/////////////////////////////////////////////////////////////ATL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendatl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('atlhrd@babylon-bd.com');
		$mail->addAddress('sohelhrd@babylon-bd.com');
		$mail->addAddress('atlhrac@babylon-bd.com');
        
        
        // Add cc or bcc 
        $mail->addCC('khoshruahmed@babylon-bd.com');
		$mail->addCC('asraful@babylon-bd.com');
		$mail->addCC('debabrata@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='ATL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////BWL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbwl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('julfikar@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('sajahangir@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BWL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////BCL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbcl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('arefeen@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('firozhasan@babylon-bd.com');
		$mail->addCC('bclcompliance@babylon-bd.com');
		$mail->addCC('hmimran@babylon-bd.com');
		$mail->addCC('bclhrac@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BCL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////AFL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendafl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('tanvirhussain@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('kazisumon@babylon-bd.com');
		$mail->addCC('aflhrd@babylon-bd.com');
		$mail->addCC('tofazzal@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='AFL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////BTL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbtl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('tanikbtlhrd@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('arifacc@babylon-bd.com');
		$mail->addCC('arifrazzaque@babylon-bd.com');
		$mail->addCC('prodip@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BTL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	
	/////////////////////////////////////////////////////////////BPL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbpl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('tanikbtlhrd@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('arifacc@babylon-bd.com');
		$mail->addCC('touhidulbpl@babylon-bd.com');
		$mail->addCC(' bplhrd@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BPL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////JEL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendjel(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('tanikbtlhrd@babylon-bd.com');
		
        
        
        // Add cc or bcc 
        $mail->addCC('arifacc@babylon-bd.com');
		$mail->addCC('gokul@babylon-bd.com');
		$mail->addCC('jelhrd@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='JEL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////BASL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbasl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('zamanbs@babylon-bd.com');
		$mail->addAddress('sobujhrd@babylon-bd.com');
        
        
        // Add cc or bcc 
        $mail->addCC('mhprince@babylon-bd.com');
		$mail->addCC('kanai@babylon-bd.com');
		$mail->addCC('rakibacc@babylon-bd.com');
		$mail->addCC('arshadbs@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BASL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	/////////////////////////////////////////////////////////////BADL LICENSE MAIL/////////////////////////////////////////////////////////	
	
	public function sendbadl(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('zamanbs@babylon-bd.com');
		$mail->addAddress('sobujhrd@babylon-bd.com');
        
        
        // Add cc or bcc 
        $mail->addCC('mhprince@babylon-bd.com');
		$mail->addCC('kanai@babylon-bd.com');
		$mail->addCC('rakibacc@babylon-bd.com');
		$mail->addCC('arshadbs@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'License Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT DATEDIFF(renewaldate,CURDATE()) AS remaining,factory.factoryid,license_name,issuedate,renewaldate FROM license
		
		JOIN factory ON factory.factoryid=license.factoryid
		JOIN division ON division.divisionid=license.divisionid 
		JOIN department ON department.deptid=license.departmentid
		LEFT JOIN licensetype ON licensetype.licensetypeid=license.licensetypeid
		JOIN licensename ON license.licensename=licensename.lnid
		WHERE factory.factoryid='BADL' AND status!='0'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$lname = array();
		$issu = array();
		$rene = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] < 60)
			{
				$fac[] =$row['factoryid'];
				$lname[] =$row['license_name'];
				$issu[] =$row['issuedate'];
				$rene[] =$row['renewaldate'];
				$re[] =$row['remaining'];
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$lname=implode(' <br/>', $lname);
		$issu=implode(' <br/>', $issu);
		$rene=implode(' <br/>', $rene);
		$re=implode('<br/> ', $re);
		
		
		
		
		// Email body content
        $mailContent = "<h3>License/Certification Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Issue Date</th>
		<th style='border: 1px solid #000000'>Renewal Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$lname."</td>
		<td style='border: 1px solid #000000'>".$issu."</td>
		<td style='border: 1px solid #000000'>".$rene."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
	

//////////////////////////////////////////////////////////////////MATERIAL MOVEMENT///////////////////////////////////////////////////////////

		public function challan_mail_send(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mail.babylonit.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Material Movement Gaps');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
        $mail->addAddress('arifhrd@babylon-bd.com');
		
        
        // Add cc or bcc 
        //$mail->addCC('akbar@babylon-bd.com');
        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'Material Movement Gaps';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT * FROM challan_insert 
		JOIN productunit ON challan_insert.unit=productunit.productunitid
		WHERE rdate >= now() - INTERVAL 1 DAY AND status='0' AND sqty!=rqty ORDER BY ccid DESC";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$ccid= array();
		$sent_factoryid = array();
		$receive_factoryid = array();
		$location = array();
		$item = array();
		$sqty = array();
		$rqty = array();
		$productunitname = array();
		foreach($result as $row)
		{
//			if($row['remaining'] < 60)
//			{
		$ccid[] =$row['ccid'];
		$sent_factoryid[] =$row['sent_factoryid'];
		$receive_factoryid[] =$row['receive_factoryid'];
		$location[] =$row['location'];
		$item[] =$row['item'];
		$sqty[] =$row['sqty'];
		$rqty[]=$row['rqty'];
		$productunitname[]=$row['productunitname'];
			//}
		}
		
		$ccid=implode(' <br/>', $ccid);
		$sent_factoryid=implode(' <br/>', $sent_factoryid);
		$receive_factoryid=implode(' <br/>', $receive_factoryid);
		$location=implode(' <br/>', $location);
		$item=implode(' <br/>', $item);
		$sqty=implode('<br/> ', $sqty);
		$rqty=implode('<br/> ', $rqty);
		$productunitname=implode('<br/> ', $productunitname);
		
		
		
		
		// Email body content
        $mailContent = "<h3>Material Movement Gaps</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>ID</th>
		<th style='border: 1px solid #000000'>Sent Factory Name</th>
		<th style='border: 1px solid #000000'>Destination Factory Name</th>
		<th style='border: 1px solid #000000'>Location</th>
		<th style='border: 1px solid #000000'>Item</th>
		<th style='border: 1px solid #000000'>Sent Quantity</th>
		<th style='border: 1px solid #000000'>Receive Quantity</th>
		<th style='border: 1px solid #000000'>Unit</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$ccid."</td>
		<td style='border: 1px solid #000000'>".$sent_factoryid."</td>
		<td style='border: 1px solid #000000'>".$receive_factoryid."</td>
		<td style='border: 1px solid #000000'>".$location."</td>
		<td style='border: 1px solid #000000'>".$item."</td>
		<td style='border: 1px solid #000000'>".$sqty."</td>
		<td style='border: 1px solid #000000'>".$rqty."</td>
		<td style='border: 1px solid #000000'>".$productunitname."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	///////////////////////////////////////////////////OD//////////////////////////////////
	public function od(){
		ini_set('max_execution_time', '2000'); 
		//ini_set('memory_limit','2048M');
		//ini_set('MAX_EXECUTION_TIME', '2000');
		
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mail.babylonit.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        //$mail->setFrom('hris@babylonit.com', 'Minarul Akbar');
		$mail->setFrom('hris@babylonit.com', 'Test mail');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
        //$mail->addAddress('arifhrd@babylon-bd.com');
		//$mail->addAddress('hoinfo@babylon-bd.com');
//		$mail->addAddress('bgfacinfo@babylon-bd.com');
//		$mail->addAddress('directorinfo@babylon-bd.com');

		//$mail->addAddress('jahangir@babylon-bd.com');
//		$mail->addAddress('cadashraf@babylon-bd.com');
//		$mail->addAddress('cadsujon@babylon-bd.com');
//		$mail->addAddress('aflcadpattern@babylon-bd.com');
//		$mail->addAddress('sayem@babylon-bd.com');
//		$mail->addAddress('aflcutting1@babylon-bd.com');
//		$mail->addAddress('bzaman@babylon-bd.com');
//		$mail->addAddress('aflcutting@babylon-bd.com');
//		$mail->addAddress('bclpdn@babylon-bd.com');
//		$mail->addAddress('kamal@babylon-bd.com');
//		$mail->addAddress('aflpayroll@babylon-bd.com');
//		$mail->addAddress('aflhrd@babylon-bd.com');
//		$mail->addAddress('aflfiresafety@babylon-bd.com');
//		$mail->addAddress('kazisumon@babylon-bd.com');
//		$mail->addAddress('imranhrd@babylon-bd.com');
//		$mail->addAddress('morshedhrd@babylon-bd.com');
//		$mail->addAddress('arju@babylon-bd.com');
//		$mail->addAddress('afltraining@babylon-bd.com');
//		$mail->addAddress('shahidhrd@babylon-bd.com');
//		$mail->addAddress('tanvirhussain@babylon-bd.com');
//		$mail->addAddress('aflhrd2@babylon-bd.com');
//		$mail->addAddress('ahsanit@babylon-bd.com');
//		$mail->addAddress('sanaullah@babylon-bd.com');
//		$mail->addAddress('badalplan@babylon-bd.com');
//		$mail->addAddress('aflpdn@babylon-bd.com');
//		$mail->addAddress('aflpdn2@babylon-bd.com');
//		$mail->addAddress('tofazzal@babylon-bd.com');
//		$mail->addAddress('aflqa@babylon-bd.com');
//		$mail->addAddress('cip@babylon-bd.com');
//		$mail->addAddress('aflstoreqc@babylon-bd.com');
//		$mail->addAddress('abonigpq3@babylon-bd.com');



		$mail->addAddress('jahangir@babylon-bd.com');
		$mail->addAddress('cadashraf@babylon-bd.com');
$mail->addAddress('cadsujon@babylon-bd.com');
$mail->addAddress('aflcadpattern@babylon-bd.com');
$mail->addAddress('sayem@babylon-bd.com');
$mail->addAddress('aflcutting1@babylon-bd.com');
$mail->addAddress('bzaman@babylon-bd.com');
$mail->addAddress('aflcutting@babylon-bd.com');
$mail->addAddress('bclpdn@babylon-bd.com');
$mail->addAddress('kamal@babylon-bd.com');
$mail->addAddress('aflpayroll@babylon-bd.com');
$mail->addAddress('aflhrd@babylon-bd.com');
$mail->addAddress('aflfiresafety@babylon-bd.com');
$mail->addAddress('kazisumon@babylon-bd.com');
$mail->addAddress('imranhrd@babylon-bd.com');
$mail->addAddress('morshedhrd@babylon-bd.com');
$mail->addAddress('arju@babylon-bd.com');
$mail->addAddress('afltraining@babylon-bd.com');
$mail->addAddress('shahidhrd@babylon-bd.com');
$mail->addAddress('tanvirhussain@babylon-bd.com');
$mail->addAddress('aflhrd2@babylon-bd.com');
$mail->addAddress('ahsanit@babylon-bd.com');
$mail->addAddress('sanaullah@babylon-bd.com');
$mail->addAddress('badalplan@babylon-bd.com');
$mail->addAddress('aflpdn@babylon-bd.com');
$mail->addAddress('aflpdn2@babylon-bd.com');
$mail->addAddress('tofazzal@babylon-bd.com');
$mail->addAddress('aflqa@babylon-bd.com');
$mail->addAddress('cip@babylon-bd.com');
$mail->addAddress('aflstoreqc@babylon-bd.com');
$mail->addAddress('abonigpq3@babylon-bd.com');
$mail->addAddress('aboninqc@babylon-bd.com');
$mail->addAddress('abonigpq1@babylon-bd.com');
$mail->addAddress('aflfinishingqc@babylon-bd.com');
$mail->addAddress('abonigpq2@babylon-bd.com');
$mail->addAddress('aboniqms@babylon-bd.com');
$mail->addAddress('aflqadata@babylon-bd.com');
$mail->addAddress('abonigpq4@babylon-bd.com');
$mail->addAddress('atiqueqa@babylon-bd.com');
$mail->addAddress('qs@babylon-bd.com');
$mail->addAddress('fayesrnd@babylon-bd.com');
$mail->addAddress('aflrnd2@babylon-bd.com');
$mail->addAddress('aflrnd@babylon-bd.com');
$mail->addAddress('belalrnd@babylon-bd.com');
$mail->addAddress('shakilrnd@babylon-bd.com');
$mail->addAddress('ronyrnd@babylon-bd.com');
$mail->addAddress('jahirul@babylon-bd.com');
$mail->addAddress('samsu@babylon-bd.com');
$mail->addAddress('babulafl@babylon-bd.com');
$mail->addAddress('aflstore2@babylon-bd.com');
$mail->addAddress('aflfabricstore@babylon-bd.com');
$mail->addAddress('helalstore@babylon-bd.com');
$mail->addAddress('aflstore@babylon-bd.com');
$mail->addAddress('aflcartonstore@babylon-bd.com');
$mail->addAddress('aflfabricstore2@babylon-bd.com');
$mail->addAddress('jewelstore@babylon-bd.com');
$mail->addAddress('aflstore3@babylon-bd.com');
$mail->addAddress('bclstore3@babylon-bd.com');
$mail->addAddress('bclstore@babylon-bd.com');
$mail->addAddress('bclstore2@babylon-bd.com');
$mail->addAddress('kzamanrnd@babylon-bd.com');
$mail->addAddress('alaminrnd@babylon-bd.com');
$mail->addAddress('zakirrnd@babylon-bd.com');
$mail->addAddress('ibrahimrnd@babylon-bd.com');
$mail->addAddress('lutforbcl@babylon-bd.com');
$mail->addAddress('lifungbcl@babylon-bd.com');
$mail->addAddress('bclinspection@babylon-bd.com');
$mail->addAddress('bclfinishing@babylon-bd.com');
$mail->addAddress('bclcutting@babylon-bd.com');
$mail->addAddress('bclcutting2@babylon-bd.com');
$mail->addAddress('bclquality@babylon-bd.com');
$mail->addAddress('bclpdnt@babylon-bd.com');
$mail->addAddress('firozhasan@babylon-bd.com');
$mail->addAddress('bclhrd@babylon-bd.com');
$mail->addAddress('fakrulhrd@babylon-bd.com');
$mail->addAddress('bclcompliance@babylon-bd.com');
$mail->addAddress('arefeen@babylon-bd.com');
$mail->addAddress('bclwo@babylon-bd.com');
$mail->addAddress('bclfiresafety@babylon-bd.com');
$mail->addAddress('bclhracc@babylon-bd.com');
$mail->addAddress('cadmonir@babylon-bd.com');
$mail->addAddress('asmaragpq@babylon-bd.com');
$mail->addAddress('gmsgpq@babylon-bd.com');
$mail->addAddress('bclcad@babylon-bd.com');
$mail->addAddress('asad@babylon-bd.com');
$mail->addAddress('asad@babylon-bd.com');
$mail->addAddress('raselqa@babylon-bd.com');
$mail->addAddress('parvezppc@babylon-bd.com');
$mail->addAddress('shahidit@babylon-bd.com');
$mail->addAddress('riponit@babylon-bd.com');
$mail->addAddress('prodip@babylon-bd.com');
$mail->addAddress('sislam@babylon-bd.com');
$mail->addAddress('btlalam@babylon-bd.com');
$mail->addAddress('saifbtl@babylon-bd.com');
$mail->addAddress('shahinur@babylon-bd.com');
$mail->addAddress('piarulbtl@babylon-bd.com');
$mail->addAddress('alibtl@babylon-bd.com');
$mail->addAddress('saddambtl@babylon-bd.com');
$mail->addAddress('amit@babylon-bd.com');
$mail->addAddress('sardarbtl@babylon-bd.com');
$mail->addAddress('gkshahabtl@babylon-bd.com'); 
$mail->addAddress('arifacc@babylon-bd.com');
$mail->addAddress('mazhar@babylon-bd.com');
$mail->addAddress('sohelacbtl@babylon-bd.com');
$mail->addAddress('omarbtl@babylon-bd.com');
$mail->addAddress('mamunbtl@babylon-bd.com');
$mail->addAddress('hannanbtl@babylon-bd.com');
$mail->addAddress('ramact@babylon-bd.com');
$mail->addAddress('molinaudit@babylon-bd.com');
$mail->addAddress('arifrazzaque@babylon-bd.com');
$mail->addAddress('susantabtl@babylon-bd.com');
$mail->addAddress('tazrulbtl@babylon-bd.com');
$mail->addAddress('litongomes@babylon-bd.com');
$mail->addAddress('hossainbtl@babylon-bd.com');
$mail->addAddress('rikonccsbtl@babylon-bd.com');
$mail->addAddress('apubtl@babylon-bd.com');
$mail->addAddress('linckonbtl@babylon-bd.com');
$mail->addAddress('hafizbtl@babylon-bd.com');
$mail->addAddress('imranccsbtl@babylon-bd.com');
$mail->addAddress('jahangirbtl@babylon-bd.com');
$mail->addAddress('sadekccsbtl@babylon-bd.com');
$mail->addAddress('moshiurbtl@babylon-bd.com'); 
$mail->addAddress('almamunbtl@babylon-bd.com');
$mail->addAddress('kawsarbtl@babylon-bd.com');
$mail->addAddress('sobuzbtl@babylon-bd.com');
$mail->addAddress('qcbtl@babylon-bd.com');
$mail->addAddress('productionbtl@babylon-bd.com');
$mail->addAddress('polybtl@babylon-bd.com');
$mail->addAddress('diecutbtl@babylon-bd.com');
$mail->addAddress('productionbtl2@babylon-bd.com');
$mail->addAddress('aslambtl@babylon-bd.com');
$mail->addAddress('morshedbtl@babylon-bd.com');
$mail->addAddress('kushibtl@babylon-bd.com');
$mail->addAddress('raju@babylon-bd.com');
$mail->addAddress('maintbtl@babylon-bd.com');
$mail->addAddress('enayetbtl@babylon-bd.com');
$mail->addAddress('toufiqbtl@babylon-bd.com');
$mail->addAddress('shamimstorebtl@babylon-bd.com');
$mail->addAddress('storebtl@babylon-bd.com');
$mail->addAddress('sujonbtl@babylon-bd.com');
$mail->addAddress('deliverybtl@babylon-bd.com');
$mail->addAddress('sheikhriponbtl@babylon-bd.com');
$mail->addAddress('zakirbtl@babylon-bd.com');
$mail->addAddress('zakirbtl@babylon-bd.com');
$mail->addAddress('manzurul@babylon-bd.com');
$mail->addAddress('muradbtl@babylon-bd.com');
$mail->addAddress('idrisscm@babylon-bd.com');
$mail->addAddress('hasanbtl@babylon-bd.com');
$mail->addAddress('offsetbtl@babylon-bd.com');
$mail->addAddress('designbtl@babylon-bd.com');
$mail->addAddress('tanikbtlhrd@babylon-bd.com');
$mail->addAddress('firesafetybtl@babylon-bd.com');
$mail->addAddress('humayonhrd@babylon-bd.com');
$mail->addAddress('payrollbtl@babylon-bd.com');
$mail->addAddress('shakilbtl@babylon-bd.com');
$mail->addAddress('riponbtl@babylon-bd.com');
$mail->addAddress('shiblubtl@babylon-bd.com');
$mail->addAddress('sowponbtl@babylon-bd.com');
$mail->addAddress('rezaulbtl@babylon-bd.com');
$mail->addAddress('torikulbtl@babylon-bd.com');
$mail->addAddress('masudbtl@babylon-bd.com');
$mail->addAddress('nazmulbtl@babylon-bd.com');
$mail->addAddress('shahadatbtl@babylon-bd.com');
$mail->addAddress('ishrakhamid@babylon-bd.com'); 
$mail->addAddress('munimbtl@babylon-bd.com');
$mail->addAddress('rahmanbtl@babylon-bd.com');
$mail->addAddress('mahasinbtl@babylon-bd.com');
$mail->addAddress('rijonbtl@babylon-bd.com');
$mail->addAddress('kabirbtl@babylon-bd.com');
$mail->addAddress('delourbtl@babylon-bd.com');
$mail->addAddress('pankajbtl@babylon-bd.com');
$mail->addAddress('shawonbtl@babylon-bd.com');
$mail->addAddress('rahimbtl@babylon-bd.com');
$mail->addAddress('nurulbtl@babylon-bd.com');
$mail->addAddress('rajib@babylon-bd.com');
$mail->addAddress('tobaroakbtl@babylon-bd.com');
$mail->addAddress('abirbtl@babylon-bd.com');
$mail->addAddress('rakibbtl@babylon-bd.com');
$mail->addAddress('imranbtl@babylon-bd.com');
$mail->addAddress('touhidulbpl@babylon-bd.com');
$mail->addAddress('bplproduction@babylon-bd.com');
$mail->addAddress('bplsample@babylon-bd.com');
$mail->addAddress('bplqc@babylon-bd.com');
$mail->addAddress('bplhrd@babylon-bd.com');
$mail->addAddress('bplwelfare@babylon-bd.com');
$mail->addAddress('bpldesign1@babylon-bd.com');
$mail->addAddress('bpl@babylon-bd.com');
$mail->addAddress('bpldesign2@babylon-bd.com');
$mail->addAddress('bplsample@babylon-bd.com');
$mail->addAddress('bplstore@babylon-bd.com');
$mail->addAddress('bplcolor@babylon-bd.com');
$mail->addAddress('bpllab@babylon-bd.com');
$mail->addAddress('bplmaintenance@babylon-bd.com');
$mail->addAddress('gokul@babylon-bd.com');
$mail->addAddress('uzzaljel@babylon-bd.com');
$mail->addAddress('jeldesign@babylon-bd.com');
$mail->addAddress('jelhrd@babylon-bd.com');
$mail->addAddress('nahid@babylon-bd.com');
$mail->addAddress('abubakar@babylon-bd.com');
$mail->addAddress('gobinda@babylon-bd.com');
$mail->addAddress('sadat@babylon-bd.com');
$mail->addAddress('hmimran@babylon-bd.com');
$mail->addAddress('mdashraf@babylon-bd.com');
$mail->addAddress('majnu@babylon-bd.com');
$mail->addAddress('mdtanvir@babylon-bd.com');
$mail->addAddress('mohirobin@babylon-bd.com');
$mail->addAddress('pir@babylon-bd.com');
$mail->addAddress('rakibacc@babylon-bd.com');
$mail->addAddress('sabbirahmed@babylon-bd.com');
$mail->addAddress('sajibacc@babylon-bd.com');
$mail->addAddress('main@babylon-bd.com');
$mail->addAddress('simulnath@babylon-bd.com');
$mail->addAddress('sonjoy@babylon-bd.com');
$mail->addAddress('tanvir@babylon-bd.com');
$mail->addAddress('acctscan@babylon-bd.com');
$mail->addAddress('sohailtanvir@babylon-bd.com');
$mail->addAddress('nooralam@babylon-bd.com');
$mail->addAddress('frontdesk@babylon-bd.com');
$mail->addAddress('shabuj@babylon-bd.com');
$mail->addAddress('rahad@babylon-bd.com');
$mail->addAddress('jahidaudit@babylon-bd.com');
$mail->addAddress('asif@babylon-bd.com');
$mail->addAddress('bipul@babylon-bd.com');
$mail->addAddress('torikul@babylon-bd.com');
$mail->addAddress('mostafizurrahman@babylon-bd.com');
$mail->addAddress('sujon@babylon-bd.com');
$mail->addAddress('yusuf@babylon-bd.com');
$mail->addAddress('atikur@babylon-bd.com');
$mail->addAddress('babylonlogistics@babylon-bd.com');
$mail->addAddress('rokon@babylon-bd.com');
$mail->addAddress('ziaur@babylon-bd.com');
$mail->addAddress('sajib@babylon-bd.com');
$mail->addAddress('shajankabir@babylon-bd.com');
$mail->addAddress('asrafali@babylon-bd.com');
$mail->addAddress('babyloncnfdhk@babylon-bd.com');
$mail->addAddress('mabashar@babylon-bd.com');
$mail->addAddress('mahbubalam@babylon-bd.com');
$mail->addAddress('rashelcnf@babylon-bd.com');
$mail->addAddress('ali@babylon-bd.com');
$mail->addAddress('amin@babylon-bd.com');
$mail->addAddress('arifcom@babylon-bd.com');
$mail->addAddress('arifkhan@babylon-bd.com');
$mail->addAddress('farhana@babylon-bd.com');
$mail->addAddress('ferozalam@babylon-bd.com');
$mail->addAddress('anasul@babylon-bd.com');
$mail->addAddress('nazmulcom@babylon-bd.com');
$mail->addAddress('maiqbal@babylon-bd.com');
$mail->addAddress('mamunurrashid@babylon-bd.com');
$mail->addAddress('maria@babylon-nd.com');
$mail->addAddress('nahidcom@babylon-bd.com');
$mail->addAddress('opel@babylon-bd.com');
$mail->addAddress('rahim@babylon-bd.com');
$mail->addAddress('rifat@babylon-bd.com');
$mail->addAddress('sazedur@babylon-bd.com');
$mail->addAddress('mostafiz@babylon-bd.com');
$mail->addAddress('maruf@babylon-bd.com');
$mail->addAddress('bristy@babylon-bd.com');
$mail->addAddress('hafiza@babylon-bd.com');
$mail->addAddress('salahuddin@babylon-bd.com');
$mail->addAddress('shahana@babylon-bd.com');
$mail->addAddress('mahiuddin@babylon-bd.com');
$mail->addAddress('neesar@babylon-bd.com');
$mail->addAddress('salam@babylon-bd.com');
$mail->addAddress('arifhrd@babylon-bd.com');
$mail->addAddress('jahidulhrd@babylon-bd.com');
$mail->addAddress('rumana@babylon-bd.com');
$mail->addAddress('mahmudhrd@babylon-bd.com');
$mail->addAddress('mshahedhrd@babylon-bd.com');
$mail->addAddress('akbar@babylon-bd.com');
$mail->addAddress('prottayhrms@babylon-bd.com');
$mail->addAddress('parvezhrd@babylon-bd.com');
$mail->addAddress('rumana@babylon-bd.com');
$mail->addAddress('zonehr@babylon-bd.com');
$mail->addAddress('sobujhrd@babylon-bd.com');
$mail->addAddress('ferdous@babylon-bd.com');
$mail->addAddress('moidur@babyln-bd.com');
$mail->addAddress('sadiazinat@babylon-bd.com');
$mail->addAddress('habib@babylon-bd.com');
$mail->addAddress('palash@babylon-bd.com');
$mail->addAddress('sushanto@babylon-bd.com');
$mail->addAddress('mokshed@babylon-bd.com');
$mail->addAddress('aminakhter@babylon-bd.com');
$mail->addAddress('chapalmkt@babylon-bd.com');
$mail->addAddress('jahidulkhan@babylon-bd.com');
$mail->addAddress('aktermkt@babylon-bd.com');
$mail->addAddress('mahossain@babylon-bd.com');
$mail->addAddress('mainuddin@babylon-bd.com');
$mail->addAddress('mdfarhad@babylon-bd.com');
$mail->addAddress('mehedimkt@babylon-bd.com');
$mail->addAddress('mmahbub@babylon-bd.com');
$mail->addAddress('mdmaruf@babylon-bd.com');
$mail->addAddress('mosiurmkt@babylon-bd.com');
$mail->addAddress('mostafashahriar@babylon-bd.com');
$mail->addAddress('riadmkt@babylon-bd.com');
$mail->addAddress('riyad@babylon-bd.com');
$mail->addAddress('nazmulmkt@babylon-bd.com');
$mail->addAddress('saniful@babylon-bd.com');
$mail->addAddress('shawonmkt@babylon-bd.com');
$mail->addAddress('shibly@babylon-bd.com');
$mail->addAddress('sohely@babylon-bd.com');
$mail->addAddress('tmahsan@babylon-bd.com');
$mail->addAddress('tushermkt@babylon-bd.com');
$mail->addAddress('zamanmkt@babylon-bd.com');
$mail->addAddress('siddiqi@babylon-bd.com');
$mail->addAddress('sadia@babylon-bd.com');
$mail->addAddress('safikmkt@babylon-bd.com');
$mail->addAddress('shanta@babylon-bd.com');
$mail->addAddress('nayemkawsar@babylon-bd.com');
$mail->addAddress('mhmithu@babylon-bd.com');
$mail->addAddress('shazzad@babylon-bd.com');
$mail->addAddress('radwan@babylon-bd.com');
$mail->addAddress('anwar@babylon-bd.com');
$mail->addAddress('mdpalash@babylon-bd.com');
$mail->addAddress('akazad@babylon-bd.com');
$mail->addAddress('mdsumon@babylon-bd.com');
$mail->addAddress('rafiscm@babylon-bd.com');
$mail->addAddress('iqbal@babylon-bd.com');
$mail->addAddress('forazi@babylon-bd.com');
$mail->addAddress('rajib@babylon-bd.com');
$mail->addAddress('tanzima@babylon-bd.com');
$mail->addAddress('mohshin@babylon-bd.com');
$mail->addAddress('rakibul@babylon-bd.com');
$mail->addAddress('awal@babylon-bd.com');
$mail->addAddress('saiful@babylon-bd.com');
$mail->addAddress('zahid@babylon-bd.com');
$mail->addAddress('rahi@babylon-bd.com');
$mail->addAddress('mdshohag@babylon-bd.com');
$mail->addAddress('rabiul@babylon-bd.com');
$mail->addAddress('wtcad3@babylon-bd.com');
$mail->addAddress('wtcad0@babylon-bd.com');
$mail->addAddress('alim@babylon-bd.com');
$mail->addAddress('wtcat2@babylon-bd.com');
$mail->addAddress('wtcad@babylon-bd.com');
$mail->addAddress('bglcutting@babylon-bd.com');
$mail->addAddress('bglcutting2@babylon-bd.com');
$mail->addAddress('bgljahangir@babylon-bd.com');
$mail->addAddress('bablu@babylon-bd.com');
$mail->addAddress('mizanfnsh@babylon-bd.com');
$mail->addAddress('bglfinishing@babylon-bd.com');
$mail->addAddress('bglhrd1@babylon-bd.com');
$mail->addAddress('jahangirhrd@babylon-bd.com');
$mail->addAddress('bglhrd3@babylon-bd.com');
$mail->addAddress('bglhrd2@babylon-bd.com');
$mail->addAddress('bglfacacc@babylon-bd.com');
$mail->addAddress('bglhrdwf@babylon-bd.com');
$mail->addAddress('maksudahrd@babylon-bd.com');
$mail->addAddress('mamunhrd@babylon-bd.com');
$mail->addAddress('bglfiresafety@babylon-bd.com');
$mail->addAddress('bglhrd4@babylon-bd.com');
$mail->addAddress('ranahrd@babylon-bd.com');
$mail->addAddress('ruhul@babylon-bd.com');
$mail->addAddress('bglprd2@babylon-bd.com');
$mail->addAddress('bglprd1@babylon-bd.com');
$mail->addAddress('palashbgl@babylon-bd.com');
$mail->addAddress('kadir@babylon-bd.com');
$mail->addAddress('bdlprd@babylon-bd.com');
$mail->addAddress('alaminbgl@babylon-bd.com');
$mail->addAddress('khkabir@babylon-bd.com');
$mail->addAddress('bglqccompliance@babylon-bd.com');
$mail->addAddress('rafiq@babylon-bd.com');
$mail->addAddress('jakia@babylon-bd.com');
$mail->addAddress('mizanqa@babylon-bd.com');
$mail->addAddress('dhgpq@babylon-bd.com');
$mail->addAddress('bglgpq@babylon-bd.com');
$mail->addAddress('nislam@babylon-bd.com');
$mail->addAddress('soliverqa@babylon-bd.com');
$mail->addAddress('walmartgpq@babylon-bd.com');
$mail->addAddress('bglqc1@babylon-bd.com');
$mail->addAddress('bglqc2@babylon-bd.com');
$mail->addAddress('bglqc3@babylon-bd.com');
$mail->addAddress('bglcuttingqc@babylon-bd.com');
$mail->addAddress('sainsbury@babylon-bd.com');
$mail->addAddress('mmamunqa@babylon-bd.com');
$mail->addAddress('bdlrnd2@babylon-bd.com');
$mail->addAddress('bdlrnd@babylon-bd.com');
$mail->addAddress('bglrnd3@babylon-bd.com');
$mail->addAddress('bgl2rnd@babylon-bd.com');
$mail->addAddress('bglrnd@babylon-bd.com');
$mail->addAddress('kabirrnd@babylon-bd.com');
$mail->addAddress('rakibrnd@babylon-bd.com');
$mail->addAddress('hridoyie@babylon-bd.com');
$mail->addAddress('samad@babylon-bd.com');
$mail->addAddress('cadsabuz@babylon-bd.com');
$mail->addAddress('cadhaque@babylon-bd.com');
$mail->addAddress('mnalam@babylon-bd.com');
$mail->addAddress('tariq@babylon-bd.com');
$mail->addAddress('rafiqul@babylon-bd.com');
$mail->addAddress('cadraihan@babylon-bd.com');
$mail->addAddress('cadmannan@babylon-bd.com');
$mail->addAddress('smtanvir@babylon-bd.com');
$mail->addAddress('mintu@babylon-bd.com');
$mail->addAddress('arifsample@babylon-bd.com');
$mail->addAddress('harun@babylon-bd.com');
$mail->addAddress('obaydur@babylon-bd.com');
$mail->addAddress('rabeya@babylon-bd.com');
$mail->addAddress('dalia@babylon-bd.com');
$mail->addAddress('cadsample1@babylon-bd.com');
$mail->addAddress('nurulislam@babylon-bd.com');
$mail->addAddress('solayman@babylon-bd.com');
$mail->addAddress('dalia@babylon-bd.com');
$mail->addAddress('cadtanvir@babylon-bd.com');
$mail->addAddress('shahin@babylon-bd.com');
$mail->addAddress('bglsecurity@babylon-bd.com');
$mail->addAddress('bglgate@babylon-bd.com');
$mail->addAddress('bglfabricstore@babylon-bd.com');
$mail->addAddress('bglstore1@babylon-bd.com');
$mail->addAddress('bglstore4@babylon-bd.com');
$mail->addAddress('bglstore2@babylon-bd.com');
$mail->addAddress('bglstoregl@babylon-bd.com');
$mail->addAddress('bglstore@babylon-bd.com');
$mail->addAddress('habibstore@babylon-bd.com');
$mail->addAddress('shahabuddin@babylon-bd.com');
$mail->addAddress('bglsroregl2@babylon-bd.com');
$mail->addAddress('bglstore3@babylon-bd.com');
$mail->addAddress('bglsubstore1@babylon-bd.com');
$mail->addAddress('bglsubstore2@babylon-bd.com');
$mail->addAddress('bglsubstore3@babylon-bd.com');
$mail->addAddress('bglstore5@babylon-bd.com');
$mail->addAddress('prashanta@babylon-bd.com');
$mail->addAddress('alamgeer@babylon-bd.com ');
$mail->addAddress('kanai@babylon-bd.com');
$mail->addAddress('pijushtulanbs@babylon-bd.com');
$mail->addAddress('hudabs@babylon-bd.com');
$mail->addAddress('mehedibs@babylon-bd.com');
$mail->addAddress('rakybulbasl@babylon-bd.com');
$mail->addAddress('sagorbasl@babylon-bd.com');
$mail->addAddress('barisaldepot@babylon-bd.com');
$mail->addAddress('bogradepot@babylon-bd.com');
$mail->addAddress('comilladepot@babylon-bd.com');
$mail->addAddress('ctgdepot@babylon-bd.com');
$mail->addAddress('dhakadepot@babylon-bd.com');
$mail->addAddress('james@babylon-bd.com');
$mail->addAddress('jessoredepot@babylon-bd.com');
$mail->addAddress('jobairbs@babylon-bd.com');
$mail->addAddress('paulbs@babylon-bd.com');
$mail->addAddress('rangpurdepot@babylon-bd.com');
$mail->addAddress('spcrangpur@babylon-bd.com');
$mail->addAddress('ashrafulbasl@babylon-bd.com');
$mail->addAddress('jamalpurdepot@babylon-bd.com');
$mail->addAddress('jwelbasl@babylon-bd.com');
$mail->addAddress('mhprince@babylon-bd.com');
$mail->addAddress('zamanbs@babylon-bd.com');
$mail->addAddress('plabonbs@babylon-bd.com');
$mail->addAddress('mdrahatbasl@babylon-bd.com');
$mail->addAddress('mozahadbasl@babylon-bd.com');
$mail->addAddress('jamalbs@babylon-bd.com');
$mail->addAddress('ahsanbadl@babylon-bd.com');
$mail->addAddress('shadmanbadl@babylon-bd.com');
$mail->addAddress('factorybasl@babylon-bd.com');
$mail->addAddress('kamrulbasl@babylon-bd.com');
$mail->addAddress('drtayeb@babylon-bd.com');
$mail->addAddress('kabirbadl@babylon-bd.com');
$mail->addAddress('shafiulbasl@babylon-bd.com');
$mail->addAddress('arshadbs@babylon-bd.com');
$mail->addAddress('hanifbadl@babylon-bd.com');
$mail->addAddress('akibulbasl@babylon-bd.com');
$mail->addAddress('borhanbasl@babylon-bd.com');
$mail->addAddress('fazlulbasl@babylon-bd.com');
$mail->addAddress('humaunbasl@babylon-bd.com');
$mail->addAddress('mamunbasl@babylon-bd.com');
$mail->addAddress('masudbasl@babylon-bd.com');
$mail->addAddress('milonbasl@babylon-bd.com');
$mail->addAddress('mintubasl@babylon-bd.com');
$mail->addAddress('mrahmanbasl@babylon-bd.com');
$mail->addAddress('naimbasl@babylon-bd.com');
$mail->addAddress('nzamanbasl@babylon-bd.com');
$mail->addAddress('rahatbasl@babylon-bd.com');
$mail->addAddress('raihanbasl@babylon-bd.com');
$mail->addAddress('shamimbasl@babylon-bd.com');
$mail->addAddress('souravbasl@babylon-bd.com');
$mail->addAddress('sujanbasl@babylon-bd.com');
$mail->addAddress('zohurulbasl@babylob-bd.com');
$mail->addAddress('belalbadl@babylon-bd.com');
$mail->addAddress('rafiqbadl@babylon-bd.com');
$mail->addAddress('mizanbadl@babylon-bd.com');
$mail->addAddress('tonmoybadl@babylon-bd.com');
$mail->addAddress('mdabdullahbasl@babylon-bd.com');
$mail->addAddress('rubelbasl@babylon-bd.com');
$mail->addAddress('atiulbasl@babylon-bd.com');
$mail->addAddress('ntalha@babylon-bd.com');
$mail->addAddress('azizbs@babylon-bd.com');
$mail->addAddress('storebasl@babylon-bd.com');
$mail->addAddress('farhankhan@babylon-bd.com');
$mail->addAddress('tarun@babylon-bd.com');
$mail->addAddress('abdulmottalab@babylon-bd.com');
$mail->addAddress('jadidanower@babylon-bd.com');
$mail->addAddress('sayedmasum@babylon-bd.com');
$mail->addAddress('sonia@babylon-bd.com');
$mail->addAddress('niloy@babylon-bd.com');
$mail->addAddress('sajid@babylon-bd.com');
$mail->addAddress('shadman@babylon-bd.com');
$mail->addAddress('shohan@babylon-bd.com');
$mail->addAddress('babyloncnfctg3@babylon-bd.com');
$mail->addAddress('babyloncnfctg@babylon-bd.com');
$mail->addAddress('babyloncnfctg2@babylon-bd.com'); 
$mail->addAddress('babyloncnfctg4@babylon-bd.com');
$mail->addAddress('btrctg@babylon-bd.com');
$mail->addAddress('nurulbtl@babylon-bd.com');
$mail->addAddress('faruqe@babylon-bd.com');
$mail->addAddress('islam@babylon-bd.com');
$mail->addAddress('shihabur@babylon-bd.com');
$mail->addAddress('prosanto@babylon-bd.com');
$mail->addAddress('alamgir@babylon-bd.com');
$mail->addAddress('foyzul@babylon-bd.com');
$mail->addAddress('shahjahanscm@babylon-bd.com');
$mail->addAddress('foysalscm@babylon-bd.com');
$mail->addAddress('salmanscm@babylon-bd.com');
$mail->addAddress('iqbal@babylon-bd.com');
$mail->addAddress('alaminscm@babylon-bd.com');
$mail->addAddress('shukurit@babylon-bd.com');
$mail->addAddress('aftab@babylon-bd.com');
$mail->addAddress('syful@babylon-bd.com');
$mail->addAddress('moudutta@babylon-bd.com');
$mail->addAddress('mamundnd@babylon-bd.com');
$mail->addAddress('mostafizcom@babylon-bd.com');
$mail->addAddress('johurul@babylon-bd.com');
$mail->addAddress('masud@babylon-bd.com');
$mail->addAddress('compalash@babylon-bd.com');
$mail->addAddress('ferozcom@babylon-bd.com');
$mail->addAddress('zahid@babylon-bd.com');
$mail->addAddress('farhad@babylon-bd.com');
$mail->addAddress('comhaque@babylon-bd.com');
$mail->addAddress('manik@babylon-bd.com');
$mail->addAddress('zahidsdq@babylon-bd.com');
$mail->addAddress('comtariq@babylon-bd.com');
$mail->addAddress('showravcom@babylon-bd.com');
$mail->addAddress('sujoncom@babylon-bd.com');
$mail->addAddress('jahidul@babylon-bd.com');
$mail->addAddress('mdmainul@babylon-bd.com');
$mail->addAddress('jahir@babylon-bd.com');
$mail->addAddress('noor@babylon-bd.com');
$mail->addAddress('sajjadscm@babylon-bd.com');
$mail->addAddress('cqa@babylon-bd.com');
$mail->addAddress('sohelrana@babylon-bd.com');
$mail->addAddress('zakir@babylon-bd.com');
$mail->addAddress('apuhrd@babylon-bd.com');
$mail->addAddress('jahidulhrd@babylon-bd.com');
$mail->addAddress('solaiman@babylon-bd.com');
$mail->addAddress('cfds@babylon-bd.com');
$mail->addAddress('rezveekhalid@babylon-bd.com');
$mail->addAddress('akhlakmkt@babylon-bd.com');
$mail->addAddress('aklscanner@babylon-bd.com');
$mail->addAddress('arafat@babylon-bd.com');
$mail->addAddress('rashedul@babylon-bd.com');
$mail->addAddress('asadmkt@babylon-bd.com');
$mail->addAddress('bipulmkt@babylon-bd.com');
$mail->addAddress('hasnatmkt@babylon-bd.com');
$mail->addAddress('jijewel@babylon-bd.com');
$mail->addAddress('kamrul@babylon-bd.com');
$mail->addAddress('lenin@babylon-bd.com');
$mail->addAddress('pronab@babylon-bd.com');
$mail->addAddress('ismail@babylon-bd.com');
$mail->addAddress('shahadat@babylon-bd.com');
$mail->addAddress('sobrab@babylon-bd.com');
$mail->addAddress('tipumkt@babylon-bd.com');
$mail->addAddress('khalid@babylon-bd.com');
$mail->addAddress('ikram@babylon-bd.com');
$mail->addAddress('aminoor@babylon-bd.com');
$mail->addAddress('rezwanul@babylon-bd.com');
$mail->addAddress('sayedtanay@babylon-bd.com');
$mail->addAddress('aklscanner@babylon-bd.com');
$mail->addAddress('absiddiq@babylon-bd.com');
$mail->addAddress('asraful@babylon-bd.com');
$mail->addAddress('jamil@babylon-bd.com');
$mail->addAddress('mahmudacc@babylon-bd.com');
$mail->addAddress('rigan@babylon-bd.com');
$mail->addAddress('azhar@babylon-bd.com');
$mail->addAddress('mofazzal@babylon-bd.com');
$mail->addAddress('jahid@babylon-bd.com');
$mail->addAddress('nazmulhaque@babylon-bd.com');
$mail->addAddress('basher@babylon-bd.com');
$mail->addAddress('engrrazzak@babylon-bd.com');
$mail->addAddress('faisalmkt@babylon-bd.com');
$mail->addAddress('aziz@babylon-bd.com');
$mail->addAddress('shohagmkt@babylon-bd.com');
$mail->addAddress('aanmoon@babylon-bd.com');
$mail->addAddress('abirmkt@babylon-bd.com');
$mail->addAddress('badhan@babylon-bd.com');
$mail->addAddress('naziurmkt@babylon-bd.com');
$mail->addAddress('sabuzmkt@babylon-bd.com');
$mail->addAddress('naim@babylon-bd.com');
$mail->addAddress('tanvirmkt@babylon-bd.com');
$mail->addAddress('sujoncom@babylon-bd.com');
$mail->addAddress('aklcad@babylon-bd.com');
$mail->addAddress('aklcad1@babylon-bd.com');
$mail->addAddress('aklcad2@babylon-bd.com');
$mail->addAddress('aklcutting2@babylon-bd.com');
$mail->addAddress('aklcutting@babylon-bd.com');
$mail->addAddress('rasel@babylon-bd.com');
$mail->addAddress('aklcutting3@babylon-bd.com');
$mail->addAddress('aklcutting4@babylon-bd.com');
$mail->addAddress('aklcutting5@babylon-bd.com');
$mail->addAddress('aklcutting6@babylon-bd.com');
$mail->addAddress('aklcutting7@babylon-bd.com');
$mail->addAddress('aklcutting8@babylon-bd.com');
$mail->addAddress('aklcutting9@babylon-bd.com');
$mail->addAddress('aklfinishing@babylon-bd.com');
$mail->addAddress('aklfinishing3@babylon-bd.com');
$mail->addAddress('mahabubfinishing@babylon-bd.com');
$mail->addAddress('aklfinishing2@babylon-bd.com');
$mail->addAddress('receptionakl@babylon-bd.com');
$mail->addAddress('sagar@babylon-bd.com');
$mail->addAddress('almamunhrd@babylon-bd.com');
$mail->addAddress('rokhsanahrd@babylon-bd.com');
$mail->addAddress('nahidhrd@babylon-bd.com');
$mail->addAddress('firesafetyakl@babylon-bd.com');
$mail->addAddress('wasimhrd@babylon-bd.com');
$mail->addAddress('aklhrd4@babylon-bd.com');
$mail->addAddress('arifulhrd@babylon-bd.com');
$mail->addAddress('sagar@babylon-bd.com');
$mail->addAddress('shikhahrd@babylon-bd.com');
$mail->addAddress('aklmedical@babylon-bd.com');
$mail->addAddress('aklhrd1@babylon-bd.com');
$mail->addAddress('mahfuzur@babylon-bd.com');
$mail->addAddress('ayubrnd@babylon-bd.com');
$mail->addAddress('aklrnd2@babylon-bd.com');
$mail->addAddress('aklrnd1@babylon-bd.com');
$mail->addAddress('towhidrd@babylon-bd.com');
$mail->addAddress('aklrnd6@babylon-bd.com');
$mail->addAddress('rdfac@babylon-bd.com');
$mail->addAddress('aklrnd3@babylon-bd.com');
$mail->addAddress('aklmaint@babylon-bd.com');
$mail->addAddress('aklprdmis@babylon-bd.com');
$mail->addAddress('robiulppc@babylon-bd.com');
$mail->addAddress('lifungqa@babylon-bd.com');
$mail->addAddress('aklqc@babylon-bd.com');
$mail->addAddress('aklqad@babylon-bd.com');
$mail->addAddress('mdazizul@babylon-bd.com');
$mail->addAddress('hridoyvapqa@babylon-bd.com');
$mail->addAddress('khosrulalam@babylon-bd.com');
$mail->addAddress('aklqccutting@babylon-bd.com');
$mail->addAddress('lifunggpq@babylon-bd.com');
$mail->addAddress('aklstoreqc@babylon-bd.com');
$mail->addAddress('qsaboni@babylon-bd.com');
$mail->addAddress('ratannqcaboni@babylon-bd.com');
$mail->addAddress('dilipnqcaboni@babylon-bd.com');
$mail->addAddress('tcqc@babylon-bd.com');
$mail->addAddress('oryxgpq@babylon-bd.com');
$mail->addAddress('mangogpq@babylon-bd.com');
$mail->addAddress('aklfnshqc@babylon-bd.com');
$mail->addAddress('aklsample4@babylon-bd.com');
$mail->addAddress('aklsample1@babylon-bd.com');
$mail->addAddress('aklpattern@babylon-bd.com');
$mail->addAddress('aklsample2@babylon-bd.com');
$mail->addAddress('aklsample3@babylon-bd.com');
$mail->addAddress('siraj@babylon-bd.com');
$mail->addAddress('tcgtakl@babylon-bd.com');
$mail->addAddress('ntechakl@babylon-bd.com');
$mail->addAddress('aklmarker@babylon-bd.com');
$mail->addAddress('ntechakl@babylon-bd.com');
$mail->addAddress('nazmulkabir@babylon-bd.com');
$mail->addAddress('aklstore5@babylon-bd.com');
$mail->addAddress('aklstore@babylon-bd.com');
$mail->addAddress('aklaccstore1@babylon-bd.com');
$mail->addAddress('aklfabstore@babylon-bd.com');
$mail->addAddress('aklstore2@babylon-bd.com');
$mail->addAddress('shaheen@babylon-bd.com');
$mail->addAddress('aklstore6@babylon-bd.com');
$mail->addAddress('aklaccstore@babylon-bd.com');
$mail->addAddress('aklthreadstr@babylon-bd.com');
$mail->addAddress('zabircivil@babylon-bd.com');
$mail->addAddress('saifulislam@babylon-bd.com');
$mail->addAddress('atikul@babylon-bd.com');
$mail->addAddress('atldybatch@babylon-bd.com');
$mail->addAddress('khoshruahmed@babylon-bd.com');
$mail->addAddress('chandan@babylon-bd.com');
$mail->addAddress('sumonkumar@babylon-bd.com');
$mail->addAddress('anisatlrnd@babylon-bd.com');
$mail->addAddress('manjurulems@babylon-bd.com');
$mail->addAddress('ems@babylon-bd.com');
$mail->addAddress('imranhossain@babylon-bd.com');
$mail->addAddress('atlfinishing@babylon-bd.com');
$mail->addAddress('atlhrd2@babylon-bd.com');
$mail->addAddress('atlfs@babylon-bd.com');
$mail->addAddress('atladmin@babylon-bd.com');
$mail->addAddress('sohelhrd@babylon-bd.com');
$mail->addAddress('atlhrd@babylon-bd.com');
$mail->addAddress('forhad@babylon-bd.com');
$mail->addAddress('atllab@babylon-bd.com');
$mail->addAddress('atllabcolour@babylon-bd.com');
$mail->addAddress('atllab3@babylon-bd.com');
$mail->addAddress('atllab4@babylon-bd.com');
$mail->addAddress('shohag@babylon-bd.com');
$mail->addAddress('mahbubatl@babylon-bd.com');
$mail->addAddress('atlmaintenance@babylon-bd.com');
$mail->addAddress('rajibqad@babylon-bd.com');
$mail->addAddress('shahanuralam@babylon-bd.com');
$mail->addAddress('mdshiplu@babylon-bd.com');
$mail->addAddress('mizanorstr@babylon-bd.com');
$mail->addAddress('debabrata@babylon-bd.com');
$mail->addAddress('sayeed@babylon-bd.com');
$mail->addAddress('helaluddin@babylon-bd.com');
$mail->addAddress('ronymiah@babylon-bd.com');
$mail->addAddress('hoqueplan@babylon-bd.com');
$mail->addAddress('atlqc3@babylon-bd.com');
$mail->addAddress('gqpatl1@babylon-bd.com');
$mail->addAddress('atlqc2@babylon-bd.com');
$mail->addAddress('gpqatl2@babylon-bd.com');
$mail->addAddress('atlchemical@babylon-bd.com');
$mail->addAddress('atlfabstore2@babylon-bd.com');
$mail->addAddress('atlfabstore2@babylon-bd.com');
$mail->addAddress('atlfabstore1@babylon-bd.com');
$mail->addAddress('shyamal@babylon-bd.com');
$mail->addAddress('atlcntstroe@babylon-bd.com');
$mail->addAddress('atlkntbatch2@babylon-bd.com');
$mail->addAddress('atlkntbatch1@babylon-bd.com');
$mail->addAddress('atlknittinghr@babylon-bd.com');
$mail->addAddress('knittingmaintenance@babylon-bd.com');
$mail->addAddress('fhrabby@babylon-bd.com');
$mail->addAddress('knit@babylon-bd.com');
$mail->addAddress('knitprd@babylon-bd.com');
$mail->addAddress('shafiqul@babylon-bd.com');
$mail->addAddress('atlqc1@babylon-bd.com');
$mail->addAddress('atlyarnstr@babylon-bd.com');
$mail->addAddress('atlyarnstr2@babylon-bd.com');
$mail->addAddress('atldalimstr@babylon-bd.com');
$mail->addAddress('atlgreigestr@babylon-bd.com');
$mail->addAddress('atlyarnstr3@babylon-bd.com');
$mail->addAddress('bwlmkt1@babylon-bd.com');
$mail->addAddress('comhaque@babylon-bd.com');
$mail->addAddress('comhaque@babylon-bd.com');
$mail->addAddress('bwlhrd2@babylon-bd.com');
$mail->addAddress('julfikar@babylon-bd.com');
$mail->addAddress('samplebwl@babylon-bd.com');
$mail->addAddress('nazrulrnd@babylon-bd.com');
$mail->addAddress('bwlmaintenance@babylon-bd.com');
$mail->addAddress('anam@babylon-bd.com');
$mail->addAddress('mahmud@babylon-bd.com');
$mail->addAddress('sajahangir@babylon-bd.com');
$mail->addAddress('bwlplanning@babylon-bd.com');
$mail->addAddress('jakirbwl@babylon-bd.com');
$mail->addAddress('bwlprd@babylon-bd.com');
$mail->addAddress('qualitybwl@babylon-bd.com');
$mail->addAddress('kamrulbwl@babylon-bd.com');
$mail->addAddress('bwlstore@babylon-bd.com');
$mail->addAddress('bwlchemical@babylon-bd.com');
$mail->addAddress('halim@babylon-bd.com');
$mail->addAddress('bwlaccstore@babylon-bd.com');
$mail->addAddress('malam@babylon-bd.com');
$mail->addAddress('imrantrz@babylon-bd.com');
$mail->addAddress('masumbillah@babylon-bd.com');
$mail->addAddress('mahfuz@babylon-bd.com');
$mail->addAddress('nurtrz@babylon-bd.com');
$mail->addAddress('hris@babylon-bd.com');
$mail->addAddress('khairul@babylon-bd.com');
$mail->addAddress('ershad@babylon-bd.com');
$mail->addAddress('trendz02shop@babylon-bd.com');
$mail->addAddress('trendz01shop@gmail.com');
$mail->addAddress('trendz05shop@babylon-bd.com');
$mail->addAddress('trendz04shop@babylon-bd.com');
$mail->addAddress('trendz03shop@babylon-bd.com');
$mail->addAddress('trendz06shop@babylon-bd.com');
$mail->addAddress('trendzhrd@babylon-bd.com');
//$mail->addAddress('hris@babylon-bd.com');
        
        // Add cc or bcc 
        //$mail->addCC('akbar@babylon-bd.com');

        
        // Email subject
       // $mail->Subject = 'OD (Org.Development) Message';
		$mail->Subject = 'Test mail';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT * FROM od WHERE od_status='1' ORDER BY  STR_TO_DATE(senddate,'%Y-%m-%d') ASC LIMIT 1";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		
		foreach($result as $row)
		{
		$od=$row['image'];
		$odid=$row['odid'];
		}
		
		$sql2="UPDATE od SET od_status='0' WHERE odid='$odid'";
		$query2=$this->db->query($sql2);
		
		
		
		
		
?>
		
        <?php
		if($odid!='')
		{
        //$mail->Body ='mm';
		$mail->AddEmbeddedImage('assets/uploads/od/'.$od, 'od');
		//$mail->addEmbeddedImage('path/to/image_file.jpg', 'image_cid');

		$mail->Body = '<p><img src="cid:od"></p>';
                
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
		}
		
    }
	
				///////////////////////////////////////////////////TASK TRACKER////////////////////////////////////////////////////////
	
	
	public function tasktracker(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        //$this->load->library('phpmailer_lib');
//        
//        // PHPMailer object
//        $mail = $this->phpmailer_lib->load();
//        
//        // SMTP configuration
//        $mail->isSMTP();
//        $mail->Host     = 'mail.babylonit.com';
//        $mail->SMTPAuth = true;
//        $mail->Username = 'hris@babylonit.com';
//        $mail->Password = 'Hris@babylon';
//        $mail->SMTPSecure = 'ssl';
//        $mail->Port     = 465;
//        
//        $mail->setFrom('hris@babylonit.com', 'Task Tracker');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
        //$mail->addAddress('arifhrd@babylon-bd.com');
		//$mail->addAddress('hris@babylon-bd.com');
		//$mail->addAddress('ranahrd@babylon-bd.com');
//		$mail->addAddress('arifulhrd@babylon-bd.com');
//		$mail->addAddress('almamunhrd@babylon-bd.com');
//		$mail->addAddress('julfikar@babylon-bd.com');
//		$mail->addAddress('atlhrd@babylon-bd.com');
//		$mail->addAddress('sohelhrd@babylon-bd.com');
//		$mail->addAddress('arefeen@babylon-bd.com');
//		$mail->addAddress('bclcompliance@babylon-bd.com');
//		$mail->addAddress('tanvirhussain@babylon-bd.com');
//		$mail->addAddress('kazisumon@babylon-bd.com');
//		$mail->addAddress('tanikbtlhrd@babylon-bd.com');
//		$mail->addAddress('arifacc@babylon-bd.com');
//		$mail->addAddress('bplhrd@babylon-bd.com');
//		$mail->addAddress('jelhrd@babylon-bd.com');
//		$mail->addAddress('trendzhrd@babylon-bd.com');
//		$mail->addAddress('mostafiz@babylon-bd.com');
//		$mail->addAddress('atladmin@babylon-bd.com');
//		$mail->addAddress('masud@babylon-bd.com');
//		$mail->addAddress('simulnath@babylon-bd.com');
//		$mail->addAddress('azhar@babylon-bd.com');
        
        // Add cc or bcc 
        //$mail->addCC('akbar@babylon-bd.com');
//		$mail->addCC('apuhrd@babylon-bd.com');
//		$mail->addCC('mahmudhrd@babylon-bd.com');
//		$mail->addCC('arifhrd@babylon-bd.com');
//		$mail->addCC('parvezhrd@babylon-bd.com');
//		$mail->addCC('mshahedhrd@babylon-bd.com');
//		$mail->addCC('jahangir@babylon-bd.com');
//		$mail->addCC('arifkhan@babylon-bd.com');
//        $mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        //$mail->Subject = 'Task Tracker';
        
        // Set email format to HTML
        //$mail->isHTML(true);
        
        
		$sql1="SELECT userid,ename,oemail,SUM(ratings) as ratings,
		SUM(CASE WHEN assigneestatus = 1 THEN 1 ELSE 0 END) as ongoing,
		SUM(CASE WHEN assigneestatus = 1 AND DATEDIFF(deadline,CURDATE()) >7 THEN 1 ELSE 0 END) as gsongoing,
		SUM(CASE WHEN assigneestatus = 1 AND DATEDIFF(deadline,CURDATE()) <7 THEN 1 ELSE 0 END) as lsongoing,
		SUM(CASE WHEN assigneestatus = 1 AND DATEDIFF(deadline,CURDATE()) =1 THEN 1 ELSE 0 END) as tongoing,
		SUM(CASE WHEN assigneestatus = 1 AND DATEDIFF(deadline,CURDATE()) =2 THEN 1 ELSE 0 END) as nongoing,
		SUM(CASE WHEN assigneestatus = 2 AND assignee_submitted_date <= deadline THEN 1 ELSE 0 END) as wsubmitted,
		SUM(CASE WHEN assigneestatus = 2 AND assignee_submitted_date >= deadline THEN 1 ELSE 0 END) as osubmitted,
		SUM(CASE WHEN assigneestatus = 0 THEN 1 ELSE 0 END) as completed 
		FROM assignee_task_list
		JOIN user ON
		user.userid=assignee_task_list.assigneeid
		GROUP BY assigneeid";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		
		foreach($result as $row)
		{
			$this->load->library('phpmailer_lib');
        	// PHPMailer object
        	$mail = $this->phpmailer_lib->load();
        	// SMTP configuration
       	 	$mail->isSMTP();
        	$mail->Host     = 'shared70.accountservergroup.com';
        	$mail->SMTPAuth = true;
        	$mail->Username = 'hris@babylonit.com';
        	$mail->Password = 'Hris@babylon';
        	$mail->SMTPSecure = 'ssl';
        	$mail->Port     = 465;
			$mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
			);
        
        	$mail->setFrom('hris@babylonit.com', 'Task Tracker');
			if($row['oemail']!='')
			{
			if($row['ongoing']!=0 || $row['wsubmitted']!=0 || $row['osubmitted']!=0)
				{
					
					$oemail=$row['oemail'];
					
					$mail->Body = '<table>
										<thead>
											<th style="border: 1px solid #000000">ID</th>
											<th style="border: 1px solid #000000">Name</th>
											<th style="border: 1px solid #000000">Email</th>
											<th style="border: 1px solid #000000">Ongoing</th>
											<th style="border: 1px solid #000000">Today\'s Ongoing</th>
											<th style="border: 1px solid #000000">Next Day Ongoing</th>
											<th style="border: 1px solid #000000">Below 7 Days Ongoing</th>
											<th style="border: 1px solid #000000">Above 7 Days Ongoing</th>
											<th style="border: 1px solid #000000">Within Date Submitted</th>
											<th style="border: 1px solid #000000">Out Of The Date Submitted</th>
											<th style="border: 1px solid #000000">Completed</th>
											<th style="border: 1px solid #000000">Ratings</th>
										</thead>
										<tbody>
											<tr>
												<td style="border: 1px solid #000000";text-align:center;>'.$row['userid'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['ename'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['oemail'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['ongoing'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['tongoing'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['nongoing'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['lsongoing'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['gsongoing'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['wsubmitted'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['osubmitted'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['completed'].'</td>
												<td style="border: 1px solid #000000;text-align:center;">'.$row['ratings'].'</td>
											</tr>
										</tbody>
								   </table>';
                
        						// Send email
								//$mail->addAddress('hris@babylon-bd.com');
								
								$mail->addAddress($row['oemail']);
								$mail->addBCC('hris@babylon-bd.com');
								$mail->Subject = 'Task Tracker';
								$mail->isHTML(true);
        						if(!$mail->send())
									{
            							echo 'Message could not be sent.';
            							echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        							}
								else
									{
            							echo 'Message has been sent';
        							}
						}
				}
		}
		
		
		
		
		
		
		// Email body content
        //$mailContent = "<h3>License Tracker</h3>".
//		"<table id='tableData' class='table table-hover table-bordered'>
//		<tr style='border: 1px solid #000000'>
//		<th style='border: 1px solid #000000'>Factory</th>
//		<th style='border: 1px solid #000000'>Name</th>
//		<th style='border: 1px solid #000000'>Issue Date</th>
//		<th style='border: 1px solid #000000'>Renewal Date</th>
//		<th style='border: 1px solid #000000'>Remaining</th>
//		</tr>
//		<tr style='border: 1px solid #000000'>
//		<td style='border: 1px solid #000000'>".$fac."</td>
//		<td style='border: 1px solid #000000'>".$lname."</td>
//		<td style='border: 1px solid #000000'>".$issu."</td>
//		<td style='border: 1px solid #000000'>".$rene."</td>
//		<td style='border: 1px solid #000000'>".$re."</td>
//		</tr></table>".
//		"<br/>".
//		"<p>This is auto generated mail,no need to reply";
?>
		
        <?php
        //$mail->Body ='mm';
		//$mail->AddEmbeddedImage('assets/uploads/od/'.$od, 'od');
		//$mail->addEmbeddedImage('path/to/image_file.jpg', 'image_cid');
		//$mail->Body = '<p><img src="cid:od"></p>';
                
        // Send email
       // if(!$mail->send()){
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
//			
//        }else{
//            echo 'Message has been sent';
//        }
			
		
    }
	
	///////////////////////////////////////////////////BIRTHDAY MESSAGE//////////////////////////////////
	
	public function dob(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Birth Day Message');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
        //$mail->addAddress('arifhrd@babylon-bd.com');
		//$mail->addAddress('hoinfo@babylon-bd.com');
		//$mail->addAddress('bgfacinfo@babylon-bd.com');
		//$mail->addAddress('akbar@babylon-bd.com');
		$mail->addAddress('hris@babylon-bd.com');
		
        
        // Add cc or bcc 
        //$mail->addCC('akbar@babylon-bd.com');

        
        // Email subject
        $mail->Subject = 'Birth Day Message';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        $cdate=date('Y-m-d');
		$date = strtotime("+7 day");
		$date=date('Y-m-d', $date);
		$sql1="SELECT factoryid,userid,ename,dob FROM user WHERE dob BETWEEN '$cdate' AND '$date' AND ustatus='1'";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		
		$factoryid=array();
		$userid=array();
		$ename=array();
		$dob=array();
		foreach($result as $row)
			{
				$factoryid[]=$row['factoryid'];
				$userid[]=$row['userid'];
				$ename[]=$row['ename'];
				$dob[]=$row['dob'];
			}
		$factoryid=implode(' <br/>', $factoryid);
		$userid=implode(' <br/>', $userid);
		$ename=implode(' <br/>', $ename);
		$dob=implode(' <br/>', $dob);
		$mail->AddEmbeddedImage('assets/uploads/dob/dob.jpg', 'dob1');
		$card='<p><img style="width:100px;height:100px;" src="cid:dob1"></p>';
		 $mailContent = "<h3>Birth Day Message</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>User ID</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Date OF Birth</th>
		
		
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$factoryid."</td>
		<td style='border: 1px solid #000000'>".$userid."</td>
		<td style='border: 1px solid #000000'>".$ename."</td>
		<td style='border: 1px solid #000000'>".$dob."</td>
		
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $card."<br/>".$mailContent;
		
		
		
		
		

		
        //$mail->Body ='mm';
		
		//$mail->addEmbeddedImage('path/to/image_file.jpg', 'image_cid');

		//$mail->Body = '<p><img src="cid:od"></p>';
                
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
		
		
    }
	
	///////////////////////////////////////////////////SE//////////////////////////////////
	
	public function se(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'License');
        
		
		$mail->addAddress('hris@babylon-bd.com');
		// Email subject
        $mail->Subject = 'License';
        
        // Set email format to HTML
        $mail->isHTML(true);
        $mail->Body ='license';
                
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
	}
	
	///////////////////////////////////////////////////////////////////EXAM//////////////////////////////////////////////////////////////
	
	public function exam_test()
	 {
		
		$this->load->database();
		$this->load->model('Home_Model');
		$data['title']='Exam';
		$this->load->view('head',$data);
		//$this->load->view('toprightnav');
		//$this->load->view('leftmenu');
		$data['eln']=$this->Home_Model->exam_testname();
		$data['el']=$this->Home_Model->exam_test();
		$data['bl']=$this->Home_Model->bloodgroup_list();
		$this->load->view('exam_test',$data);
	}
	public function examresult_insert()
	 {
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Home_Model');
		if($this->input->post('submit'))
		{
			
					$userid=$this->input->post('userid');
					$mobileno=$this->input->post('mobileno');
					$nidno=$this->input->post('nidno');
					$tinno=$this->input->post('tinno');
					$bgid=$this->input->post('bgid');
					$ans=$this->input->post('ans');
					for($i=0;$i<count($ans);$i++)
					{
						$data["userid"]=$userid;
						$data["bgid"]=$bgid;
						$data["mobileno"]=$mobileno;
						$data["nidno"]=$nidno;
						$data["tinno"]=$tinno;
						$data["ans"]=$ans[$i];
						
						$ins=$this->Home_Model->examresult_insert($data);
					}
						
					if($ins==TRUE)
						{
							$this->session->set_flashdata('Successfully','Successfully Inserted');
						}
					else
						{
							$this->session->set_flashdata('Successfully','Failed To Inserted');
						}
					//redirect('Dashboard/examques_insert_form','refresh');
				
		}
	}
	
	//////////////////////////////////////////////VEHICLE TRACKER MAIL/////////////////////////////////////
	
	public function vehiclel_send(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Vehicle Info Expire Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		
        $mail->addAddress('shabuj@babylon-bd.com');
		
		
        
        // Add cc or bcc 
        //$mail->addCC('akbar@babylon-bd.com');
		$mail->addCC('arifhrd@babylon-bd.com');
		$mail->addCC('forazi@babylon-bd.com');
		$mail->addBCC('hris@babylon-bd.com');
        
        // Email subject
        $mail->Subject = 'Vehicle Info Expire Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT 
		brand,model,vehiclenumber,vehicletype,regisnumber,regisyr,color,cc,engineno,chasisno,tyresize,wheelsize,weight,fuel,seatno,price,insurance,fitness,taxtoken,
		(vinsurance_insert_view.company_address) AS ica,(vinsurance_insert_view.cost) AS ic,(vinsurance_insert_view.issudate) AS  iid,(vinsurance_insert_view.expiredate) AS ied,DATEDIFF(vinsurance_insert_view.expiredate,CURDATE()) AS ierd,
		(vtaxtoken_insert_view.company_address) AS tca,(vtaxtoken_insert_view.cost) AS tc,(vtaxtoken_insert_view.issudate) AS tid,(vtaxtoken_insert_view.expiredate) AS ted,DATEDIFF(vtaxtoken_insert_view.expiredate,CURDATE()) AS terd,
		(vfitness_insert_view.company_address) AS fca,(vfitness_insert_view.cost) AS fc,(vfitness_insert_view.issudate) AS  fid,(vfitness_insert_view.expiredate) AS fed,DATEDIFF(vfitness_insert_view.expiredate,CURDATE()) AS ferd
		FROM vehicle
		
		
		JOIN vinsurance_insert_view ON vinsurance_insert_view.vehicleno=vehicle.vehiclenumber
		JOIN vtaxtoken_insert_view ON vtaxtoken_insert_view.vehicleno=vehicle.vehiclenumber
		JOIN vfitness_insert_view ON vfitness_insert_view.vehicleno=vehicle.vehiclenumber
		JOIN vfuel_insert ON vfuel_insert.vfuid=vehicle.fuelid
		JOIN vroute_insert ON vroute_insert.vroid=vehicle.userunit";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$brand= array();
		$vehiclenumber = array();
		$brand1= array();
		$vehiclenumber1 = array();
		$brand2= array();
		$vehiclenumber2 = array();
		$iid = array();
		$ied = array();
		$tid = array();
		$ted = array();
		$fid = array();
		$fed = array();
		$ierd = array();
		$terd = array();
		$ferd = array();
		foreach($result as $row)
		{
			if($row['ierd'] < 60)
			{
				$brand[] =$row['brand'];
				$vehiclenumber[] =$row['vehiclenumber'];
				$iid[] =$row['iid'];
				$ied[] =$row['ied'];
				$ierd[] =$row['ierd'];
				
				
			}
		}
		
		$brand=implode(' <br/>', $brand);
		$vehiclenumber=implode(' <br/>', $vehiclenumber);
		$iid=implode(' <br/>', $iid);
		$ied=implode(' <br/>', $ied);
		$ierd=implode(' <br/>', $ierd);
		
		
		
		
		
		
		// Email body content
        $mailContent = "<h3>Insurance Expire List</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		
		<th style='border: 1px solid #000000'>Vehicle Number</th>
		<th style='border: 1px solid #000000'>Insurance Issue Date</th>
        <th style='border: 1px solid #000000'>Insurance Expire Date</th>
		<th style='border: 1px solid #000000'>Ins. Expire Remaining Day</th>
		
		
		</tr>
		<tr style='border: 1px solid #000000'>
		
		<td style='border: 1px solid #000000'>".$vehiclenumber."</td>
		<td style='border: 1px solid #000000'>".$iid."</td>
		<td style='border: 1px solid #000000'>".$ied."</td>
		<td style='border: 1px solid #000000'>".$ierd."</td>
		
		
		</tr></table>".
		"<br/>";
		
		
		
		foreach($result as $row1)
		{
			if($row1['terd'] < 60)
			{
				$brand1[] =$row1['brand'];
				$vehiclenumber1[] =$row1['vehiclenumber'];
				
				$tid[] =$row1['tid'];
				$ted[] =$row1['ted'];
				$terd[] =$row1['terd'];
				
				
			}
		}
		
		$brand1=implode(' <br/>', $brand1);
		$vehiclenumber1=implode(' <br/>', $vehiclenumber1);
		
		$tid=implode(' <br/>', $tid);
		$ted=implode(' <br/>', $ted);
		$terd=implode(' <br/>', $terd);
		
		
		
		
		
		
		// Email body content
        $mailContent1 = "<h3>Tax Token Expire List</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		
		<th style='border: 1px solid #000000'>Vehicle Number</th>
		
		<th style='border: 1px solid #000000'>Tax Token Issue Date</th>
        <th style='border: 1px solid #000000'>Tax Token Expire Date</th>
		<th style='border: 1px solid #000000'>Tax. Expire Remaining Day</th>
		
		
		</tr>
		<tr style='border: 1px solid #000000'>
		
		<td style='border: 1px solid #000000'>".$vehiclenumber1."</td>
		
		<td style='border: 1px solid #000000'>".$tid."</td>
		<td style='border: 1px solid #000000'>".$ted."</td>
		<td style='border: 1px solid #000000'>".$terd."</td>
		
		
		</tr></table>".
		"<br/>";
		
		
		foreach($result as $row2)
		{
			if( $row2['ferd'] < 60)
			{
				$brand2[] =$row2['brand'];
				$vehiclenumber2[] =$row2['vehiclenumber'];
				
				$fid[] =$row2['fid'];
				$fed[] =$row2['fed'];
				$ferd[] =$row2['ferd'];
				
			}
		}
		
		$brand2=implode(' <br/>', $brand2);
		$vehiclenumber2=implode(' <br/>', $vehiclenumber2);
		
		$fid=implode(' <br/>', $fid);
		$fed=implode(' <br/>', $fed);
		$ferd=implode(' <br/>', $ferd);
		
		
		
		
		
		// Email body content
        $mailContent2 = "<h3>Fitness Expire List</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		
		<th style='border: 1px solid #000000'>Vehicle Number</th>
		
		<th style='border: 1px solid #000000'>Fitness Issue Date</th>
        <th style='border: 1px solid #000000'>Fitness Expire Date</th>
		<th style='border: 1px solid #000000'>Fitness. Expire Remaining Day</th>
		
		</tr>
		<tr style='border: 1px solid #000000'>
		
		<td style='border: 1px solid #000000'>".$vehiclenumber2."</td>
		
		<td style='border: 1px solid #000000'>".$fid."</td>
		<td style='border: 1px solid #000000'>".$fed."</td>
		<td style='border: 1px solid #000000'>".$ferd."</td>
		
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent."<br/>".$mailContent1."<br/>".$mailContent2;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
	}
	
	//////////////////////////////////////////////////////////////INTERN TRACKING///////////////////////////////////////////////
	
	public function intern_tracking_send()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Intern Complete Notification');
        
        
        // Add a recipient
		 //$mail->addAddress('hris@babylon-bd.com');
		 $mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 $mail->Subject = 'Intern Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT intern_tracking.factoryid,factoryname,name,departmentname,sdate,duration,msubject,uni,mobile,rdate,itid,tsdate,icidate,intern_tracking.status FROM intern_tracking
		LEFT JOIN factory ON factory.factoryid=intern_tracking.factoryid
		LEFT JOIN department ON department.deptid=intern_tracking.deptid
		WHERE status=0";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$fac= array();
		$name = array();
		$dept = array();
		$sdate = array();
		$duration = array();
		$edate = array();
		$re = array();
		
		foreach($result as $row)
		{
			$enddate = strtotime("+".$row['duration']." days", strtotime($row['sdate']));
			$enddate = date("Y-m-d", $enddate);
			
			$now = time(); // or your date as well
			$your_date = strtotime($enddate);
			$datediff =  $your_date-$now;

			$datediff =round($datediff / (60 * 60 * 24));
			if($datediff <15)
			{
				$fac[] =$row['factoryname'];
				$name[] =$row['name'];
				$dept[] =$row['departmentname'];
				$sdate[] =$row['sdate'];
				$duration[] =$row['duration'];
				$edate[] =$enddate;
				$re[] =$datediff;
			}
		}
		
		$fac=implode(' <br/>', $fac);
		$name=implode(' <br/>', $name);
		$dept=implode(' <br/>', $dept);
		$sdate=implode(' <br/>', $sdate);
		$duration=implode(' <br/>', $duration);
		$edate=implode('<br/> ', $edate);
		$re=implode('<br/> ', $re);
		
		
		
		// Email body content
        $mailContent = "<h3>Intern Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Department</th>
		<th style='border: 1px solid #000000'>Start Date</th>
		<th style='border: 1px solid #000000'>Duration</th>
		<th style='border: 1px solid #000000'>End Date</th>
		<th style='border: 1px solid #000000'>Remaining Day</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$name."</td>
		<td style='border: 1px solid #000000'>".$dept."</td>
		<td style='border: 1px solid #000000'>".$sdate."</td>
		<td style='border: 1px solid #000000'>".$duration."</td>
		<td style='border: 1px solid #000000'>".$edate."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
	}
	
	//////////////////////////////////////////////////////////////PROBATION PERIOD TRACKING///////////////////////////////////////////////
	
	//public function provision_period_send()
//	{
//		$this->load->database();
//		$this->load->model('Admin');
//		
//		 $this->load->library('phpmailer_lib');
//        
//        // PHPMailer object
//        $mail = $this->phpmailer_lib->load();
//        
//        // SMTP configuration
//        $mail->isSMTP();
//        $mail->Host     = 'shared70.accountservergroup.com';
//        $mail->SMTPAuth = true;
//        $mail->Username = 'hris@babylonit.com';
//        $mail->Password = 'Hris@babylon';
//        $mail->SMTPSecure = 'ssl';
//        $mail->Port     = 465;
//        
//        $mail->setFrom('hris@babylonit.com', 'Probation Period Notification');
//        
//        
//        // Add a recipient
//		 //$mail->addAddress('hris@babylon-bd.com');
//		 $mail->addAddress('mshahedhrd@babylon-bd.com');
//		 $mail->addCC('akbar@babylon-bd.com');
//		 $mail->addAddress('zonehr@babylon-bd.com');
//		 $mail->addBCC('hris@babylon-bd.com');
//		 $mail->Subject = 'Probation Period Tracker';
//        
//        // Set email format to HTML
//        $mail->isHTML(true);
//		//$query="SELECT factoryid,userid,ename,doj,pperiod FROM user WHERE pperiod_status='1' AND service_type!='3'";
//		$query="SELECT user.factoryid,userid,ename,departmentname,echilddesignation,doj,pperiod,pperiod_status,commitment FROM user
//				LEFT JOIN department ON department.deptid=user.departmentid
//				LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid 
//				WHERE (pperiod_status='1' OR pperiod_status='2') AND service_type='1' AND ustatus='1'";
//		$result=$this->db->query($query);
//		$result=$result->result_array();
//		
//		$factoryid= array();
//		$userid = array();
//		$ename = array();
//		$doj = array();
//		$dept = array();
//		$desig = array();
//		$pperiod = array();
//		$edate = array();
//		$re = array();
//		$ps = array();
//		$commitment = array();
//
//		foreach($result as $row)
//		{
//			$enddate = strtotime("+".$row['pperiod']." days", strtotime($row['doj']));
//			$enddate = date("Y-m-d", $enddate);
//			
//			$now = time(); // or your date as well
//			$your_date = strtotime($enddate);
//			$datediff =  $your_date-$now;
//
//			$datediff =round($datediff / (60 * 60 * 24));
//			if($datediff <15)
//			{
//				$factoryid[] =$row['factoryid'];
//				$userid[] =$row['userid'];
//				$ename[] =$row['ename'];
//				$doj[] =$row['doj'];
//				$dept[] =$row['departmentname'];
//				$desig[] =$row['echilddesignation'];
//				$pperiod[] =$row['pperiod'];
//				$commitment[] =$row['commitment'];
//				$edate[] =$enddate;
//				$re[] =$datediff;
//				if($row['pperiod_status']==1)
//				{
//					$ps[] ='Need To Be Processed';
//				}
//				if($row['pperiod_status']==2)
//				{
//					$ps[] ='Processing';
//				}
//				
//			}
//		}
//		
//		$factoryid=implode(' <br/>', $factoryid);
//		$userid=implode(' <br/>', $userid);
//		$ename=implode(' <br/>', $ename);
//		$dept=implode(' <br/>', $dept);
//		$desig=implode(' <br/>', $desig);
//		$doj=implode(' <br/>', $doj);
//		$pperiod=implode(' <br/>', $pperiod);
//		$commitment=implode(' <br/>', $commitment);
//		$edate=implode('<br/> ', $edate);
//		$re=implode('<br/> ', $re);
//		$ps=implode('<br/> ', $ps);
//
//		
//		
//		// Email body content
//        $mailContent = "<h3>Probation Period Tracker</h3>".
//		"<table id='tableData' class='table table-hover table-bordered'>
//		<tr style='border: 1px solid #000000'>
//		<th style='border: 1px solid #000000'>Factory</th>
//		<th style='border: 1px solid #000000'>User ID</th>
//		<th style='border: 1px solid #000000'>Name</th>
//		<th style='border: 1px solid #000000'>Department</th>
//		<th style='border: 1px solid #000000'>Designation</th>
//		<th style='border: 1px solid #000000'>Date Of Join</th>
//		<th style='border: 1px solid #000000'>Probation Period</th>
//		<th style='border: 1px solid #000000'>End Date</th>
//		<th style='border: 1px solid #000000'>Remaining Day</th>
//		<th style='border: 1px solid #000000'>Status</th>
//		<th style='border: 1px solid #000000'>Commitment</th>
//		</tr>
//		<tr style='border: 1px solid #000000'>
//		<td style='border: 1px solid #000000'>".$factoryid."</td>
//		<td style='border: 1px solid #000000'>".$userid."</td>
//		<td style='border: 1px solid #000000'>".$ename."</td>
//		<td style='border: 1px solid #000000'>".$dept."</td>
//		<td style='border: 1px solid #000000'>".$desig."</td>
//		<td style='border: 1px solid #000000'>".$doj."</td>
//		<td style='border: 1px solid #000000'>".$pperiod."</td>
//		<td style='border: 1px solid #000000'>".$edate."</td>
//		<td style='border: 1px solid #000000'>".$re."</td>
//		<td style='border: 1px solid #000000'>".$ps."</td>
//		<td style='border: 1px solid #000000'>".$commitment."</td>
//		</tr></table>".
//		"<br/>".
//		"<p>This is auto generated mail,no need to reply";
//		
//        $mail->Body = $mailContent;
//        
//        // Send email
//        if(!$mail->send()){
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
//			
//        }else{
//            echo 'Message has been sent';
//        }
//	}

	public function provision_period_send()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Probation Period Notification');
        
        
        // Add a recipient
		 //$mail->addAddress('hris@babylon-bd.com');
		 $mail->addAddress('mshahedhrd@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addAddress('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 $mail->Subject = 'Probation Period Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		//$query="SELECT factoryid,userid,ename,doj,pperiod FROM user WHERE pperiod_status='1' AND service_type!='3'";
		//$query="SELECT user.factoryid,userid,ename,departmentname,echilddesignation,doj,pperiod,pperiod_status,commitment FROM user
//				LEFT JOIN department ON department.deptid=user.departmentid
//				LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid 
//				WHERE (pperiod_status='1' OR pperiod_status='2') AND service_type='1' AND ustatus='1'";
$query="SELECT user.factoryid,userid,ename,departmentname,user.parentdesignationid,echilddesignation,doj,pperiod,pperiod_status,commitment FROM user
				LEFT JOIN department ON department.deptid=user.departmentid
				LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
				LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid 
				WHERE (pperiod_status='1' OR pperiod_status='2') AND service_type='1' AND ustatus='1' AND (user.factoryid='HO' OR user.parentdesignationid='2' OR user.parentdesignationid='6')";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$factoryid= array();
		$userid = array();
		$ename = array();
		$doj = array();
		$dept = array();
		$desig = array();
		$pperiod = array();
		$edate = array();
		$re = array();
		$ps = array();
		$commitment = array();
		$all=array();
		foreach($result as $row)
		{
			$enddate = strtotime("+".$row['pperiod']." days", strtotime($row['doj']));
			$enddate = date("Y-m-d", $enddate);
			
			$now = time(); // or your date as well
			$your_date = strtotime($enddate);
			$datediff =  $your_date-$now;

			$datediff =round($datediff / (60 * 60 * 24));
			if($datediff <15)
			{
				//$factoryid[] =$row['factoryid'];
//				$userid[] =$row['userid'];
//				$ename[] =$row['ename'];
//				$doj[] =$row['doj'];
//				$dept[] =$row['departmentname'];
//				$desig[] =$row['echilddesignation'];
//				$pperiod[] =$row['pperiod'];
//				$commitment[] =$row['commitment'];
//				$edate[] =$enddate;
//				$re[] =$datediff;
				if($row['pperiod_status']==1)
				{
					//$ps[] ='Need To Be Processed';
					$ps ='Need To Be Processed';
				}
				if($row['pperiod_status']==2)
				{
					//$ps[] ='Processing';
					$ps ='Processing';
				}
				
				
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000; text-align:center'>".$row['factoryid']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['userid']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['ename']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['departmentname']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['echilddesignation']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['doj']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['pperiod']."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$enddate."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$datediff."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$ps."</td>
						<td style='border: 1px solid #000000; text-align:center'>".$row['commitment']."</td>
					</tr>";
				
			}
		}
		
		$all=implode(' <br/>', $all);
		
		//$factoryid=implode(' <br/>', $factoryid);
//		$userid=implode(' <br/>', $userid);
//		$ename=implode(' <br/>', $ename);
//		$dept=implode(' <br/>', $dept);
//		$desig=implode(' <br/>', $desig);
//		$doj=implode(' <br/>', $doj);
//		$pperiod=implode(' <br/>', $pperiod);
//		$commitment=implode(' <br/>', $commitment);
//		$edate=implode('<br/> ', $edate);
//		$re=implode('<br/> ', $re);
//		$ps=implode('<br/> ', $ps);

		
		
		// Email body content
        $mailContent = "<h3>Probation Period Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>User ID</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Department</th>
		<th style='border: 1px solid #000000'>Designation</th>
		<th style='border: 1px solid #000000'>Date Of Join</th>
		<th style='border: 1px solid #000000'>Probation Period</th>
		<th style='border: 1px solid #000000'>End Date</th>
		<th style='border: 1px solid #000000'>Remaining Day</th>
		<th style='border: 1px solid #000000'>Status</th>
		<th style='border: 1px solid #000000'>Commitment</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
	}
	
	//////////////////////////////////////////////////////////////CONTRACT PERIOD TRACKING///////////////////////////////////////////////
	
	public function contract_period_send()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Contract Period Notification');
        
        
        // Add a recipient
		 //$mail->addAddress('hris@babylon-bd.com');
		 $mail->addAddress('mshahedhrd@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addAddress('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 $mail->Subject = 'Contract Period Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		//$query="SELECT factoryid,userid,ename,doj,pperiod FROM user WHERE pperiod_status='1' AND service_type!='3'";
		$query="SELECT user.factoryid,userid,ename,departmentname,echilddesignation,doj,commitment,indate FROM user
				LEFT JOIN department ON department.deptid=user.departmentid
				LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
				LEFT JOIN worktype ON worktype.wtid=user.work_type 
				WHERE work_type='2'  AND service_type!='3' AND ustatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$factoryid= array();
		$userid = array();
		$ename = array();
		$doj = array();
		$dept = array();
		$desig = array();
		$indate = array();
		$commitment = array();
		$re = array();
		foreach($result as $row)
		{
			//$enddate = strtotime("+".$row['pperiod']." days", strtotime($row['doj']));
			//$indate = date("Y-m-d", strtotime($indate));
			
			$now = time(); // or your date as well
			$your_date = strtotime($row['indate']);
			$datediff =  $your_date-$now;

			$datediff =round($datediff / (60 * 60 * 24));
			if($datediff <45)
			{
				$factoryid[] =$row['factoryid'];
				$userid[] =$row['userid'];
				$ename[] =$row['ename'];
				$doj[] =$row['doj'];
				$dept[] =$row['departmentname'];
				$desig[] =$row['echilddesignation'];
				$commitment[] =$row['commitment'];
				$indate[] =$row['indate'];
				$re[] =$datediff;
				//if($row['pperiod_status']==1)
//				{
//					$ps[] ='Need To Be Processed';
//				}
//				if($row['pperiod_status']==2)
//				{
//					$ps[] ='Processing';
//				}
				
			}
		}
		
		$factoryid=implode(' <br/>', $factoryid);
		$userid=implode(' <br/>', $userid);
		$ename=implode(' <br/>', $ename);
		$dept=implode(' <br/>', $dept);
		$desig=implode(' <br/>', $desig);
		$doj=implode(' <br/>', $doj);
		$commitment=implode(' <br/>', $commitment);
		$indate=implode('<br/> ', $indate);
		$re=implode('<br/> ', $re);
		

		
		
		// Email body content
        $mailContent = "<h3>Contract Period Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>User ID</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Department</th>
		<th style='border: 1px solid #000000'>Designation</th>
		<th style='border: 1px solid #000000'>Date Of Join</th>
		
		<th style='border: 1px solid #000000'>End Date</th>
		<th style='border: 1px solid #000000'>Remaining Day</th>
		
		<th style='border: 1px solid #000000'>Commitment</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$factoryid."</td>
		<td style='border: 1px solid #000000'>".$userid."</td>
		<td style='border: 1px solid #000000'>".$ename."</td>
		<td style='border: 1px solid #000000'>".$dept."</td>
		<td style='border: 1px solid #000000'>".$desig."</td>
		<td style='border: 1px solid #000000'>".$doj."</td>
		
		<td style='border: 1px solid #000000'>".$indate."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		
		<td style='border: 1px solid #000000'>".$commitment."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
	}
	
	//////////////////////////////////////////////////////////////COURT CASE TRACKING///////////////////////////////////////////////
	
	public function case_court_send()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Court Case Notification');
        
        
        // Add a recipient
		 $mail->addAddress('zonehr@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'Court Case Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT DATEDIFF(hfdate,CURDATE()) AS remaining,camount,SUM(qty) AS qty,case_insert.caseid,factoryid,casenumber,hfdate FROM case_insert 
				JOIN hearing_date_case_file_view ON hearing_date_case_file_view.caseid=case_insert.caseid
				LEFT JOIN caseexpense_insert ON caseexpense_insert.caseid=case_insert.caseid
				GROUP BY case_insert.caseid";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$caseid = array();
		$factoryid= array();
		$casenumber = array();
		$hfdate = array();
		$camount = array();
		$qty = array();
		$re = array();
		foreach($result as $row)
		{
			if($row['remaining'] <11)
			{
				$caseid[] =$row['caseid'];
				$factoryid[] =$row['factoryid'];
				$casenumber[] =$row['casenumber'];
				$hfdate[] =$row['hfdate'];
				$camount[] =$row['camount'];
				$qty[] =$row['qty'];
				$re[] =$row['remaining'];
			}
		}
		
		$caseid=implode(' <br/>', $caseid);
		$factoryid=implode(' <br/>', $factoryid);
		$casenumber=implode(' <br/>', $casenumber);
		$hfdate=implode(' <br/>', $hfdate);
		$camount=implode(' <br/>', $camount);
		$qty=implode(' <br/>', $qty);
		$re=implode(' <br/>', $re);
		
		
		
		// Email body content
        $mailContent = "<h3>Court Case Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Case ID</th>
		<th style='border: 1px solid #000000'>Factory ID</th>
		<th style='border: 1px solid #000000'>Case Number</th>
		<th style='border: 1px solid #000000'>Hearing Date</th>
		<th style='border: 1px solid #000000'>Amount</th>
		<th style='border: 1px solid #000000'>Expense</th>
		<th style='border: 1px solid #000000'>Remaining Day</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$caseid."</td>
		<td style='border: 1px solid #000000'>".$factoryid."</td>
		<td style='border: 1px solid #000000'>".$casenumber."</td>
		<td style='border: 1px solid #000000'>".$hfdate."</td>
		<td style='border: 1px solid #000000'>".$camount."</td>
		<td style='border: 1px solid #000000'>".$qty."</td>
		<td style='border: 1px solid #000000'>".$re."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
	}
	
	//////////////////////////////////////////////////////////////HOT LINE TRACKING///////////////////////////////////////////////
	
	public function hotline_send_nounit()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 $mail->addAddress('zonehr@babylon-bd.com');
		 //$mail->addAddress('akbar@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE hcstatus='1' AND unit=''";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
			//if($row['unit'] =='')
//			{
				$hcid[] =$row['hcid'];
//				$factoryid[] =$row['unit'];
//				$reportername[] =$row['reportername'];
//				$details[] =$row['details'];
//				$rdate[] =$row['rdate'];
//				$reporttime[] =$row['reporttime'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
		
		<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
		<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
		<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
		<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
		</tr>";
			//}
		}
		$all=implode(' <br/>', $all);
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
//		$factoryid=implode(' <br/>', $factoryid);
//		$reportername=implode(' <br/>', $reportername);
//		$details=implode(' <br/>', $details);
//		$rdate=implode(' <br/>', $rdate);
//		$reporttime=implode(' <br/>', $reporttime);
		
		
		
		// Email body content
        //$mailContent = "<h3>Hot Line Tracker</h3>".
//		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
//		<tr style='border: 1px solid #000000'>
//		<th style='border: 1px solid #000000'>ID</th>
//		
//		<th style='border: 1px solid #000000'>Reporter</th>
//		<th style='border: 1px solid #000000'>Details</th>
//		<th style='border: 1px solid #000000'>Date</th>
//		<th style='border: 1px solid #000000'>Time</th>
//		</tr>
//		<tr style='border: 1px solid #000000'>
//		<td style='border: 1px solid #000000'>".$hcid."</td>
//		
//		<td style='border: 1px solid #000000'>".$reportername."</td>
//		<td style='border: 1px solid #000000'>".$details."</td>
//		<td style='border: 1px solid #000000'>".$rdate."</td>
//		<td style='border: 1px solid #000000'>".$reporttime."</td>
//		</tr></table>".
//		"<br/>".
//		"<p>This is auto generated mail,no need to reply";
		
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	
	public function hotline_send_unit()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 //$mail->addAddress('zonehr@babylon-bd.com');
		 //$mail->addAddress('akbar@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
			if($row['unit'] !='')
			{
				$hcid[] =$row['hcid'];
				//$factoryid[] =$row['unit'];
//				$reportername[] =$row['reportername'];
//				$details[] =$row['details'];
//				$rdate[] =$row['rdate'];
//				$reporttime[] =$row['reporttime'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
		<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
		<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
		<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
		<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
		<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
		</tr>";
			}
		}
		$all=implode(' <br/>', $all);
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		
		//$hcid=implode(' <br/>', $hcid);
//		$factoryid=implode(' <br/>', $factoryid);
//		$reportername=implode(' <br/>', $reportername);
//		$details=implode(' <br/>', $details);
//		$rdate=implode(' <br/>', $rdate);
//		$reporttime=implode(' <br/>', $reporttime);
		
		
		
		// Email body content
        //$mailContent = "<h3>Hot Line Tracker</h3>".
//		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
//		<tr style='border: 1px solid #000000'>
//		<th style='border: 1px solid #000000'>ID</th>
//		<th style='border: 1px solid #000000'>Unit</th>
//		<th style='border: 1px solid #000000'>Reporter</th>
//		<th style='border: 1px solid #000000'>Details</th>
//		<th style='border: 1px solid #000000'>Date</th>
//		<th style='border: 1px solid #000000'>Time</th>
//		</tr>
//		<tr style='border: 1px solid #000000'>
//		<td style='border: 1px solid #000000'>".$hcid."</td>
//		<td style='border: 1px solid #000000'>".$factoryid."</td>
//		<td style='border: 1px solid #000000'>".$reportername."</td>
//		<td style='border: 1px solid #000000'>".$details."</td>
//		<td style='border: 1px solid #000000'>".$rdate."</td>
//		<td style='border: 1px solid #000000'>".$reporttime."</td>
//		</tr></table>".
//		"<br/>".
//		"<p>This is auto generated mail,no need to reply";
		
        if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitBGL()
	{
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 $mail->addAddress('mamunhrd@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='BGL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
				<tr style='border: 1px solid #000000'>
					<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
					<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
					<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
					<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
					<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
					<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
				</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitAKL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('arifulhrd@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='AKL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitAFL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('tanvirhussain@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='AFL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitATL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('atlhrac@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='ATL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitBCL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('bclhrac@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='BCL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitBTL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('btlhrac@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='BTL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitBPL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('btlhrac@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='BPL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitJEL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('btlhrac@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='JEL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	public function hotline_send_unitBWL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Hot Line Notification');
        
        
        // Add a recipient
		 
		 $mail->addAddress('julfikar@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'HLMS Tracker';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT * FROM hcall_insert WHERE unit='BWL' AND hcstatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$hcid = array();
		$factoryid= array();
		$reportername = array();
		$details = array();
		$rdate = array();
		$reporttime = array();
		$all=array();
		foreach($result as $row)
		{
				$hcid[] =$row['hcid'];
				$row['hcid'];
				$row['unit'];
				$row['reportername'];
				$row['details'];
				$row['rdate'];
				$row['reporttime'];
				$all[]= "
					<tr style='border: 1px solid #000000'>
						<td style='border: 1px solid #000000' width:'20px'>".$row['hcid']."</td>
						<td style='border: 1px solid #000000' width:'20px'>".$row['unit']."</td>
						<td style='border: 1px solid #000000' width:'150px'>".$row['reportername']."</td>
						<td style='border: 1px solid #000000' width:'500px'>".$row['details']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['rdate']."</td>
						<td style='border: 1px solid #000000' width:'100px'>".$row['reporttime']."</td>
					</tr>";
			
		}
		$all=implode(' <br/>', $all);
		
		// Email body content
		
		$mailContent ="<h3>Hot Line Tracker</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000' width:'20px'>ID</th>
		<th style='border: 1px solid #000000' width:'20px'>Unit</th>
		<th style='border: 1px solid #000000' width:'150px'>Reporter</th>
		<th style='border: 1px solid #000000' width:'500px'>Details</th>
		<th style='border: 1px solid #000000' width:'100px'>Date</th>
		<th style='border: 1px solid #000000' width:'100px'>Time</th>
		</tr>".
		$all
		."</table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		$hcid=implode(' <br/>', $hcid);
		if($hcid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	
	//////////////////////////////////////////////////////////SUGGESTIOIN BOX/////////////////////////////////////////////////////////
	
	public function suggestion_box_openAKL()
	{
		$this->load->database();
		$this->load->model('Admin');
		
		 $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Box Open Info');
        
        
        // Add a recipient
		 //$mail->addAddress('zonehr@babylon-bd.com');
		 //$mail->addAddress('akbar@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 //$mail->addCC('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		 //$mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->Subject = 'Box Open Info';
        
        // Set email format to HTML
        $mail->isHTML(true);
		$query="SELECT DATEDIFF(ndate,CURDATE()) AS remaining,boid,boxopen_insert.factoryid,boxno,sno,odate,ndate 
		FROM boxopen_insert 
		JOIN boxno_insert ON boxno_insert.biid=boxopen_insert.biid
		WHERE boxopen_insert.factoryid='AKL' AND bostatus='1'";
		$result=$this->db->query($query);
		$result=$result->result_array();
		
		$boid = array();
		$factoryid= array();
		$boxno = array();
		$sno = array();
		$ndate = array();
		$remaining = array();
		foreach($result as $row)
		{
			if($row['remaining'] <='1')
			{
				$boid[] =$row['boid'];
				$factoryid[] =$row['factoryid'];
				$boxno[] =$row['boxno'];
				$sno[] =$row['sno'];
				$ndate[] =$row['ndate'];
				$remaining[] =$row['remaining'];
			}
		}
		
		$boid=implode(' <br/>', $boid);
		$factoryid=implode(' <br/>', $factoryid);
		$boxno=implode(' <br/>', $boxno);
		$sno=implode(' <br/>', $sno);
		$ndate=implode(' <br/>', $ndate);
		$remaining=implode(' <br/>', $remaining);
		
		
		
		// Email body content
        $mailContent = "<h3>Box Open Info</h3>".
		"<table id='tableData' class='table table-hover table-bordered' style='border-collapse: collapse;'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Unit</th>
		<th style='border: 1px solid #000000'>Box No</th>
		<th style='border: 1px solid #000000'>Open Date</th>
		<th style='border: 1px solid #000000'>Remaining</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$factoryid."</td>
		<td style='border: 1px solid #000000'>".$boxno."</td>
		<td style='border: 1px solid #000000'>".$ndate."</td>
		<td style='border: 1px solid #000000'>".$remaining."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        if($boid!='')
			{
        		$mail->Body = $mailContent;
				$mail->CharSet = 'UTF-8';
        		// Send email
        		if(!$mail->send())
					{
            			echo 'Message could not be sent.';
            			echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        			}
				else
					{
            			echo 'Message has been sent';
        			}
			}
		else
			{
				echo 'No Content';
			}
	}
	
	/////////////////////////////////////////////////////////////RETIREMENT MAIL/////////////////////////////////////////////////////////	
	
	public function retirement(){
		$this->load->database();
		
		$this->load->model('Admin');
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'shared70.accountservergroup.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hris@babylonit.com';
        $mail->Password = 'Hris@babylon';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);
        
        $mail->setFrom('hris@babylonit.com', 'Retirement Notification');
        //$mail->addReplyTo('info@example.com', 'Test');
        
        // Add a recipient
		$mail->addAddress('arifhrd@babylon-bd.com');
		 $mail->addAddress('mshahedhrd@babylon-bd.com');
		 $mail->addAddress('parvezhrd@babylon-bd.com');
		 $mail->addAddress('jahidulhrd@babylon-bd.com');
		 //$mail->addCC('akbar@babylon-bd.com');
		 $mail->addAddress('zonehr@babylon-bd.com');
		 $mail->addBCC('hris@babylon-bd.com');
		
        
        
        
        
        // Email subject
        $mail->Subject = 'Retirement Notification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        
		$sql1="SELECT user.factoryid,user.userid,factory.factoryname,division.divisionname,(user.divisionid) AS diviid,user.departmentid,department.deptid,department.departmentname,user.sectionid,section.sectionname,user.subsectionid,subsection.subsectionname,user.location,user.ename,user.bname,user.parentdesignationid,user.childdesignationid,user.religion,user.maritual,user.dob,user.doj,user.hdistrict,user.epermanentaddress,user.bpermanentaddress,user.epresentaddress,user.bpresentaddress,user.nid,user.blodgroup,user.gender,user.salary,user.efficiency,user.identification,user.oemail,user.pemail,user.pmobile,user.emobile,user.user_type,user.service_type,user.puserid,user.ruserid,user.password,user.ustatus,usertype.usertypeid,usertype.usertype,servicetype.servicetypeid,servicetype.servicetype,userstatus.userstatusid,userstatus.userstatus,religion.religionid,religion.religionname,maritualstatus.maritualstatusid,maritualstatus.maritualstatus,gender.genderid,gender.gender,user.password,parentdesignation.eparentdesignation,parentdesignation.parentdesignationid,parentdesignation.bparentdesignation,childdesignation.childdesignationid,childdesignation.echilddesignation,childdesignation.bchilddesignation,user.pperiod,worktype,user.pperiod_status,user.image,DATEDIFF(doj,CURDATE()) AS remaining  FROM user
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN division ON division.divisionid=user.divisionid 
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN section ON section.secid=user.sectionid
		LEFT JOIN subsection ON subsection.subsecid=user.subsectionid
		LEFT JOIN parentdesignation ON parentdesignation.parentdesignationid=user.parentdesignationid
		LEFT JOIN childdesignation ON childdesignation.childdesignationid=user.childdesignationid
		LEFT JOIN religion ON religion.religionid=user.religion
		LEFT JOIN maritualstatus ON maritualstatus.maritualstatusid=user.maritual
		LEFT JOIN gender ON gender.genderid=user.gender
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type 
		LEFT JOIN servicetype ON servicetype.servicetypeid=user.service_type
		LEFT JOIN worktype ON worktype.wtid=user.work_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE DATEDIFF(CURDATE(),doj) >= 9600 AND ustatus!='2'
		ORDER BY user.userid";
		$query1=$this->db->query($sql1);
		$result=$query1->result_array();
		$fac= array();
		$userid = array();
		$ename = array();
		$doj = array();
		$dor = array();
		$remining = array();
		foreach($result as $row)
		{
			$date=$row['doj'];
			$date = strtotime($date);
			$date = strtotime("+9855 day", $date);
			$date = date('Y-m-d', $date);
			
			$datetime1 = date_create(date('Y-m-d'));
			$datetime2 = date_create($date);

			// Calculates the difference between DateTime objects
			$interval = date_diff($datetime1, $datetime2);

			// Printing result in years & months format
			$dateDifference= $interval->format('%R%y years %m months %d days');

				$fac[] =$row['factoryid'];
				$userid[] =$row['userid'];
				$ename[] =$row['ename'];
				$doj[] =$row['doj'];
				$dor[] =$date;
				$remining[] =$dateDifference;
		}
		
		$fac=implode(' <br/>', $fac);
		$userid=implode(' <br/>', $userid);
		$ename=implode(' <br/>', $ename);
		$doj=implode(' <br/>', $doj);
		$dor=implode(' <br/>', $dor);
		$remining=implode(' <br/>', $remining);
		
		
		// Email body content
        $mailContent = "<h3>Retirement Tracking Report</h3>".
		"<table id='tableData' class='table table-hover table-bordered'>
		<tr style='border: 1px solid #000000'>
		<th style='border: 1px solid #000000'>Factory</th>
		<th style='border: 1px solid #000000'>ID</th>
		<th style='border: 1px solid #000000'>Name</th>
		<th style='border: 1px solid #000000'>Join Date</th>
		<th style='border: 1px solid #000000'>Retirement Date</th>
		<th style='border: 1px solid #000000'>Remaining Date</th>
		</tr>
		<tr style='border: 1px solid #000000'>
		<td style='border: 1px solid #000000'>".$fac."</td>
		<td style='border: 1px solid #000000'>".$userid."</td>
		<td style='border: 1px solid #000000'>".$ename."</td>
		<td style='border: 1px solid #000000'>".$doj."</td>
		<td style='border: 1px solid #000000'>".$dor."</td>
		<td style='border: 1px solid #000000'>".$remining."</td>
		</tr></table>".
		"<br/>".
		"<p>This is auto generated mail,no need to reply";
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
			
        }else{
            echo 'Message has been sent';
        }
			
		
    }
	
}
