<?php
/**
 * Created by PhpStorm.
 * User: Vitnere
 * Date: 04-Apr-16
 * Time: 9:09 PM
 */

class Task_model extends CI_Model
{
    public function get_task($id)//funkcija koja kao parametar uzima id iz url-a(adrese) taska
    {
        $query = $this->db->get('tasks');//povuci sve podatke iz tabele tasks
        $this->db->where('id',$id);//gdje je id iz urla jednak id iz tabele tasks
        return $query->row();//onda vrati taj pojedinacni red
    }

    public function check_if_complete($id)
    {
        $this->db->where('id',$id);//gdje je id iz url jednak id iz tabele
        $query = $this->db->get('tasks');//povuci sve podatke iz table tasks
        return $query->row()->is_complete;//i vrati taj tacni odredeni red sa istom vrijednoscu
        // koja je precizirana na redu 20
    }

    public function get_list_name($list_id)
    {
        $this->db->where('id',$list_id);//ako je id iz url-a jednak list_id
        $query = $this->db->get('lists');//onda vrati sve vrijednosti iz tabele lists
        return $query->row()->list_name;//filtriraj kolonu sa imenom liste koja odgovara
        //uslove preciziranom na liniji 28
    }

    public function create_task($data)
    {
        $insert =  $this->db->insert('tasks',$data);//umetni podatke u tabelu tasks
        return $insert;//vrati insert varjablu sa reda iznad
    }

    public function get_task_list_id($task_id)
    {
        $this->db->where('id',$task_id);//ako je id iz URL jednak task_id
        $query =  $this->db->get('tasks');//onda povuci sve podatke iz tabele tasks
        return $query->row()->list_id;//i medu tim podacima filtriraj list_id u pojedinacnom redu
    }

    public function get_task_data($task_id)
    {
        $this->db->where('id',$task_id);
        $query = $this->db->get('tasks');
        return $query->row();
    }

    public function edit_task($task_id,$data){//dva parametra:task_id i podaci iz forme edit_task
        $this->db->where('id', $task_id);//gdje je id uz URL jednak task_id
        $this->db->update('tasks', $data);//onda updejtuj tabelu tasks sa podacima iz forme edit_taks
        return TRUE;//vrati tacno
    }

}