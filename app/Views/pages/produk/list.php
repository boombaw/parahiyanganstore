<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Produk</h4>
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
                <a href="#">Produk</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Daftar Produk</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Produk
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            Produk Baru
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-primary">
                                                    <label>Nama Produk</label>
                                                    <input id="addName" type="text" class="form-control" placeholder="Masukkan Nama Produk">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-primary">
                                                    <label for="jenis_produk">Jenis Produk</label>
                                                    <select name="jenis_produk" id="jenis_produk" class="form-control form-control">
                                                        <option selected disabled>-- Pilih Jenis Produk --</option>
                                                        <option value="">asdasd</option>
                                                        <option value="">asdasd</option>
                                                        <option value="">asdasd</option>
                                                        <option value="">asdasd</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-primary">
                                                    <label>Warna Produk</label>
                                                    <input name="warna_produk" id="warna_produk" type="text" class="form-control" placeholder="Masukkan Warna Produk">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-primary">
                                                    <label>Size Produk</label>
                                                    <input name="size_produk" id="size_produk" type="number" class="form-control" placeholder="Masukkan Size Produk">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="button" id="addRowButton" class="btn btn-primary bg-default-gradient">Tambah</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="EditRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="content-modal-edit"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>System Architect</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-produk" data-original-title="Detail Produk">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            &nbsp;&nbsp;
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-produk" data-original-title="Ubah Produk">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            &nbsp;&nbsp;
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-produk" data-original-title="Hapus Produk">
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