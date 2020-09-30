<?php
namespace App\Models;

use CodeIgniter\Model;

class Laundry_model extends Model
{
	protected $table = 'order';
	protected $primaryKey = 'id_laundry';

	protected $allowedFields = [
		'id_user',
		'nama_laundry',
		'nama_pemilik',
        'alamat',
        'tlp',
        'foto'
	];

	protected $validationRules = [
		'id_user' => 'required',
		'nama_laundry' => 'required',
		'nama_pemilik' => 'required',
        'alamat' => 'required',
        'tlp' => 'required',
        'foto' => 'required'
	];
}