<?php

class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index($slug)
    {
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Client', '/client' . $slug);
        $session_data = $this->session->userdata('logged_in');
        $data['role'] = $session_data['role'];
        $data['u_id'] = $session_data['u_id'];
        if ($this->session->userdata('logged_in')) {

            $this->load->model('news_model');

            $data['client'] = $this->news_model->get_cases($slug);
            $data['c'] = $this->news_model->get_client($slug);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/client', $session_data, $data);
            $this->load->view('templates/footer');

        } else {
            $this->load->view('pages/signin');
        }
    }
}