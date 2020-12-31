"use strict";
// Cicle Chart
Circles.create({
  id: "circles-1",
  radius: 45,
  value: 60,
  maxValue: 100,
  width: 7,
  text: 5,
  colors: ["#f1f1f1", "#FF9E27"],
  duration: 400,
  wrpClass: "circles-wrp",
  textClass: "circles-text",
  styleWrapper: true,
  styleText: true,
});

Circles.create({
  id: "circles-2",
  radius: 45,
  value: 70,
  maxValue: 100,
  width: 7,
  text: 36,
  colors: ["#f1f1f1", "#2BB930"],
  duration: 400,
  wrpClass: "circles-wrp",
  textClass: "circles-text",
  styleWrapper: true,
  styleText: true,
});

Circles.create({
  id: "circles-3",
  radius: 45,
  value: 40,
  maxValue: 100,
  width: 7,
  text: 12,
  colors: ["#f1f1f1", "#F25961"],
  duration: 400,
  wrpClass: "circles-wrp",
  textClass: "circles-text",
  styleWrapper: true,
  styleText: true,
});


var totalIncomeChart = document
	.getElementById("totalIncomeChart");

if (totalIncomeChart != null) {
	totalIncomeChart.getContext("2d")
	var mytotalIncomeChart = new Chart(totalIncomeChart, {
    type: "bar",
    data: {
      labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
      datasets: [
        {
          label: "Total Income",
          backgroundColor: "#ff9e27",
          borderColor: "rgb(23, 125, 255)",
          data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            ticks: {
              display: false, //this will remove only the label
            },
            gridLines: {
              drawBorder: false,
              display: false,
            },
          },
        ],
        xAxes: [
          {
            gridLines: {
              drawBorder: false,
              display: false,
            },
          },
        ],
      },
    },
  });
}

// initialize data table
$("#datatables-1").DataTable({});

$('#add-kategori').DataTable({
  "pageLength": 5,
  "ajax": baseURL + "/kategori/load"
});

$('#add-jenis').DataTable({
  "pageLength": 5,
  "ajax": baseURL + "/jenis/load"
});

$('#add-produk').DataTable({
  "pageLength": 5,
  "ajax": baseURL + "/produk/load"
});

$('#add-reseller').DataTable({
  "pageLength": 5,
  "ajax": baseURL + "/reseller/load"
});

$('#tbl-transaksimasuk').DataTable({
  "pageLength": 5,
  "ajax": baseURL + "/transaksi/in/load"
});


/* Kategori */
// Add Row

// disable submit kategori 
$(".form-kategori").on("keypress", function (e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    $("#addRowButton").prop("disabled", true);
    addKategori();
    $("#addRowButton").prop("disabled", false);
  }
});

// submit form kategori
$('#addRowButton').click(function(e) {
  e.preventDefault();
  $(this).prop("disabled", true);
  addKategori();
  $(this).prop("disabled", false);
});

