<main class="login">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 d-grid" style="place-items : center; height : 80vh">
        <div>
          <h1 style="text-align : center">Register</h1>
          <form id="flogin" action="<?= base_url() ?>register/proses" method="post" class="mt-4">
            <?php flashFrame(); ?>

            <div class="mb-3">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
              <label for="">Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
              <label for="">Confirm Password</label>
              <input type="password" name="password_konfirmasi" class="form-control">
            </div>
            <div class="mb-3 d-flex" style="flex-direction : column; align-items : center">
              <button type="submit" class="btn btn-primary rounded-5" style="width : 100%">
                Register
              </button>
              <a href="<?= base_url() ?>login">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>