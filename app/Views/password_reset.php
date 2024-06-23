<?=$this->extend("layout")?>

<?=$this->section("content")?>

<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Reset Password</h5>
                    <form action="<?php echo base_url('/password_reset'); ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('email') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="token" class="form-label">Reset Token</label>
                            <input type="text" class="form-control" id="token" name="token" value="<?= set_value('token') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('token') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('new_password') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('confirm_new_password') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>