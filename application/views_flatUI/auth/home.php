<div class="container">
    <div class="form-other-login span3">
        <?php $this->load->view('auth/socmed') ?>
    </div>
    <div class="form-or span1">
        or
    </div>
    <div class="login-form span4" style="width:310px;">
        <?= form_open('') ?>

        <?php $this->load->view('err_msg') ?>

        <div class="control-group <?= form_error('username') ? 'error' : ''?>">
          <input type="text" class="login-field" name="username" value="<?php echo set_value('username'); ?>" placeholder="Enter your username" id="login-name">
          <label class="login-field-icon fui-user" for="login-name"></label><br>
          <?php echo form_error('username'); ?>
        </div>

        <div class="control-group <?= form_error('password') ? 'error' : ''?>">
          <input type="password" class="login-field" name="password" placeholder="Password" id="login-pass">
          <label class="login-field-icon fui-lock" for="login-pass"></label><br>
          <?php echo form_error('password'); ?>
        </div>

        <button class="btn btn-primary btn-large btn-block" type='submit'>Login</button>
        <a class="login-link" href="<?= site_url('auth/forget') ?>">Lost your password?</a>
        <a class="login-link" href="<?= site_url('auth/register') ?>">New to BuatCV? Sign up</a>

        </form>
    </div>

    <div class="clearfix"></div>

</div>
