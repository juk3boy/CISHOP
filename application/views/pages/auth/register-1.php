<main role="main" class="container">

  <?php $this->load->view('layouts/_alert') ?>

  <div class="row">

    <div class="col-md-8 mx-auto">

      <div class="card rounded shadow-lg">
        <div class="card-header">
          Formulir Registrasi
        </div>

        <div class="card-body">

          <!-- <form action="">  form action diganti dengan form action dr CI -->
          <?= form_open('register', ['method' => 'POST']) ?>

          <div class="form-group">
            <label for="name" class="mb-1">Nama</label>

            <!-- <input type="text" class="form-control" required autofocus> -->
            <!-- ini diganti dng form input dari CI -->
            <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'id' => 'name', 'placeholder' => 'Masukkan Nama Anda']); ?>

            <!-- <small class="form-text text-danger">Nama harus diisi</small> -->
            <?= form_error('name') ?>

          </div>

          <div class="form-group">
            <label for="email" class="mb-1 mt-3">Email</label>
            <!-- <input type="email" class="form-control" required> -->

            <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'value' => $input->email, 'class' => 'form-control', 'required' => true,  'placeholder' => 'Silahkan masukkan alamat email aktif anda disini']); ?>

            <?= form_error('email') ?>
          </div>

          <div class="form-group">
            <label for="password" class="mb-1 mt-3">Password</label>

            <!-- <input type="password" class="form-control" required> -->
            <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Silakan masukkan password min. 8 karakter . . . .', 'required' => true, 'id' => 'password']) ?>

            <!-- <small class="form-text text-danger">Password harus diisi</small> -->
            <?= form_error('password') ?>
          </div>

          <div class="form-group">
            <label for="password_confirmation" class="mb-1 mt-3">Konfirmasi Password</label>

            <!-- <input type="password" class="form-control" required> -->
            <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Silakan masukkan password yg sama . . . .', 'required' => true, 'id' => 'password_confirmation']) ?>

            <!-- <small class="form-text text-danger">Password harus sama</small> -->
            <?= form_error('password_confirmation') ?>
          </div>

          <button type="submit" class="btn btn-primary mt-4">Register</button>

          <!-- </form> -->
          <?= form_close() ?>

        </div>
      </div>


    </div>
  </div>



</main>