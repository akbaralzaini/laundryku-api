<?php
namespace App\Models;

use CodeIgniter\Model;

class Order_model extends Model
{
	protected $table = 'order';
	protected $primaryKey = 'id_order';

	protected $allowedFields = [
		'id_laundry',
		'tanggal_masuk',
		'tanggal_selesai',
		'tanggal_diambil',
		'status',
		'nama_pemesan',
		'no_telpon',
		'alamat',
		'dp',
		'total_bayar' 
	];

	protected $validationRules = [
		'id_order' => 'is_unique[order.id_order]',
		'id_laundry' => 'required',
		'nama_pemesan' => 'required',
		'no_telpon' => 'required',
		'alamat' => 'required',
		'dp' => 'required',
		'total_bayar' => 'required',
		'status' => 'required'
	];
}