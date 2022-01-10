<?php 

// This file should be secure
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model
{
    public function get_contacts()
    {
        $query = $this->db->query("SELECT * FROM contacts");
        return $query->result_array();
    }

    public function get_contact_by_id($id)
    {
        //$result = $this->db->where('id', $id);
        $this->db->where('contact_id', $id);
        $query = $this->db->get('contacts');
        return $query->row();
    }

    public function insert_contact($response)
    {
        // prebuilt codeigniter query class
        return $this->db->insert('contacts', $response);
    }

    public function update_contact($response, $id)
    {
        $this->db->where('contact_id', $id);
        return $this->db->update('contacts', $response);
    }

    public function delete_contact($id)
    {
        $get_query = $this->db->get('contacts');
        if($get_query->num_rows() >= $id)
        {
            $query = $this->db->delete('contacts', ['contact_id' => $id]);
            return $query;
        }
        else
        {
            return null;
        }

    }
}

?>