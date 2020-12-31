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
                <a href="#">Transaksi Keluar</a>
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
                                Form Transaksi Keluar
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
                            <form class="form-transout">
                                <input type="hidden" name="id">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="no_resi">No. Resi</label>
                                            <input type="text" name="no_resi" class="form-control">
                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_transaksi">Tanggal Transaksi&nbsp;<span class="text-danger">*</span></label>
                                            <input type="date" name="tgl_transaksi" id="" class="form-control">
                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="form-group">
                                            <label for="reseller">Nama Reseller&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-control select2" name="reseller" id="reseller" data-allow-clear="true" data-placeholder="Cari Reseller...">
                                                <option value="" selected="selected"></option>
                                                <?php foreach ($reseller as $item) : ?>
                                                    <option value="<?= $item->id ?>"><?= ucwords($item->name) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="produk">Produk&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control pl-3" name="produk" placeholder="Masukkan Nama Produk">
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
                                            <input type="number" name="qty" class="form-control" min="1">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="pembayaran_pembeli">Pembayaran Pembeli&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" name="pembayaran_pembeli" class="form-control">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="saldo_masuk">Saldo Masuk&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" name="saldo_masuk" class="form-control">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="modal">Modal&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" name="modal" class="form-control">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="garansi">Garansi&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" name="garansi" class="form-control">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_penerima">Nama Penerima&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" name="nama_penerima" class="form-control" placeholder="Masukkan Nama Penerima">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_penerima">Alamat Penerima&nbsp;<span class="text-danger">*</span></label>
                                            <textarea name="alamat_penerima" id="alamat_penerima" cols=" 30" rows="2" class="form-control"></textarea>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action pl-3">
                                    <button class="btn btn-success" id="addTransOut">Submit</button>
                                    <button class="btn btn-danger" type="reset">Cancel</button>
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
                    <h4 class="card-title">Data Transaksi Keluar</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl-transout" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No Resi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Produk</th>
                                    <th>Reseller</th>
                                    <th>Total Order</th>
                                    <th>Pembayaran</th>
                                    <th>Saldo Masuk</th>
                                    <th>Garansi</th>
                                    <th>Komisi</th>
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