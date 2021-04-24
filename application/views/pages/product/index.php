 <main role="main" class="container">

     <?php $this->load->view('layouts/_alert') ?>

     <div class="row">

         <div class="col-md-10 mx-auto">

             <div class="card">
                 <div class="card-header">
                     <span>Produk</span>
                     <a href="<?= base_url('product/create') ?>" class="btn btn-sm btn-secondary">Tambah</a>

                     <div class="float-end">
                         <form action=" <?= base_url("product/search") ?>" method="POST">
                             <div class="input-group">
                                 <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari" value=" <?= $this->session->userdata('keyword') ?> ">
                                 <div class="input-group-append">
                                     <button class="btn btn-secondary btn-sm" type="submit">
                                         <i class="fas fa-search"></i>
                                     </button>
                                     <a href="<?= base_url("product/reset") ?>" class="btn btn-secondary btn-sm">
                                         <i class="fas fa-eraser"></i>
                                     </a>
                                 </div> <!-- Akhir dari input-group-append -->
                             </div>
                         </form>
                     </div> <!-- Akhir float-end -->
                 </div>
                 <div class="card-body">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Produk</th>
                                 <th scope="col" class="text-center">Kategori</th>
                                 <th scope="col" class="text-center">Harga</th>
                                 <th scope="col" class="text-center">Stok</th>
                                 <th scope="col" class="text-center"></th>
                             </tr>
                         </thead>

                         <tbody>
                             <!-- Perulangan untuk product -->
                             <?php $no = 0;
                                foreach ($content as $row) : $no++; ?>
                                 <tr>
                                     <td class="text-center"> <?= $no ?></td>
                                     <td>
                                         <p>
                                             <img src="<?= $row->image ? base_url("/assets/images/product/$row->image") : base_url("assets/images/product/default.jpg") ?>" alt="" height="50">
                                             <!-- product_title dibwah diambil dari controller product aliases product karena ada yang sama dgn kategori -->
                                             <?= $row->product_title ?>
                                         </p>
                                     </td>
                                     <td>
                                         <span class="badge bg-primary"> <i class="fas fa-tags"></i> <?= $row->category_title ?> </span>
                                     </td>
                                     <td class="text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                     <td class="text-center"> <?= $row->is_available ? 'Tersedia' : 'Kosong'  ?> </td>
                                     <td>
                                         <!-- <form action="#"> -->
                                         <?= form_open(base_url("product/delete/$row->id"), ['method' => 'POST']) ?>
                                         <?= form_hidden('id', $row->id) ?>
                                         <a href=" <?= base_url("/product/edit/$row->id") ?>" class="btn btn-sm text-center">
                                             <i class="fas fa-edit text-info"></i>
                                         </a>
                                         <button type="submit" class="btn btn-sm text-center" onclick="return confirm('Apakah yakin akan dihapus ?');">
                                             <i class="fas fa-trash text-danger"></i>
                                         </button>
                                         <!-- </form> -->
                                         <?= form_close()  ?>
                                     </td>
                                 </tr>

                             <?php endforeach ?>
                         </tbody>
                     </table>


                     <nav aria-label="Page navigation example">
                         <?= $pagination; ?>
                     </nav>
                 </div>
             </div>


         </div>
     </div>



 </main>