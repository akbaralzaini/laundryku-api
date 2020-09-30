<?php

namespace App\Controllers\Api;

use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Authentication extends ResourceController
{
  protected $modelName    = 'App\Models\User_model';
  protected $format       = 'json';

  public function login()
  {
    $data = $this->request->getJSON(TRUE);

    if(empty($data['email_user']) || empty($data['password_user'])) {
      return $this->failUnauthorized();
    }

    $record = $this->model->where('email_user', $data['email_user'])->first();

    if($record) {
      $check = $this->model->where('password_user', $data['password_user'])->first();

      if($check) {
        return $this->respond($record);
      }
    }
    return $this->failUnauthorized();
  }
  
}

//192.168.43.252/Api/Authentication