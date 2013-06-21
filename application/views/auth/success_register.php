<?php $this->load->view('header') ?>
<style>.wrapper {top:40% !important;}</style>
<body class="login">
    <div class="wrapper">
        <h1><a href="<?= site_url() ?>">buatCV.com</a></h1>
        <div class="login-body">
            <h2>Pendaftaran berhasil.</h2>
            <h2>
                Terima kasih. Silakan cek inbox email Anda untuk mengaktifkan akun buatCV.com.
                <br><br><a href="<?= site_url() ?>"><i class="icon-home"></i> </a>
                <span class="pull-right"><a href="<?= site_url('auth?email=1') ?>"><i class="icon-lock"></i> masuk</a></span>
            </h2>
        </div>
    </div>

</body>

</html>
