const myTable = document.querySelector("#myTable");
const dataTable = new simpleDatatables.DataTable(myTable, {
  // sortable: false,
	labels: {
    placeholder: "Cari...",
    perPage: "{select}",
    noRows: "Data tidak ditemukan",
    info: "Menampilkan {start} - {end} dari {rows} data",
  }
});