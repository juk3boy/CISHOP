<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">

  <div class="container fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">CI Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">

        <li class="nav-item active">
          <a class="nav-link" href=" <?= base_url('/') ?>" data-bs-placement="bottom" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Barang-Barang Favorite Anda" role="button">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" id="dropdown-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
          <div class="dropdown-menu" aria-labelledby="dropdown-1">
            <a href="<?= base_url('/category'); ?>" class="dropdown-item">Kategori</a>
            <a href="<?= base_url('/product'); ?>" class="dropdown-item">Produk</a>
            <a href="<?= base_url('/myorder') ?>" class="dropdown-item">Order</a>
            <a href="<?= base_url('/user'); ?>" class="dropdown-item">Pengguna</a>

            <!-- /masterTemplate/admin-users.html -->
          </div>
        </li>




      </ul>


      <div class="col-sm-10 d-flex justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">

            <a href="<?= base_url('cart'); ?>" class="nav-link"><i class="fas fa-shopping-cart"></i>Cart
              <span class="badge bg-primary">
                <?= getCart(); ?></a>
            </span>

          </li>


          <!-- Fungsi dibawah ini yaitu untuk menampilan nama admin & menghilangkan semua menu login/register -->
          <?php if (!$this->session->userdata('is_login')) : ?>

            <li class="nav-item">
              <a href="<?= base_url('/login'); ?>" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/register'); ?>" class="nav-link">Register</a>
            </li>

          <?php else : ?>

            <!-- <span class="avatar avatar-sm align-center mt-1">
              <img src="<?= $row->image ? base_url("/assets/images/user/$row->image") : base_url("assets/images/user/default.jpg") ?>" alt="" class="rounded-circle">
            </span> -->


            <li class="nav-item dropdown">


              <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?= $this->session->userdata('name') ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-2">

                <a href="<?= base_url('/profile') ?>" class="dropdown-item">Profile</a>
                <a href="<?= base_url('/myorder') ?>" class="dropdown-item">Order</a>
                <a href=" <?= base_url('/logout') ?>" class="dropdown-item">Logout</a>
              </div>
            </li>

          <?php endif  ?>
        </ul>

      </div>

    </div>

  </div> <!-- Akhir dari Row -->

  </div>
</nav>