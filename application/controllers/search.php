<?php
class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
       $this->load->library('breadcrumbs');
       
         $d = $this->uri->segment(3); 
       
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Balance Search', 'search/');
  
          $d1 = $this->input->post('d1');
        $d2 = $this->input->post('d2');
        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
      {
           
            $this->load->model('news_model');
 $data['b'] = $this->news_model->get_total_balances($d1, $d2);
          // $data['l'] = $this->news_model->get_ledger($slug);
        //   $data['b'] = $this->news_model->get_balance($slug);
            $data['client'] = $this->news_model->get_all_cases();
             $this->load->view('templates/header', $data);
            $this->load->view('pages/search', $session_data, $data);
             $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
    public function balance()
    {
         $this->load->library('breadcrumbs');
          $d = $this->uri->segment(3); 
      $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Balance Search', 'search/');
  
          $slug = $this->input->post('d2');
            $data['search'] = $slug;
        
        $d1 = $this->input->post('d1');
        $d2 = $this->input->post('d2');
        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
        {  
            $this->load->model('news_model');
            $data['b'] = $this->news_model->get_total_balances($d1, $d2);
           $this->load->view('templates/header', $data);
            $this->load->view('pages/search', $session_data, $data);
            $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
}