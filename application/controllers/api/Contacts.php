<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

// https://github.com/chriskacerguis/codeigniter-restserver/issues/1030
require APPPATH.'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

// http://localhost/CW02_Test01/index.php/api/contacts
class Contacts extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ContactModel');
    }

    public function index_get()
    {
        $contact = new ContactModel;
        $result = $contact->get_contacts();
        $this->response($result, 200);
    }

    public function getContactbyId_get($id)
    {
        $contact = new ContactModel;
        $result = $contact->get_contact_by_id($id);
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

    public function storeContact_post()
    {
        $contact = new ContactModel;
        $response = [
            'contact_fname' => $this->post('contact_fname'),
            'contact_number' => $this->post('contact_number'),
            'id' => 0,
            'contact_note' => $this->post('contact_note'),
            'contact_address' => $this->post('contact_address'),
            'contact_sname' => $this->post('contact_sname'),
            'contact_email' => $this->post('contact_email')
        ];
        $result = $contact->insert_contact($response);
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

    public function updateContact_put()
    {
        $contact = new ContactModel;
        $id = (int) $this->put('contact_id');
        $response = [
            'contact_fname' => $this->put('contact_fname'),
            'contact_number' => $this->put('contact_number'),
            'id' => 0   ,
            'contact_note' => $this->put('contact_note'),
            'contact_address' => $this->put('contact_address'),
            'contact_sname' => $this->put('contact_sname'),
            'contact_email' => $this->put('contact_email')
        ];
        $result = $contact->update_contact($response, $id);
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

    public function deleteContact_delete($id)
    {
        $contact = new ContactModel;
        $result = $contact->delete_contact($id);
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