function addKategori(){
  var data = $(".form-kategori").serialize();
  $.ajax({
    url: baseURL + "/kategori/store",
    type: "POST",
    data: data,
    dataType: "JSON",
    success: function (data) {
      //if success close modal and reload ajax table
      if (!$.isEmptyObject(data.error)) {
        let tag = $(".form-kategori input[name=kategori_name]");
        tag.addClass("is-invalid");
        tag.parent().addClass("has-error");
        tag.first().next().text(data.error.kategori_name);

        clearModal("addRowModal");
      } else {
        $("#add-kategori")
          .DataTable()
          .ajax.reload();
        
        let tag = $(".form-kategori input[name=kategori_name]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text("");
        
        clearModal("addRowModal", true);
        
        $.notify({
          icon: "fa fa-bell",
          title: "Kategori",
          message: data.message,
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
    },
  });
}
// Edit Kategori
$("#add-kategori").on("click", ".edit-kategori", function () {
  $("#content-modal-edit").load(baseURL + "/kategori/edit/" + $(this).attr("data-id"));
  $("#EditRowModal").modal("show");
});


// Delete Kategori
$("#add-kategori").on("click", ".delete-kategori", function (e) {
	e.preventDefault()
	let r = confirm("Yakin ingin menghapus kategori ini ?")
	if (r == true) {
    $.ajax({
      url: baseURL + "/kategori/delete",
      type: "DELETE",
      data: { id: $(this).attr("data-id") },
      dataType: "JSON",
      success: function (data) {
        //if success close modal and reload ajax table
        $("#add-kategori").DataTable().ajax.reload();
        $.notify({
          icon: "fa fa-bell",
          title: "Kategori",
          message: data.message,
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert("Error adding / update data");
      },
    });
  }
  return
})

/* Jenis */
$(".form-jenis").on("keypress", function (e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    $("#addJenis").prop("disabled", true);
    addJenis();
    $("#addJenis").prop("disabled", false);
  }
});

$("#addJenis").on("click", function (e) {
  e.preventDefault()
  $("#addJenis").prop("disabled", true);
  addJenis();
  $("#addJenis").prop("disabled", false);
})

function addJenis(){
  var data = $(".form-jenis").serialize();
  $.ajax({
    url: baseURL + "/jenis/store",
    type: "POST",
    data: data,
    dataType: "JSON",
    success: function (data) {
      //if success close modal and reload ajax table
      if (!$.isEmptyObject(data.error)) {
        if (!$.isEmptyObject(data.error.kategori)) {
          let select = $('.form-jenis select[name="kategori"]');
          select.addClass("is-invalid");
          select.parent().addClass("has-error");
          select.first().next().text(data.error.kategori);
        }
        let tag = $(".form-jenis input[name=jenis_name]");
        tag.addClass("is-invalid");
        tag.parent().addClass("has-error");
        tag.first().next().text(data.error.jenis_name);

        clearModal("addRowModal");
      } else {
        $("#add-jenis").DataTable().ajax.reload();

        let select = $('.form-jenis select[name="kategori"]');
        select.removeClass("is-invalid");
        select.parent().removeClass("has-error");
        select.first().next().text("");

        let tag = $(".form-jenis input[name=jenis_name]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text("");

        clearModal("addRowModal",true);

        $.notify({
          icon: "fa fa-bell",
          title: "Jenis",
          message: data.message,
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
    },
  });
}


// Edit Jenis
$("#add-jenis").on("click", ".edit-jenis", function (e) {
  $("#content-modal-edit").load(baseURL + "/jenis/edit/" + $(this).attr("data-id"));
  $("#EditJenisModal").modal('show');
})

$("#add-jenis").on("click", ".delete-jenis", function (e) {
  e.preventDefault();
  let r = confirm("Yakin ingin menghapus jenis ini ?");
  if (r == true) {
    $.ajax({
      url: baseURL + "/jenis/delete",
      type: "DELETE",
      data: { id: $(this).attr("data-id") },
      dataType: "JSON",
      success: function (data) {
        //if success close modal and reload ajax table
        $("#add-jenis").DataTable().ajax.reload();
        $.notify({
          icon: "fa fa-bell",
          title: "Jenis",
          message: data.message,
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert("Error adding / update data");
      },
    });
  }
});


/* Produk */

// tambah produk

$(".form-produk").on("keypress", function (e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    $("#addRowButton").prop("disabled", true);
    addProduk();
    $("#addRowButton").prop("disabled", false);
  }
});

$("#addProduk").on("click", function (e) {
  e.preventDefault();
  $("#addProduk").prop("disabled", true);
  addProduk();
  $("#addProduk").prop("disabled", false);
});

function addProduk() {
  var data = $(".form-produk").serialize();
  $.ajax({
    url: baseURL + "/produk/store",
    type: "POST",
    data: data,
    dataType: "JSON",
    success: function (data) {
      //if success close modal and reload ajax table
      if (!$.isEmptyObject(data.error)) {
        if (!$.isEmptyObject(data.error.jenis_produk)) {
          let select = $('.form-produk select[name="jenis_produk"]');
          select.addClass("is-invalid");
          select.parent().addClass("has-error");
          select.first().next().text(data.error.jenis_produk);
        }
        let tag = $(".form-produk input[name=produk]");
        tag.addClass("is-invalid");
        tag.parent().addClass("has-error");
        tag.first().next().text(data.error.produk);

        clearModal("addRowModal");
      } else {
        $("#add-produk").DataTable().ajax.reload();

        let select = $('.form-produk select[name="jenis_produk"]');
        select.removeClass("is-invalid");
        select.parent().removeClass("has-error");
        select.first().next().text("");

        let tag = $(".form-produk input[name=produk]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text("");

        clearModal("addRowModal", true);

        $.notify({
          icon: "fa fa-bell",
          title: "Jenis",
          message: data.message,
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
    },
  });
}

// edit produk
$("#add-produk").on("click", ".edit-produk", function () {
	// console.log(baseURL);
	$("#content-modal-edit").load(baseURL + "/produk/edit/" + $(this).attr("data-id"));
	$("#EditProdukModal").modal('show');
})

// delete produk
$("#add-produk").on("click", ".delete-produk", function (e) {
  e.preventDefault();
  let r = confirm("Yakin ingin menghapus produk ini ?");
  if (r == true) {
    $.ajax({
      url: baseURL + "/produk/delete",
      type: "DELETE",
      data: { id: $(this).attr("data-id") },
      dataType: "JSON",
      success: function (data) {
        //if success close modal and reload ajax table
        $("#add-produk").DataTable().ajax.reload();
        $.notify({
          icon: "fa fa-bell",
          title: "Reseller",
          message: data.message,
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert("Error adding / update data");
      },
    });
  }
});


/* Reseller */

$(".form-reseller").on("keypress", function (e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
    // $("#addReseller").prop("disabled", true);
    // addReseller();
    // $("#addReseller").prop("disabled", false);
  }
});

// tambah reseller
$("#addReseller").on("click", function (e) {
  e.preventDefault();
  $("#addReseller").prop("disabled", true);
  addReseller();
  $("#addReseller").prop("disabled", false);
});

function addReseller() {
  var data = $(".form-reseller").serialize();
  $.ajax({
    url: baseURL + "/reseller/store",
    type: "POST",
    data: data,
    dataType: "JSON",
    success: function (data) {
      //if success close modal and reload ajax table
      if (!$.isEmptyObject(data.error)) {
        if (!$.isEmptyObject(data.error.join_date)) {
          let select = $('.form-reseller input[name="join_date"]');
          select.addClass("is-invalid");
          select.parent().addClass("has-error");
          select.first().next().text(data.error.join_date);
        }
        
        if (!$.isEmptyObject(data.error.reseller)) {
          let tag = $(".form-reseller input[name=reseller]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.reseller);
        }

        clearModal("addRowModal");
      } else {
        $("#add-reseller").DataTable().ajax.reload();

        let select = $('.form-reseller input[name="join_date"]');
        select.removeClass("is-invalid");
        select.parent().removeClass("has-error");
        select.first().next().text("");

        let tag = $(".form-reseller input[name=reseller]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text("");

        clearModal("addRowModal", true);

        $.notify({
          icon: "fa fa-bell",
          title: "Reseller",
          message: data.message,
        });
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
    },
  });
}

// edit reseller
$("#add-reseller").on("click", ".edit-reseller", function () {
  // console.log(baseURL);
  $("#content-modal-edit").load(
    baseURL + "/reseller/edit/" + $(this).attr("data-id")
  );
  $("#EditResellerModal").modal("show");
});

// hapus reseller
$("#add-reseller").on("click", ".delete-reseller", function (e) {
  e.preventDefault();
  let r = confirm("Yakin ingin menghapus reseller ini ?");
  if (r == true) {
    $.ajax({
      url: baseURL + "/reseller/delete",
      type: "DELETE",
      data: { id: $(this).attr("data-id") },
      dataType: "JSON",
      success: function (data) {
        //if success close modal and reload ajax table
        $("#add-reseller").DataTable().ajax.reload();
        $.notify({
          icon: "fa fa-bell",
          title: "Reseller",
          message: data.message,
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert("Error adding / update data");
      },
    });
  }
});

function clearModal(id, hide=false)
{
   
  if (hide == true) {
    $("#" + id).modal("hide");
  }

  $("#" + id).on("hidden.bs.modal", function (e) {
    $(this)
      .find("input,textarea,select")
      .val("")
      .end()
      .find("input[type=checkbox], input[type=radio]")
      .prop("checked", "")
      .end();
  });

}


/* Transaksi Masuk */
// $(".form-transaksi-masuk")

$("#addTransaksiMasuk").on("click", function (e) {
  e.preventDefault();
  $("#addTransaksiMasuk").text('Sending data...');
  $("#addTransaksiMasuk").prop('disabled', true);
  addTransaksiMasuk();
  $("#addTransaksiMasuk").text('Submit');
  $("#addTransaksiMasuk").prop('disabled', false);
  
})

function addTransaksiMasuk(){
  var data = $(".form-transaksi-masuk").serialize();
  $.ajax({
    url: baseURL + "/transaksi/in/store",
    type: "POST",
    data: data,
    dataType: "JSON",
    success: function (data) {
      console.log(data)
      //if success close modal and reload ajax table
      if (!$.isEmptyObject(data.error)) {
        if (!$.isEmptyObject(data.error.no_po)) {
          let tag = $('.form-transaksi-masuk input[name="no_po"]');
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.no_po);
        }
        
        if (!$.isEmptyObject(data.error.warna)) {
          let tag = $(".form-transaksi-masuk input[name=warna]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.warna);
        }
        
        if (!$.isEmptyObject(data.error.warna)) {
          let tag = $(".form-transaksi-masuk input[name=warna]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.warna);
        }

      //   clearModal("addRowModal");
      } else {}
      //   $("#add-reseller").DataTable().ajax.reload();

      //   let select = $('.form-reseller input[name="join_date"]');
      //   select.removeClass("is-invalid");
      //   select.parent().removeClass("has-error");
      //   select.first().next().text("");

      //   let tag = $(".form-reseller input[name=reseller]");
      //   tag.removeClass("is-invalid");
      //   tag.parent().removeClass("has-error");
      //   tag.first().next().text("");

      //   clearModal("addRowModal", true);

      //   $.notify({
      //     icon: "fa fa-bell",
      //     title: "Jenis",
      //     message: data.message,
      //   });
      // }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
    },
  });
}

$("#tbl-transout").DataTable({
  pageLength: 5,
  ajax: baseURL + "/transaksi/out/load",
});

/* Transaksi Out */
$(".form-transout").on("keypress", function (e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
    // $("#addTransOut").prop("disabled", true);
    // addTransaksiKeluar();
    // $("#addTransOut").text("Submit");
    // $("#addTransOut").prop("disabled", false);
  }
});

$("#addTransOut").on("click", function (e) {
  e.preventDefault();
  $(this).prop("disabled", true)
  addTransaksiKeluar();
  $(this).prop("disabled", false)
});

function addTransaksiKeluar()
{
let data = $(".form-transout").serialize();
  $.ajax({
    url: baseURL + "/transaksi/out/store",
    type: "POST",
    data: data,
    dataType: "JSON",
    success: function (data) {
      console.log(data);
      //if success close modal and reload ajax table
      if (!$.isEmptyObject(data.error)) {
        if (!$.isEmptyObject(data.error.tgl_transaksi)) {
          let tag = $(".form-transout input[name=tgl_transaksi]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.tgl_transaksi);
        }

        if (!$.isEmptyObject(data.error.reseller)) {
          let tag = $(".form-transout select[name=reseller]");
          tag.addClass("is-invalid");
          tag.parent().addClass('has-error');
          tag.first().next().next().text(data.error.reseller);
        }

        if (!$.isEmptyObject(data.error.produk)) {
          let tag = $(".form-transout input[name=produk]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.produk);
        }

        if (!$.isEmptyObject(data.error.warna)) {
          let tag = $(".form-transout input[name=warna]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.warna);
        }

        if (!$.isEmptyObject(data.error.qty)) {
          let tag = $(".form-transout input[name=qty]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.qty);
        }

        if (!$.isEmptyObject(data.error.size)) {
          let tag = $(".form-transout input[name=size]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.size);
        }

        if (!$.isEmptyObject(data.error.saldo_masuk)) {
          let tag = $(".form-transout input[name=saldo_masuk]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.saldo_masuk);
        }

        if (!$.isEmptyObject(data.error.modal)) {
          let tag = $(".form-transout input[name=modal]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.modal);
        }

        if (!$.isEmptyObject(data.error.garansi)) {
          let tag = $(".form-transout input[name=garansi]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.garansi);
        }

        if (!$.isEmptyObject(data.error.nama_penerima)) {
          let tag = $(".form-transout input[name=nama_penerima]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.nama_penerima);
        }

        if (!$.isEmptyObject(data.error.alamat_penerima)) {
          let tag = $(".form-transout textarea[name=alamat_penerima]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.alamat_penerima);
        }

        if (!$.isEmptyObject(data.error.pembayaran_pembeli)) {
          let tag = $(".form-transout input[name=pembayaran_pembeli]");
          tag.addClass("is-invalid");
          tag.parent().addClass("has-error");
          tag.first().next().text(data.error.pembayaran_pembeli);
        }

        //   clearModal("addRowModal");
      } else {
        $("#addTransOut").text("Submit")

        $.notify({
          icon: "fa fa-bell",
          title: "Transaksi",
          message: data.message,
        });

        $("#tbl-transout").DataTable().ajax.reload();
        
        $(".form-transout").trigger('reset')

        let tag = $(".form-transout input[name=tgl_transaksi]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout select[name=reseller]");
        tag.val(null).trigger('change');
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().next().text('');

      
        tag = $(".form-transout input[name=produk]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=warna]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=qty]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=size]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=saldo_masuk]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=modal]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=garansi]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

      
        tag = $(".form-transout input[name=nama_penerima]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

        tag = $(".form-transout textarea[name=alamat_penerima]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');

        tag = $(".form-transout input[name=pembayaran_pembeli]");
        tag.removeClass("is-invalid");
        tag.parent().removeClass("has-error");
        tag.first().next().text('');
      }
      $("#addTransout").text("Submit")

    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
    },
  });
}

function clearFormTransOut()
{
  $(".form-transout").trigger("reset");
  let tag = $(".form-transout select[name=reseller]");
  tag.val(null).trigger('change');
}

$("#tbl-transout").on("click", ".edit-transout", function (e) {
  clearFormTransOut()
  console.log("click")
  let id = $(this).attr("data-id")
  $.ajax({
      url: baseURL + "/transaksi/out/"+id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        let res = data[0];
        if (!$.isEmptyObject(data)) {
          let tag;
          
          tag = $('.form-transout input[name="id"]');
          tag.val(res.id)        

          tag = $('.form-transout input[name="no_resi"]');
          tag.val(res.no_resi)        
          
          tag = $('.form-transout input[name="tgl_transaksi"]');
          tag.val(res.tgl_transaksi)        
          
          tag = $(".form-transout select[name=reseller]");
          tag.val(res.reseller_id).trigger('change');        
          
          tag = $('.form-transout input[name="produk"]');
          tag.val(res.produk);        
          
          tag = $('.form-transout input[name="size"]');
          tag.val(res.ukuran);        
          
          tag = $('.form-transout input[name="warna"]');
          tag.val(res.warna);        
          
          tag = $('.form-transout input[name="qty"]');
          tag.val(res.qty);        
          
          tag = $('.form-transout input[name="saldo_masuk"]');
          tag.val(res.saldo_masuk);        
          
          tag = $('.form-transout input[name="modal"]');
          tag.val(res.modal);        
          
          tag = $('.form-transout input[name="garansi"]');
          tag.val(res.garansi);        
          
          tag = $('.form-transout input[name="nama_penerima"]');
          tag.val(res.nama_pelanggan);        
          
          tag = $("textarea#alamat_penerima");
          console.log(res.alamat_penerima);
          console.log(tag)
          tag.val(res.alamat_penerima);        
          
          tag = $('.form-transout input[name="pembayaran_pembeli"]');
          tag.val(res.pembayaran_pembeli);        

          let btn = $("#addTransOut")
          btn.text("Update");
          
        }
      }
  })
})

// hapus transaksi
$("#tbl-transout").on("click", ".delete-transout", function (e) {
  e.preventDefault();
  let r = confirm("Yakin ingin menghapus transaksi ini ?");
  if (r == true) {
    $.ajax({
      url: baseURL + "/transaksi/out/delete",
      type: "DELETE",
      data: { id: $(this).attr("data-id") },
      dataType: "JSON",
      success: function (data) {
        //if success close modal and reload ajax table
        $("#tbl_transout").DataTable().ajax.reload();
        $.notify({
          icon: "fa fa-bell",
          title: "Transaksi",
          message: data.message,
        });

        $("#tbl-transout").DataTable().ajax.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert("Error adding / update data");
      },
    });
  }
});


























/* Cetak HTML */
$("#printRekapHTML").on("click", function(e){
  let rid = $("#reseller").val();
  let startdate = $("#startdate").val();
  let enddate = $("#enddate").val();

  console.log(startdate);
  console.log(enddate);
  if (Boolean(startdate) && Boolean(enddate)) {
    let url = baseURL + "/laporan/rekap/print?type=html&rid=" + rid + "&startdate=" + startdate + "&enddate=" + enddate;
    window.open(url);
  } else {
    alert("Silahkan pilih tanggal");
  }
});


/* Cetak Excel */
$("#printRekapExcel").on("click", function(e){
  let rid = $("#reseller").val();
  let startdate = $("#startdate").val();
  let enddate = $("#enddate").val();

  console.log(startdate)
  console.log(enddate)
  if (Boolean(startdate) && Boolean(enddate)) {
    let url = baseURL + '/laporan/rekap/print?type=excel&rid='+rid+'&startdate='+startdate+'&enddate='+enddate
    window.open(url)
  }else{
    alert('Silahkan pilih tanggal')

  }
});