<?php

namespace App\Models;

use CodeIgniter\Model;

class Foto_model extends Model
{
  protected $table = 'foto';
  protected $primaryKey = 'id';

  protected $allowedFields = [
    'id_kandidat',
    'foto'
  ];

  protected $validationRules = [
    'id_kandidat'		=> 'required',
    'foto'		=> 'required'
  ];
}