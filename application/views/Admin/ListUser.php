<main class="mt-5 pt-4">
    <div class="container-fluid">

        <h2 class="mt-4 p-2">Data User</h2>
        <hr>
        <div class="m-3 table-responsive-lg">
            <?= $this->session->flashdata('message') ?>
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($listuser as $res) : ?>
                        <tr>
                            <td scope="row" class=" text-center align-middle"><?= $no++ ?></td>

                            <td class="align-middle text-center"><img src="<?= base_url('assets/images/user/') . $res['image']  ?>" alt="image" width="100" height="100"></td>

                            <td class="align-middle text-center"><?= $res['first_name'] ?></td>
                            <td class="align-middle text-center"><?= $res['last_name'] ?></td>
                            <td class="align-middle text-center"><?= $res['email'] ?></td>
                            <?php if ($res['role_id'] == 1) : ?>
                                <td class="align-middle text-center">Administrator</td>
                            <?php else : ?>
                                <td class="align-middle text-center">User</td>
                            <?php endif ?>
                            <td class="text-center align-middle "><a href="<?= base_url(); ?>Admin/deleteUser/<?= $res['id_user'] ?>" class="btn btn-danger" onclick="return confirm('anda yakin ingin menghapus data ini?')"><i class="bi bi-archive-fill"></i></a>
                                <a href="<?= base_url(); ?>Admin/UpdateUser/<?= $res['id_user'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>
        </div>

    </div>

</main>