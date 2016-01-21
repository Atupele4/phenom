<?php
class Data_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
     
      
  public function entry()
    {
      $t = "";
       if($this->input->post('trans') == 1)
        {
           $t = "";
        }
        else
        {
           $t = "-";
        }    
    	$this->load->helper('url');
 	$data = array(
    		'c_l_c_s_id' => $this->input->post('id'),
    		'c_l_date' => $this->input->post('date'),
    		'c_l_details' => $this->input->post('details'),
    		'c_l_ref_number' => $this->input->post('ref'),
            'c_i_transaction' => $t."".$this->input->post('amount'),
    		'c_l_trans_type' => $this->input->post('trans'),
    		 
  	);
    	return $this->db->insert('client_ledgar', $data);
    }
    
      public function enter_case()
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_s_desc' => $this->input->post('title'),
    		'c_s_notes' => $this->input->post('notes'),
    		'c_s_c_id' => $this->input->post('c_id'),
    		'c_s_file_number' => $this->input->post('file'),
    		'c_s_status' => 1,
            
    		 
  	);
    	return $this->db->insert('case_summary', $data);
    }
    
    public function update_password()
    {
        $old = $this->input->post('old');
        $new = $this->input->post('mew');
        $con = $this->input->post('confirm');
        $role = $this->input->post('role');
        
         $query = $this->db->query("SELECT password FROM user WHERE u_id = '".$role."'");
        $row = $query->row();
       $mpass = $row->password;
        if($old == $mpass)
                    { 
            
            $this->load->helper('url');
            $data = array(
    		'password' => $this->input->post('new'),
    	 		 
            );
            $this->db->where('u_id', $role);
                $this->db->update('user', $data);
                return "Password Confirmed and Updated";
            }
         
       
        else
        {
            return "Password Entered is Incorrect";
        }
    }
    
    
      public function enter_company()
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_name' => $this->input->post('name'),
    		'c_address' => $this->input->post('address'),
    		'c_email' => $this->input->post('email'),
    		'c_phone' => $this->input->post('phone'), 
    		 
  	);
    	return $this->db->insert('company_details', $data);
    }
    
    
     public function enter_client()
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_name' => $this->input->post('name'),
    		'c_address' => $this->input->post('address'),
    		'c_company' => $this->input->post('company'),
    		'c_email' => $this->input->post('email'),
    		'c_phone' => $this->input->post('phone'),
        	);
    	return $this->db->insert('client_details', $data);
    }
    
     public function update_company($id)
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_name' => $this->input->post('name'),
    		'c_address' => $this->input->post('address'),
    		'c_email' => $this->input->post('email'),
    		'c_phone' => $this->input->post('phone'), 
      	);
     $this->db->where('cd_id', $id);
        $this->db->update('company_details', $data);
    } 
    
     public function enter_logo($id)
    {
      
    	$this->load->helper('url');
 	      $data = array(
     
    	'c_logo' => $this->upload->file_name,   
    	  	);
           $this->db->where('cd_id', $id);
    	return $this->db->update('company_details', $data);
    }
    
    
    public function update_client($id)
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_name' => $this->input->post('name'),
    		'c_address' => $this->input->post('address'),
    		'c_company' => $this->input->post('company'),
    		'c_email' => $this->input->post('email'),
    		'c_phone' => $this->input->post('phone'),
      	);
     $this->db->where('c_id', $id);
        $this->db->update('client_details', $data);
    } 
    
    public function update_case($id)
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_s_desc' => $this->input->post('title'),
    		'c_s_notes' => $this->input->post('notes'),    	
    		'c_s_file_number' => $this->input->post('file'),
      	);
     $this->db->where('c_s_id', $id);
        $this->db->update('case_summary', $data);
    }
     public function status($id)
    {
      
    	$this->load->helper('url');
 	      $data = array(
    		'c_s_status' => $this->input->post('status'),
 
      	);
     $this->db->where('c_s_id', $id);
        $this->db->update('case_summary', $data);
    }
    
     public function delete_case($slug)
    {
         $this->db->delete('case_summary', array('c_s_id' => $slug));
    }
    
     public function delete_client($slug)
    {
         $this->db->delete('client_details', array('c_id' => $slug));
    }
    
    
    
       
}