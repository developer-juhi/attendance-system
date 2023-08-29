<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgetpasswordController extends CI_Controller {

	function __construct() //defalut calls construct
	{
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Common','common');//defalut load model 
        $this->load->library('form_validation'); // load form lidation libaray 
        $this->load->helper('form');
        $this->load->helper('text');
      
	}
	public function index()
	{
        
    }

    public function user_check_email()
	{
		$this->load->view('comman/header');
        $this->load->view('user/user_check_email');
        $this->load->view('comman/footer');
    }
	public function user_check_email_save()
	{
        $this->form_validation->set_rules('email', 'Email Id', 'trim|required');            
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{ 
            $email = $this->input->post('email');
            $code = rand();
			$condition=array(
				'email'=>$email,
			);
			$tablename = "tbl_user";
			$select="*";				
            $result = $this->common->selects($select,$condition,$tablename);  

            $data=array(
				'code'=>$code,
			);       
        
            $updateData = $this->common->update($condition,$data,$tablename);             

			if($result)
			{
                $this->load->library('email');

                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_user'] = 'kothwalajuhi143@gmail.com';
                $config['smtp_pass'] = 'juhi1434@';
                $config['smtp_port'] = 587;
                $config['smtp_crypto'] = 'tls';                
                $config['mailtype'] = 'html';                
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $from_email = "kothwalajuhi143@gmail.com";
                $to_email = "kothwalajuhi143@gmail.com";
                $email_header ="<!doctype html>
                <html>
                <head>
                <title></title>
                </head>
                <br>
                <br>
                <table width='620px'  border-radius: 50px 20px; cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                <td style='text-align: center; background-image: linear-gradient(to bottom right, #a70e0f , #df4444); '>
                <h2 style='font-weight:400;font-family: Roboto, sans-serif;color: #fff;font-size: 22px;float: center;'>Welcome to the 
                <b style='color: #fff;'> </b>
                </h2>
                </td>
                </tr>
                </tbody>
                </table>
                <table width='620px' height='10%'  border-radius: 50px 20px; cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                <td background: #fff;'>
                <h2>";
                $main ="<a href=".base_url().'user-change-password?code='.$code.'&email='.$email."><button>Click ME </button></a>";

                $email_footer ="</h2>
                </td>
                </tr>
                </tbody>
                </table>
                <table width='620px' height='5%' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                <td style='text-align: center;  background-image: linear-gradient(to bottom right, #a70e0f , #df4444); '>
                <h2 style='font-weight:200;font-family: Roboto, sans-serif;color: #fff;font-size: 22px;float: right;'>
                <span><b>Regards</b></span>
                <span> Team &nbsp;&nbsp;&nbsp;&nbsp;</span>
                </h2>
                </td>
                </tr>
                </tbody>
                </table>";
                
                //Load email library
                $this->load->library('email');
                $this->email->from($from_email, 'Identification');
                $this->email->to($email);
                $this->email->subject('Send Email Codeigniter');
                $this->email->message( $email_header.$main.$email_footer);

                
                if ($this->email->send()) 
                {
                    $url = base_url(); 
                    $output = array("status"=>true, "message"=>"Send Reset Password Link On Your Gmail" ,'url' => $url);
                    echo json_encode($output);
                    return;              
                } 
                else 
                {
                    $output = array("status"=>false, "error"=>$this->email->print_debugger());
                    echo json_encode($output); 
                    return;
                }
			}else{
				$output = array("status"=>false, "error"=>"username not found");
				echo json_encode($output); 
				return;
			}	           
        }
	
    }
	public function user_change_password()
	{
		$this->load->view('comman/header');
        $this->load->view('user/user_change_password');
        $this->load->view('comman/footer');
    }
	public function user_change_password_save()
	{
        $this->form_validation->set_rules('new', 'new', 'trim|required');            
        $this->form_validation->set_rules('confirm', 'confirm', 'trim|required');            
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{  

            $email = $this->input->post('email');

            $code = $this->input->post('code');
            $condition=array(
				'email'=>$email,
				'code'=>$code,
			);
            $tablename = "tbl_user";
            
            $data = array(
                    'password'=>md5($this->input->post('new')),
                    'code'=>NULL,
                );       
        
            $updateData = $this->common->update($condition,$data,$tablename); 



            if($updateData){

                $url = base_url(); 
                $output = array("status"=>true, "message"=>"Change Password" ,'url' => $url);
                echo json_encode($output);
                return;

            }else{

                $output = array("status"=>false, "error"=>"Somthing Wrong");
                echo json_encode($output);
                return;
            }
        }
        		
    }
    

}
