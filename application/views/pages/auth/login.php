<main role="main" class="container">

    <?php $this->load->view('layouts/_alert') ?>

    <div class="row">

        <div class="col-md-6 mx-auto">

            <div class="card">
                <div class="card-header text-center fw-bold fs-4">
                    Formulir Login
                </div>
                <div class="card-body shadow-lg " id="gradient1">

                    <div class="text-center rounded">
                        <!-- <img src="http://placehold.co/100x100" alt="" class="rounded-circle image-fluid image-"> -->

                        <span class=""><i class="fas fa-users fa-5x"></i></span>
                    </div>

                    <!-- <form action=""> -->
                    <?= form_open('login', ['method' => 'POST']) ?>

                    <!-- Awal dibuat (Template) di HTML -->
                    <!-- <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" required autofocus>
                        <small class="form-text text-danger">E-mail harus diisi</small>
                    </div> -->
                    <!-- Akhir Awal dibuat (Template) di HTML -->

                    <div class="form-group mt-4">
                        <label for="email" class="fw-bold mb-2">E-Mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password" class="fw-bold mb-2">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Masukkan password minimal 8 karakter', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 fw-bold">Login</button>

                    <?= form_close() ?>
                    <!-- </form> -->
                </div>
            </div>


        </div>
    </div>



</main>