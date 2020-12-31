<div class="modal-header no-bd">
    <h5 class="modal-title">
        <span class="fw-mediumbold">
            Update Produk
        </span>
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="update-produk">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $produk->id ?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Jenis Produk</label>
                    <select name="jenis_produk" class="form-control">
                        <option selected disabled>-- Pilih Jenis Produk --</option>
                        <?php foreach ($jenis->getResult() as $ke => $item) : ?>
                            <option value="<?= $item->id ?>" <?= $item->id == $produk->jenis ? 'selected' : '' ?>><?= $item->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input id="addName" name="produk" type="text" class="form-control" placeholder="Masukkan Nama Produk" value="<?= $produk->name ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer no-bd">
    <button type="submit" id="updateRowButton" class="btn btn-primary">Ubah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
</div>
<script>
    $(".update-produk").on("keypress", function(e) {
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
        var data = $(".update-produk").serialize();
        $.ajax({
            url: baseURL + "/produk/update",
            type: "PUT",
            data: data,
            dataType: "JSON",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                //if success close modal and reload ajax table
                if (!$.isEmptyObject(data.error)) {

                    if (!$.isEmptyObject(data.error.jenis_produk)) {
                        let select = $('.update-produk select[name="jenis_produk"]');
                        select.addClass("is-invalid");
                        select.parent().addClass("has-error");
                        select.first().next().text(data.error.jenis_produk);
                    }
                    let tag = $(".update-produk input[name=produk]");
                    tag.addClass("is-invalid");
                    tag.parent().addClass("has-error");
                    tag.first().next().text(data.error.produk);

                    clearModal("EditProdukModal")
                } else {
                    $("#add-produk")
                        .DataTable()
                        .ajax.reload();

                    let select = $('.update-produk select[name="jenis_produk"]');
                    select.removeClass("is-invalid");
                    select.parent().removeClass("has-error");
                    select.first().next().text("");

                    let tag = $(".update-produk input[name=produk]");
                    tag.removeClass("is-invalid");
                    tag.parent().removeClass("has-error");
                    tag.first().next().text("");

                    clearModal('EditProdukModal', true);
                    $.notify({
                        icon: "fa fa-bell",
                        title: "Produk",
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