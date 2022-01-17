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
        $query = $this->db->query("SELECT tags.tag_name, tags.tag_id
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

    public function insert_attachment($contact_id, $tag_id)
    {
        //return $this->db->set($response);
        return $this->db->query("INSERT INTO attachments (attachments.contact_id, attachments.tag_id)
                                  SELECT * FROM (SELECT $contact_id, $tag_id) AS tmp
                                  WHERE NOT EXISTS (
                                  SELECT contact_id FROM attachments WHERE attachments.contact_id = $contact_id AND attachments .tag_id = $tag_id
                                  ) LIMIT 1");
    }

    public function update_attachment($response, $id)
    {
        $this->db->where('attachment_id', $id);
        return $this->db->update('attachments', $response);
    }

    public function delete_attachment($contact_id, $tag_id)
    {   
        $get_query = $this->db->get('attachments');
        return $this->db->delete('attachments', ['attachment_id' => $contact_id]);
    }
}