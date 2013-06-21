<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= (isset($title)) ? $title : 'Home sweet home' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/flat-ui.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto 20px;
        max-width: 830px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      .form-signin {
        color: #fff;
        padding: 19px 29px 29px;
        max-width: 250px;
        background-color: #34495e;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      .form-or {margin-top:155px;text-align:center;}
      .form-other-login {
        max-width: 200px;
        margin: 100px auto;
      }
      .none {text-decoration:none;}

    </style>
    <link href="<?= base_url().'assets/css/bootstrap-responsive.css' ?>" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?= base_url().'assets/js/html5shiv.js' ?>"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

    <link rel="shortcut icon" href="<?= base_url().'assets/ico/favicon.png' ?>">
  </head>

  <body>

    <div class="container-narrow">

    <?php
        if (session('userid')) {
            $this->load->view('user/navbar');
        } else {
            $this->load->view('navbar');
        }
    ?>

      <?php $this->load->view($yield) ?>

      <hr>

      <div class="footer">
        <p>&copy; <?=date('Y')?> BuatCV.com</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url().'assets/js/jquery.js' ?>"></script>
  </body>
</html>
