<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEmployment extends Model
{
    protected $table = 'user_employment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'designation', 'experience'];
}
