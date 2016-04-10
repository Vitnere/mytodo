<?php

class Lists extends CI_Controller
{
    public function __construct()//po difoltu potrebni su redovi od 5 do 7
    {
        parent::__construct();//povlacenje metoda iz CI_Controller-a
        if(!$this->session->userdata('logged_in')){//ako user nije logovan
            //Set error
            $this->session->set_flashdata('noaccess', 'Sorry, you need to be logged in to view that area');
            redirect('home/index');
        }
    }

    public function index()//index se poziva kada se
        //ide na kontroler bez poziva ijedne metode
    {
        $user_id = $this->session->userdata('user_id');

        $data['lists'] = $this->List_model->get_lists();//podatke iz tabele list=pozovi iz List_model metodu get_lists
        //usmjeravanje kontrolera na komunikaciju sa modelom i njegovom izabranom metodom koji vrsi komunikaciju sa bazom

        //Load view and layout
        $data['main_content'] = 'lists/index';//ucitavnje difoltnog view
        $this->load->view('layouts/main',$data);//ucitavanje layouta main i prosledivanje podataka iz gornje $data
        //varjable u njega

    }

    public function show($id)//metoda za prikazivanje elementa liste u view,
        //$id povlaci parametar iz url-a stranice
    {
        //Get all lists from the model
        $data['list'] = $this->List_model->get_list($id);
        //Get all completed tasks for this list
        $data['active_tasks'] = $this->List_model->get_list_tasks($id,true);
        //Get all uncompleted tasks for this list
        $data['inactive_tasks'] = $this->List_model->get_list_tasks($id,false);

        //Load view and layout
        $data['main_content'] = 'lists/show';
        $this->load->view('layouts/main',$data);
    }

    public function add(){
        $this->form_validation->set_rules('list_name','List Name','trim|required');
        $this->form_validation->set_rules('list_body','List Body','trim');

        if($this->form_validation->run() == FALSE){
            //Load view and layout
            $data['main_content'] = 'lists/add_list';
            $this->load->view('layouts/main',$data);
        } else {
            //Validation has ran and passed
            //Post values to array
            $data = array(
                'list_name'    => $this->input->post('list_name'),
                'list_body'    => $this->input->post('list_body'),
                'list_user_id' => $this->session->userdata('user_id')
            );
            if($this->List_model->create_list($data)){
                $this->session->set_flashdata('list_created', 'Your task list has been created');
                //Redirect to index page with error above
                redirect('lists/index');
            }
        }
    }

    public function edit($list_id){
        $this->form_validation->set_rules('list_name','List Name','trim|required');
        $this->form_validation->set_rules('list_body','List Body','trim');

        if($this->form_validation->run() == FALSE){//ako validacija forme nije prosla
            //Get the current list info
            $data['this_list'] = $this->List_model->get_list_data($list_id);
            //Load view and layout
            $data['main_content'] = 'lists/edit_list';
            $this->load->view('layouts/main',$data);
        } else {//ako je validacija prosla
            //Validation has ran and passed
            //Post values to $data array
            $data = array(
                'list_name'    => $this->input->post('list_name'),
                'list_body'    => $this->input->post('list_body'),
                'list_user_id' => $this->session->userdata('user_id')
            );
            if($this->List_model->edit_list($list_id,$data)){
                $this->session->set_flashdata('list_updated', 'Your task list has been updated');
                //Redirect to index page with error above
                redirect('lists/index');
            }
        }
    }

    public function delete($list_id){
        //Delete list
        $this->List_model->delete_list($list_id);//pozivanje list_modela i njegove metode delete_list
        //Create Message
        $this->session->set_flashdata('list_deleted', 'Your list has been deleted');//flashdata za izbrisanu listu
        //Redirect to list index
        redirect('lists/index');
    }
}
