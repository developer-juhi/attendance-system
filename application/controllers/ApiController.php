<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

	function __construct() //defalut calls construct
	{
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Login','Login');//defalut load model 
        $this->load->model('Common','common');//defalut load model 
        $this->load->library(array('form_validation')); // load form lidation libaray 

	}

	public function index()
	{

	}

	public function user_login()
	{		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');                     
		if($this->form_validation->run() == FALSE){
			$output = array("status"=>false, "error"=>validation_errors());
			echo json_encode($output); 
			return;
		}else{
		
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$condition=array(
				'email'=>$username,
			);
			$tablename="tbl_user";
			$select="*";				
			$result = $this->common->selects($select,$condition,$tablename);
			if($result)
			{
				if($password == $result['password'])
				{			
					$output = array("status"=>true, "data"=>$result);
					echo json_encode($output); 
					return;

				}else{
					$output = array("status"=>false, "error"=>"Wrong Password");
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
    public function attendance_in()
    {
        $this->form_validation->set_rules('user_id', 'User Name', 'required');
       	if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{    
            $condition=array(
				'date'=>Date('y-m-d',time()),
				'user_id'=> $this->input->post('user_id'), 
			);
			$tablename="attendance";
            $select="*";
            
            $result = $this->common->selects($select,$condition,$tablename);

           
			if(!$result)
			{
                $data = array(
                    'user_id' => $this->input->post('user_id'),  
                    'date' => date('Y-m-d'),  
                    'in_time' => date('H:i:s'),  
                    'status' => 0,
                );            
                $tablename = 'attendance';
                $data = $this->common->insertid($tablename,$data);
                if($data)
                {
                    $url = base_url('attendance'); 
                    $output = array("status"=>true, "message"=>"In Successfully","data"=>$data);
                    echo json_encode($output);
                    return;
    
                }else{
                    $output = array("status"=>false, "error"=>"Somthing Wrong");
                    echo json_encode($output);
                    return;
                }

			}else{
				$output = array("status"=>false, "error"=>"You Alredy In One Time");
				echo json_encode($output); 
				return;

            }
            
          
        }           
	}
	public function attendance_out()
    {
        $this->form_validation->set_rules('user_id', 'User Name', 'required');
        $this->form_validation->set_rules('attendance_id', 'Attendance Id', 'required');
       	if ($this->form_validation->run() == FALSE) {
            $output = array("status"=>false, "error"=>validation_errors());
            echo json_encode($output);
            return;
        }else{     
            $condition=array(
				'date'=>Date('y-m-d',time()),
				'user_id'=> $this->input->post('user_id'), 
			);
			$tablename="attendance";
            $select="*";
            
            $result = $this->common->selects($select,$condition,$tablename);

            if($result)
			{
                if($result['out_time'] == NULL)
                {
                    $data = array(
                        'user_id' => $this->input->post('user_id'),  
                        'date' => date('Y-m-d'),  
                        'out_time' => date('H:i:s'),  
                        'status' => 0,
                    );            
                    $condition2 = array(
                        'id' => $this->input->post('attendance_id'),
                    );
                    $tablename = 'attendance';
                    $updateData = $this->common->update($condition2,$data,$tablename); 
                    
                    if($data)
                    {
                        $url = base_url('attendance'); 
                        $output = array("status"=>true, "message"=>"Out Successfully","data"=>$updateData);
                        echo json_encode($output);
                        return;
    
                    }else{
                        $output = array("status"=>false, "error"=>"Somthing Wrong");
                        echo json_encode($output);
                        return;
                    }
                }
                else{
                    $output = array("status"=>false, "error"=>'You Alredy Out One Time');
                    echo json_encode($output); 
                    return;
                }


                
            }
            else{
				$output = array("status"=>false, "error"=>'You Alredy Out One Time');
				echo json_encode($output); 
				return;

            }
        }           
    }

    public function history()
    {       
        $this->form_validation->set_rules('user_id', 'User Name', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date ', 'required');
        $this->form_validation->set_rules('end_date', 'End Date ', 'required');

        if ($this->form_validation->run() == FALSE) {
         $output = array("status"=>false, "error"=>validation_errors());
         echo json_encode($output);
         return;

        }else{  

            $user_id = $this->input->post('user_id');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
    

            $tablename="attendance";

            $select="*";	

            $condition = array(
                'user_id'=>$user_id,
                'date >='=>$start_date,
                'date <='=>$end_date
            );			


            $result = $this->common->select($select,$condition,$tablename);
        
            if($result)
            {
                $url = base_url('attendance'); 
                $output = array("status"=>true,"data"=>$result);
                echo json_encode($output);
                return;

            }else{
                $output = array("status"=>false, "error"=>"No Data Found");
                echo json_encode($output);
                return;
            }
        }

    }
    

    public function seles_reposrting(){
        $this->form_validation->set_rules('user_id', 'User Name', 'required');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required');
        $this->form_validation->set_rules('total_sale', 'Total Sale ', 'required');
        $this->form_validation->set_rules('description', 'Description ', 'required');
        $this->form_validation->set_rules('date', 'Date ', 'required');
        if ($this->form_validation->run() == FALSE) {
         $output = array("status"=>false, "error"=>validation_errors());
         echo json_encode($output);
         return;
     }else{     
        
         $data = array(
             'user_id' => $this->input->post('user_id'),  
             'company_id' => $this->input->post('company_id'),  
             'total_sale' => $this->input->post('total_sale'),  
             'date' => $this->input->post('date'),  
             'description' => $this->input->post('description'),  
             'status' => 0,
         );            
         $tablename = 'sale';
         $data = $this->common->insertid($tablename,$data);
         if($data)
         {      
            $condition=array(
				'id'=>$this->input->post('company_id'), 
			);
			$tablename="company";
			$select="*";				
			$result = $this->common->selects($select,$condition,$tablename);
            if($result)
            {
                $message = 'hiii';
                $number = $result['mobile_no'];
                $handle = curl_init(); 
            
                // Set the url           

                $url = 'http://sms.revolutiondatahub.com/sendSMS?username=kdh89otp&message='.$message.'&sendername=ATDKDH&smstype=TRANS&numbers='.$number.'&apikey=be404835-d23b-433b-a71d-2612ab17e144';

               curl_setopt($handle, CURLOPT_URL, $url);
                // Set the result output to be a string.
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                
                $output = curl_exec($handle);
                
                curl_close($handle);
                echo $output;
            }
            

             $output = array("status"=>true, "message"=>"Submit Successfully","data"=>$data);
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



