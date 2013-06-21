<div class="dropdown">
    <a href="#" class='dropdown-toggle' data-toggle="dropdown"><?= session('username') ?> &nbsp;<i class="icon-user"></i></a>
    <ul class="dropdown-menu pull-right">
        <li>
            <a href="<?= site_url('user') ?>">Edit profile</a>
        </li>
        <li>
            <a href="<?= site_url('user/logout') ?>">Sign out</a>
        </li>
    </ul>
</div>
