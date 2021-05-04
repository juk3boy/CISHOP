<main role="main" class="container">

    <div class="row">

        <div class="col-md-10 mx-auto">

            <div class="card">
                <div class="card-header">
                    <span>Formulir Produk</span>



                </div>
                <div class="card-body">


                    <!-- <form action=""> -->

                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group mb-2">
                        <label for="title" class="mb-1">Produk</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>

                    <div class="form-group mb-2">
                        <label for="deskripsi2" class="mb-1">Deskripsi</label>
                        <?= form_textarea(['name' => 'description', 'id' => 'deskripsi2', 'value' => $input->description, 'row' => 4, 'class' => 'form-control']) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="mb-1">Harga</label>
                        <?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('price') ?>
                    </div>

                    <div class="form-group mb-2">
                        <label for="" class="mb-1">Kategori</label>
                        <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control']) ?>
                        <?= form_error('id_category') ?>
                    </div>

                    <div class="form-group mb-2">
                        <label for="" class="mb-1">Status Stok :</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <!-- <input type="radio" name="status" class="form-check-input" value="1"> -->
                            <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="" class="form-check-label">Tersedia</label>
                        </div> <!-- Akhir dari form-check form-check-inline -->
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 0 ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="" class="form-check-label">Kosong</label>
                        </div> <!-- Akhir dari form-check form-check-inline -->
                    </div>

                    <div class="form-group mb-2">
                        <label for="" class="mb-1">Gambar Produk</label>
                        <br>
                        <!-- <input type="file" name="image" id=""> -->
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger">
                                <?= $this->session->flashdata('image_error') ?>
                            </small>
                        <?php endif ?>

                        <?php if ($input->image) : ?>
                            <img src=" <?= base_url("/assets/images/product/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>

                    <div class="form-group mb-2">
                        <label for="" class="mb-1">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                        <!-- <small class="form-text text-danger"></small> -->
                        <?= form_error('slug') ?>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>

                    <!-- </form> -->

                    <?= form_close() ?>

                </div>
            </div>


        </div>
    </div>



</main>