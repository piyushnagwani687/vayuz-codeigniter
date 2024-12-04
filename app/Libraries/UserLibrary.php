<?php

namespace App\Libraries;

use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserEmployment;

class UserLibrary
{
    public function getUserDetails($userId)
    {
        $userModel = new User();
        $educationModel = new UserEducation();
        $employmentModel = new UserEmployment();

        $user = $userModel->find($userId);
        $education = $educationModel->where('user_id', $userId)->first();
        $employment = $employmentModel->where('user_id', $userId)->first();

        return [
            'user' => $user,
            'userEducation' => $education,
            'userEmployment' => $employment,
        ];
    }
}
