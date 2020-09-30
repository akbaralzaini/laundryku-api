<?php
namespace App\Models;

use CodeIgniter\Model;

class JenisBarang_model extends Model
{
	protected $table = 'order';
	protected $primaryKey = 'id_order';

	protected $allowedFields = [
		'id_laundry',
		'nama_jenis',
		'harga_jenis',
		'lama_waktu'
	];

	protected $validationRules = [
		'id_laundry' => 'required',
		'nama_jenis' => 'required',
		'harga_jenis' => 'required',
		'lama_waktu' => 'required'
	];
}