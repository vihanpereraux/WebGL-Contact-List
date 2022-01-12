<?php 

// This file should be secure
defined('BASEPATH') OR exit('No direct script access allowed');

class ExploreModel extends CI_Model
{

    public function get_contacts()
    {
        $query = $this->db->query("SELECT * FROM contacts");
        return $query->result_array();
    }

    public function get_contacts_by_name($contact_sname)
    {
        $query = $this->db->query("SELECT * From contacts WHERE contact_sname = '$contact_sname'");
        return $query->result_array();
    }

    public function get_contacts_by_tag($tag_id)
    {
        $query = $this->db->query("SELECT attachments.tag_id, contacts.contact_fname, 
                                   contacts.contact_sname, contacts.contact_number, contacts.contact_address
                                   FROM attachments
                                   INNER JOIN contacts ON attachments.contact_id = contacts.contact_id
                                   WHERE attachments.tag_id = $tag_id");
        return $query->result_array();
    }
    
}

?>