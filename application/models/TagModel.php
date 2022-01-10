<?php 

// This file should be secure
defined('BASEPATH') OR exit('No direct script access allowed');

class TagModel extends CI_Model
{
    public function get_tags()
    {
        $query = $this->db->query("SELECT * FROM tags");
        return $query->result_array();
    }

    public function get_tag_by_id($id)
    {
        //$result = $this->db->where('id', $id);
        $this->db->where('tag_id', $id);
        $query = $this->db->get('tags');
        return $query->row();
    }

    public function insert_tag($response)
    {
        // prebuilt codeigniter query class
        return $this->db->insert('tags', $response);
    }

    public function update_tag($response, $id)
    {
        $this->db->where('tag_id', $id);
        return $this->db->update('tags', $response);
    }

    public function delete_tag($id)
    {
        $get_query = $this->db->get('tags');
        if($get_query->num_rows() >= $id)
        {
            $query = $this->db->delete('tags', ['tag_id' => $id]);
            return $query;
        }
        else
        {
            return null;
        }
    }


}

?>