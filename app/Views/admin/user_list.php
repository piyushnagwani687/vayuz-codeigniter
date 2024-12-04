<?=$this->include('layouts/header') ?>
<div class="container mt-3">
    <h1>Users List</h1>
    <a href="<?= base_url('api/admin/users/create') ?>" class="btn btn-primary mb-4">Create User</a>
    <table id="userTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>    
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="<?= base_url('api/admin/users/'. $user['id']) ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?= base_url('api/admin/users/edit/'. $user['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>