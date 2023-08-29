<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

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
        $this->load->view('user/index');
        $this->load->view('comman/footer');
    }



    public function add()
	{      
        $get_compnay = $this->common->get_company();

        $pageData = array(
            'companyData' => $get_compnay,
        );
		$this->load->view('comman/header');
        $this->load->view('user/add',$pageData);
        $this->load->view('comman/footer');
    }

    public function data()
    {
        $table = 'tbl_user';
        $column_order = array(null, 'first_name','last_name','email','phone','address'); //set column field database for datatable orderable
        $column_search = array('first_name','last_name','email','phone','address'); //set column field database for datatable searchable 
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
            $row[] = $dataInTables->first_name;
            $row[] = $dataInTables->last_name;
            $row[] = $dataInTables->email;
            $row[] = $dataInTables->phone;
            $row[] = $dataInTables->address;
            $row[] = '<a href="'.base_url('user-update?id='.$dataInTables->id).'" type="button" name="update" id="" class="btn btn-simple btn-warning btn-icon edit">  <i class="material-icons">edit</i> </a>
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
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');            
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tbl_user.email]');            
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required');            
        $this->form_validation->set_rules('address', 'Address', 'trim|required');            
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');            
        $this->form_validation->set_rules('password', 'Password', 'trim|required');            
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{    

            $data = array(
                'first_name'=> $this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
                'company_id'=>$this->input->post('company_id'),
                'password'=>md5($this->input->post('password')),
                'status' => 0,
            );
    
            $tablename = 'tbl_user';
    
            $data = $this->common->insert($tablename,$data);   
            if($data)
            {
                $url = base_url('user'); 
                $output = array("status"=>true, "message"=>"User Register Successfully" ,'url' => $url);
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
        $tablename = 'tbl_user';
        $condition = array(
            'id' => $sid,
        );
        $select = '*';
        $data = $this->common->selects($select,$condition,$tablename);
        $get_compnay = $this->common->get_company();

        $pageData = array(
            'data' => $data,
            'companyData' => $get_compnay,

        );

        $this->load->view('comman/header');
        $this->load->view('user/edit',$pageData);
        $this->load->view('comman/footer');
    }

    public function saveEdit(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');            
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tbl_user.email]');            
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required');            
        $this->form_validation->set_rules('address', 'Address', 'trim|required');            
    
        if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{    

            $data = array(
                'first_name'=> $this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password')),
                'address'=>$this->input->post('address'),
                'status' => 0,
            );
    
            $tablename = 'tbl_user';

        
            $condition2 = array(
                'id' => $this->input->post('id'),
            );
            $updateData = $this->common->update($condition2,$data,$tablename); 
            if($updateData == 1)
            {                 
                $output = array("status"=>true, "message"=>"User Updated Successfully","url" => "user");
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
            $tablename = 'tbl_user';
            $condition = array(
                'id' => $id,
            );
            $data = array(
                'status' => 1,
            );            
            $data = $this->common->deletes($condition,$data,$tablename);

            if($data)
            {
                $output = array("status"=>true, "message"=>" User Deleted Successfully","url" => "user");
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