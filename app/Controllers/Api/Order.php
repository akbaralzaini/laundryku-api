<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Order extends ResourceController
{
  protected $modelName = 'App\Models\Order_model';
  protected $format = 'json';

  

  public function index()
  {
    $key = $this->request->getHeaderLine('sshost');
    if ($key == "ybtevuxwew") {
    
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
    else{
      return $this->failNotFound(sprintf('Pasangan dengan id tidak ditemukan'));
    }
  }

  public function create()
  {
    $data = $this->request->getJSON();

    if (!$this->model->save($data))
    {
      return $this->fail($this->model->errors());
    }

    $data->id_order = $this->model->getInsertID();
    // $detail->id_order= $this->model->getInsertID();

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
    $data->id_order = $id;
    return $this->respond($data);
  }

  public function delete($id = null)
  {
    $this->model->delete($id);
    if ($this->model->db->affectedRows() === 0)
    {
      return $this->failNotFound(sprintf(
        'Pasangan dengan id %d tidak ditemukan',
        $id
      ));
    }

    return $this->respondDeleted(['id_order' => $id]);
  }


}