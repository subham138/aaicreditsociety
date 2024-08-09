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
                    <?= form_open('upload_csv/save', $attributes); ?>
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
                                                <?php foreach($months as $k => $v){
                                                    $selected = '';
                                                    if($k == date('m')){
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
                                                <?php foreach($years as $k => $v){
                                                    $selected = '';
                                                    if($v == date('Y')){
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

<script>
    var regex = new RegExp("(.*?)\.(csv)$");

    function triggerValidation(el) {
        if (!(regex.test(el.value.toLowerCase()))) {
            el.value = '';
            alert('Only CSV File Format Allowed');
            $('#submit').attr('disabled', 'disabled');
        }else{
            $('#submit').removeAttr('disabled');
        }
    }
</script>

<script>
    $(document).ready(function(){
        // $('#UploadCsv').submit(function(event){
        //     alert('Hi');
        //     $('#progress_bar').show();
        //     $(this).ajaxSubmit({
        //         // target: '#progress_bar',
        //         beforeSubmit: function(){
        //             $('.progress-bar').width('0%');
        //         },
        //         uploadProgress: function(event, position, total, percentageComplete){
        //             $('.progress-bar').animate({
        //                 width: percentageComplete + '%'
        //             },
        //             {
        //                 duration: 3000
        //             });
        //         },
        //         success: function(data){
        //             console.log(data);
        //             window.location.href= "<?= site_url(); ?>/upload_csv"; // Put url to redirect
        //             // alert('uploaded successfully');
        //         }
        //     })
        // })

        $('#UploadCsv').ajaxForm({
            beforeSend: function(){
                $('#progress_bar').show();
                $('.progress-bar').width('0%');
            },
            uploadProgress: function(event, position, total, percentageComplete){
                $('.progress-bar').animate({
                    width: percentageComplete + '%'
                },
                {
                    duration: 3000
                });
            },
            complete: function(){
                window.location.href= "<?= site_url(); ?>/upload_csv";
            }
        });
    })
    
</script>