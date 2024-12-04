<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?=$this->include('layouts/header') ?>
<div class="container mt-3">
    <h1 class="text-center">Edit User</h1>
    <form action="<?= base_url('api/admin/users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
            <div class="mb-3 col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?= $user['first_name'] ?>" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?= $user['last_name']?>"  required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email']?>" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="customer" <?= $user['role'] == 'customer' ? 'selected' : '' ?>>Customer</option>
                </select>
            </div>
            <div class="mb-4 col-md-6">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <div class="row mb-4">
                <h5>Education Details</h5><hr>
                <div class="col-md-6">
                    <label for="degree" class="form-label">Degree</label>
                    <input type="text" name="degree" class="form-control" value="<?= $userEducation['degree'] ?? '' ?>" >
                </div>
                <div class="col-md-6">
                    <label for="institute" class="form-label">Institute</label>
                    <input type="text" name="institute" class="form-control" value="<?= $userEducation['institute'] ?? '' ?>" >
                </div>
            </div>
        </div>

            <div class="row mb-4">
                <h5>Employment Details</h5><hr>
                <div class="col-md-6">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" value="<?= $userEmployment['designation'] ?? '' ?>" >
                </div>
                <div class="col-md-6">
                    <label for="number" class="form-label">Experience</label>
                    <input type="text" name="experience" class="form-control" value="<?= $userEmployment['experience'] ?? '' ?>" >
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

