<?php
namespace App\Models;
use CodeIgniter\Model;

class Driver_model extends Model
{
   protected $table = 'driver';
   protected $primaryKey = 'ID';
   protected $useAutoIncrement = true;
   protected $allowedFields = [
       'nama',
       'status',
   ];
}