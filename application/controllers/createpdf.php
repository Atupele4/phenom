<?php
class Createpdf extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }
public function pdf($id)
{
    $this->load->helper('pdf_helper');
   
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');

           $data['l'] = $this->news_model->get_ledger($id);
          $data['case'] = $this->news_model->get_case_summary($id);
           $data['b'] = $this->news_model->get_balance($id);
           $data['c'] = $this->news_model->get_company();
            
        if(empty($data['c']))
        {
            redirect('profile');
        }
            $this->load->view('print/pdf', $data);
             $this->load->view('templates/footer');
}
    
    public function cases($id)
{
    $this->load->helper('pdf_helper');
   
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');

      $data['client'] = $this->news_model->get_cases($id);
    $data['c'] = $this->news_model->get_client($id);
       $data['cd'] = $this->news_model->get_company();
                
        if(empty($data['c']))
        {
            redirect('profile');
        }
            $this->load->view('print/cases', $data);
             $this->load->view('templates/footer');
}
    
    public function client()
{
    $this->load->helper('pdf_helper');
   
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');

               $data['case'] = $this->news_model->get_clients();
          $data['c'] = $this->news_model->get_company();
             
        if(empty($data['c']))
        {
            redirect('profile');
        }
            $this->load->view('print/clients', $data);
             $this->load->view('templates/footer');
}
    
      public function closed()
{
    $this->load->helper('pdf_helper');
   
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');

               $data['case'] = $this->news_model->get_clients();
          $data['c'] = $this->news_model->get_company();
            $data['client'] = $this->news_model->get_filter(0);
          
             
        if(empty($data['c']))
        {
            redirect('profile');
        }
            $this->load->view('print/closed', $data);
             $this->load->view('templates/footer');
}
    
       public function open()
{
    $this->load->helper('pdf_helper');
   
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');

               $data['case'] = $this->news_model->get_clients();
          $data['c'] = $this->news_model->get_company();
            $data['client'] = $this->news_model->get_filter(1);
           
              
        if(empty($data['c']))
        {
            redirect('profile');
        }
            $this->load->view('print/open', $data);
             $this->load->view('templates/footer');
}  
    
    public function pending()
{
    $this->load->helper('pdf_helper');
   
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');

               $data['case'] = $this->news_model->get_clients();
          $data['c'] = $this->news_model->get_company();
            $data['client'] = $this->news_model->get_pending();
        
        if(empty($data['c']))
        {
            redirect('profile');
        }
        
            $this->load->view('print/pending', $data);
             $this->load->view('templates/footer');
}
    public function balance_search($d1,$d2)
{
    $this->load->helper('pdf_helper');
      /*$d1 = $this->input->post('d1');
        $d2 = $this->input->post('d2');*/
         $data['d1'] = $d1;
         $data['d2'] = $d2;
      // $d2 = $this->input->post('d2');
        
     $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
   
    $this->load->model('news_model');
        $data['b'] = $this->news_model->get_total_balances($d1, $d2);
           $data['c'] = $this->news_model->get_company();
           
        if(empty($data['c']))
        {
            redirect('profile');
        }
             $this->load->view('print/adsearch', $data);
             $this->load->view('templates/footer');
}
}
?>