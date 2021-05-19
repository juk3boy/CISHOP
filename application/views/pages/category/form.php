 <main role="main" class="container">

     <?php $this->session->flashdata('flash') ?>

     <div class="row">

         <div class="col-md-10 mx-auto">

             <div class="card">
                 <div class="card-header">
                     <span>Formulir Kategori</span>



                 </div>
                 <div class="card-body">
                     <!-- <form action=""> -->
                     <?= form_open($form_action, ['method' => 'POST']) ?>

                     <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                     <div class="form-group mb-2">
                         <label for="title">Kategori</label>
                         <!-- <input type="text" class="form-control" id="title" onkeyup="createSlug()" required autofocus> -->
                         <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                         <!-- <small class="form-text text-danger">Kategori harus diisi</small> -->
                         <?= form_error('title') ?>
                     </div>
                     <div class="form-group mb-2">



                         <label for="slug" mb-2>Slug</label>
                         <!-- <input type="text" class="form-control" id="slug" required> -->
                         <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                         <!-- <small class="form-text text-danger"></small> -->
                         <?= form_error('slug') ?>
                     </div>


                     <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                     <?= form_close() ?>
                     <!-- </form> -->

                 </div>
             </div>


         </div>
     </div>



 </main>