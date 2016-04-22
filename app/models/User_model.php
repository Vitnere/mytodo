<?php
    class User_model extends CI_Model//klasa pod imenom modela koja prosiruje CI_Model, sablon
    {
        public function create_member()//funkcija koja vrsi upis u bazu podataka
            //koji su zadani u register formi
        {
            $enc_password = md5($this->input->post('password'));//enkripcija se vrsi pomocu md5() funkcije

            $data = array(//array za register formu koja ubacuje podatke u users tabelu u bazi
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
            $insert = $this->db->insert('users', $data);//dva parametra ime table u koju se unosi i varjabla za prenos
            //podataka u CI
            return $insert;//vracanje insert funkcije
        }

        public function login_user($username,$password)//login user funkcija sa parametrima login forme
        {
            $enc_password = md5($password);

            //Where Clause-validacija unesenih podataka u odnosu na one u bazi,
            //uporedivanje podataka unesenih u formu sa onim podacima u bazi
            $this->db->where('username',$username);//uporedi uneseno username sa username u bazi(users table, podaci
            //dobijeni registraciom korisnika na sajt)
            $this->db->where('password',$enc_password);//uporedi unesenu sifru sa sifrom u bazi

            $result = $this->db->get('users');//povuci i uporedi podatke iz tabele users i smjesti u varjablu result
            if($result->num_rows() == 1)//ako result ima jedno tacnu usporedenu vrijednost
            {//onda
                return $result->row(0)->id;//vrati user id iz tabele
                //HINT:row(0) jer sve array i objekti pocinju sa nulom, tj to je indeks prvog clana
            }else
            {
                return false;//ako nisu vrijednosti iste vrati false, tj ne radi nista
            }
        }

        public function contact_submit()
        {

            $data = array(

                'name'      => $this->input->post('name'),
                'email'      => $this->input->post('email'),
                'message'   => $this->input->post('message'),
            );

            $insert = $this->db->insert('contact', $data);
            return $insert;
        }
    }

