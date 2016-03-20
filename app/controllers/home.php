<?php
/**
 * Created by PhpStorm.
 * User: Vitnere
 * Date: 20-Mar-16
 * Time: 9:16 AM
 */

class Home extends CI_Controller
{
    public function index()
    {
       $data['main_content'] = 'home';
        $this->load->view('layouts/main',$data);
    }
}
