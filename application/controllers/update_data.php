<?php
class Update_data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function client($slug)
    {
       $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Client', '/client'.$slug);
        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
      {
             $this->load->model('news_model');
            $data['c'] = $this->news_model->get_client($slug);
             $this->load->view('templates/header', $data);
            $this->load->view('pages/edit_client', $session_data, $data);
             $this->load->view('templates/footer');
               
        }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
    public function cases($slug)
    {
       $this->load->library('breadcrumbs');
         $d = $this->uri->segment(4); 
       
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Client', 'client/'.$d);
    $this->breadcrumbs->push('Case', 'case/'.$slug);
        
        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
      {
               $this->load->model('news_model');
             $data['case'] = $this->news_model->get_case_summary($slug);
             $this->load->view('templates/header', $data);
            $this->load->view('pages/edit_case', $session_data, $data);
             $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    }
