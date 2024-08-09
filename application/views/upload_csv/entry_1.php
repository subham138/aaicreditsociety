<?php 
$attributes = array('enctype' => 'multipart/form-data');
?>  

<div class="innerPage">
	<div class="wrapper">
		<div class="col-sm-9 float-left portfolioRight"><?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
            <!-- <div class="card-header">Oders</div> -->
            <div class="">
                <div class="row">
                    <?= form_open('upload_csv/save', $attributes); ?>
                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3"><label>Upload CSV</label></div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="userfile" id="userfile" accept=".csv" onchange="triggerValidation(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"><button type="submit" class="btn btn-success pull-right">Upload</button></div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
	</div>
</div>

<script>
    var regex = new RegExp("(.*?)\.(csv)$");

    function triggerValidation(el) {
        if (!(regex.test(el.value.toLowerCase()))) {
            el.value = '';
            alert('Please Select Only CSV File Format');
        }
    }
</script>