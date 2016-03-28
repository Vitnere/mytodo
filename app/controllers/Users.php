<?php
class Users extends CI_Controller
{
    public function register()
    {
        $this->form_validation->set_rules(/*CodeIgniter lets you set as
many validation rules as you need for a given field, cascading them in order,
 and it even lets you prep and pre-process the field data at the same time. To
 set validation rules you will use the set_rules() function*/
            'first_name',//The above function takes three parameters as input:
            ////The field name - the exact name you've given the form field.

            'First_Name',//A "human" name for this field, which will be inserted into the error message.
            // For example, if your field is named "user" you might give it a human name of "Username".

            //HINT:xss_clean se koristi za zastitu od napada na bazu podataka
            'trim|required|max_length[50]|min_length[2]');//The validation rules for this form field.

        $this->form_validation->set_rules(
            'last_name',
            'Last_Name',
            'trim|required|max_length[50]|min_length[2]');//HINT:pravilo xss_clean nije vise dio CI 3.0

        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|max_length[100]|min_length[5]|valid_email');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|max_length[20]|min_length[4]|is_unique[users.username]');

        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|max_length[50]|min_length[6]');

        $this->form_validation->set_rules(
            'password2',
            'Confirm Password',
            'trim|required|max_length[50]|min_length[2]|matches[password]');


        if ($this->form_validation->run() == FALSE)
        {
            $data['main_content'] = 'users/register';//data varjabla pod imenom u zagradi koja pokazuje na
            //register view

            $this->load->view('layouts/main',$data);//ucitavanje layouta gdje se daju dva parametrau
            //u zagradi,prvi je lokacija layouta, drugi je $data array
        }
        else
        {
            if($this->User_model->create_member())//pozivanje create member metode u User modelu
            {
                //kreiranje komande za poruku koja se prikaze nakon uspjesne registracije
                //u zagradi se zadaju dva parametra, prvi je kljuc, drugi je poruka koja se prikazuje
                $this->session->set_flashdata('registered','You are now registered and can log in');

                redirect('home/index');//redirekcija na home/index stranicu
            }
        }

    }

    public function login(){
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');

        if($this->form_validation->run() == FALSE)
        {
            //nothing
        } else {
            //Get from post
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //Get user id from model
            $user_id = $this->User_model->login_user($username, $password);

            //Validate user
            if($user_id){
                //Create array of user data
                $user_data = array(
                    'user_id'   => $user_id,
                    'username'  => $username,
                    'logged_in' => true
                );
                //Set session userdata
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success', 'You are now logged in');
                redirect('home/index');
            } else {
                //Set error
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
                redirect('home/index');
            }
        }
    }
}