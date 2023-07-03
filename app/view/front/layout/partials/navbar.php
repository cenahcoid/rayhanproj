<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>">Homepage</a>
        </li>
        <?php if (isset($sess->user->id)) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>login/logout">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>barang/index">Barang</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>register">Register</a>
          </li>
        <?php } ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>