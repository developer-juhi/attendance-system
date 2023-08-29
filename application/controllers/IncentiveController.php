<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncentiveController extends CI_Controller {

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
        $data = $this->common->incentive_user_join();
        $get_compnay = $this->common->get_company();
        $pageData = array(
            'incentivedata' => $data,
            'companyData' => $get_compnay,
        );

		$this->load->view('comman/header');
        $this->load->view('incentive/index',$pageData);
        $this->load->view('comman/footer');
    }
    public function user_get()
    {
        $company_id =  $this->input->post('company_id');
        $this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('company_id',$company_id);
        $query = $this->db->get()->result_array();    
        
       
        if($query)
        {
            $output = array("status"=>true, "data"=>$query);
            echo json_encode($output);
            return;
        }else{
            $output = array("status"=>false, "error"=>"Somthing Wrong");
            echo json_encode($output);
            return;
        }
    }


    public function add()
	{
        $get_compnay = $this->common->get_company();
        $pageData = array(
            'companyData' => $get_compnay,
        );
		$this->load->view('comman/header');
        $this->load->view('incentive/add', $pageData);
        $this->load->view('comman/footer');
    }

 

    public function save()
    {
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('user_id', 'User Name', 'trim|required');            
        $this->form_validation->set_rules('incentive', 'Total incentive', 'trim|required');            
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{    

            $data = array(
                'company_id'=> $this->input->post('company_id'),
                'user_id'=>$this->input->post('user_id'),
                'description'=> $this->input->post('description'),       
                'incentive'=> $this->input->post('incentive'),       
                'date'=> date('Y-m-d'),              
                'status' => 0,
            );
    
            $tablename = 'incentive';
    
            $data = $this->common->insert($tablename,$data);   
            if($data)
            {
                $url = base_url('incentive'); 
                $output = array("status"=>true, "message"=>"incentive Register Successfully" ,'url' => $url);
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
        $tablename = 'incentive';
        $condition = array(
            'id' => $sid,
        );
        $select = '*';
        $data = $this->common->selects($select,$condition,$tablename);
        $get_compnay = $this->common->get_company();
        
        $this->db->select('*');
		$this->db->from('tbl_user');
		// $this->db->where('company_id',$company_id);
        $userdata = $this->db->get()->result_array();  


        $pageData = array(
            'data' => $data,
            'companyData' => $get_compnay,
            'userdata' => $userdata,
        );

        $this->load->view('comman/header');
        $this->load->view('incentive/edit',$pageData);
        $this->load->view('comman/footer');
    }

    public function saveEdit(){
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('user_id', 'User Name', 'trim|required');            
        $this->form_validation->set_rules('incentive', 'Total incentive', 'trim|required');            
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{    

            $data = array(
                'company_id'=> $this->input->post('company_id'),
                'user_id'=>$this->input->post('user_id'),
                'description'=> $this->input->post('description'),    
                'incentive'=> $this->input->post('incentive'),       
                'date'=> date('Y-m-d'),              
                'status' => 0,
            );
    
            $tablename = 'incentive';

        
            $condition2 = array(
                'id' => $this->input->post('id'),
            );
            $updateData = $this->common->update($condition2,$data,$tablename); 

            if($data)
            {
                $url = base_url('incentive'); 
                $output = array("status"=>true, "message"=>"incentive Updated Successfully" ,'url' => $url);
                echo json_encode($output);
                return;
            }else{
                $output = array("status"=>false, "error"=>"Somthing Wrong");
                echo json_encode($output);
                return;
            }


        }   
            
    }

    
    public function delete(){
        $id =  $this->input->post('id');
        if($id){                        
            $tablename = 'incentive';
            $condition = array(
                'id' => $id,
            );
            $data = array(
                'status' => 1,
            );            
            $data = $this->common->deletes($condition,$data,$tablename);

            if($data)
            {
                $output = array("status"=>true, "message"=>" incentive Deleted Successfully","url" => "incentive");
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