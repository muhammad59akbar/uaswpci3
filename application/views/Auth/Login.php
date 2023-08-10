<div class="container bg-white" style="width: 500px; height:500px; border-radius: 10px">

    <form class="d-flex flex-column justify-content-center p-5" style="height: 100%;" method="post" action="<?= base_url('Auth') ?>">
        <h2 class="text-center p-2">LOGIN</h2>
        <?= $this->session->flashdata('message'); ?>

        <div class="mb-3 p-2">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= set_value('email'); ?>">
            <div id="emailHelp" class="form-text text-danger"><?= form_error('email') ?></div>
        </div>
        <div class="mb-3 p-2">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off" aria-describedby="passwordHelp">
            <div id="passwordHelp" class="form-text text-danger"><?= form_error('password') ?></div>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Login</button>
        <div class="text-center mt-2">
            <a class="small" href="<?= base_url('Auth/register') ?>">Dont have an account yet? Register Here</a>
        </div>
    </form>
</div>