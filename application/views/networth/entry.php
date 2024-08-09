<?php
$attributes = array('enctype' => 'multipart/form-data', 'id' => 'UploadCsv');
$months = unserialize(MONTHS);
$years = unserialize(YEAR);
?>
<div class="innerPage">
    <div class="wrapper uploadForm">
        <div class="col-sm-12 float-left portfolioRight"><?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
            <!-- <div class="card-header">Oders</div> -->

            <div class="row">
                <?= form_open('networth/save', $attributes); ?>
                <div class="col-md-12 mt-3">
                    <div class="uploadCsvBox">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="fieldTxtForm">Upload CSV</label>
                                        <input type="file" class="form-control" name="userfile" id="userfile" accept=".csv" onchange="triggerValidation(this)">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">

                                        <label class="fieldTxtForm">Months</label>


                                        <select class="form-control" name="month" id="month" required="">
                                            <option value="">Select</option>
                                            <?php foreach ($months as $k => $v) {
                                                $selected = '';
                                                if ($k == date('m')) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option value="<?= $k ?>" <?= $selected ?>><?= $v ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="fieldTxtForm">Years</label>


                                        <select class="form-control" name="year" id="year" required="">
                                            <option value="">Select</option>
                                            <?php foreach ($years as $k => $v) {
                                                $selected = '';
                                                if ($v == date('Y')) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option value="<?= $k ?>" <?= $selected ?>><?= $v ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4" style="display: none;" id="progress_bar">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn uploadBtn" id="submit">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Loader -->
    <div class="loader" style="display:none"></div>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

<script>
    var regex = new RegExp("(.*?)\.(csv)$");

    function triggerValidation(el) {
        if (!(regex.test(el.value.toLowerCase()))) {
            el.value = '';
            alert('Only CSV File Format Allowed');
            $('#submit').attr('disabled', 'disabled');
        } else {
            $('#submit').removeAttr('disabled');
        }
    }
</script>

<!-- <script type="text/javascript">
    jQuery(document).on('submit', '#UploadCsv', function(e) {
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(element) {
                    if (element.lengthComputable) {
                        var percentComplete = ((element.loaded / element.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },

            type: 'POST',
            url: 'upload.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',

            beforeSend: function() {
                $(".progress-bar").width('0%');
            },
            success: function(json) {
                window.location.href = "<?= site_url(); ?>/upload_csv";
            }
        });
    });
</script> -->

<script>
    $(document).ready(function() {
        $('#UploadCsv').ajaxForm({
            beforeSend: function() {
                $('#progress_bar').show();
                $('.progress-bar').width('0%');
            },
            uploadProgress: function(event, position, total, percentageComplete) {
                $('.progress-bar').animate({
                    width: percentageComplete + '%'
                }, {
                    duration: 3000
                });
            },
            complete: function() {
                window.location.href = "<?= site_url(); ?>/upload_csv";
            }
        });
    })
</script>
<!-- <script>
    $('#UploadCsv').submit(function() {
        $('.content').show();
        return true;
    });



    // $('#submit').click(function() {
    //     // define the value & amount to increment by
    //     let v = 0,
    //         step = 5
    //     // Start the program
    //     run()
    //     // Every 1000 ms increment & run code
    //     function run() {
    //         setTimeout(function() {
    //             logic()
    //         }, 1000)
    //     }

    //     // function logic() {
    //     //     (v < 101) ? increment(): reset()
    //     //     run()
    //     // }

    //     function increment() {
    //         $('.progress').css('width', v + '%')
    //         $('.progress').html(v + '%')
    //         v += step
    //     }

    //     // function reset() {
    //     //     v = 0
    //     //     $('.progress').css('width', v + '%')
    //     //     $('.progress').html(v + '%')
    //     // }
    // })

    // document.getElementById('submit').click(function(){

    // })
</script> -->