<main role="main" class="container">

    <?php $this->load->view('layouts/_alert') ?>

    <div class="row">

        <div class="col-md-10 mx-auto">

            <div class="card">
                <div class="card-header">
                    <span>Pengguna</span>
                    <a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-secondary">Tambah</a>

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
                                <th scope="col">Pengguna</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Role</th>
                                <th scope="col">Satus</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $no = 0;
                            foreach ($content as $row) : $no++; ?>
                                <tr>
                                    <td> <?= $no ?></td>
                                    <td>
                                        <p>
                                        <p>
                                            <img src="<?= $row->image ? base_url("/assets/images/user/$row->image") : base_url("assets/images/user/default.png") ?>" alt="" height="50">
                                            <!-- product_title dibwah diambil dari controller product aliases product karena ada yang sama dgn kategori -->
                                            <?= $row->name ?>
                                        </p>
                                        </p>
                                    </td>
                                    <td>
                                        <?= $row->email ?>
                                    </td>
                                    <td>
                                        <?= $row->email ?>
                                    </td>
                                    <td><?= $row->is_active ? 'Active' : 'Tidak Active'  ?></td>
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