<?php
/**
 * Created by PhpStorm.
 * User: Vitnere
 * Date: 03-Apr-16
 * Time: 12:15 PM
 */

class List_model extends CI_Model
{
    public function get_lists()
    {
        //HINT:Ovdje nisu potrebne WHERE izjave jer se vuku svi podaci iz tabele, samo za filtriranje potrebno je
        //koristiti WHERE
        $query = $this->db->get('lists');//odradi query koji ce povuci sve iz tabele lists
        return $query->result();//vrati query kao rezultat
        //HINT:result() sluzi za vracanje vise od jedne kolone iz tabele
    }

    public function get_list($id)
    {
        $query =  $this->db->get('lists');//odradi query koji ce povuci sve iz tabele lists
        $this->db->where('id',$id);//gdje je polje ID=ID
        return $query->row();//vrati queri kao pojedinacan red
        //HINT:row() sluzi za vracanje samo jedne kolone iz tabele
    }

    public function create_list($data)
    {
        $insert =  $this->db->insert('lists',$data);//umetni podatke u tabelu lists
        return $insert;//vrati insert varjablu
    }

    public function edit_list($list_id,$data)
    {
        $this->db->where('id',$list_id);//gdje je id tabele jednak id liste(jos ovo razraditi, nerazumljiv mi je ovo bushido)
        $this->db->update('lists',$data);//updejtuj podatke u tabele pod imenom lists
        return TRUE;
    }

    public function get_list_data($list_id)
    {
        $this->db->where('id',$list_id);//kada je id jednak list_id
        $query = $this->db->get('lists');//onda povuci podatke iz forme
        return $query->row();//vrati taj red koji je izabran
    }

    public function delete_list($list_id){
        $this->db->where('id',$list_id);//kada je id tabele jednak id liste
        $this->db->delete('lists');//izbrisi izabrani red iz tabele
        $this->delete_tasks_of_list($list_id);
        return;
    }

    public function get_all_lists($user_id)
    {
        $this->db->where('list_user_id',$user_id);
        $this->db->order_by('create_date','asc');
        $query = $this->db->get('lists');
        return $query->result();

    }



}