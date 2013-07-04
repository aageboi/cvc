    <div id="navigation">
        <div class="container-fluid">
            <a href="<?= site_url() ?>" id="brand"><i class="icon-book"></i> Buat CV</a>
            <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="" data-original-title="Toggle navigation"><i class="icon-reorder"></i></a>
            <div class="user">
                <?php if (session('userid')) { ?>
                    <?php $this->load->view('user/navbar') ?>
                <?php } else { ?>
                <ul class="icon-nav">
                    <li>
                        <a href="<?= site_url('auth') ?>"><i class="icon-lock"></i> Masuk</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
