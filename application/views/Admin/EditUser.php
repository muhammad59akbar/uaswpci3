<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <h2 class="mt-4 m-2">Edit User</h2>
                <?php if ($userlogin['role_id'] === '1') : ?>
                    <?= $this->session->flashdata('message') ?>
                    <?= form_open_multipart('Admin/Mimin/editUser/' . $byID['id_user']); ?>
                    <input type="hidden" name="id_user" value="<?= $byID['id_user'] ?>">
                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label mx-2">Email address</label>
                        <input type="email" class="form-control mx-2" id="email" aria-describedby="emailHelp" name="email" value="<?= $byID['email'] ?>" autocomplete="on">
                        <div id="Email" class=" mx-2 form-text text-danger"><?= form_error('email') ?></div>
                    </div>
                    <div class="row mb-2 p-2">
                        <div class="col">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="First Name" value="<?= $byID['first_name'] ?>" autocomplete="on">
                            <div id="Last Name" class="form-text text-danger"><?= form_error('first_name') ?></div>

                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="Last Name" value="<?= $byID['last_name'] ?>">
                            <div id="Last Name" class="form-text text-danger"><?= form_error('last_name') ?></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" alt="..." src="<?= base_url('assets/images/user/') . $byID['image'] ?>" width="250" height="250" id="preview">

                        </div>
                        <div class="col">
                            <input class="form-control" type="file" id="image" name="image">
                        </div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role_id">
                            <?php foreach ($role_selected as $role => $label) : ?>
                                <?php if ($role == $byID['role_id']) : ?>
                                    <option value="<?= $role ?>" selected><?= $label ?></option>
                                <?php else : ?>
                                    <option value="<?= $role ?>"><?= $label ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>


                        </select>
                        <div id="role" class="form-text text-danger"><?= form_error('role_id') ?></div>
                    </div>

                    <div class="mb-3 mt-4">
                        <label for="password" class="form-label ">Password</label>
                        <input type="password" class="form-control " id="password" aria-describedby="emailHelp" name="password" autocomplete="off">
                        <div id="Password" class=" mx-2 form-text text-danger"><?= form_error('password') ?></div>
                    </div>


                    <button type="submit" class="btn btn-primary mb-3">Save</button>
                    </form>
                <?php else : ?>
                    <?php redirect('Admin/Blocked') ?>
                <?php endif; ?>

            </div>


        </div>
    </div>

    </div>

    </div>
</main>