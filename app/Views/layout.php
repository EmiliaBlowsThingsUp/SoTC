<!DOCTYPE html>
<html>
<head>
    <title>SoT Compendium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
   <body>

<<!-- This is the Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Sea of Thieves Compendium</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <?php if (session()->get('isLoggedIn')): ?>
                    <!-- Display Logout link only when user is logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/logout'); ?>">Logout</a>
                    </li>
                <?php else: ?>
                    <!-- Display Register and Login links only when user is not logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


<!-- This will render the from other views designated from other areas. -->


      <?= $this->renderSection("content"); ?>


<!-- End Render Section -->

   <body>
</html>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2024 Two People Productions</p>
    <ul class="nav col-md-4 justify-content-end">
        <?php if (session()->get('isLoggedIn')): ?>
            <!-- Display Logout link only when user is logged in -->
            <li class="nav-item"><a href="<?php echo base_url('/logout'); ?>" class="nav-link px-2 text-muted">Logout</a></li>
        <?php else: ?>
            <!-- Display Register and Login links only when user is not logged in -->
            <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="/register" class="nav-link px-2 text-muted">Register</a></li>
            <li class="nav-item"><a href="/login" class="nav-link px-2 text-muted">Login</a></li>
        <?php endif; ?>
    </ul>
</footer>

</div>