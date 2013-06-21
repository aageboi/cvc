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

        <div class="control-group <?= (form_error('email')) ? 'error' : ''?>">
            <input type="text" placeholder="Enter your email" name="email" class="login-field" value="<?= $email ?>" id="email">
            <label class="login-field-icon fui-mail" for="email"></label><br>
            <?php echo form_error('email'); ?>
        </div>

        <div class="control-group <?= (form_error('username')) ? 'error' : ''?>">
            <input type="text" placeholder="Enter you username" name="usename" class="login-field" value="<?= set_value('username') ?>" id="username">
            <label class="login-field-icon fui-user" for="usename"></label><br>
            <?php echo form_error('username'); ?>
        </div>

        <div class="control-group <?= (form_error('password')) ? 'error' : ''?>">
            <input type="password" placeholder="Password" name="password" class="login-field" id="password">
            <label class="login-field-icon fui-lock" for="password"></label><br>
            <?php echo form_error('password'); ?>
        </div>

        <div class="control-group <?= (form_error('confirm')) ? 'error' : ''?>">
            <input type="password" placeholder="Confirm Password" name="confirm" class="login-field" id="confirm">
            <label class="login-field-icon fui-lock" for="confirm"></label><br>
            <?php echo form_error('confirm'); ?>
        </div>

        <button class="btn btn-primary btn-large btn-block" type='submit'>Register</button>
        <a class="login-link" href="<?= site_url('auth') ?>">Have an account? Sign in</a>

        </form>
    </div>

    <div class="clearfix"></div>

</div>
