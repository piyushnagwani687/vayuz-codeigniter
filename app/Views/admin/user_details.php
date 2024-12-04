
<?=$this->include('layouts/header') ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>User Details</h1>
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> <?= $user['first_name'] ?></p>
            <p><strong>Last Name:</strong> <?= $user['last_name'] ?></p>
            <p><strong>Email:</strong> <?= $user['email'] ?></p>
            <p><strong>Role:</strong> <?= $user['role'] ?></p>
            <p><strong>Profile Image:</strong> <a target="__blank" href="<?=base_url('writable/uploads/' . $user['profile_image'])?>"><img src="<?= base_url('writable/uploads/' . $user['profile_image']) ?>" width="50px;" height="40ox;"></a></p>
            
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            <h2>Education</h2>
        </div>
        <div class="card-body">
            <p><strong>Degree:</strong><?=$userEducation['degree'] ?? '' ?></p>
            <p><strong>Institute:</strong><?=$userEducation['institute'] ?? ''?></p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            <h2>Employment</h2>
        </div>
        <div class="card-body">
            <p><strong>Designation:</strong><?=$userEmployment['designation'] ?? '' ?></p>
            <p><strong>Experience:</strong><?=$userEmployment['experience'] ?? '' ?></p>
        </div>
    </div>
</div>
