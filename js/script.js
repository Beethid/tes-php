const alasan = document.getElementById("Alasan");
const mc = document.getElementById("mc");
const keterangan = document.getElementById("kehadiran");

mc.classList.add("d-none");
alasan.classList.add("d-none");

const inputFoto = document.getElementById("foto");
const inputAlasan = document.getElementById("alasan");

keterangan.addEventListener("change", function () {
  if (keterangan.value === "Sakit") {
    mc.classList.remove("d-none");
    inputFoto.setAttribute("required", "true");
    alasan.classList.add("d-none");
    inputAlasan.removeAttribute("required");
  } 
  else if (keterangan.value === "Izin") {
    alasan.classList.remove("d-none");
    inputAlasan.setAttribute("required", "true");
    mc.classList.add("d-none");
    inputFoto.removeAttribute("required");
  } 
  else {
    mc.classList.add("d-none");
    alasan.classList.add("d-none");
    inputFoto.removeAttribute("required");
    inputAlasan.removeAttribute("required");
  }
});

// geser geser
const judul = document.getElementById("judul");
let pos = 0;

function gerakGerak() {
  pos+= 1;
  if(pos>=400) pos=0;
  judul.style.backgroundPosition = pos + "% 50%";
  requestAnimationFrame(gerakGerak);
}

gerakGerak();

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
    });
}
