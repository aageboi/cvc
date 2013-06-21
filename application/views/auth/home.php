<?php $this->load->view('header') ?>
<style>
    .wrapper {top:40% !important;}
    .loginsocmed {top:14%;margin:-200px -200px;position:absolute;background:#fff;width:400px;}
</style>
<body class="login">
    <div class="wrapper">
        <h1><a href="<?= site_url() ?>">buatCV.com</a></h1>
        <div class="login-body">

            <div class="loginemail" style="display:<?=($this->input->get('email'))?'block':'none'?>;">
                <h2>MASUK</h2>

                <?= form_open('auth?email=1') ?>

                    <?php $this->load->view('err_msg') ?>

                    <div class="control-group <?= form_error('username') ? 'error' : ''?>">
                      <input type="text" class="input-block-level" name="username" value="<?php echo set_value('username'); ?>" placeholder="Isikan username anda" id="login-name">
                      <?= form_error('username') ? '<span for="username" class="help-block error">'.form_error('username').'</span>' : '' ?>
                    </div>

                    <div class="control-group <?= form_error('password') ? 'error' : ''?>">
                      <input type="password" class="input-block-level" name="password" placeholder="Password" id="login-pass">
                      <?= form_error('password') ? '<span for="password" class="help-block error">'.form_error('password').'</span>' : '' ?>
                    </div>

                    <div class="submit">
                        <input type="submit" class="btn btn-primary" value="Masuk">
                        <a href="<?= site_url() ?>"><i class="icon-angle-left"></i> batal</a>
                    </div>
                </form>

                <div class="forget">
                    <a href="javascript:void(0);" class="login_socmed"><span>Masuk dengan akun Anda yang lain?</span></a>
                    <a href="<?= site_url('auth/register') ?>"><span>Baru di buatCV.com? Daftar sekarang</span></a>
                </div>
            </div>

            <div class="loginsocmed" style="display:<?=($this->input->get('email'))?'none':'block'?>;">
                <h2>CONNECT</h2>
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
        $(".loginsocmed").fadeOut('fast');
        $(".loginemail").fadeIn('slow');
    });
    $(".login_socmed").click(function(){
        $(".loginemail").fadeOut('fast');
        $(".loginsocmed").fadeIn('slow');
    });
    </script>

</body>

</html>
