<div class="modal-header no-bd">
    <h5 class="modal-title">
        <span class="fw-mediumbold">
            Update Reseller
        </span>
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="update-reseller">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $reseller->id ?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Reseller</label>
                    <input type="text" name="reseller" class="form-control form-control" placeholder="Masukkan Nama Reseller" required value="<?= $reseller->name ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tanggal Join</label>
                    <input type="date" class="form-control" name="join_date" value="<?= date('Y-m-d', strtotime($reseller->join_date)) ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer no-bd">
    <button type="button" id="updateRowButton" class="btn btn-primary">Ubah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
</div>
<script>
    $(".update-reseller").on("keypress", function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            $("#updateRowButton").prop("disabled", true);
            updateProduk();
            $("#updateRowButton").prop("disabled", false);
        }
    });

    $("#updateRowButton").on('click', function(e) {
        e.preventDefault();
        $("#updateRowButton").prop("disabled", true);
        updateProduk();
        $("#updateRowButton").prop("disabled", false);
    })


    function updateProduk() {
        var data = $(".update-reseller").serialize();
        $.ajax({
            url: baseURL + "/reseller/update",
            type: "PUT",
            data: data,
            dataType: "JSON",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                //if success close modal and reload ajax table
                if (!$.isEmptyObject(data.error)) {

                    if (!$.isEmptyObject(data.error.reseller)) {
                        let reseller = $('.update-reseller input[name="reseller"]');
                        reseller.addClass("is-invalid");
                        reseller.parent().addClass("has-error");
                        reseller.first().next().text(data.error.reseller);
                    }
                    if (!$.isEmptyObject(data.error.join_date)) {
                        let tag = $(".update-reseller input[name=join_date]");
                        tag.addClass("is-invalid");
                        tag.parent().addClass("has-error");
                        tag.first().next().text(data.error.join_date);
                    }

                    clearModal("EditResellerModal")
                } else {
                    $("#add-reseller")
                        .DataTable()
                        .ajax.reload();

                    let reseller = $('.update-reseller input[name="reseller"]');
                    reseller.removeClass("is-invalid");
                    reseller.parent().removeClass("has-error");
                    reseller.first().next().text("");

                    let tag = $(".update-reseller input[name=join_date]");
                    tag.removeClass("is-invalid");
                    tag.parent().removeClass("has-error");
                    tag.first().next().text("");

                    clearModal('EditResellerModal', true);
                    $.notify({
                        icon: "fa fa-bell",
                        title: "Reseller",
                        message: data.message,
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error adding / update data");
            },
        });
    }
</script>