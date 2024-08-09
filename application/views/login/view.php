<div class="innerPage">
    <div class="wrapper">
        <div class="col-sm-12">
            <div class="loginBox">
                <?php echo form_open($path); ?>
                <div class="loginWraper">
                    <div class="col-sm-12">
                        <?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
                        <h1><?= $header ?></h1>
                        <div class="form-group">
                            <label class="inputWraper"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID" autocomplete="off" required>
                                <?= $flag == '0' ? '<p class="log-uid">(Put Your Member ID)</p>' : ''; ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" require>
                                <?= $flag == '0' ? '<p class="log-pass">(Put 1st 4 character of your 1st name and month and year for your DOB in capital Ex:ABCD051980)</p>' : ''; ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="captureMain">
                                <div class="captureCode"><span id="image"><?php if (isset($image)) echo $image; ?></span> <a class="refreshCapBtn" href="javascript:void(0);" title="Refresh Captcha Access code">
                                        <i class="fa fa-refresh ml-3"> </i></a></div>


                                <div class="captureInput mt-3">
                                    <label class="inputWraper">
                                        <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha" autocomplete="off" required></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="flag" value="<?= $flag ?>">
                        <div class="form-group">
                            <span id="msg"></span>
                            <button type="submit" id="submit" class="btn btnRed widthFull">Login</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    var captcha = "<?= $_SESSION['captcha'] ?>";
    $(document).ready(function() {
        $('.refreshCapBtn').on('click', function() {
            $.get('<?php echo site_url("login/captcha_refresh"); ?>', function(data) {
                $('#image').html(data);
                get_captcha_dtls();
            });
        });
    });

    function get_captcha_dtls() {
        $.get('<?php echo site_url("login/captcha_dtls"); ?>', function(data) {
            captcha = data;
        });
    }

    $('#captcha').change(function() {
        if (captcha != $('#captcha').val()) {
            $('#msg').empty();
            $('#msg').append('<div class="alert alert-danger text-center">Invalid Captcha..</div>');
        } else {
            $('#msg').empty();
        }
    })
    $('#submit').on('click', function() {
        if (captcha != $('#captcha').val()) {
            $('#msg').empty();
            $('#msg').append('<div class="alert alert-danger text-center">Invalid Captcha..</div>');
            return false;
        } else {
            $('#msg').empty();
            return true;
        }
    })
</script>