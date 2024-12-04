<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEducation extends Model
{
    protected $table = 'user_education';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'degree', 'institute'];
}
