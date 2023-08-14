<!-- offcanvas -->
<div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar" style="background-color:#0C395F;">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase p-3">
                        CORE
                    </div>
                </li>
                <li>
                    <a href="<?= base_url('Admin/Mimin') ?>" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span class="ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="my-2">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Interface
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#post">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span class="ms-2">Post</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="post">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-pencil-square"></i>
                                        <span class="ms-2">Write Post</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-sticky"></i>
                                        <span class="ms-2">View Post</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php if ($userlogin['role_id'] === '1') : ?>

                    <li>


                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#user">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span class="ms-2">User</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="<?= base_url('Admin/Mimin/AddUser') ?>" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i>
                                            <span class="ms-2">Add User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('Admin/Mimin/ListUser') ?>" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-sticky"></i>
                                            <span class="ms-2">List User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <li class="my-2">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Addons
                    </div>
                </li>
                <li>
                    <a href="<?= base_url('Admin/Mimin/myprofile') ?>" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-person-lines-fill"></i>
                            <span class="ms-2">Profile</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Admin/Mimin/logout') ?>" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-box-arrow-right"></i>
                            <span class="ms-2">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->