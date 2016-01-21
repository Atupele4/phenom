<?php
session_start();
class Pages extends CI_Controller {

	public function view()
    {
        $this->load->library('breadcrumbs');
    $this->breadcrumbs->push('Home', '/');

        $this->load->model('news_model');
        $this->load->model('data_model');
  
        $session_data = $this->session->userdata('logged_in');
        $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
        if($this->session->userdata('logged_in'))
        {    
            $data['clients'] = $this->news_model->get_clients();
            $data['balance'] = $this->news_model->get_total_balance();
                 $this->load->view('templates/header', $data);
              $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
        }
        else{
            $this->load->view('pages/signin');
        }

    }
     


    public  function logout()
    {
 $this->session->unset_userdata('logged_in');
     session_destroy();
      redirect('signin');
    }

     
    public function member($slug, $d)
    {
    $d = $this->uri->segment(4); 
         $this->load->library('breadcrumbs');
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Category', 'pages/category/'.$d);
    $this->breadcrumbs->push('Church', 'pages/member/'.$slug);

        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
        { if($data['u_id'] == 1)
            {
            $this->load->model('news_model');

            $data['mem'] = $this->news_model->get_church($slug);
             $data['past'] = $this->news_model->get_pastor($slug);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/church', $session_data, $data);
            $this->load->view('templates/footer');
             }else
        {
            redirect('/');
        }
        }
        else
        {
            $this->load->view('pages/signin');
        }

        /* */
    }
    
     public function filter($slug)
    {
         $asd = "";
    if($slug == 1 )
    {
        $asd = "Open Legders";
        $data['asd'] = $asd;
    }
         elseif($slug == 0)
         {
             $asd = "Closed Legders";
             $data['asd'] = $asd;
         }
         $this->load->library('breadcrumbs');
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push($asd, 'pages/filter/'.$slug);
  
      $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
        {  
            $this->load->model('news_model');
            $data['client'] = $this->news_model->get_filter($slug);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/filter', $session_data, $data);
            $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }

        /* */
    }

  public function pending()
    {
        
         $this->load->library('breadcrumbs');
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Owing Clients','pages/pending');
  
      $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
        {  
            $this->load->model('news_model');
            $data['client'] = $this->news_model->get_pending();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/pending', $session_data, $data);
            $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }

        /* */
    }


 

 function delete_id() {
    $this->load->model('data_model');
          if (isset($_POST['type'])) {
            $data['ajax_req'] = TRUE;
            $this->data_model->delete_case($_POST['type']);
         //   $this->load->view('news/results', $data);
        }
    }
    public function signin()
    {
          $this->view();
    }
     
    function delete_client() {
    $this->load->model('data_model');
            
        if (isset($_POST['type'])) {
            $data['ajax_req'] = TRUE;
            $this->data_model->delete_client($_POST['type']);
         //   $this->load->view('news/results', $data);
        }
    }
    

 function give_more_data() {
     $this->load->model('news_model');
        if (isset($_POST['type'])) {
            $data['ajax_req'] = TRUE;
            $data['loc'] = $this->news_model->search($_POST['type']);
            $this->load->view('news/results', $data);
        }
    }
    
    


}
