<?php
class Cases extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index($slug)
    {
       $this->load->library('breadcrumbs');
         $d = $this->uri->segment(3); 
       
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Client', 'client/'.$d);
    $this->breadcrumbs->push('Case', 'case/'.$slug);
        
        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
      {
           
            $this->load->model('news_model');

           $data['l'] = $this->news_model->get_ledger($slug);
           $data['b'] = $this->news_model->get_balance($slug);
           $data['case'] = $this->news_model->get_case_summary($slug);
             $this->load->view('templates/header', $data);
            $this->load->view('pages/case', $session_data, $data);
             $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
}