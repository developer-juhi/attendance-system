<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceController extends CI_Controller {

	function __construct() //defalut calls construct
	{
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Common','common');//defalut load model 
        $this->load->library('form_validation'); // load form lidation libaray 
        $this->load->helper('form');
        $this->load->helper('text');
        if(!$this->session->userdata('userName')){
            redirect('admin-login');
        }
	}
	public function index()
	{
     
    }
	public function list()
	{
        $tablename = 'attendance';
        $condition = array(
            'status' => 0,
        );
        $select = '*';
        $data = $this->common->select($select,$condition,$tablename);
        $userdata = array(
            'userdata' => $data,
        );

		$this->load->view('comman/header');
        $this->load->view('attendance/index',$userdata);
        $this->load->view('comman/footer');
    }


    public function add()
	{
        $tablename = 'tbl_user';
        $condition = array(
            'status' => 0,
        );
        $select = '*';

        $data = $this->common->select($select,$condition,$tablename);
        $userdata = array(
            'userdata' => $data,
        );
		$this->load->view('comman/header');
        $this->load->view('attendance/add',$userdata);
        $this->load->view('comman/footer');
    }



    public function save()
    {
        $this->form_validation->set_rules('user_id', 'User Name ', 'trim|required');
        $this->form_validation->set_rules('date', 'Date  ', 'trim|required');
        $this->form_validation->set_rules('in_time', 'In Time', 'trim|required');
        // $this->form_validation->set_rules('out_time', 'Company Name ', 'trim|required');
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{       
                
            $data = array(
                'user_id' => $this->input->post('user_id'),  
                'date' => $this->input->post('date'),  
                'in_time' => $this->input->post('in_time'),  
                'status' => 0,
            );            
            $tablename = 'attendance';
            $data = $this->common->insert($tablename,$data);
            if($data)
            {
                $url = base_url('attendance'); 
                $output = array("status"=>true, "message"=>"Attendance Cretaed Successfully" ,'url' => $url);
                echo json_encode($output);
                return;

            }else{
                $output = array("status"=>false, "error"=>"Somthing Wrong");
                echo json_encode($output);
                return;
            }
        }              
                    
    }
    public function edit()
    {        
        $sid = $this->input->get('id');      
        $tablename = 'company';
        $condition = array(
            'id' => $sid,
        );
        $select = '*';
        $data = $this->common->selects($select,$condition,$tablename);
        $pageData = array(
            'data' => $data,
        );

        $this->load->view('comman/header');
        $this->load->view('company/edit',$pageData);
        $this->load->view('comman/footer');
    }

    public function saveEdit(){

        $this->form_validation->set_rules('name','Comapny Name', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;

        }else{        
            $sildeid = $this->input->post('id');
            $data = array( 
                'name' =>  $this->input->post('name'),              
            );                
        
            $condition2 = array(
                'id' => $this->input->post('id'),
            );
            $tablename = 'company';
            $updateData = $this->common->update($condition2,$data,$tablename); 
            if($updateData == 1)
            {                 
                $output = array("status"=>true, "message"=>"Company Updated Successfully","url" => "company");
                echo json_encode($output);
                return;
            }
            else
            {
                $output = array("status"=>false, "message"=>"Error");
                echo json_encode($output);
                return;
            }
        }
    }

    
    public function delete(){
        $id =  $this->input->post('id');
        if($id){                        
            $tablename = 'attendance';
            $condition = array(
                'id' => $id,
            );
            $data = array(
                'status' => 1,
            );            
            $data = $this->common->deletes($condition,$data,$tablename);

            if($data)
            {
                $output = array("status"=>true, "message"=>"Attendance Deleted Successfully","url" => "attendance");
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
?>