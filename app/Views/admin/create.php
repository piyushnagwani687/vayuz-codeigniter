<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?=$this->include('layouts/header') ?>
<div class="container mt-3">
    <h1 class="text-center">Add User</h1>
    <form action="<?= base_url('/api/admin/users/store') ?>" method="post" enctype="multipart/form-data" id="userForm">
    <?= csrf_field(); ?>
    <div class="row">
            <div class="mb-3 col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select>
            </div>
            <div class="mb-4 col-md-6">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*">
            </div>

            <div class="row mb-4">
                <h5>Education Details</h5><hr>
                <div class="col-md-6">
                    <label for="degree" class="form-label">Degree</label>
                    <input type="text" name="degree" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="institute" class="form-label">Institute</label>
                    <input type="text" name="institute" class="form-control">
                </div>
            </div>
        </div>

            <div class="row mb-4">
                <h5>Employment Details</h5><hr>
                <div class="col-md-6">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="number" class="form-label">Experience</label>
                    <input type="text" name="experience" class="form-control">
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

