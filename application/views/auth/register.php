<?php $this->load->view('header') ?>
<style>.wrapper {top:40% !important;}</style>
<body class="login">
    <div class="wrapper">
        <h1><a href="<?= site_url() ?>">buatCV.com</a></h1>
        <div class="login-body">

            <div class="loginemail">
                <h2><?= (session('socmed')) ? '<img src="'.base_url().'assets/img/icon_'.session('socmed').'.png"> ' : ' '?>DAFTAR</h2>
                <?= form_open('') ?>

                    <?php $this->load->view('err_msg') ?>

                    <div class="control-group <?= (form_error('email')) ? 'error' : ''?>">
                        <input type="text" placeholder="Tulis alamat email anda" name="email" class="input-block-level" value="<?= $email ?>" id="email">
                      <?= form_error('email') ? '<span for="email" class="help-block error">'.form_error('email').'</span>' : '' ?>
                    </div>

                    <div class="control-group <?= (form_error('username')) ? 'error' : ''?>">
                        <input type="text" placeholder="Tulis username" name="username" class="input-block-level" value="<?= set_value('username') ?>" id="username">
                      <?= form_error('username') ? '<span for="username" class="help-block error">'.form_error('username').'</span>' : '' ?>
                    </div>

                    <div class="control-group <?= (form_error('password')) ? 'error' : ''?>">
                        <input type="password" placeholder="Password" name="password" class="input-block-level" id="password">
                      <?= form_error('password') ? '<span for="password" class="help-block error">'.form_error('password').'</span>' : '' ?>
                    </div>

                    <div class="control-group <?= (form_error('confirm')) ? 'error' : ''?>">
                        <input type="password" placeholder="Ulangi Password" name="confirm" class="input-block-level" id="confirm">
                      <?= form_error('confirm') ? '<span for="confirm" class="help-block error">'.form_error('confirm').'</span>' : '' ?>
                    </div>

                    <div class="submit">
                        <input type="submit" class="btn btn-primary" value="Daftar">
                        <a href="<?= site_url() ?>"><i class="icon-angle-left"></i> batal</a>
                    </div>
                </form>
                <div class="forget">
                    <a href="<?= site_url('auth') ?>">Sudah bergabung di buatCV.com? Masuk</a>
                </div>
            </div>

            <div class="loginsocmed" style="display:none;">
                <h2>&nbsp;</h2>
                <?php $this->load->view('auth/socmed') ?>

                <div class="forget">
                    <a href="javascript:void(0);" class="login_email"><span>Sudah punya akun buatCV.com</span></a>
                    <a href="<?= site_url('auth/register') ?>"><span>Baru di buatCV.com? Daftar sekarang</span></a>
                </div>
            </div>

        </div>
    </div>

    <script>
    $(".login_email").click(function(){
        $(".loginsocmed").slideUp();
        $(".loginemail").fadeIn();
    });
    $(".login_socmed").click(function(){
        $(".loginemail").slideUp();
        $(".loginsocmed").fadeIn();
    });
    </script>

</body>

</html>
