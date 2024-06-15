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
           <div class="row">test
            
            <?php foreach ($goldcounts as $goldcount): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://cdn.wallpapersafari.com/30/83/zx5APm.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $goldcount['title'] ?></h5>
                            <p class="card-text">Current Gold Count: <?= $goldcount['gold_count'] ?></p>
                            <p class="card-text"><small class="text-muted">Created at: <?= $goldcount['created_at'] ?></small></p>
                            <p class="card-text"><small class="text-muted">Last updated: <?= $goldcount['updated_at'] ?></small></p>

                            <?php if (session()->has('gold_difference') && session()->getFlashdata('gold_id') == $goldcount['id']): ?>
                                <p class="card-text">
                                    Gold Difference: <?= session()->getFlashdata('gold_difference') ?>
                                </p>
                            <?php endif; ?>

                            <form action="<?= base_url('dashboard/update-gold-count/' . $goldcount['id']) ?>" method="post">
                                <div class="form-group">
                                    <label for="gold_count_<?= $goldcount['id'] ?>">Update Gold Count</label>
                                    <input type="number" class="form-control" id="gold_count_<?= $goldcount['id'] ?>" name="gold_count" value="<?= $goldcount['gold_count'] ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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