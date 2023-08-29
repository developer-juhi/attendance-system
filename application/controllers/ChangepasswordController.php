<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangepasswordController extends CI_Controller {

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
		$this->load->view('comman/header');
		$this->load->view('login/change_password');
		$this->load->view('comman/footer');
	}
	public function save()
	{
        $id = $this->session->userdata('id');

		$old    =md5($this->input->post('old'));
		$new    =md5($this->input->post('new'));
        $cnew   =md5($this->input->post('confirm'));
        
        $data = $this->db->from('admin_login')
                ->select('*')
                ->where('id',$id)
                ->get()
                ->row_array();
        if($data)
        {
            if($data['password'] == $old)
            {
                $update = array(
                    'password'=>$new
                );
                $datasave = $this->db->where('id',$id);
                             $this->db->update('admin_login',$update);
                $this->session->set_flashdata('success', 'Password Updated Successfully.');
                redirect('change-password');
            } 
            else{
                $this->session->set_flashdata('warning', 'Old Password Wrong.');
                redirect('change-password');
            }
        }
        else
        {
            $this->session->set_flashdata('warning', 'User Not Found.');
            redirect('change-password');
        }
      
	}

}
