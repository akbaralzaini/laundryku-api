<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class DetailOrder extends ResourceController
{
  protected $modelName = 'App\Models\DetailOrder_model';
  protected $format = 'json';

  // public function __construct(){
  //   parent::__construct();
  //   $host = $request->getHeader('host');
  //   if ($host == null) {
  //     $data = ["status"=>"error","message"=>"tidak mempunyai izin akses"];
  //     return $this->response($data);
  //   }
  // }

  public function index()
  {
    $params_query = $this->request->getGet();
    $kandidat = $this->model->like($params_query)->get()->getResultArray();
    if (!$kandidat) {
    	$data = ["status"=>'error','data'=>"null",'message'=>'data tidak ditemukan'];
    }
    else{
    	$data = ["status"=>'success','data'=>$kandidat,'message'=>'null'];
    }
    
    return $this->respond($data);
  }

  public function create()
  {
    $data = $this->request->getJSON();

    if (!$this->model->save($data))
    {
      return $this->fail($this->model->errors());
    }

    $data->id_order = $this->model->getInsertID();

    return $this->respondCreated($detail);
  }

  public function update($id = null)
  {
    $data    = $this->request->getJSON();
    $record  = $this->model->find($id);
    $this->model->skipValidation(true);

    if(empty($record)) {
      return $this->failNotFound(sprintf(
        'Pasangan dengan id %d tidak ditemukan',
        $id
      ));
    }
    if($this->model->update($id, $data) === FALSE)
    {
      return $this->fail($this->model->errors());
    }
    $data->id_detail = $id;
    return $this->respond($data);
  }

}