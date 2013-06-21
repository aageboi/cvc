<div class="navbar navbar-inverse">
    <div class="navbar-inner">
      <div class="container">
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li>
              <a href="<?= site_url('user') ?>">
                <i class="icon-home"></i>
              </a>
            </li>
          </ul>
        </div><!--/.nav -->

        <div class="pull-right">
          <ul class="nav">
            <li>
              <a href="#"><i class="fui-user"></i> <?= session('username') ?></a>
              <ul style="width: 150px;">
                <li><a href="<?= site_url('user/setting') ?>"><i class="fui-gear"></i> Setting</a></li>
                <li><a href="<?= site_url('user/logout') ?>"><i class="fui-lock"></i> Sign out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav -->

      </div>
    </div>
</div>
