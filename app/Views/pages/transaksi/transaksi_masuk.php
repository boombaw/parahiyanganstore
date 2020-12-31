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
                <a href="#">Transaksi Masuk</a>
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
                                Form Transaksi Masuk
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-sm btn-round mr-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form class="form-transaksi-masuk">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="no_po">No. PO <span class="text-danger">*</span></label>
                                            <input type="text" name="no_po" class="form-control" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_transaksi">Tanggal Transaksi&nbsp;<span class="text-danger">*</span></label>
                                            <input type="date" name="tgl_transaksi" id="" class="form-control" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="produk">Produk<span class="text-danger">*</span></label>
                                            <select name="produk" id="produk" class="form-control select2" data-placeholder="Cari Produk ..." data-allow-clear="true" required>
                                                <option selected="selected"></option>
                                                <?php foreach ($produk as $item) : ?>
                                                    <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="warna">Warna</label>
                                            <input type="text" name="warna" class="form-control" placeholder="Masukkan Warna">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="size">Size</label>
                                            <input type="text" name="size" class="form-control" placeholder="Masukkan Size">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Qty&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" name="qty" class="form-control" min="1" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="pembayaran">Tipe Pembayaran&nbsp;<span class="text-danger">*</span></label>
                                            <select name="pembayaran" id="pembayaran" class="form-control select2" data-placeholder="-- Pilih Metode Pembayaran --" data-allow-clear="true" required>
                                                <option selected="selected"></option>
                                                <option value="1">Tunai</option>
                                                <option value="2">Non Tunai</option>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nominal">Nominal&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" name="nominal" class="form-control" min="1" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action pl-3">
                                    <button class="btn btn-success" id="addTransaksiMasuk">Submit</button>
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
                    <h4 class="card-title">Data Transaksi Masuk</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl-transaksimasuk" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <th>No. PO</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Tipe Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>