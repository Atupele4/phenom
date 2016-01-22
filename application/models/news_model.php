<?php

class News_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_cases($slug)
    {
        if($this->check_if_case_existing($slug)){
            $query = $this->db->query("SELECT * FROM case_summary WHERE c_s_c_id = $slug  ORDER BY c_s_datetime DESC");
            return $query->result_array();
        }
    }

    public function check_if_case_existing($case_id){
        $this -> db -> select('*');
        $this -> db -> from('case_summary');
        $this -> db -> where('c_s_c_id', $case_id);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_all_cases()
    {

        $query = $this->db->query("SELECT * FROM case_summary  ORDER BY c_s_datetime DESC");
        return $query->result_array();
    }

    public function get_company()
    {

        $query = $this->db->query("SELECT * FROM company_details LIMIT 1");
        return $query->row_array();
    }

    public function get_clients()
    {
        $query = $this->db->query("SELECT * FROM client_details");
        return $query->result_array();
    }

    public function get_client($id)
    {
        $query = $this->db->query("SELECT * FROM client_details WHERE c_id = $id");
        return $query->row_array();
    }

    public function get_case_summary($slug)
    {
        $query = $this->db->query("SELECT * FROM case_summary  INNER JOIN client_details ON client_details.c_id = case_summary.c_s_c_id  WHERE c_s_id = $slug");
        return $query->row_array();
    }

    public function get_ledger($slug)
    {
        $query = $this->db->query("SELECT * FROM client_ledgar  WHERE c_l_c_s_id = $slug ORDER BY c_l_date ASC");
        return $query->result_array();
    }

    public function get_filter($slug)
    {
        $query = $this->db->query("SELECT * FROM case_summary INNER JOIN client_details ON client_details.c_id = case_summary.c_s_c_id WHERE c_s_status     = $slug");
        return $query->result_array();
    }

    public function get_balance($slug)
    {
        $query = $this->db->query("SELECT SUM(c_i_transaction) AS suma FROM `client_ledgar` WHERE c_l_c_s_id = $slug");
        return $query->row_array();
    }

    public function get_total_balance()
    {
        $query = $this->db->query("SELECT SUM(c_i_transaction) AS suma FROM `client_ledgar`");
        return $query->row_array();
    }

    public function get_total_balances($d1, $d2)
    {
        /*  $query = $this->db->query("SELECT *, SUM(c_i_transaction) AS suma FROM case_summary INNER JOIN client_ledgar ON client_ledgar.c_l_c_s_id = case_summary.c_s_id WHERE client_ledgar.c_l_date BETWEEN '$d1' AND '$d2'");*/
        $query = $this->db->query("
         SELECT *, (SELECT SUM(c_i_transaction) 
            FROM client_ledgar 
            WHERE client_ledgar.c_l_c_s_id = case_summary.c_s_id AND 
              client_ledgar.c_l_date 
         BETWEEN '$d1' 
         AND '$d2' 
          )
         AS suma 
         FROM case_summary 
        WHERE (SELECT SUM(c_i_transaction) 
            FROM client_ledgar 
            WHERE client_ledgar.c_l_c_s_id = case_summary.c_s_id AND 
              client_ledgar.c_l_date 
         BETWEEN '$d1' 
         AND '$d2')  
          ORDER BY suma DESC");
        return $query->result_array();
    }

    public function get_pending()
    {
        $query = $this->db->query("
         SELECT *, (SELECT SUM(c_i_transaction) FROM client_ledgar  WHERE client_ledgar.c_l_c_s_id = case_summary.c_s_id  ) AS suma FROM case_summary WHERE (SELECT SUM(c_i_transaction) FROM client_ledgar  WHERE client_ledgar.c_l_c_s_id = case_summary.c_s_id  ) < 0
          ORDER BY suma DESC");
        return $query->result_array();
    }


    public function search($search)
    {
        if ($search == null) {
            return null;
        } else {
            $query = $this->db->query("SELECT * FROM client_details INNER JOIN case_summary ON case_summary.c_s_c_id = client_details.c_id WHERE client_details.c_name LIKE ('%$search%') OR case_summary.c_s_file_number LIKE ('%$search%') OR case_summary.c_s_desc LIKE ('%$search%') ");
            return $query->result_array();
        }
    }

}