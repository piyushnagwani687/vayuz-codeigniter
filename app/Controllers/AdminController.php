<?php

namespace App\Controllers;

use App\Libraries\UserLibrary;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserEmployment;
use DateTime;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $User = new User();
        $totalUsers = $User->countAll();
        $lastFiveUsers = $User->orderBy('id', 'DESC')->findAll(5);
        $user = user();
        $date = new DateTime($user['last_login'] ?? '');
        $lastLogin = $date->format('F j, Y, g:i A');
        $data = [
            'totalUsers' => $totalUsers,
            'latestUsers' => $lastFiveUsers,
            'lastLogin' => $lastLogin
        ];
        return view('admin/dashboard', $data);
    }

    public function listUsers()
    {
        $User = new User();
        $users = $User->findAll();
        return view('admin/user_list', ['users'=> $users]);
    }

    public function create()
    {
        return view('admin/create');
    }

    public function storeuser()
    {
        $User = new User();
        $userEducation = new UserEducation();
        $userEmployment = new UserEmployment();

        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getVar('role'),
        ];

        if ($this->request->getFile('profile_image')->isValid()) {
        
            $imageFile = $this->request->getFile('profile_image');
            // Get the file's temp path
            $tempPath = $imageFile->getTempName();
            
            // Define the destination path for the uploaded image
            $uploadPath = WRITEPATH . 'uploads/';
            
            // Move the file to the destination path
            $imageFile->move($uploadPath);

            // Get the uploaded file name
            $filePath = $uploadPath . $imageFile->getName();

            $data['profile_image'] = $imageFile->getName();

            // Crop and compress the image
            cropAndCompressImage($filePath);
        }

        $userId = $User->insert($data);
        
        $userEducation->insert([
            'user_id' => $userId,
            'degree' => $this->request->getVar('degree'),
            'institute' => $this->request->getVar('institute'),
        ]);

        $userEmployment->insert([
            'user_id' => $userId,
            'designation' => $this->request->getVar('designation'),
            'experience' => $this->request->getVar('experience'),
        ]);

        return redirect()->to('api/admin/users')->with('success', 'User Added Successfully.');
    }

    public function edit($id)
    {
        $userDetails = new UserLibrary();
        $userDetails = $userDetails->getUserDetails($id);
        return view('admin/edit', $userDetails);
    }

    public function updateUser($id)
    {
        $user = new User();
        $userEducation = new UserEducation();
        $educationId = $userEducation->where('user_id', $id)->findColumn('id');
        $userEmployment = new UserEmployment();
        $employmentId = $userEmployment->where('user_id', $id)->findColumn('id');

        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getVar('role'),
        ];

        if ($this->request->getFile('profile_image')->isValid()) {
        
            $imageFile = $this->request->getFile('profile_image');
            // Get the file's temp path
            $tempPath = $imageFile->getTempName();
            
            // Define the destination path for the uploaded image
            $uploadPath = WRITEPATH . 'uploads/';
            
            // Move the file to the destination path
            $imageFile->move($uploadPath);

            // Get the uploaded file name
            $filePath = $uploadPath . $imageFile->getName();

            $data['profile_image'] = $imageFile->getName();

            // Crop and compress the image
            cropAndCompressImage($filePath);
        }

        $user->update($id, $data);
        
        $educationData = [
            'user_id' => $id,
            'degree' => $this->request->getVar('degree'),
            'institute' => $this->request->getVar('institute'),
        ];

        $employmentData = [
            'user_id' => $id,
            'designation' => $this->request->getVar('designation'),
            'experience' => $this->request->getVar('experience'),
        ];

        $userEducation->update($educationId, $educationData);
        $userEmployment->update($employmentId, $employmentData);

        return redirect()->to('api/admin/users')->with('success', 'user Updated Successfully');
    }

    public function getUserDetails($id)
    {
        $userDetails = new UserLibrary();
        $userDetails = $userDetails->getUserDetails($id);

        return view('admin/user_details', $userDetails);
    }
}
