<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

// https://github.com/chriskacerguis/codeigniter-restserver/issues/1030
require APPPATH.'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

// http://localhost/CW02_Test01/index.php/api/tags
class Tags extends RestController
{
    public function __construct()
    {
        parent::__construct();

        // Initialyzing the model
        $this->load->model('TagModel');
    }

    // Gets all the tags
    public function index_get()
    {
        // instance of the model
        $contact = new TagModel;
        $result = $contact->get_tags();
        $this->response($result, 200);
    }

    //Get by id
    public function getTagbyId_get($id)
    {
        // instance of the model
        $tag = new TagModel;
        $result = $tag->get_tag_by_id($id);
        if($result != null)
        {
            $this->response($result, 200);
        }
        else
        {
            $this->response([
                'message' => 'Id out of bound'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    // adding a tag to the db
    public function storeTag_post()
    {
        // instance of the model
        $tag = new TagModel;
        $response = [
            'tag_name' => $this->post('tag_name'),
            'tag_description' => $this->post('tag_description')
        ];
        $result = $tag->insert_tag($response);

        // validation
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'New tag added to the db'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'New tag !added to the db'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    // updating a tag in the db by id
    public function updateTag_put($id)
    {
        // instance of the model
        $tag = new TagModel;
        $response = [
            'tag_name' => $this->put('tag_name'),
            'tag_description' => $this->put('tag_description')
        ];
        $result = $tag->update_tag($response, $id);
        
        // validation
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Tag updated in the db'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Tag !updated in the db'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    // deleting a tag in the db by id
    public function deleteTag_delete($id)
    {
        $tag = new TagModel;
        $result = $tag->delete_tag($id);
        if($result != null)
        {
            $this->response(['message' => 'Completely deleted'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response(['message' => 'Completely !deleted'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}

?>