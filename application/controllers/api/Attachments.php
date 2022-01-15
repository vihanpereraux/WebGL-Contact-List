<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

// https://github.com/chriskacerguis/codeigniter-restserver/issues/1030
require APPPATH.'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

// http://localhost/CW02_Test01/index.php/api/contacts
class Attachments extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AttachmentModel');
    }

    public function getAllAttachments_get()
    {
        $attachment = new AttachmentModel;
        $result = $attachment->get_all_attachments();
        $this->response($result, 200);
    }

    public function index_get($contact_id)
    {
        $attachment = new AttachmentModel;
        $result = $attachment->get_attachments($contact_id);
        $this->response($result, 200);
    }

    public function getAttachmentbyId_get($id)
    {
        $attachment = new AttachmentModel;
        $result = $attachment->get_attachment_by_id($id);
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

    public function storeAttachment_post()
    {
        $attachment = new AttachmentModel;
        $response = [
            'contact_id' => $this->post('contact_id'),
            'tag_id' => $this->post('tag_id')
        ];
        $result = $attachment->insert_attachment($response);
        //$this->response($response, 200);

        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'New contact added to the db'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'New contact !added to the db'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function updateAttachment_put($id)
    {
        $attachment = new AttachmentModel;
        $response = [
            'contact_id' => $this->put('contact_id'),
            'tag_id' => $this->put('tag_id')
        ];
        $result = $attachment->update_attachment($response, $id);
        //$this->response($response, 200);

        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Contact updated in the db'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Contact !updated in the db'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteAttachment_delete()
    {
        $attachment = new AttachmentModel;
        $response = [
            'contact_id' => $this->delete('contact_id'),
            'tag_id' => $this->delete('tag_id'),
        ];
        $result = $attachment->delete_attachment($response);



        // $attachment = new AttachmentModel;
        // $result = $attachment->delete_attachment($id);
        // if($result != null)
        // {
        //     $this->response(['message' => 'Completely deleted'
        //     ], RestController::HTTP_OK);
        // }
        // else
        // {
        //     $this->response(['message' => 'Completely !deleted'
        //     ], RestController::HTTP_BAD_REQUEST);
        // }
    }


}