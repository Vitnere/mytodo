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
       $data['main_content'] = 'home';//data varjabla pod imenom u zagradi koja pokazuje na
        //home view

        $this->load->view('layouts/main',$data);//ucitavanje layouta gdje se daju dva parametrau
        //u zagradi,prvi je lokacija layouta, drugi je $data array
    }
}
