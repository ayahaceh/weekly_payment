<html>

<head>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>prem/dist/img/favicon.png">
    <style type="text/css" media="print">
        table {
            border: solid 0px #000;
            border-collapse: collapse;
            width: 99%
        }

        tr {
            border: solid 1px #000
        }

        td {
            padding: 7px 5px
        }

        h3 {
            margin-bottom: -17px
        }

        h2 {
            margin-bottom: 0px
        }
    </style>
    <style type="text/css" media="screen">
        table {
            border: solid 0px #000;
            border-collapse: collapse;
            width: 99%
        }

        tr {
            border: solid 1px #000
        }

        td {
            padding: 7px 5px
        }

        h3 {
            margin-bottom: -17px
        }

        h2 {
            margin-bottom: 0px
        }
    </style>
    <style>
        .p2 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .p1 {
            font-family: Times, serif;
            font-size: 12px;
        }

        .p3 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .p4 {
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
        }

        table tr.hide-border {
            border: 0;
        }
    </style>

</head>

<!-- <body onload="window.print()"> -->

<body>
    <!-- <?php print_r($mingguan); ?> -->

    <table width="100%">
        <tr class="hide-border">
            <td> PAYMENT REPORT
            </td>
            <td> ___________________
            </td>
            <td> PT.
            </td>
            <td> ___________________
            </td>
            <td> 6/22/2021
            </td>
        </tr>
    </table>


    <table width="100%">
        <tr class="hide-border">
            <td style="border-left: solid 1px; border-top: solid 1px">PROJECT
            </td>
            <td style="border-top: solid 1px"> : <?= $project['nama_project'] ?>
            </td>
            <td style="border-top: solid 1px">Year
            </td>
            <td style="border-top: solid 1px"> : <?= date("Y") ?>
            </td>
            <td style="border-top: solid 1px">Month
            </td>
            <td style="border-top: solid 1px; border-right: solid 1px"> : <?= date("m") ?>
            </td>
        </tr>
        <tr class="hide-border">
            <td style="border-left: solid 1px">PAID TO
            </td>
            <td> : <?= $project['nama_costumer'] ?>
            </td>
            <td>
            </td>
            <td>
            </td>
            <td>Week
            </td>
            <td style="border-right: solid 1px"> : <?= $week ?>
            </td>
        </tr>
    </table>



    <table border="0">
        <tr>
            <td rowspan="2" align="center" style="border-right: solid 1px">NO.
            </td>
            <td rowspan="2" align="center" style="border-right: solid 1px">ITEM
            </td>
            <td rowspan="2" align="center" style="border-right: solid 1px">UNIT
            </td>
            <td rowspan="2" align="center" style="border-right: solid 1px">PRICE
            </td>
            <td colspan="3" align="center" style="border-right: solid 1px">VOLUME
            </td>
            <td rowspan="2" align="center" style="border-right: solid 1px">Ret.
            </td>
            <td colspan="3" align="center" style="border-right: solid 1px">PAYMENT
            </td>
            <td colspan="3" align="center" style="border-right: solid 1px">RET.
            </td>
        </tr>
        <tr>
            <td align="center" style="border-right: solid 1px">Beginning
            </td align="center" style="border-right: solid 1px">
            <td align="center" style="border-right: solid 1px">Current
            </td align="center" style="border-right: solid 1px">
            <td align="center" style="border-right: solid 1px">Ending
            </td align="center" style="border-right: solid 1px">

            <td align="center" style="border-right: solid 1px">Beginning
            </td align="center" style="border-right: solid 1px">
            <td align="center" style="border-right: solid 1px">Current
            </td align="center" style="border-right: solid 1px">
            <td align="center" style="border-right: solid 1px">Ending
            </td>

            <td align="center" style="border-right: solid 1px">Beginning
            </td>
            <td align="center" style="border-right: solid 1px">Current
            </td>
            <td align="center" style="border-right: solid 1px">Ending
            </td>
        </tr>
        <?php
        $no = 1;
        $nol = 0;
        $sum_vol_beginning  = 0;
        $sum_pay_beginning  = 0;
        $sum_ret_beginning  = 0;
        $sum_vol_current    = 0;
        $sum_pay_current    = 0;
        $sum_ret_current    = 0;
        $sum_vol_ending     = 0;
        $sum_pay_ending     = 0;
        $sum_ret_ending     = 0;

        foreach ($mingguan as $c) {
            $vol_beginning  = $c['vollast'];
            $vol_current    = $c['volnow'];
            $vol_ending     = $vol_beginning + $vol_current;

            $harga = $c['harga'];
            $pay_beginning  = $vol_beginning * $harga;
            $pay_current    = $vol_current * $harga;
            $pay_ending     = $vol_ending * $harga;

            $ret            = $c['potongan'];
            $ret_beginning  = $pay_beginning * $ret;
            $ret_current    = $pay_current * $ret;
            $ret_ending     = $pay_ending * $ret;

            // $sum += $c['vollast'];
            $sum_vol_beginning  += $vol_beginning;
            $sum_pay_beginning  += $pay_beginning;
            $sum_ret_beginning  += $ret_beginning;
            $sum_vol_current    += $vol_current;
            $sum_pay_current    += $pay_current;
            $sum_ret_current    += $ret_current;
            $sum_vol_ending     += $vol_ending;
            $sum_pay_ending     += $pay_ending;
            $sum_ret_ending     += $ret_ending;

        ?>
            <tr class="hide-border">
                <td align="center" style="border-left: solid 1px; border-right: solid 1px"><?= $no ?>
                </td>
                <td style="border-right: solid 1px"> <?= $c['nama'] ?>
                </td>
                <td align="center" style="border-right: solid 1px"><?= $c['satuan'] ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= $c['harga'] ?>
                </td>
                <td align="right" style="border-right: solid 1px"><?= number_format($vol_beginning, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($vol_current, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($vol_ending, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= $c['potongan'] ?>.00
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($pay_beginning, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($pay_current, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($pay_ending, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($ret_beginning, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($ret_current, 0, ",", ",") . ".00" ?>
                </td>
                <td align="right" style="border-right: solid 1px"> <?= number_format($ret_ending, 0, ",", ",") . ".00" ?>
                </td>
            </tr>
        <?php
            $no++;
            // $sum += $volnow;
        }
        ?>


        <tr>
            <td style="border-left: solid 1px; border-right: solid 1px">
            </td>
            <td style="border-right: solid 1px">
            </td>
            <td style="border-right: solid 1px">
            </td>
            <td style="border-right: solid 1px">
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_vol_beginning, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_vol_current, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_vol_ending, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= $ret ?>.00
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_pay_beginning, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_pay_current, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_pay_ending, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_ret_beginning, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_ret_current, 0, ",", ",") . ".00" ?>
            </td>
            <td align="right" style="border-right: solid 1px"> <?= number_format($sum_ret_ending, 0, ",", ",") . ".00" ?>
            </td>
        </tr>
    </table>
    <br />
    <table border="0">
        <tr class="hide-border">
            <td width="20%">Printed By
            </td>
            <td width="20%">Approved By
            </td>
            <td width="20%">Paid By
            </td>
            <td width="20%">Received By
            </td>
        </tr>
    </table>
    <br />
    <br />
    <br />

    <table border="0">
        <tr class="hide-border">
            <td width="20%">Project Manager
            </td>
            <td width="20%">Nonik
            </td>
            <td width="20%">Chasier
            </td>
            <td width="20%">Kurniawan
            </td>
        </tr>
    </table>


</body>

</html>