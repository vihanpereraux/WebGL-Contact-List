<?php 

// This file should be secure
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function get_users()
    {
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
    }

    public function get_user_by_id($id)
    {
        //$result = $this->db->where('id', $id);
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function insert_user($response)
    {
        // prebuilt codeigniter query class
        return $this->db->insert('users', $response);
    }

    public function update_user($response, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $response);
    }

    public function delete_user($id)
    {
        $get_query = $this->db->get('users');
        if($get_query->num_rows() >= $id)
        {
            $query = $this->db->delete('users', ['id' => $id]);
            return $query;
        }
        else
        {
            return null;
        }
        
    }
}

?>