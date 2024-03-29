<?php
namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id_user';

	protected $allowedFields = [
		'email_user',
		'password_user',
		'tipe'
	];

	protected $validationRules = [
		'email_user' => 'required',
		'password_user'	=> 'required',
		'tipe'	=> 'required'
	];
}