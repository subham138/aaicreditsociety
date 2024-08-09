<?php
$fund_data = json_decode($fund_data);
$loan_data = json_decode($loan_data);
$months = unserialize(MONTHS);
$years = unserialize(YEAR);
$sess_data = $_SESSION['user'];
// var_dump($sess_data);exit;
?>
<style>
    table {border-collapse: collapse;}
    table,th {border: 1px solid #dddddd;padding: 3px 3px 3px 3px;font-size: 12px;}
    table,td {border: 1px solid #dddddd;padding: 4px 3px 4px 3px;font-size: 13px;}
    th {text-align: center;}
    tr:hover {background-color: #f5f5f5;}
</style>

<div class="innerPage">
    <div class="wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div id="divToPrint">
                            <div class="row" id="header">
                                <div class="col-12 mb-3">
                                    <center><h3>Networth Statement</h3></center>
                                </div>
                                <div class="col-md-6 leftText">
                                    <p>
                                        <label>Member ID: </label> <b><span><?= $sess_data['member_id'] ? $sess_data['member_id'] : ''; ?></span></b><br>
                                        <!-- <label>EMP Code: </label> <b><span><?php // $sess_data['emp_cd'] ? $sess_data['emp_cd'] : ''; ?></span></b><br> -->
                                        <label>Member Name: </label> <b><span><?= $sess_data['member_name'] ? $sess_data['member_name'] : ''; ?></span></b><br>
                                        <label>Office Name: </label> <b><span><?= $sess_data['unit_code'] ? $sess_data['unit_code'] : ''; ?></span></b>
                                    </p>
                                </div>
                            </div>
                            <table style="width: 100%;" id="example" class="table tableCustom">
                                <thead>
                                    <tr>
                                        <th>A/C Type</th>
                                        <th>Principal</th>
                                        <th>Interest</th>
                                        <th>ROI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($fund_data) {
                                        $tot_prn = 0;
                                        $tot_int = 0;
                                        $tot_roi = 0;
                                        foreach ($fund_data as $dt) { 
                                            $tot_prn = $tot_prn + $dt->prn_amt;
                                            $tot_int = $tot_int + $dt->intt_amt;
                                            $tot_roi = $tot_roi + $dt->intt_rt;
                                        ?>
                                            <tr>
                                                <td><?= $dt->name ?></td>
                                                <td><?= $dt->prn_amt ?></td>
                                                <td><?= $dt->intt_amt ?></td>
                                                <td><?= $dt->intt_rt ?></td>
                                            </tr> 
                                    <?php } ?>
                                            <tr>
                                                <td class="text-center"><h5>Total</h5></td>
                                                <td colspan="3"><h5><?= $tot_prn ?></h5></td>
                                            </tr>
                                    <?php } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="4">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    if($loan_data){
                                        $tot_gl = 0;
                                        $tot_cl = 0;
                                        foreach ($loan_data as $dt) { 
                                            $tot_gl = $tot_gl + $dt->prn_amt;
                                            $tot_cl = $tot_cl + $dt->intt_amt;
                                            $tot_roi = $tot_roi + $dt->intt_rt;
                                            ?>
                                        <tr>
                                            <td><?= $dt->name ?></td>
                                            <td><?= $dt->prn_amt ?></td>
                                            <td><?= $dt->intt_amt ?></td>
                                            <td><?= $dt->intt_rt ?></td>
                                        </tr>
                                       <?php } ?>
                                            <tr>
                                                <td class="text-center"><h5>Total</h5></td>
                                                <td colspan="3"><h5><?= $tot_gl ?></h5></td>
                                            </tr>
									<tr>
										<td colspan="2" class="text-center"><h5>Networth= [Asset - Liability]</h5></td>
										<td class="text-center"><h5>[<?= $tot_prn ?> - <?= $tot_gl ?>]</h5></td>
										<td class="text-center"><h5>Rs.<?= $tot_prn - $tot_gl ?>/-</h5></td>
									</tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!--center class="mt-4"><h5>   < small><i>(<?php // $controller->convert_number($tot_gl - $tot_prn) ?>)</i></small --></h5></center>
                        </div>
                            <div class="row mt-4">
								<div class="col-6">
									<a href="<?= site_url() ?>/demand" type="button" class="btn btn-primary pull-right">Back</a>
								</div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary pull-left" onclick="printDiv()">Print</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
                '.inline { display: inline; }' +
                '.underline { text-decoration: underline; }' +
                '.left { margin-left: 315px;} ' +
                '.right { margin-right: 375px; display: inline; }' +
                'table { border-collapse: collapse; font-size: 15px;}' +
                'th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
                'th, td { }' +
                '.border { border: 1px solid black; } ' +
                '.bottom { bottom: 5px; width: 100%; position: fixed; }' +
                ' footer { position: fixed; bottom: 0;text-align: center; }' +
				'} </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
		WindowObject.document.writeln('<center><img src="<?= base_url() ?>assets/images/logo.png" alt=""/>');
		WindowObject.document.writeln('<h3 style="margin:0; padding:0">REGIONAL PROVIDENT FUND CO-OPERATIVE CREDIT SOCIETY LIMITED, W.B</h3>');
		WindowObject.document.writeln('<p style="margin:0; padding:0"><b><small>(Regd. No. 41/Cal. of 1963)</small></b></p>');
		WindowObject.document.writeln('<p style="margin:0; padding:0">DK Block, Sector- II, Salt Lake City, Kolkata - 700 091, West Bengal</p></center>');
        WindowObject.document.writeln(divToPrint.innerHTML);
		WindowObject.document.writeln('<footer><small>This is an electronically generated report, hence does not require a signature</small></footer>');
        //WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

    }
</script> 
