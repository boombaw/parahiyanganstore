<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title></title>
    <meta name="generator" content="https://conversiontools.io" />
    <meta name="author" content="Windows User" />
    <meta name="created" content="2020-10-31T07:06:00" />
    <meta name="changedby" content="pusko" />
    <meta name="changed" content="2020-12-23T06:33:07" />
    <meta name="KSOProductBuildVer" content="1033-11.2.0.9747" />

    <style type="text/css">
        body,
        div,
        table,
        thead,
        tbody,
        tfoot,
        tr,
        th,
        td,
        p {
            font-family: "Calibri";
            font-size: x-small
        }

        a.comment-indicator:hover+comment {
            background: #ffd;
            position: absolute;
            display: block;
            border: 1px solid black;
            padding: 0.5em;
        }

        a.comment-indicator {
            background: red;
            display: inline-block;
            border: 1px solid black;
            width: 0.5em;
            height: 0.5em;
        }

        comment {
            display: none;
        }
    </style>

</head>

<body>
    <table cellspacing="0" border="0">
        <colgroup width="32"></colgroup>
        <colgroup width="90"></colgroup>
        <colgroup width="156"></colgroup>
        <colgroup width="95"></colgroup>
        <colgroup width="100"></colgroup>
        <colgroup width="120"></colgroup>
        <colgroup span="2" width="97"></colgroup>
        <colgroup width="115"></colgroup>
        <tr>
            <td colspan=9 height="24" align="center" valign=bottom><b>
                    <font size=4>REKAP DATA SALDO PENJUALAN</font>
                </b></td>
        </tr>
        <tr>
            <td colspan=9 height="24" align="center" valign=bottom><b>
                    <font size=4>PARAHIYANGAN STORE</font>
                </b></td>
        </tr>
        <tr>
            <td height="24" align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
            <td align="center" valign=bottom><b>
                    <font size=4 color="#000000"><br></font>
                </b></td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>
                <font color="#000000">Nama Member</font>
            </td>
            <td align="left" valign=bottom>
                <?= $reseller === 'All' ? $reseller : ucwords($reseller->name) ?>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000">Omset minggu ini</font>
            </td>
            <td align="left" valign=bottom sdval="12803049" sdnum="1033;0;#,##0;[RED]#,##0">
                <?= rupiah($totalOmset->total_omset) ?>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=bottom>
                <font color="#000000">Bulan</font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000">Modal </font>
            </td>
            <td align="left" valign=bottom sdval="6257049" sdnum="1033;0;#,##0;[RED]#,##0">
                <?= rupiah($totalModal->total_modal) ?>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=bottom>
                <font color="#000000">Periode</font>
            </td>
            <td align="left" valign=bottom>
                <?= $start_date ." s/d ". $end_date ?>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>
                <font color="#000000">Total Komisi</font>
            </td>
            <td align="left" valign=bottom sdval="6546000" sdnum="1033;0;#,##0;[RED]#,##0">
                <?= rupiah($totalKomisi->total_komisi) ?>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="37" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">No</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Hari tanggal input</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Nama Reseller</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Nama Penerima</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Total order</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Pembayaran Pembeli</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Saldo masuk</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Modal</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Garansi</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#C0504D">
                <font color="#FFFFFF">Komisi Perpaket</font>
            </td>
        </tr>
        <?php
        $i = 1;
        $tgl1 = '';
        $totalKomisi = 0;
        $saldoMasuk = 0;
        $modal = 0;
        $garansi = 0;
        $nama_reseller = '';
        foreach ($transaksi->getResult() as $item) :
            $saldoMasuk = $item->saldo_masuk;
            $modal = $item->modal;
            $garansi = $item->garansi;

        ?>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="1" sdnum="1033;">
                    <?= $i++ ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="44086" sdnum="1033;1033;M/D/YYYY">
                    <?php 
                        if ($tgl1 == '') {
                            $tgl1 = date("Y-m-d", strtotime($item->tgl_transaksi));
                            echo $tgl1;
                        }elseif ($tgl1 == date("Y-m-d", strtotime($item->tgl_transaksi))) {
                            echo '';
                        }else{
                            $tgl1 = date("Y-m-d", strtotime($item->tgl_transaksi));
                            echo $tgl1;
                        }
                    ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                    <?php
                        // if ($nama_reseller == '') {
                        //     $nama_reseller = ucwords($item->nama_reseller);
                        //     echo $nama_reseller;
                        // } elseif ($nama_reseller == ucwords($item->nama_reseller)) {
                        //     echo '';
                        // } else {
                        //     $nama_reseller = ucwords($item->nama_reseller);
                        //     echo $nama_reseller;
                        // }
                        $nama_reseller = ucwords($item->nama_reseller);
                        echo $nama_reseller;
                    ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                    <?= ucwords($item->nama_pelanggan) ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="1" sdnum="1033;">
                    <?= $item->qty ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="177" sdnum="1033;">
                    <?= $item->pembayaran_pembeli ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="152413" sdnum="1033;0;#,##0;[RED]#,##0">
                    <?= $saldoMasuk ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="55000" sdnum="1033;0;#,##0;[RED]#,##0">
                    <?= $modal ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="6413" sdnum="1033;0;#,##0;[RED]#,##0">
                    <?= $garansi ?>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="91000" sdnum="1033;0;#,##0;[RED]#,##0">
                    <?= rupiah($item->komisi_per_paket) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <!-- ************************************************************************** -->
</body>

</html>