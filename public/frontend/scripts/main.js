AOS.init({
  once: true,
  delay: 50,
  duration: 600
});

var map = L.map('map').setView([-2.5767131,140.7029998], 13);
L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
  maxZoom: 20,
  attribution: '© PhilAnggara',
  subdomains:['mt0','mt1','mt2','mt3']
}).addTo(map);
// Hybrid: s,h;
// Satellite: s;
// Streets: m;
// Terrain: p;



function hapusData(id, title, text) {
  Swal.fire({
    title: title,
    text: text,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#00008C',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById(`hapus-${id}`).submit();
    }
  })
}

function keluar() {
  Swal.fire({
    title: 'Keluar?',
    text: "Tekan tombol Keluar di bawah ini untuk mengakhiri sesi anda!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#00008C',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('keluar').submit();
    }
  })
}

function copyToClipboard(text) {
  navigator.clipboard.writeText(text);
  Swal.fire({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    icon: 'success',
    title: 'Disalin ke clipboard!',
  })
}