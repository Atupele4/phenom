<?php
/**
 * Created by PhpStorm.
 * User: mboyaa
 * Date: 1/21/2016
 * Time: 9:50 PM
 */

class Model_Lawyer extends CI_Model {


    /*Create New Lawyer into DB*/
    function SaveNewLayer($lawyer_id,$Lawyer_name,$gender,$Lawyer_nrc,$Lawyer_phone_1,$Lawyer_phone_2,$Lawyer_email){

        if(!$this->CheckIfLawyerExist($Lawyer_nrc)){
            $data = array(
                'lawyer_id' =>$lawyer_id,
                'Lawyer_name' => $Lawyer_name,
                'gender' => $gender,
                'Lawyer_nrc' => $Lawyer_nrc,
                'Lawyer_phone_1' => $Lawyer_phone_1,
                'Lawyer_phone_2' => $Lawyer_phone_2,
                'Lawyer_email' => $Lawyer_email
            );
            return $this->db->insert('lawyer_tbl', $data);
        }
    }

    /*Create New Lawyer into DB*/
    function UpdateExistingLayer($lawyer_id,$Lawyer_name,$gender,$Lawyer_nrc,$Lawyer_phone_1,$Lawyer_phone_2,$Lawyer_email){

        if($this->CheckIfLawyerExist($Lawyer_nrc)){
            $data = array(
                'lawyer_id' =>$lawyer_id,
                'Lawyer_name' => $Lawyer_name,
                'gender' => $gender,
                'Lawyer_nrc' => $Lawyer_nrc,
                'Lawyer_phone_1' => $Lawyer_phone_1,
                'Lawyer_phone_2' => $Lawyer_phone_2,
                'Lawyer_email' => $Lawyer_email
            );
            $this->db->where('Lawyer_nrc', $Lawyer_nrc);
            return $this->db->update('lawyer_tbl', $data);
        }
    }

    //Delete Lawyer from DB
    public function deleteLawyerFromSystem($Lawyer_nrc)
    {
      if($this->CheckIfLawyerExist($Lawyer_nrc)){
          $this->db->delete('lawyer_tbl', array('Lawyer_nrc' => $Lawyer_nrc));
      }
    }
    
    //check using NRC if lawyer exist
    function CheckIfLawyerExist($Lawyer_nrc){
        $this -> db -> select('*');
        $this -> db -> from('lawyer_tbl');
        $this -> db -> where('Lawyer_nrc', $Lawyer_nrc);
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

} 