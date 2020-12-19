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
//Notify
// $.notify({
// 	icon: 'flaticon-alarm-1',
// 	title: 'Atlantis Lite',
// 	message: 'Free Bootstrap 4 Admin Dashboard',
// },{
// 	type: 'info',
// 	placement: {
// 		from: "bottom",
// 		align: "right"
// 	},
// 	time: 1000,
// });


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

$("#datatables-1").DataTable({});


/* Kategori */
// Add Row
$('#add-row').DataTable({
	"pageLength": 5,
});

var action =
  '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button>&nbsp;&nbsp;<button type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

$('#addRowButton').click(function() {

});

$(".edit-kategori").click(function () {
	// console.log(baseURL);
	$("#content-modal-edit").load(baseURL + "/kategori/edit");
	$("#EditRowModal").modal('show');
})

$(".delete-kategori").click(function (e) {
	e.preventDefault()
	let r = confirm("Yakin ingin menghapus kategori ini ?")
	if (r == true) {
		alert("Kategori berhasil di hapus")
	}else{
		alert("Kategori gagal di hapus")
	}
})

/* Jenis */
$(".edit-jenis").click(function () {
	// console.log(baseURL);
	$("#content-modal-edit").load(baseURL + "/jenis/edit");
	$("#EditRowModal").modal('show');
})

$(".delete-jenis").click(function (e) {
	e.preventDefault()
	let r = confirm("Yakin ingin menghapus jenis ini ?")
	if (r == true) {
		alert("Jenis berhasil di hapus")
	}else{
		alert("Jenis gagal di hapus")
	}
})


/* Produk */
$(".edit-produk").click(function () {
	// console.log(baseURL);
	$("#content-modal-edit").load(baseURL + "/produk/edit");
	$("#EditRowModal").modal('show');
})

$(".delete-produk").click(function (e) {
  e.preventDefault();
  let r = confirm("Yakin ingin menghapus produk ini ?");
  if (r == true) {
    alert("Produk berhasil di hapus");
  } else {
    alert("Produk gagal di hapus");
  }
});


/* Reseller */
$(".edit-reseller").click(function () {
	// console.log(baseURL);
	$("#content-modal-edit").load(baseURL + "/reseller/edit");
	$("#EditRowModal").modal('show');
})

$(".delete-reseller").click(function (e) {
  e.preventDefault();
  let r = confirm("Yakin ingin menghapus reseller ini ?");
  if (r == true) {
    alert("Reseller berhasil di hapus");
  } else {
    alert("Reseller gagal di hapus");
  }
});