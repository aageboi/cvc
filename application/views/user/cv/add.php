<div class="span12">
    <div class="box box-bordered box-color">
        <div class="box-title">
            <h3>
                <i class="icon-magic"></i>
                <input type="text" name="title" id="title" class="input-xlarge ui-wizard-content" data-rule-required="true" placeholder="Beri nama untuk CV Anda ini">
            </h3>
        </div>
        <div class="box-content">
            <?php echo form_open('', array("class"=>"form-horizontal form-wizard ui-formwizard")) ?>
            <form action="" method="POST">
                <div class="step ui-formwizard-content" id="firstStep" style="display: block;">
                    <ul class="wizard-steps steps-4">
                        <li class="active">
                            <div class="single-step">
                                <span class="title">
                                    1</span>
                                <span class="circle">
                                    <span class="active"></span>
                                </span>
                                <span class="description">
                                    Biodata
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    2</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Pendidikan
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    3</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Keterampilan
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    4</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Pengalaman Kerja
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="step-forms">
                        <div class="control-group <?= (form_error('firstname'))?'error':''?>">
                            <label for="firstname" class="control-label">Nama Lengkap</label>
                            <div class="controls">
                                <input type="text" name="firstname" id="firstname" class="input-xlarge ui-wizard-content" data-rule-required="true">
                            <span for="firstname" class="help-block <?= (form_error('firstname'))?'error':''?>">
                                <?= (form_error('firstname'))?'error':''?></span></div>
                        </div>
                        <div class="control-group <?= (form_error('lastname'))?'error':''?>">
                            <label for="firstname" class="control-label">Tempat, Tanggal Lahir</label>
                            <div class="controls">
                                <input type="text" name="firstname" id="firstname" class="input-medium ui-wizard-content" data-rule-required="true">,
                                <input type="text" name="textfield" id="textfield" class="input-medium datepick">
                            <span for="firstname" class="help-block <?= (form_error('lastname'))?'error':''?>">
                                <?= (form_error('lastname'))?'error':''?></span></div>
                        </div>
                        <div class="control-group <?= (form_error('lastname'))?'error':''?>">
                            <label for="firstname" class="control-label">Jenis Kelamin</label>
                            <div class="controls">
                                <select name="select" id="select" class="input-small">
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Wanita</option>
                                </select>
                            <span for="firstname" class="help-block <?= (form_error('lastname'))?'error':''?>">
                                <?= (form_error('lastname'))?'error':''?></span></div>
                        </div>
                    </div>
                </div>
                <div class="step ui-formwizard-content" id="secondStep" style="display: none;">
                    <ul class="wizard-steps steps-4">
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    1</span>
                                <span class="circle">

                                </span>
                                <span class="description">
                                    Basic information
                                </span>
                            </div>
                        </li>
                        <li class="active">
                            <div class="single-step">
                                <span class="title">
                                    2</span>
                                <span class="circle">
                                    <span class="active"></span>
                                </span>
                                <span class="description">
                                    Advanced information
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    3</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Additional information
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    4</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Check again
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="control-group">
                        <label for="text" class="control-label">Gender</label>
                        <div class="controls">
                            <select name="gend" id="gend" data-rule-required="true" disabled="disabled" class="ui-wizard-content">
                                <option value="">-- Chose one --</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="text" class="control-label">Accept policy</label>
                        <div class="controls">
                            <label class="checkbox"><input type="checkbox" name="policy" value="agree" data-rule-required="true" disabled="disabled" class="ui-wizard-content"> I agree the policy.</label>
                        </div>
                    </div>
                </div>
                <div class="step ui-formwizard-content" id="thirdStep" style="display: none;">
                    <ul class="wizard-steps steps-4">
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    1</span>
                                <span class="circle">

                                </span>
                                <span class="description">
                                    Basic information
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    2</span>
                                <span class="circle">

                                </span>
                                <span class="description">
                                    Advanced information
                                </span>
                            </div>
                        </li>
                        <li class="active">
                            <div class="single-step">
                                <span class="title">
                                    3</span>
                                <span class="circle">
                                    <span class="active"></span>
                                </span>
                                <span class="description">
                                    Additional information
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    4</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Check again
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="control-group">
                        <label for="text" class="control-label">Additional information</label>
                        <div class="controls">
                            <textarea name="textare" id="tt333" class="span12 ui-wizard-content" rows="7" placeholder="You can provide additional information in here..." disabled="disabled"></textarea>
                        </div>
                    </div>
                </div>
                <div class="step ui-formwizard-content" id="fourthstep" style="display: none;">
                    <ul class="wizard-steps steps-4">
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    1</span>
                                <span class="circle">

                                </span>
                                <span class="description">
                                    Basic information
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    2</span>
                                <span class="circle">

                                </span>
                                <span class="description">
                                    Advanced information
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="single-step">
                                <span class="title">
                                    3</span>
                                <span class="circle">
                                </span>
                                <span class="description">
                                    Additional information
                                </span>
                            </div>
                        </li>
                        <li class="active">
                            <div class="single-step">
                                <span class="title">
                                    4</span>
                                <span class="circle">
                                    <span class="active"></span>
                                </span>
                                <span class="description">
                                    Check again
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="control-group">
                        <label for="text" class="control-label">Check again</label>
                        <div class="controls">
                            <label class="checkbox"><input type="checkbox" name="policy" value="agree" data-rule-required="true" disabled="disabled" class="ui-wizard-content"> Everything is ok. Submit</label>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="reset" class="btn ui-wizard-content ui-formwizard-button" value="Back" id="back" disabled="disabled">
                    <input type="submit" class="btn btn-primary ui-wizard-content ui-formwizard-button" value="Next" id="next">
                </div>
            </form>
        </div>
    </div>
</div>
