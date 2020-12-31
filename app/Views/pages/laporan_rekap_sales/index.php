<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Laporan</h4>
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
                <a href="#">Laporan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Laporan Rekap</a>
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
                                Cetak Laporan
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
                            <form class="form-rekap">
                                <input type="hidden" name="id">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="reseller">Reseller&nbsp;<span class="text-danger">*</span></label>
                                            <select name="reseller" id="reseller" class="form-control select2" data-allow-clear=true data-placeholder="Cari Reseller...">
                                                <option value="" selected="selected"></option>
                                                <?php foreach ($reseller as $item) : ?>
                                                    <option value="<?= $item->id ?>"><?= ucwords($item->name) ?></option>
                                                <?php endforeach ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="startdate">Tanggal Mulai&nbsp;<span class="text-danger">*</span></label>
                                            <input type="date" name="startdate" id="startdate" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="enddate">Tanggal Akhir&nbsp;<span class="text-danger">*</span></label>
                                            <input type="date" name="enddate" id="enddate" class="form-control" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-action pl-3">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Cetak
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button class="dropdown-item" type="button" id="printRekapExcel">Excel</button>
                                        <button class="dropdown-item" type="button" id="printRekapHTML">HTML</button>
                                    </div>
                                    <button class="btn btn-danger" type="reset">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>