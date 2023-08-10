<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <h2 class="mt-4 m-2">Edit Profile</h2>
                <?= $this->session->flashdata('message') ?>
                <?= form_open_multipart('Admin/Mimin/editprofile'); ?>
                <div class="mb-3 mt-4">
                    <label for="email" class="form-label mx-2">Email address</label>
                    <input type="email" class="form-control mx-2" id="email" aria-describedby="emailHelp" name="email" value="<?= $userlogin['email'] ?>" readonly autocomplete="on">
                    <div id="Last Name" class="form-text text-danger"><?= form_error('email') ?></div>
                </div>
                <div class="row mb-2 p-2">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="First Name" value="<?= $userlogin['first_name'] ?>" autocomplete="on">
                        <div id="Last Name" class="form-text text-danger"><?= form_error('first_name') ?></div>

                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="Last Name" value="<?= $userlogin['last_name'] ?>">
                        <div id="Last Name" class="form-text text-danger"><?= form_error('last_name') ?></div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 flex flex-column mb-2">
                        <img class="img-thumbnail" alt="..." src="<?= base_url('assets/images/user/') . $userlogin['image'] ?>" width="250" height="250" id="preview" accept="image/*">

                    </div>
                    <div class="col">
                        <input class="form-control" type="file" id="image" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">

                    </div>

                </div>
                <button type="submit" class="btn btn-primary mb-3">Save</button>
                </form>
                <hr>
                <form action="<?= base_url('Admin/Mimin/changepw') ?>" method="post">

                    <h2 class="mt-4">Change Password</h2>
                    <div class="mb-3">
                        <label for="currentpasword" class="form-label">Current Password</label>
                        <input type="password" name="old_password" class="form-control" id="currentpasword">
                        <div id="currentpasword" class="form-text text-danger"><?= form_error('old_password') ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="newpassword" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="newpassword">
                        <div id="newpassword" class="form-text text-danger"><?= form_error('new_password') ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="re_password" class="form-control" id="confirmpassword">
                        <div id="confirmpassword" class="form-text text-danger"><?= form_error('re_password') ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Save</button>
                </form>
            </div>


        </div>
    </div>

    </div>

    </div>
</main>