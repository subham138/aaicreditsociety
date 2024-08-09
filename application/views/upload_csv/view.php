<?php
$dmd_data = json_decode($dmd_data);
$months = unserialize(MONTHS);
?>

<div class="innerPage">
	<div class="wrapper">
		<div class="col-sm-12"><?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
            <!-- <div class="card-header">Oders</div> -->
           
                    <div class="col-md-12">
                    <div class="uploadCsvBox">
                       <div class="uploadCSV">
                            <a class="btn btn-primary csvBtn" href="<?= site_url() ?>/upload_csv/entry">Add Demand</a>
                        
                            <a class="btn btn-primary csvBtn" href="<?= site_url() ?>/networth/entry">Add Networth</a>
                        
                        </div>
                    </div>
                    </div>
                    <?php /* <div class="col-md-12 mt-3">
                        <table id="example" class="table table-striped table-bordered table tableCustom">
                            <thead>
                                <tr>
                                    <th>Member Id</th>
                                    <th>Member Name</th>
                                    <th>Month</th>
									<th>TF Demand</th>
                                    <th>TF Balance</th>
                                    <th>GL Principal <br> Demand</th>
                                    <th>GL Interest <br> Demand</th>
                                    <th>GL Balance</th>
                                    <th>CL Principal <br> Demand</th>
                                    <th>CL Interest <br> Demand</th>
                                    <th>CL Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($dmd_data as $dt){ ?>
                                <tr>
                                    <td><?= $dt->member_id ?></td>
                                    <td><?= $dt->member_name ?></td>
                                    <td><?= $months[$dt->month] ?></td>
                                    <td><?= $dt->tf_prn ?></td>
                                    <td><?= $dt->tf_clr_bal ?></td>
                                    <td><?= $dt->gl_principal ?></td>
                                    <td><?= $dt->gl_interest ?></td>
                                    <td><?= $dt->gl_outstanding ?></td>
                                    <td><?= $dt->cl_principal ?></td>
                                    <td><?= $dt->cl_interest ?></td>
                                    <td><?= $dt->cl_outstanding ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        */?>
                    </div>
                
        </div>
	</div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>