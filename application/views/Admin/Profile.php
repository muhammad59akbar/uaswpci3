<main class="mt-5 pt-4">
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <h2 class="mt-4 m-2">My Profile</h2>
            <div class="row mt-2 border mx-2 p-2">
                <div class="col-sm-4 text-center mt-2">
                    <img src="<?= base_url('assets/images/user/') . $userlogin['image'] ?>" alt="profile" class="img-thumbnail" width="250px">
                </div>
                <div class="col-sm-6 mt-2">
                    <div class="row">
                        <div class="col">
                            <label class="my-1">First Name</label>
                            <p class="p-2 border"><?= $userlogin['first_name'] ?></p>
                        </div>
                        <div class="col">
                            <label class="my-1">Last Name</label>
                            <p class="p-2 border"><?= $userlogin['last_name'] ?></p>
                        </div>
                    </div>
                    <div class="col">
                        <label class="my-1">Email</label>
                        <p class="p-2 border"><?= $userlogin['email'] ?></p>
                    </div>
                    <div class="col">
                        <label class="my-1">Role</label>
                        <?php if ($userlogin['role_id'] == 1) : ?>
                            <p class="p-2 border">Administrator</p>
                        <?php else : ?>
                            <p class="p-2 border">User</p>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
</main>