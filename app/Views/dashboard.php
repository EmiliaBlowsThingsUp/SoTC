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
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Emissary Levels</h5>
                <form action="/dashboard/update-emissaries" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <?php 
                        // Define factions and their respective data
                        $factions = [
                            'Gold Hoarders' => $gold_hoarders,
                            'Order of Souls' => $order_of_souls,
                            'Merchant Alliance' => $merchant_alliance,
                            'Reapers Bones' => $reapers_bones,
                            'Hunters Call' => $hunters_call,
                            'Athenas Fortune' => $athenas_fortune,
                            'Guardians of Fortune' => $guardians_of_fortune,
                            'Servants of the Flame' => $servants_of_the_flame,
                        ];

                        foreach ($factions as $title => $faction_data): 
                            // Define dynamic keys based on faction names
                            $key = strtolower(str_replace(' ', '_', $title));
                        ?>
                            <div class="col-md-4">
                                <h6><?= $title ?></h6>
                                <?php foreach ($faction_data as $faction): ?>
                                    <p class="card-text">Current <?= $title ?> Level: <?= $faction[$key] ?></p>
                                    <p class="card-text"><small class="text-muted">Last updated: <?= $faction['updated_at'] ?></small></p>

                                    <?php if (session()->has($key . '_difference') && session()->getFlashdata($key . '_id') == $faction['id']): ?>
                                        <p class="card-text">
                                            Levels Gained: <?= session()->getFlashdata($key . '_difference') ?>
                                        </p>
                                    <?php endif; ?>

                                    <label for="<?= $key ?>_<?= $faction['id'] ?>">Level:</label>
                                    <input type="number" name="<?= $key ?>[<?= $faction['id'] ?>]" id="<?= $key ?>_<?= $faction['id'] ?>" value="<?= $faction[$key] ?>" required>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Update All</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>
        </div>
    </div>
     
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?=$this->endSection()?>