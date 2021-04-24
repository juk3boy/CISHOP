<main role="main" class="container">

    <div class="row">

        <div class="col-md-10 mx-auto">

            <div class="card">
                <div class="card-header">
                    <span>Formulir Pengguna</span>



                </div>
                <div class="card-body">


                    <!-- <form action=""> -->

                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <!-- form hidden digunakan pada saat melakukan edit
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?> -->
                    <div class="form-group">
                        <label for="">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="">E-Mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                        <?= form_error('password') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Role :</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <!-- <input type="radio" name="status" class="form-check-input" value="1"> -->
                            <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="" class="form-check-label">Admin</label>
                        </div> <!-- Akhir dari form-check form-check-inline -->
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="" class="form-check-label">Member</label>
                        </div> <!-- Akhir dari form-check form-check-inline -->
                    </div>

                    <div class="form-group">
                        <label for="">Status :</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <!-- <input type="radio" name="status" class="form-check-input" value="1"> -->
                            <?= form_radio(['name' => 'is_active', 'value' => '1', 'checked' => $input->is_active == 'admin' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="" class="form-check-label">Aktif</label>
                        </div> <!-- Akhir dari form-check form-check-inline -->
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => '0', 'checked' => $input->is_active == 'member' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="" class="form-check-label">Tidak Aktif</label>
                        </div> <!-- Akhir dari form-check form-check-inline -->
                    </div>

                    <div class="form-group">
                        <label for="">Foto</label>
                        <br>
                        <!-- <input type="file" name="image" id=""> -->
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger">
                                <?= $this->session->flashdata('image_error') ?>
                            </small>
                        <?php endif ?>

                        <?php if (isset($input->image)) : ?>
                            <img src=" <?= base_url("/assets/images/user/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>

                    <!-- </form> -->

                    <?= form_close() ?>

                </div>
            </div>


        </div>
    </div>



</main>