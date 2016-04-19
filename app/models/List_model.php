<?php
/**
 * Created by PhpStorm.
 * User: Vitnere
 * Date: 03-Apr-16
 * Time: 12:15 PM
 */


/*Tvoj dobar drugar za sve modele, i komunikaciju CI sa bazom,
 kao i kucanje kverija i ostalog SQL koda kroz CI
https://ellislab.com/codeigniter/user-guide/database/active_record.html
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
        //HINT:row() sluzi za vracanje samo jedne kolone iz tabele
    }

    public function get_list($id)//trebamo dobiti jedan red jer dobijamo preko id liste iz URL-a
    {
        $this->db->select('*');//izaberi sve liste
        $this->db->from('lists');//izaberi sve iz list table
        $this->db->where('id',$id);//gdje je id iz tabele jednak id iz url-a
        $query = $this->db->get();//povuci sve podatke u kveri
        if ($query->num_rows() != 1)//ako u kveriju broj redova nije jednak 1
        {
            return FALSE;//onda ne vracaj nista
        }else//inace
        {
            return $query->row();
        }
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
        $this->db->order_by('create_date','desc');
        $query = $this->db->get('lists');
        return $query->result();

    }

    public function get_list_tasks($list_id, $active =  TRUE)//prvi parametar je id liste
        // a drugi je da li je task aktivan
    {
        //HINT:ZA vise o sintaksi JOIN-a pogledaj active_record u Codiginiter documents
        $this->db->select('
                            tasks.task_name,
                            tasks.task_body,
                            tasks.id as task_id,
                            lists.list_name,
                            lists.list_body
                            ');//kod joina kada se koristi dva id iz dvije razlicite tabele potrebno
                            //je jedan id imenovati pod alijasom(red 83) da ne bi doslo do zabune

        $this->db->from('tasks');//izaberi redove (redovi 81-86) iz tabele tasks(red 90)
        $this->db->join('lists','lists.id = tasks.list_id');//pridruzi tabelu list,gdje je id iz tabele lists
        //jednak list_id redu iz tabele tasks- ovo je uslov za spajanje(JOIN) ove dvije tabele
        $this->db->where('tasks.list_id',$list_id);//gdje je list_id iz tabele tasks jednak list_id(parametar na pocetku
        //get_list_tasks funkcije)
        if($active == TRUE)//ako je task aktivan
        {
            $this->db->where('tasks.is_complete',0);//onda nije kompletiran
        }else//inace
        {
            $this->db->where('tasks.is_complete',1);//je kompletiran
        }

        $query=$this->db->get();//kverijem povuci sve podatke( ekvilavent SQL komande SELECT(*) )
        if($query->num_rows()<1)//ako je broj redova u kverija manji od 1,tj nula
        {
            return FALSE;//ne vracaj nista
        }
        return $query->result();//inace vrati rezultat
    }

    public function delete_tasks_of_list($list_id)
    {
        $this->db->where('list_id',$list_id);
        $this->db->delete('tasks');
        return;
    }
}