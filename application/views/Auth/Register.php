<div class="container bg-white" style="width: 500px;">

    <form class="d-flex flex-column justify-content-center p-4" method="post" action="<?= base_url('Auth/register'); ?>">
        <h2 class="text-center p-2 mb-2">REGISTER</h2>
        <div class="row mb-1 p-1">
            <div class="col">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="First Name" value="<?= set_value('first_name'); ?>">
                <?= form_error('first_name', '<div id="First Name" class="form-text text-danger">', '</div>'); ?>
            </div>
            <div class="col">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="Last Name" value="<?= set_value('last_name'); ?>">
                <div id="Last Name" class="form-text text-danger"><?= form_error('last_name') ?></div>
            </div>
        </div>
        <div class="mb-2 p-1">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="<?= set_value('email'); ?>">
            <div id="email" class="form-text text-danger"><?= form_error('email') ?></div>
        </div>
        <div class="mb-2 p-1">
            <label for="password1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password1" name="password1" aria-describedby="password1" autocomplete>
            <div id="password1" class="form-text text-danger"><?= form_error('password1') ?></div>
        </div>
        <div class="mb-2 p-1">
            <label for="password2" class="form-label">Conffirm Password</label>
            <input type="password" class="form-control" id="password2" name="password2" aria-describedby="password2" autocomplete>
            <div id="password2" class="form-text text-danger"><?= form_error('password2') ?></div>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Register</button>
        <div class="text-center mt-2">
            <a class="small" href="<?= base_url('Auth'); ?>">Already have an account? Login Here</a>
        </div>
    </form>
</div>