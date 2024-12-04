<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="<?= base_url('api/admin/dashboard')?>"><?=  user()['role'] == 'admin' ? 'Admin Dashboard' : 'Customer Dashboard' ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if(user()['role'] == 'admin'): ?>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-light" aria-current="page" href="<?=base_url('api/admin/users')?>">User Management</a>
                </div>
            </div>
            <?php endif; ?>
        <form action="<?= base_url('api/auth/logout') ?>" method="post" style="display: inline;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-link navbar-brand text-light">Logout</button>
        </form>
    </div>
</nav>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap JS (Optional, for full Bootstrap functionality) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>