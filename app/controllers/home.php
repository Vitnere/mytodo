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
        if($this->session->userdata('logged_in')){//ako je user logovan
            //Get the logged in users id
            $user_id = $this->session->userdata('user_id');//povuci user_id
            //Get all lists from the model
            $data['lists'] = $this->List_model->get_all_lists($user_id);//povuci sve liste iz modela
            //$data['tasks'] = $this->Task_model->get_users_tasks($user_id);
        }

       $data['main_content'] = 'home';//data varjabla pod imenom u zagradi koja pokazuje na
        //home view

        $this->load->view('layouts/main',$data);//ucitavanje layouta gdje se daju dva parametrau
        //u zagradi,prvi je lokacija layouta, drugi je $data array
    }
}

?>
