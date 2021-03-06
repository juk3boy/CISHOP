
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">

<div class="container fluid">
  <a class="navbar-brand" href="#">CI Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav"> 
          
              <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" id="dropdown-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-1">
                  <a href="/masterTemplate/admin-category.html" class="dropdown-item">Kategori</a>
                  <a href="/masterTemplate/admin-product.html" class="dropdown-item">Produk</a>
                  <a href="/masterTemplate/admin-order.html" class="dropdown-item">Order</a>
                  <a href="/masterTemplate/admin-users.html" class="dropdown-item">Pengguna</a>

				  <!-- /masterTemplate/admin-users.html -->
                </div>
              </li>
          
          
          
          
          </ul>
        

          <div class="col-sm-10 d-flex justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a href="/masterTemplate/cart.html" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart</a>
              </li>
              <li class="nav-item">
                <a href="/masterTemplate/login.html" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href=" <?= base_url('/register') ?>" class="nav-link">Register</a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-2">
                  <a href="/masterTemplate/profile.html" class="dropdown-item">Profile</a>
                  <a href="/masterTemplate/orders.html" class="dropdown-item">Order</a>
                  <a href="#" class="dropdown-item">Logout</a>
                </div>
              </li>
            </ul>
          
          </div>
                          
      </div>
    
  </div>    <!-- Akhir dari Row -->

</div>
</nav>