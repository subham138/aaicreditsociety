<?php
$dmd_data = json_decode($dmd_data);
$months = unserialize(MONTHS);
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
    <div class="col-sm-12">
        <div class="portfolioViewCustom">
            
                   
						<div class="statementBTn">
							
                                <a href="<?= site_url() ?>/networth" class="btn btn-primary allStatementBtn">Networth</a>
							
                            
                                <a href="<?= site_url() ?>/report" class="btn btn-primary allStatementBtn">All Statement</a>
                            
						</div>
                        <div id="divToPrint">
                            
                                <div class="row">
									<div class="col-md-12 statementTitle">
                                    <center>
                                        <h5>Statement of <?= $sess_data['month'] ? $months[$sess_data['month']] : ''; ?> <?= $sess_data['year'] ? $sess_data['year'] : ''; ?></h5>
                                    </center>
									</div>
                                    

                                    <div class="col-md-6 leftText">
                                        <p>
                                            <label>Member ID: </label> <b><span><?= $sess_data['member_id'] ? $sess_data['member_id'] : ''; ?></span></b><br>
                                            <!-- label>EMP Code: </label> <b><span><?= $sess_data['emp_cd'] ? $sess_data['emp_cd'] : ''; ?></span></b><br -->
                                            <label>Member Name: </label> <b><span><?= $sess_data['member_name'] ? $sess_data['member_name'] : ''; ?></span></b><br>
                                            <label>Office Name: </label> <b><span><?= $dmd_data ? $dmd_data[0]->unit_code : ''; ?></span></b>
                                        </p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                            <table style="width: 100%;" id="example" class="table tableCustom">

                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" rowspan="2">#</th>
										<th class="text-center align-middle" rowspan="2">Month<br>&<br>Year</th>
                                        <th class="text-center align-middle" rowspan="2">TF</th>
                                        <th class="text-center" colspan="6">TERM LOAN 1</th>
                                        <!--th class="text-center align-middle" rowspan="2">TF Balance</th -->
                                        <th class="text-center" colspan="6">TERM LOAN 2</th>
                                    	<th class="text-center" colspan="6">CONSUMPTION LOAN 1</th>
                                    	<th class="text-center" colspan="6">CONSUMPTION LOAN 2</th>
                                    	<th class="text-center" colspan="6">MOBILE LOAN</th>
                                    	<th class="text-center" colspan="6">EMERGENCY LOAN</th>
                                        <th class="text-center align-middle" rowspan="2">TOTAL CLAIM</th>
                                    </tr>
                                    <tr>
                                        <th>Recov Intl No.</th>
                                        <th>Total Intl No.</th>
                                        <th>Prn </th>
                                        <th>Int. Claim</th>
                                        <th>Last Loan</th>
                                        <th>O/S Bal.</th>

                                        <th>Recov  Intl No.</th>
                                        <th>Total  Intl No.</th>
                                        <th>Prn </th>
                                        <th>Int. aim</th>
                                        <th>Last  Loan</th>
                                        <th>O/S  Bal.</th>

                                    	<th>Recov Intl No.</th>
										<th>Total Intl No.</th>
										<th>Prn </th>
										<th>Int. Claim</th>
										<th>Last Loan</th>
										<th>O/S Bal.</th>

                                        <th>Recov CL Intl No.</th>
										<th>Total CL Intl No.</th>
										<th>Prn CL</th>
										<th>CL Int. Claim</th>
										<th>Last CL Loan</th>
										<th>O/S CL Bal.</th>

                                        <th>Recov ML Intl No.</th>
										<th>Total ML Intl No.</th>
										<th>Prn ML</th>
										<th>ML Int. Claim</th>
										<th>Last ML Loan</th>
										<th>O/S ML Bal.</th>

                                        <th>Recov EL Intl No.</th>
										<th>Total EL Intl No.</th>
										<th>Prn EL</th>
										<th>EL Int. Claim</th>
										<th>Last EL Loan</th>
										<th>O/S EL Bal.</th>

                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php
                                    if ($dmd_data) {
                                        $i= 1;
                                        foreach ($dmd_data as $dt) {
                                            $total_claim = $dt->gl_principal + $dt->gl_interest + $dt->tf_prn + $dt->cl_principal + $dt->cl_interest + $dt->ltc_prn + $dt->ltc_intt + $dt->l4_prn + $dt->l4_intt + $dt->l5_prn + $dt->l5_intt + $dt->l6_prn + $dt->l6_intt;
                                             ?>
                                            <tr>
                                                <td><?= $i ?></td>
												<td><?= substr($months[$dt->month], 0, 3) . ', ' . substr($dmd_data[0]->year, 2, 2) ?></td>
                                                <td><?= $dt->tf_prn ?></td>
                                                <td><?= $dt->gl_run ?></td>
                                                <td><?= $dt->gl_tot ?></td>
                                                <td><?= $dt->gl_principal ?></td>
                                                <td><?= $dt->gl_interest ?></td>
                                                <td><?= $dt->gl_loan_amt ?></td>
                                                <td><?= $dt->gl_outstanding ?></td>
                                               
                                                
                                                <!-- td><?php //echo $dt->tf_clr_bal ?></td -->
                                                <td><?= $dt->cl_run ?></td>
                                                <td><?= $dt->cl_tot ?></td>
                                                <td><?= $dt->cl_principal ?></td>
                                                <td><?= $dt->cl_interest ?></td>
                                                <td><?= $dt->cl_loan_amt ?></td>
                                                <td><?= $dt->cl_outstanding ?></td>
												
												<td><?= $dt->ltc_curent_instl ?></td>
												<td><?= $dt->ltc_tot_instl ?></td>
												<td><?= $dt->ltc_prn ?></td>
												<td><?= $dt->ltc_intt ?></td>
												<td><?= $dt->ltc_sanc_amt ?></td>
												<td><?= $dt->ltc_curr_prn ?></td>

                                                <td><?= $dt->l4_curent_instl ?></td>
												<td><?= $dt->l4_tot_instl ?></td>
												<td><?= $dt->l4_prn ?></td>
												<td><?= $dt->l4_intt ?></td>
												<td><?= $dt->l4_sanc_amt ?></td>
												<td><?= $dt->l4_curr_prn ?></td>

                                                <td><?= $dt->l5_curent_instl ?></td>
												<td><?= $dt->l5_tot_instl ?></td>
												<td><?= $dt->l5_prn ?></td>
												<td><?= $dt->l5_intt ?></td>
												<td><?= $dt->l5_sanc_amt ?></td>
												<td><?= $dt->l5_curr_prn ?></td>

                                                <td><?= $dt->l6_curent_instl ?></td>
												<td><?= $dt->l6_tot_instl ?></td>
												<td><?= $dt->l6_prn ?></td>
												<td><?= $dt->l6_intt ?></td>
												<td><?= $dt->l6_sanc_amt ?></td>
												<td><?= $dt->l6_curr_prn ?></td>

                                                <td><?= $total_claim ?></td>
                                            </tr> 
                                    <?php $i++; }
                                    } else {
                                        echo '<tr>';
                                        echo '<td class="text-center text-danger" colspan="16">NO DATA FOUND</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="statementBottomPrnt">
                            <!--div class="col-6">
                                <button type="button" class="btn btn-primary pull-right" onclick="generate()">PDF</button>
                            </div -->
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" onclick="printDiv()">Print</button>
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
                ' footer { position: fixed; bottom: 0;}' +
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