<style>
.control-label {width:80px !important;}
.controls {margin-left:100px !important;}
</style>
<div class="row-fluid">

    <div class="pull-right">
        Layout : <strong>Default</strong>
    </div>

    <hr>

    <?= form_open('', array('class' => 'form-horizontal')) ?>

        <div class="control-group <?= form_error('cvname') ? "error" : "" ?>">
          <label class="control-label" for="cvname">Title</label>
            <div class="controls">
                <input id="cvname" type="text" name="cvname" value="<?php echo set_value('cvname'); ?>" placeholder="Enter title for this CV" class="span3">
                <?= form_error('cvname') ? '<span class="help-inline">'.form_error('cvname').'</span>' : '' ?>
            </div>
        </div>

        <h4>Personal Data</h4>
        <hr>


        <div class="control-group <?= form_error('name') ? "error" : "" ?>">
            <label class="control-label" for="name">Your Name</label>
            <div class="controls">
                <input id="name" type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Enter your name" class="span3">
                <?= form_error('name') ? '<span class="help-inline">'.form_error('name').'</span>' : '' ?>
            </div>
        </div>

        <div class="control-group <?= form_error('email') ? "error" : "" ?>">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input type="text" id="inputEmail" placeholder="Email" class="span4">
              <?= form_error('email') ? '<span class="help-inline">'.form_error('email').'</span>' : '' ?>
            </div>
        </div>

        <div class="control-group <?= form_error('birth') ? "error" : "" ?>">
            <label class="control-label" for="birth">Place of Birth</label>
            <div class="controls">
              <input type="text" id="birth" placeholder="Place of birth" class="span2">
              <?= form_error('birth') ? '<span class="help-inline">'.form_error('birth').'</span>' : '' ?>
            </div>
        </div>

        <div class="control-group <?= form_error('gender') ? "error" : "" ?>">
            <label class="control-label" for="gender">Gender</label>
            <div class="controls">
              <select name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
              </select>
              <?= form_error('gender') ? '<span class="help-inline">'.form_error('gender').'</span>' : '' ?>
            </div>
        </div>

        <div class="control-group <?= form_error('status') ? "error" : "" ?>">
            <label class="control-label" for="status">Marital Status</label>
            <div class="controls">
              <select name="status">
                  <option value="single">Single</option>
                  <option value="married">Married</option>
              </select>
              <?= form_error('status') ? '<span class="help-inline">'.form_error('status').'</span>' : '' ?>
            </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">save changes</button>
        </div>

    </form>

</div>
