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
            if($this->User_model->create_member())//pozivanje create member metode u User_modelu
            {
                //kreiranje komande za poruku koja se prikaze nakon uspjesne registracije
                //u zagradi se zadaju dva parametra, prvi je kljuc, drugi je poruka koja se prikazuje
                //flash data je session parametar koji prikazuje privremen podatke na ekranu
                $this->session->set_flashdata('registered','You are now registered and can log in');

                redirect('home/index');//redirekcija na home/index stranicu
            }
        }

    }

    public function login(){
        //Validaciska pravila za login formu,parametri username i password
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');

        if($this->form_validation->run() == FALSE)//ako forma nije submit
        {//ne radi nista
            //nothing
        } else {//inace
            //Get from post
            $username = $this->input->post('username');//postuj username
            $password = $this->input->post('password');//postuj password

            //Get user id from model
            //ako je login tacan dobice se $user_id koji je potreban za dalji kod
            $user_id = $this->User_model->login_user($username, $password);

            //Validate user
            if($user_id){//ako postoji $user_id
                //Create array of user data
                $user_data = array(//napravi array korisnickih podataka
                    'user_id'   => $user_id,//user id
                    'username'  => $username,//username
                    'logged_in' => true//da li je logovan, true za jeste, false za nije
                );
                //Set session userdata
                //HINT:Klasa session sluzi za prikaz podataka, stranica ili sl koje se prikazuju nakon uspjesnog logovanja
                //ali se moze definisati i drugi uslov nakon cijeg ispunjenja se korisnika pusta sesija i odredini
                //niz podataka ili stranica

                /*What is a PHP Session?
                When you work with an application, you open it, do some changes, and then you close it.
                This is much like a Session. The computer knows who you are. It knows when you start the
                application and when you end. But on the internet there is one problem: the web server does
                not know who you are or what you do, because the HTTP address doesn't maintain state.
                Session variables solve this problem by storing user information to be used across multiple
                pages (e.g. username, favorite color, etc). By default, session variables last until the
                user closes the browser.So; Session variables hold information about one single user,
                and are available to all pages in one application.
                 *
                 */
                $this->session->set_userdata($user_data);//napravi sesiju sa podacima iz gornjem array
                //
                $this->session->set_flashdata('login_success', 'You are now logged in');
                redirect('home/index');
            } else {
                //Set error
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
                redirect('home/index');
            }
        }
    }

    public function logout()
    {
        //unset session data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('home/index');

    }

    public function contact()
    {
        $this->form_validation->set_rules('name','Name','trim|required|min_length[4]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[4]');
        $this->form_validation->set_rules('message','Message','trim|required|min_length[4]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['main_content'] = 'users/contact';
            $this->load->view('layouts/main',$data);
        }

        else
        {
            if($this->User_model->contact_submit())
            {
                $this->session->set_flashdata('registered','Thanks for your feedback');

                redirect('home/index');
            }
        }





    }
}