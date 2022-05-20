<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'email', 'password'];


    // Validation
    protected $validationRules      = [
        'name'          => 'required|min_length[3]|max_length[20]',
        'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
        'password'      => 'required|min_length[6]|max_length[200]',
        'confpassword'  => 'matches[password]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
