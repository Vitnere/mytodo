<?php

class Lists extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            //Set error
            $this->session->set_flashdata('need_login', 'Sorry, you need to be logged in to view that area');
            redirect('home/index');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        //Load view and layout
        $data['main_content'] = 'lists/index';
        $this->load->view('layouts/main',$data);

    }
}
