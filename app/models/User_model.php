<?php
    class User_model extends CI_Model
    {
        public function create_member()//funkcija koja vrsi upis u bazu podataka
            //koji su zadani u register formi
        {
            $enc_password = md5($this->input->post('password'));//enkripcija se vrsi pomocu md5() funkcije

            $data = array(//array za register formu
                //HINT:imena ispod moraju biti poredana istim redom kao u formi
                //takoder isti nazivi i red vrijednosti mora biti u bazi kao i formi
                //post sluzi za hvatanje vrijednosti iz forme i upis u bazu

                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'email'      => $this->input->post('email'),
                'username'   => $this->input->post('username'),
                //iz sigurnosnih razloga password se stavlja
                // u varjablu $enc_password koja se nalazi na liniji 7
                'password'   => $enc_password
            );

            //Active record helper,database heler:
            //https://ellislab.com/codeigniter/user-guide/database/active_record.html
            /*Generates an insert string based on the data you supply,
            and runs the query.
            You can either pass an array or an object to the function. */
            $insert = $this->db->insert('users', $data);
            return $insert;
        }

        public function login_user($username,$password)
        {
            $enc_password = md5($password);

            //Where Clause
            $this->db->where('username',$username);
            $this->db->where('password',$enc_password);

            $result = $this->db->get('users');
            if($result->num_rows() == 1)
            {
                return $result->row(0)->id;
            }else
            {
                return false;
            }
        }
    }

