<?php
namespace App\Models;
use CodeIgniter\Model;

class Order_model extends Model
{
   protected $table = 'order';
   protected $primaryKey = 'ID';
   protected $useAutoIncrement = true;
   protected $allowedFields = [
       'nama',
       'unit_kerja',
       'waktu',
       'tujuan',
   ];
}