 <main role="main" class="container">

     <?php $this->load->view('layouts/_alert') ?>

     <div class="row">

         <div class="col-md-10 mx-auto">

             <div class="card">
                 <div class="card-header">
                     <span>Kategori</span>
                     <a href="/admin-category-form.html" class="btn btn-sm btn-secondary">Tambah</a>

                     <div class="float-end">
                         <form action="#">
                             <div class="input-group">
                                 <input type="text" class="form-control form-control-sm text-center">
                                 <div class="input-group-append">
                                     <button class="btn btn-secondary btn-sm" type="submit">
                                         <i class="fas fa-search"></i>
                                     </button>
                                     <a href="#" class="btn btn-secondary btn-sm">
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
                                 <th scope="col">Title</th>
                                 <th scope="col">Slug</th>
                                 <th scope="col"></th>
                             </tr>
                         </thead>

                         <tbody>

                             <?php $no = 0;
                                foreach ($content as $row) : $no++; ?>
                                 <!-- PRODUK I -->
                                 <tr>
                                     <td> <?= $no ?> </td>
                                     <td> <?= $row->title ?> </td>
                                     <td> <?= $row->slug ?> </td>
                                     <td>
                                         <form action="#">
                                             <a href="#">
                                                 <button class="btn btn-sm">
                                                     <i class="fas fa-edit text-info"></i>
                                                 </button>
                                             </a>
                                             <button class="btn btn-sm" type="submit" onclick="return confirm('Are You Sure ?');">
                                                 <i class="fas fa-trash text-danger"></i>
                                             </button>
                                         </form>
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                     <nav aria-label="Page navigation example">
                         <?= $pagination ?>
                     </nav>
                 </div>
             </div>


         </div>
     </div>



 </main>