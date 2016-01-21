<?php
class Signup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('pages/signup');
        $this->load->view('templates/footer');
    }

    public function signin()
    {

        $this->load->view('templates/header');
        $this->load->view('pages/signin');
        $this->load->view('templates/footer');
    }

}