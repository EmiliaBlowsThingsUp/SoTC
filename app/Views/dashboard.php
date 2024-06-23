<?=$this->extend("layout")?>
  
<?=$this->section("content")?>
  
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h2 class="text-center mt-5">User Dashboard</h2>
            

        <div class="col-12">
           <div class="row">
            <!-- This card is for the Gold Count Tracking -->
            <?php foreach ($goldcounts as $goldcount): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Gold Tracker</h5>
                            <p class="card-text">Current Gold Count: <?= $goldcount['gold_count'] ?></p>
                            <p class="card-text"><small class="text-muted">Last updated: <?= $goldcount['updated_at'] ?></small></p>

                            <?php if (session()->has('gold_difference') && session()->getFlashdata('gold_id') == $goldcount['id']): ?>
                                <p class="card-text">
                                    Gold Difference: <?= session()->getFlashdata('gold_difference') ?>
                                </p>
                            <?php endif; ?>

                            <form action="/dashboard/update-gold-count/<?= $goldcount['id'] ?>" method="post">
    <?= csrf_field() ?>
    <label for="gold_count">Gold Count:</label>
    <input type="number" name="gold_count" id="gold_count" value="<?= $goldcount['gold_count'] ?>" required>
    <button type="submit">Update</button>
</form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- This card is for the Gold Hoarders Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- This card is for the Order of Souls Level -->
<?php foreach ($order_of_souls as $order_of_soul): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Order of Souls</h5>
                <p class="card-text">Current Order of Souls Level: <?= $order_of_soul['order_of_souls'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $order_of_soul['updated_at'] ?></small></p>

                <?php if (session()->has('souls_difference') && session()->getFlashdata('souls_id') == $order_of_soul['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('souls_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-order-of-souls/<?= $order_of_soul['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="order_of_souls">Order of Souls Level:</label>
                    <input type="number" name="order_of_souls" id="order_of_souls" value="<?= $order_of_soul['order_of_souls'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>

<div class="row">
<!-- This card is for the Merchant Alliance Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- This card is for the Reapers Bones Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- This card is for the Hunter's Call Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<div class="row">
<!-- This card is for the Athena's Fortune Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- This card is for the Guardians of Fortune Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- This card is for the Servants of the Flame Level -->
<?php foreach ($gold_hoarders as $gold_hoarder): ?>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Gold Hoarders</h5>
                <p class="card-text">Current Gold Hoarders Level: <?= $gold_hoarder['gold_hoarders'] ?></p>
                <p class="card-text"><small class="text-muted">Last updated: <?= $gold_hoarder['updated_at'] ?></small></p>

                <?php if (session()->has('hoarders_difference') && session()->getFlashdata('hoarders_id') == $gold_hoarder['id']): ?>
                    <p class="card-text">
                        Levels Gained: <?= session()->getFlashdata('hoarders_difference') ?>
                    </p>
                <?php endif; ?>

                <form action="/dashboard/update-gold-hoarders/<?= $gold_hoarder['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="gold_hoarders">Gold Hoarders Level:</label>
                    <input type="number" name="gold_hoarders" id="gold_hoarders" value="<?= $gold_hoarder['gold_hoarders'] ?>" required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
        </div>
    </div>
        </div>
    </div>
     
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?=$this->endSection()?>