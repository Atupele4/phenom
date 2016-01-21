<?php
class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
       $this->load->library('breadcrumbs');
       $this->load->library('encrypt');
         $d = $this->uri->segment(3); 
       
    $this->breadcrumbs->push('Home', '/');
    $this->breadcrumbs->push('Profile', 'ss');
  
          $d1 = $this->input->post('d1');
        $d2 = $this->input->post('d2');
        $session_data = $this->session->userdata('logged_in');
          $data['role'] = $session_data['role'];
         $data['u_id'] = $session_data['u_id'];
      if($this->session->userdata('logged_in'))
      {
           
            $this->load->model('news_model');
            $data["company"] = $this->news_model->get_company();
          $this->load->view('templates/header', $data);
            $this->load->view('pages/profile', $session_data);
             $this->load->view('templates/footer');
              
        }
        else
        {
            $this->load->view('pages/signin');
        }
    }
    
    public function backup()
    {
        $date = date("Y_m_d");
        $this->load->dbutil();
        // Backup your entire database and assign it to a variable
        $prefs = array(
                'tables'      => array(),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'zip',             // gzip, zip, txt
                'filename'    => date("H_i_s").'.zip',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

     $backup= $this->dbutil->backup($prefs); 
      //  = $this->dbutil->backup();
      // Load the file helper and write the file to your server
      $this->load->helper('file');
       write_file('./uploads/'.$date.'.zip', $backup);

        redirect('profile');
        // Load the download helper and send the file to your desktop
     //   $this->load->helper('download');
     //   force_download('mybackup.zip', $backup);
    }
}
    