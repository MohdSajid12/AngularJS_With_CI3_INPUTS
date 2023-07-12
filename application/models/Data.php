<?php

class Data extends CI_Model
{
    public function addUser($userData)
    {
        // Insert data into the database
         $this->db->insert('testing_users', $userData);
         return $this->db->insert_id(); 
    }
}

?>