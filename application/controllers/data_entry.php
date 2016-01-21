<?php
session_start();
class Data_entry extends CI_Controller {

      public function enter($d)
    {
            
           $id = $this->input->post('id');
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->entry();
          redirect('cases/'.$id.'/'.$d);
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
     public function enter_case()
    {
           $id = $this->input->post('c_id');
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->enter_case();
          redirect('client/'.$id);
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
    public function company()
    {
           $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->enter_company();
          redirect('profile/');
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
     public function update_company()
    {
               $cid = $this->input->post('cd_id');
       
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->update_company($cid);
            redirect("profile"); 
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }  
     public function update_password()
    {
          
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
    $this->data_model->update_password();
                redirect("profile"); 
         }
        else
        {
            $this->load->view('pages/signin');
        }
    }  
 
    
     public function enter_logo()
    {
           $cid = $this->input->post('cd_id');
       
          $this->load->helper('url');
         $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size']	= '0';
        $config['max_width']  = '22024';
        $config['remove_spaces']  = 'TRUE';
        $config['max_height']  = '22068';
      $this->load->library('upload', $config);
      
           $id = $this->input->post('a_id');
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              if ( !$this->upload->do_upload())
            {
            }
              else
            {
                 $data = array('upload_data' => $this->upload->data());
                   $this->load->model('data_model');
                  $this->data_model->enter_logo($cid);
                  redirect('profile');
              }
         }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
     public function enter_client()
    {
           $id = $this->input->post('c_id');
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->enter_client();
          redirect('client/'.$id);
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
     public function delete_case($id,$cid)
    {
         //  $d = $this->uri->segment(2); 
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->delete_case($id);
         redirect('client/'.$cid);
           //  redirect($_SERVER['REQUEST_URI'], 'refresh'); 
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }

    
     public function delete_client($id)
    {
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->delete_client($id);
         // redirect('client/'.$id);
             redirect("/"); 
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }
      public function update_client($id)
    {
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->update_client($id);
              redirect("update_data/client/".$id); 
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }    

       public function update_case($id)
    {
               $cid = $this->input->post('cid');
       
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->update_case($id);
            redirect("update_data/cases/".$id."/".$cid); 
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }  

     public function status($id)
    {
               $cid = $this->input->post('id');
       
          $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
           $data['u_id'] = $session_data['u_id'];
         if($this->session->userdata('logged_in'))
        {  
              $this->load->model('data_model');
            $this->data_model->status($id);
            redirect("cases/".$id."/".$cid,"refresh"); 
          }
        else
        {
            $this->load->view('pages/signin');
        }
    }  
}
    
       
    
   
