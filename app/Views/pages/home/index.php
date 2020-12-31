<?= $this->extend('layouts/index'); ?>+

<?= $this->section('content'); ?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="<?= route_to('reseller')?>" class="btn btn-white btn-border btn-round mr-2"><i class="fa fa-plus"></i>&nbsp;Tambah Reseller</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        
    </div>
</div>
<?= $this->endSection(); ?>