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
        /*Izaberi sledece kolone*/
        $this->db->select('
        tasks.task_name,
        tasks.id,
        tasks.create_date,
        tasks.task_body,
        tasks.is_complete,
        lists.id as list_id,
        lists.list_name,
        lists.list_body
        ');


        $this->db->from('tasks');//iz tabele task
        $this->db->join('lists', 'lists.id =  tasks.list_id');//spoji sa tabelom list(prvi uslov)
        //po sablonu id iz tabele list da je jednak list_id koloni iz tabele tasks(drugi parametar uslov za JOIN)
        $this->db->where('tasks.id', $id);//gdje je task_id jednak id varjabli koja se dobija iz URL-a
        $query=$this->db->get();//povuci sve taskove
        if ($query->num_rows() != 1) {//ako broj redova nije jedan 1
            return FALSE;//ne vracaj nista
        } else {//inace
            return $query->row();//vrati jedan red
        }
    }

    public function check_if_complete($id)
    {
        $this->db->where('id', $id);//gdje je id iz url jednak id iz tabele
        $query=$this->db->get('tasks');//povuci sve podatke iz table tasks
        return $query->row()->is_complete;//i vrati taj tacni odredeni red sa istom vrijednoscu
        // koja je precizirana na redu 20
    }

    public function get_list_name($list_id)
    {
        $this->db->where('id', $list_id);//ako je id iz url-a jednak list_id
        $query=$this->db->get('lists');//onda vrati sve vrijednosti iz tabele lists
        return $query->row()->list_name;//filtriraj kolonu sa imenom liste koja odgovara
        //uslove preciziranom na liniji 28
    }

    public function create_task($data)
    {
        $insert=$this->db->insert('tasks', $data);//umetni podatke u tabelu tasks
        return $insert;//vrati insert varjablu sa reda iznad
    }


    public function get_task_data($task_id)
    {
        $this->db->where('id', $task_id);
        $query=$this->db->get('tasks');
        return $query->row();
    }

    public function edit_task($task_id, $data)
    {//dva parametra:task_id i podaci iz forme edit_task
        $this->db->where('id', $task_id);//gdje je id uz URL jednak task_id
        $this->db->update('tasks', $data);//onda updejtuj tabelu tasks sa podacima iz forme edit_taks
        return TRUE;//vrati tacno
    }

        public function delete($task_id)//kao parametar id task-a iz URL-a
    {
        $this->db->where('id',$task_id);//gdje je id taska u bazi jedank task_id
        // koji se dobija iz URL-a stranice
        $this->db->delete('tasks');//izbrisi task iz tabele tasks
        return;//vrati komandu
    }

    public function mark_new($task_id)
    {
        $this->db->set('is_complete',0);//postavi task_id na nula
        $this->db->where('id',$task_id);//gdje je id iz url jednak $task_id iz tabele tasks
        $this->db->update('tasks');//updejtuj tasks tabelu
        return true;//vrati true
    }

    public function mark_complete($task_id)
    {
        $this->db->set('is_complete',1);//postavi task_id na 1
        $this->db->where('id',$task_id);//gdje je id iz URL jednak $task_id
        $this->db->update('tasks');//updejtuj tasks tabelu
        return true;//vrati true
    }

    public function get_task_list_id($task_id)
    {
        $this->db->where('id', $task_id);//ako je id iz URL jednak task_id
        $query=$this->db->get('tasks');//onda povuci sve podatke iz tabele tasks
        return $query->row()->list_id;//i medu tim podacima filtriraj list_id u pojedinacnom redu
    }

    public function get_users_tasks($user_id)
    {
        $this->db->where('list_user_id',$user_id);//gdje je list_user_id(tabela lists) jednak $user_id(user tabela)
        $this->db->join('tasks', 'lists.id = tasks.list_id');//spoji sa tabelom tasks,po parametru lists.id jednako
        //tasks.list_id
        $this->db->order_by('tasks.create_date', 'desc');
        $query = $this->db->get('lists');
        return $query->result();
    }

}