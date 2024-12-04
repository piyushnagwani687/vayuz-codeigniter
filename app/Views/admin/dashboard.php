<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>

<?=$this->include('layouts/header') ?>
<div class="container mt-5">
    <h1>Welcome, <?= user()['first_name']?></h1>
    <p>Last login: 
    <?= $lastLogin?>
    </p>

<?php if(user()['role'] == 'admin'): ?>
    <div class="row">
        <div class="col-md-6">
            <h4>Total Users: <?= $totalUsers ?></h4>
        </div>
        <div class="col-md-6">
            <h4>Latest 5 Users</h4>
            <ul>
                <?php foreach ($latestUsers as $user): ?>
                    <li><?= $user['first_name'] . ' ' . $user['last_name'] ?> (<?= $user['email'] ?>)</li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
</div>
</body>
</html>
