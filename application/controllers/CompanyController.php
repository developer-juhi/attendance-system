<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyController extends CI_Controller {

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
		$this->load->view('comman/header');
        $this->load->view('company/index');
        $this->load->view('comman/footer');
    }


    public function add()
	{
        
		$this->load->view('comman/header');
        $this->load->view('company/add');
        $this->load->view('comman/footer');
    }

    public function data()
    {
        $table = 'company';
        $column_order = array(null, 'name'); //set column field database for datatable orderable
        $column_search = array('name'); //set column field database for datatable searchable 
        $order = array('id' => 'asc'); // default order 

        $condition = array(
            'status' => 0,
        );

        $list = $this->common->get_datatables($table,$column_order,$column_search,$order,$condition);
        $data = array();

        $no = $_POST['start'];
        foreach ($list as $dataInTables) 
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $dataInTables->name;
            $row[] = $dataInTables->mobile_no;
            $row[] = '<a href="'.base_url('company-update?id='.$dataInTables->id).'" type="button" name="update" id="" class="btn btn-simple btn-warning btn-icon edit"> <i class="material-icons">edit</i> </a>
                    <button type="button" name="delete" id="'.$dataInTables->id.'" class="btn btn-simple btn-danger btn-icon remove delete"> <i class="material-icons">delete</i> </button>';
            $data[] = $row;
        } 
                $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->common->count_all($table,$column_order,$column_search,$order,$condition),
                        "recordsFiltered" => $this->common->count_filtered($table,$column_order,$column_search,$order,$condition),
                        "data" => $data,
                    );
        echo json_encode($output);
    }

    public function save()
    {
        $this->form_validation->set_rules('name', 'Company Name ', 'trim|required');
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{       
                
            $data = array(
                'name' => $this->input->post('name'),  
                'mobile_no' => $this->input->post('no'),  
                'status' => 0,
            );            
            $tablename = 'company';
            $data = $this->common->insert($tablename,$data);
            if($data)
            {
                $url = base_url('company'); 
                $output = array("status"=>true, "message"=>"Company Cretaed Successfully" ,'url' => $url);
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
                'mobile_no' =>  $this->input->post('no'),              
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
            $tablename = 'company';
            $condition = array(
                'id' => $id,
            );
            $data = array(
                'status' => 1,
            );            
            $data = $this->common->deletes($condition,$data,$tablename);

            if($data)
            {
                $output = array("status"=>true, "message"=>"Company Deleted Successfully","url" => "company");
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