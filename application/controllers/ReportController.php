<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportController extends CI_Controller {

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
	public function index()
	{
		
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
	
	public function report_sale()
	{
		$get_compnay = $this->common->get_company();

		$data = array(
			'companyData' => $get_compnay,
		);

		$this->load->view('comman/header');
        $this->load->view('report_sale/find',$data);
        $this->load->view('comman/footer');
	}
	public function report_sale_data()
	{
		$company_id =  $this->input->post('company_id');
		$user_id =  $this->input->post('user_id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		$data_sale = $this->common->get_sale($company_id,$user_id,$start_date,$end_date);

		$data = array(
			'pagedata' => $data_sale,
		);

		$this->load->view('comman/header');
        $this->load->view('report_sale/report',$data);
        $this->load->view('comman/footer');
	}

	public function report_insentive()
	{
		$get_compnay = $this->common->get_company();

		$data = array(
			'companyData' => $get_compnay,
		);

		$this->load->view('comman/header');
        $this->load->view('report_insentive/find',$data);
        $this->load->view('comman/footer');
	}

	public function report_insentive_data()
	{
		$company_id =  $this->input->post('company_id');
		$user_id =  $this->input->post('user_id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		$data_sale = $this->common->get_incentive($company_id,$user_id,$start_date,$end_date);

		// echo "<pre>";
		// print_r($data_sale);
		// print_r($this->db->last_query());
		// die;
		$data = array(
			'pagedata' => $data_sale,
		);
		$this->load->view('comman/header');
        $this->load->view('report_insentive/report',$data);
        $this->load->view('comman/footer');
	}




	public function report_attendance()
	{
		$get_compnay = $this->common->get_company();

		$data = array(
			'companyData' => $get_compnay,
		);

		$this->load->view('comman/header');
        $this->load->view('report_attendance/find',$data);
        $this->load->view('comman/footer');
	}


	public function report_attendance_data()
	{
		$company_id =  $this->input->post('company_id');
		$user_id =  $this->input->post('user_id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		$data_sale = $this->common->get_attendance($company_id,$user_id,$start_date,$end_date);

		// echo "<pre>";
		// print_r($data_sale);
		// print_r($this->db->last_query());
		// die;
		$data = array(
			'pagedata' => $data_sale,
		);
		$this->load->view('comman/header');
        $this->load->view('report_attendance/report',$data);
        $this->load->view('comman/footer');
	}



}
