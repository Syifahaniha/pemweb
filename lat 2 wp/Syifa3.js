function proses() {
  let nama = document.getElementById("nama").value;
  const tulis = document.getElementById("tulis");

  tulis.innerHTML = "perkenalkan nama saya " + nama;
}

function ganti() {
  const tulis = document.getElementById("tulis");
  tulis.style.color = "blue";

  tulis.innerHTML = "geloo lewat";
}
