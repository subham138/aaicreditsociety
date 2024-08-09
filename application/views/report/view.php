<?php
$dmd_data = json_decode($dmd_data);
$months = unserialize(MONTHS);
$sess_data = $_SESSION['user'];
// var_dump($sess_data['member_id']);exit;
?>
<style>
    table {
        border-collapse: collapse;
    }

    table,
    th {
        border: 1px solid #dddddd;
        padding: 3px 3px 3px 3px;
        font-size: 12px;
    }

    table,
    td {
        border: 1px solid #dddddd;
        padding: 4px 3px 4px 3px;
        font-size: 13px;
    }

    th {
        text-align: center;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>

<div class="innerPage">
    <div class="wrapper">
        <div class="col-sm-12">
            <div class="portfolioViewCustom">
                <?= form_open('report'); ?>
                <div class="row">
                    <div class="col-sm-6 float-left">
                        <div class="form-group ">
                            <label for="frm_dt">From Date</label>

                            <input type="date" class="form-control" name="frm_dt" id="frm_dt" value="<?= $frm_dt ?>" required="">

                        </div>
                    </div>
                    <div class="col-sm-6 float-left">
                        <div class="form-group">
                            <label for="to_dt">To Date</label>

                            <input type="date" class="form-control" name="to_dt" id="to_dt" value="<?= $to_dt ?>" required="">

                        </div>
                    </div>
                    <div class="col-sm-12 text-left">
                        <button type="submit" id="search" name="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
        <?php if (isset($_REQUEST['search'])) { ?>
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="divToPrint">
                                <div class="row" id="header">
                                    <div class="col-12 mb-3">
                                        <center>
                                            <h3>Statement From <?= date('d/m/Y', strtotime($frm_dt)) ?> To <?= date('d/m/Y', strtotime($to_dt)) ?></h3>
                                        </center>
                                    </div>
                                    <div class="col-md-6 leftText">
                                        <p>
                                            <label>Member ID: </label> <b><span><?= $sess_data['member_id'] ? $sess_data['member_id'] : ''; ?></span></b><br>
                                            <!-- label>EMP Code: </label> <b><span><?php // $sess_data['emp_cd'] ? $sess_data['emp_cd'] : ''; 
                                                                                    ?></span></b><br -->
                                            <label>Member Name: </label> <b><span><?= $sess_data['member_name'] ? $sess_data['member_name'] : ''; ?></span></b><br>
                                            <label>Office Name: </label> <b><span><?= $dmd_data ? $dmd_data[0]->unit_code : ''; ?></span></b>
                                        </p>
                                    </div>
                                </div>
                                <table style="width: 100%;" id="example" class="table tableCustom">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" rowspan="2">#</th>
                                            <th class="text-center align-middle" rowspan="2">Month<br>&<br>Year</th>
                                            <th class="text-center" colspan="6">GENERAL LOAN</th>
                                            <th class="text-center align-middle" rowspan="2">TF</th>
                                            <th class="text-center align-middle" rowspan="2">TF Balance</th>
                                            <th class="text-center" colspan="6">CONSUMER LOAN</th>
                                            <th class="text-center" colspan="6">LTC</th>
                                            <th class="text-center align-middle" rowspan="2">TOTAL CLAIM</th>
                                        </tr>
                                        <tr>
                                            <th>Recov GLIntl No.</th>
                                            <th>Total GLIntl No.</th>
                                            <th>Prinpl GL</th>
                                            <th>Last GLLoan</th>
                                            <th>O/S GLBal.</th>
                                            <th>GLInt. Claim</th>
                                            <th>Recov CLIntl No.</th>
                                            <th>Total CLIntl No.</th>
                                            <th>Prinpl CL</th>
                                            <th>Last CLLoan</th>
                                            <th>O/S CLBal.</th>
                                            <th>CLInt. Claim</th>

                                            <th>Recov LTCIntl No.</th>
                                            <th>Total LTCIntl No.</th>
                                            <th>Prinpl LTC</th>
                                            <th>Last LTCLoan</th>
                                            <th>O/S LTCBal.</th>
                                            <th>LTCInt. Claim</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											   //echo '<pre>'; var_dump($dmd_data);exit;
                                        if ($dmd_data) {
                                            $i = 1;
                                            $tot_gl_principal = 0;
                                            $tot_gl_interest = 0;
                                            $tot_tf_prn = 0;
                                            $tot_cl_principal = 0;
                                            $tot_cl_interest = 0;
                                            $tot_ltc_principal = 0;
                                            $tot_ltc_interest = 0;
                                            $tot_clm = 0;
                                            foreach ($dmd_data as $dt) {
                                                $tot_gl_principal = $tot_gl_principal + $dt->gl_principal;
                                                $tot_gl_interest = $tot_gl_interest + $dt->gl_interest;
                                                $tot_tf_prn = $tot_tf_prn + $dt->tf_prn;
                                                $tot_cl_principal = $tot_cl_principal + $dt->cl_principal;
                                                $tot_cl_interest = $tot_cl_interest + $dt->cl_interest;
                                                $tot_ltc_principal = $tot_ltc_principal + $dt->ltc_prn;
                                                $tot_ltc_interest = $tot_ltc_interest + $dt->ltc_intt;
                                                $total_claim = $dt->gl_principal + $dt->gl_interest + $dt->tf_prn + $dt->cl_principal + $dt->cl_interest + $dt->ltc_prn + $dt->ltc_intt;
                                                $tot_clm = $tot_clm + $total_claim;
                                        ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= substr($months[$dt->month], 0, 3) . ', ' . substr($dt->year, -2, 2) ?></td>
                                                    <td><?= $dt->gl_run ?></td>
                                                    <td><?= $dt->gl_tot ?></td>
                                                    <td><?= $dt->gl_principal ?></td>
                                                    <td><?= $dt->gl_loan_amt ?></td>
                                                    <td><?= $dt->gl_outstanding ?></td>
                                                    <td><?= $dt->gl_interest ?></td>
                                                    <td><?= $dt->tf_prn ?></td>
                                                    <td><?= $dt->tf_clr_bal ?></td>
                                                    <td><?= $dt->cl_run ?></td>
                                                    <td><?= $dt->cl_tot ?></td>
                                                    <td><?= $dt->cl_principal ?></td>
                                                    <td><?= $dt->cl_loan_amt ?></td>
                                                    <td><?= $dt->cl_outstanding ?></td>
                                                    <td><?= $dt->cl_interest ?></td>

                                                    <td><?= $dt->ltc_curent_instl ?></td>
                                                    <td><?= $dt->ltc_tot_instl ?></td>
                                                    <td><?= $dt->ltc_prn ?></td>
                                                    <td><?= $dt->ltc_sanc_amt ?></td>
                                                    <td><?= $dt->ltc_curr_prn ?></td>
                                                    <td><?= $dt->ltc_intt ?></td>

                                                    <td><?= $total_claim ?></td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                            <tr>
                                                <td colspan="2"><b>Total</b></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $tot_gl_principal ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $tot_gl_interest ?></td>
                                                <td><?= $tot_tf_prn ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $tot_cl_principal ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $tot_cl_interest ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $tot_ltc_principal ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $tot_ltc_interest ?></td>
                                                <td><?= $tot_clm ?></td>
                                            </tr>
                                        <?php } else {
                                            echo '<tr>';
                                            echo '<td class="text-center text-danger" colspan="23">NO DATA FOUND</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>

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
        <?php } ?>
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
            '.bottom { bottom: 5px; width: 100%; position: fixed ' +
            '} } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function() {
            WindowObject.close();
        }, 10);

    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript">
    function generate() {
        var doc = new jsPDF('p', 'pt', 'letter');
        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };
        margins = {
            top: 150,
            bottom: 60,
            left: 40,
            right: 40,
            width: 600
        };
        var y = 20;
        doc.setLineWidth(2);
        doc.fromHTML(
            $('#header').html(), 200, y = y + 30, {
                'width': 500,
                'elementHandlers': specialElementHandlers
            }
        )
        doc.autoTable({
            html: '#example',
            startY: 150,
            theme: 'grid',
            styles: {
                minCellHeight: 10
            }
        });
        doc.save("statement_<?= date('dmY', strtotime($frm_dt)) ?>_<?= date('dmY', strtotime($to_dt)) ?>.pdf");

        // var htmlstring = '';  
        // var tempVarToCheckPageHeight = 0;  
        // var pageHeight = 0;  
        // pageHeight = doc.internal.pageSize.height;  
        // specialElementHandlers = {  
        //     // element with id of "bypass" - jQuery style selector  
        //     '#bypassme': function(element, renderer) {  
        //         // true = "handled elsewhere, bypass text extraction"  
        //         return true  
        //     }  
        // };  
        // margins = {  
        //     top: 150,  
        //     bottom: 60,  
        //     left: 40,  
        //     right: 40,  
        //     width: 600  
        // };  
        // var y = 20;  
        // doc.setLineWidth(2);  
        // doc.text(200, y = y + 30, "Statement From <?php //date('d/m/Y', strtotime($frm_dt)) 
                                                        ?> To <?php //date('d/m/Y', strtotime($to_dt)) 
                                                                ?>");  
        // doc.autoTable({  
        //     html: '#example',  
        //     startY: 70,  
        //     theme: 'grid',  
        //     styles: {  
        //         minCellHeight: 10 
        //     }  
        // })  
        // doc.save('Marks_Of_Students.pdf');  
    }
</script>