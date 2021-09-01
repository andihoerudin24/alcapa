<div class="container-fluid h-100 bg-dark" style="overflow: hidden;">

    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>

    <div class="row align-items-center">
        <div class="col-4 my-5 offset-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?php echo base_url(); ?>assets/logo.png" width="250">
                    </div>
                    <hr>
                    <div class="pb-3">
                        <?php echo form_open('login/member',array('class'=>'login-validation','novalidate'=>'novalidate')); ?>
                            <div class="form-group fontsize-small">
                                <label for="input-email">Email</label>
                                <input type="text" class="form-control user-login" id="input-email" name="user_email"  required>
                                <div class="invalid-feedback invalid-user-login">Email tidak valid</div>
                            </div>
                            <div class="form-group fontsize-small">
                                <label for="input-password">Password</label>
                                <input type="password" class="form-control validate" id="input-password" name="user_password" required>
                                <div class="invalid-feedback">Password tidak sesuai</div>
                            </div>
                            <input type="hidden" name="type">
                            <button class="btn btn-block btn-outline-danger fontsize-smaller font-weight-bold py-3">Masuk</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-white text-center position-absolute w-100" style="bottom: 20px;">
        <p class="fontsize-smaller">
            <strong>Alacapa</strong> - Copyright © 2021. All Rights Reserved
        </p>
    </div>

</div>