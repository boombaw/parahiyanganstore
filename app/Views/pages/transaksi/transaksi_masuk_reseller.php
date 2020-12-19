<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Transaksi</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Master</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Transaksi Masuk Reseller</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="card-head-row" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="card-title">
                                Form Transaksi Masuk Reseller
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-sm btn-round mr-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                                            <input type="date" name="tgl_transaksi" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <label for="produk">Produk</label>
                                                <input type="text" class="form-control pl-3" name="produk" placeholder="Cari produk...">
                                                <span class="input-icon-addon mt-3">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="warna">Warna</label>
                                            <select name="warna" id="warna" class="form-control">
                                                <option selected disabled>-- Pilih Warna --</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="size">Size</label>
                                            <select name="size" id="size" class="form-control">
                                                <option selected disabled>-- Pilih Size --</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Qty</label>
                                            <input type="number" name="qty" class="form-control" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="customer_name">Nama Pembeli</label>
                                            <input type="text" class="form-control pl-3" name="customer_name" id="customer_name" placeholder="Masukkan Nama Pembeli">
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp_pembeli">No. HP Pembeli</label>
                                            <input type="text" name="nohp_pembeli" class="form-control" placeholder="Masukkan No. HP Pembeli">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_penerima">Alamat Pembeli</label>
                                            <textarea name="alamat_penerima" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="pembayaran">Pembayaran Pembeli</label>
                                            <input type="text" name="pembayaran" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action pl-3">
                                    <button class="btn btn-success">Submit</button>
                                    <button class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Transaksi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatables-1" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Pembeli</th>
                                    <th>Alamat</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>61</td>
                                    <td>Edinburgh2712379JS</td>
                                    <td>$320,800</td>
                                    <td>
                                        <div class="row flex-nowrap">
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-transout" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            &nbsp;
                                            &nbsp;
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-transout d-inline" data-original-title="Remove">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>