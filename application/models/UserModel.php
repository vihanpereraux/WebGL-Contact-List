<?php 

// This file should be secure
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function get_users()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function insert_user($response)
    {
        // prebuilt codeigniter query class
        return $this->db->insert('user', $response);
    }
}

?>