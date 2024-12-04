<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password', 'profile_image', 'role', 'last_login'];
    protected $useTimestamps = true;

    public function getUserEducation($userId)
    {
        $userEducation = new UserEducation();
        $userEducation = $userEducation->where('user_id', $userId)->first();
        return $userEducation;
    }

    public function getUserEmployment($userId)
    {
        $userEmployment = new UserEmployment();
        $userEmployment = $userEmployment->where('user_id', $userId)->first();
        return $userEmployment;
    }
}
