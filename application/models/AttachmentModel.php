<?php 

// This file should be secure
defined('BASEPATH') OR exit('No direct script access allowed');

class AttachmentModel extends CI_Model
{

    public function get_all_attachments()
    {
        $query = $this->db->query("SELECT * from attachments");
        return $query->result_array();
    }

    public function get_attachments($contact_id)
    {
        $query = $this->db->query("SELECT attachments.attachment_id, tags.tag_name
                                   FROM attachments
                                   INNER JOIN tags ON attachments.tag_id = tags.tag_id
                                   WHERE attachments.contact_id = $contact_id;");
        return $query->result_array();
    }

    public function get_attachment_by_id($id)
    {
        //$result = $this->db->where('id', $id);
        $this->db->where('attachment_id', $id);
        $query = $this->db->get('attachments');
        return $query->row();
    }

    public function insert_attachment($response)
    {
        return $this->db->insert('attachments', $response);
    }

    public function update_attachment($response, $id)
    {
        $this->db->where('attachment_id', $id);
        return $this->db->update('attachments', $response);
    }

    public function delete_attachment($response)
    {   
        $recieved_contact_id = $response['contact_id'];
        $recieved_tag_id = $response['tag_id'];
        $query = $this->db->query("DELETE 
                                   FROM attachments 
                                   WHERE contact_id = '$recieved_contact_id' 
                                   AND tag_id = '$recieved_tag_id' ;");
    }
}