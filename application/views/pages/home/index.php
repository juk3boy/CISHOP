            <main role="main" class="container">

              <?php $this->load->view('layouts/_alert') ?>

              <div class="row">

                <!-- Kolom besar -->
                <div class="col-md-9">

                  <!-- Awal kotak kategori dan urutkan -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card mb-3">
                        <div class="card-body">
                          Kategori : <strong> <?= isset($category) ? $category : 'Semua Kategory'  ?> </strong>
                          <span class="float-end">
                            Urutkan Harga : <small> <a href=" <?= base_url("/shop/sortby/asc") ?>" class="badge bg-primary text-decoration-none">Termurah</a> | <a href="<?= base_url("/shop/sortby/desc") ?>" class="badge bg-primary text-decoration-none">Termahal</a> </small>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Akhir kotak kategori dan urutkan -->

                  <!-- Awal Gambar atas -->
                  <div class="row">

                    <?php foreach ($content as $row) : ?>

                      <!-- Card Product I -->
                      <div class="col-md-6">
                        <div class="card mb-3 border">
                          <img src=" <?= $row->image ? base_url("/assets/images/product/$row->image") : base_url("/asstes/images/product/default.jpg") ?>" alt="" class="img-top" height="190">
                          <div class="card-body">
                            <h4 class="card-title"> <?= $row->product_title ?></h4>
                            <p class="card-text"><strong> Rp. <?= number_format($row->price, 0, ',', '.') ?>,- </strong></p>
                            <p class="card-text"> <?= $row->description ?></p>
                            <a href="<?= base_url("/shop/category/$row->category_slug") ?>" class="badge bg-primary text-decoration-none"> <i class="fas fa-tags"></i> <?= $row->category_title ?></a>
                          </div>

                          <div class="card-footer">
                            <form action="  <?= base_url("/cart/add") ?>" method="POST">
                              <input type="hidden" name="id_product" value=" <?= $row->id ?>">
                              <div class="input-group">
                                <input type="number" name="qty" value="1" class="form-control">
                                <div class="input-group-append">
                                  <button class="btn btn-primary">Add To Cart</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div> <!-- Penutup card -->

                      </div>

                    <?php endforeach ?>

                    <!-- Akhir Card Product I -->


                  </div>
                  <!-- Akhir Gambar atas -->


                  <nav aria-label="Page navigation example">
                    <?= $pagination ?>
                  </nav>

                </div> <!-- Akhir dari col-md-9 -->

                <!-- Kolom kecil -->
                <div class="col-md-3">

                  <div class="row">
                    <!-- Awal dari row pencarian -->
                    <div class="col-md-12">
                      <div class="card mb-3">
                        <div class="card-header">
                          Pencarians
                        </div>
                        <div class="card-body">
                          <form action=" <?= base_url("/shop/search") ?>" method="POST">
                            <div class="input-group">
                              <input type="text" name="keyword" placeholder="Cari" value=" <?= $this->session->userdata('keyword') ?>" class="form-control">
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                    </div>

                  </div> <!-- Awal dari row pencarian -->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="card mb-3">
                        <div class="card-header">
                          Kategori
                        </div>

                        <ul class="list-group list-group-flush">
                          <li class="list-group-item "> <a href=" <?= base_url('/') ?>" class="text-decoration-none">Semua Kategori</a></li>
                          <?php foreach (getCategories() as $category) : ?>

                            <!-- angker dibawah ini (<a> </a>) kita beri base_url yang menuju ke controller -->
                            <li class="list-group-item"><a href=" <?= base_url("/shop/category/$category->slug") ?> " class=" text-decoration-none"> <?= $category->title ?></a></li>

                          <?php endforeach ?>

                        </ul>


                      </div>
                    </div>
                  </div>
                </div>
                <!-- Akhir dari kolom kecil -->


              </div>








              </div>



            </main>