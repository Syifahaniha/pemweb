const h1 = document.createElement("h1");
h1.innerHTML = "Saya sedang belajar dom";
document.body.append(h1);

const img = document.createElement("img");
img.src = "NCT1.jpg";
img.width = 100;
document.body.append(img);

const form = document.createElement("form");
form.innerHTML = "<input type = 'text' placeholder = 'masukan nama'>";
form.innerHTML += "<input type = 'submit' value = 'kirim'>";
document.body.append(form);

const form2 = document.createElement("form");
document.body.append(form2);

const input = document.createElement("input");
input.setAttribute("text", "text");
input.setAttribute("placeholder", "masukan nama anda");

const tombol = document.createElement("tombol");
tombol.setAttribute("type", "submit");
tombol.setAttribute("value", "simpan");
form.append(input);
form.append(tombol);

const table = document.createElement("table");
table.id = "table";
document.body.append(table);

const tr1 = document.createElement("tr");
const tr2 = document.createElement("tr");
table.append(tr1);
table.append(tr2);

const td1 = document.createElement("td");
td1.innerHTML = "No";
const td2 = document.createElement("td");
td2.innerHTML = "Nama";
const td3 = document.createElement("td");
td1.innerHTML = "1";
const td4 = document.createElement("td");
td2.innerHTML = "Syifa Hani Hurul Aini";
