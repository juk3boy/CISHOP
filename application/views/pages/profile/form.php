            <main role="main" class="container">

                <div class="row">

                    <div class="col-md-3">

                        <?php
                        $this->load->view('layouts/_menu');
                        ?>


                    </div> <!-- Akhir dari col-md-3 -->

                    <div class="col-md-9">

                        <div class="card">
                            <div class="card-header">
                                Formulir Profile
                            </div>
                            <div class="card-body">


                                <!-- <form action=""> -->

                                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                                <!-- form hidden digunakan pada saat melakukan edit
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?> -->
                                <div class="form-group mb-2">
                                    <label for="nama" class="mb-2">Nama</label>
                                    <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'id' => 'nama']) ?>
                                    <?= form_error('name') ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email1" class="mb-2">E-Mail</label>
                                    <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email1', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                                    <?= form_error('email') ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Password</label>
                                    <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                                    <?= form_error('password') ?>
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
                                        <img src=" <?= base_url("/assets/images/user/$input->image") ?>" alt="" height="50">
                                    <?php endif ?>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>

                                <!-- </form> -->

                                <?= form_close() ?>

                            </div>
                        </div> <!-- Akhir dari card col-md-9 -->

                    </div> <!-- Akhir dari col-md-9 -->

                </div> <!-- Akhir dari row -->



            </main>