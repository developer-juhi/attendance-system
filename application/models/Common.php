<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Model
{
    function insert($tablename,$data)
	{
		return $this->db->insert($tablename,$data);
	}

	function insertid($tablename,$data)
	{	
		$this->db->insert($tablename,$data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}


	public function select($select,$condition,$tablename)
	{	                
		//$this->db2->insert('test',$condition);
		$this->db->select($select);
		$this->db->where($condition);
		return $this->db->get($tablename)->result_array();
	}



	public function selects($select,$condition,$tablename)
	{
		//	$this->db2->insert('test',$condition);
		$this->db->select($select);
		$this->db->where($condition);
		return $this->db->get($tablename)->row_array();
    }
    
    public function _get_datatables_query($table,$column_order,$column_search,$order)
	{ 
		$this->db->from($table); 
		$i = 0;
		
		foreach ($column_search as $item) // loop column 
		{
			// print_r($_POST['search']['value']);die;
			
			if($_POST['search']['value']) // if datatable send POST for search
			{ 
				if($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				} 
			
				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else if(isset($order)){
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		} 
	}

	function get_datatables($table,$column_order,$column_search,$order,$condition)
	{
		$this->_get_datatables_query($table,$column_order,$column_search,$order);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($table,$column_order,$column_search,$order,$condition)
	{
		$this->_get_datatables_query($table,$column_order,$column_search,$order);
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->num_rows();
	} 
	
	public function count_all($table,$column_order,$column_search,$order,$condition)
	{
		$this->db->where($condition);
		$this->db->from($table);
		return $this->db->count_all_results();
	}


	public function deletes($condition,$data,$tablename)
	{		
		$this->db->where($condition);
		return $this->db->update($tablename,$data);
	}

	public function update($condition,$data,$tablename)
	{		
		$this->db->where($condition);
		return $this->db->update($tablename,$data);
	}

	public function deleted($condition,$tablename)
	{		
		$this->db->where($condition);
		return $this->db->delete($tablename);
	}


	public function sale_company_user_join()
	{	                
		$this->db->select('*');
		$this->db->from('sale');
		$this->db->join('company','company.id = sale.company_id');
		$this->db->join('tbl_user','tbl_user.id = sale.user_id');
		$this->db->where('sale.status',0);
		$query=$this->db->get();		
		return $query->result_array();
	}
	public function incentive_user_join()
	{	                
		$this->db->select('*');
		$this->db->from('incentive');
		$this->db->join('company','company.id = incentive.company_id');
		$this->db->join('tbl_user','tbl_user.id = incentive.user_id');
		$this->db->where('incentive.status',0);
		$query=$this->db->get();		
		return $query->result_array();
	}
	public function get_sale($company_id,$user_id,$start_date,$end_date)
	{	                
		$this->db->select('sale.total_sale, company.name as company_name , tbl_user.first_name , tbl_user.last_name');
		$this->db->from('sale');
		$this->db->join('company','company.id = sale.company_id');
		$this->db->join('tbl_user','tbl_user.id = sale.user_id');
		$this->db->where('company.id',$company_id);
		$this->db->where('tbl_user.id',$user_id);
		$this->db->where('`sale`.`date` >=', $start_date);
		$this->db->where('`sale`.`date` <=', $end_date);		
		$this->db->where('sale.status',0);
		$query=$this->db->get();		
		return $query->result_array();
	}
	public function get_incentive($company_id,$user_id,$start_date,$end_date)
	{	                
		$this->db->select('incentive.total_sale, incentive.incentive, company.name as company_name , tbl_user.first_name , tbl_user.last_name');
		$this->db->from('incentive');
		$this->db->join('tbl_user','tbl_user.id = incentive.user_id');
		$this->db->join('company','company.id = tbl_user.company_id');
		$this->db->where('company.id',$company_id);
		$this->db->where('tbl_user.id',$user_id);
		$this->db->where('`incentive`.`date` >=', $start_date);
		$this->db->where('`incentive`.`date` <=', $end_date);		
		$this->db->where('incentive.status',0);
		$query=$this->db->get();		
		return $query->result_array();
	}

	public function get_attendance($company_id,$user_id,$start_date,$end_date)
	{	                
		$this->db->select('attendance.in_time,attendance.out_time, company.name as company_name , tbl_user.first_name , tbl_user.last_name');
		$this->db->from('attendance');
		$this->db->join('tbl_user','tbl_user.id = attendance.user_id');
		$this->db->join('company','company.id = tbl_user.company_id');
		$this->db->where('company.id',$company_id);
		$this->db->where('tbl_user.id',$user_id);
		$this->db->where('`attendance`.`date` >=', $start_date);
		$this->db->where('`attendance`.`date` <=', $end_date);		
		$this->db->where('attendance.status',0);
		$query=$this->db->get();		
		return $query->result_array();
	}
	public function get_company()
	{	                
		$this->db->select('*');
		$this->db->from('company');	
		$this->db->where('company.status',0);
		$query=$this->db->get();		
		return $query->result_array();
	}



}
?>
