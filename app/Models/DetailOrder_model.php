<?php
namespace App\Models;

use CodeIgniter\Model;

class DetailOrder_model extends Model
{
	protected $table = 'detail_order';
	protected $primaryKey = 'id_detail';

	protected $allowedFields = [
        'id_order',
        'berat',
        'total_harga',
        'id_jenis' 
	];

	protected $validationRules = [
		'id_order' => 'required',
		'berat' => 'required',
		'total_harga' => 'required',
		'id_jenis' => 'required'
	];
}