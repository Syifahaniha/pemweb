const tulis = document.getElementById("lat1")
tulis.innerHTML = "Syifahhhh, tulisan memlalui DOM"

const h1 = document.getElementsByTagName("h1")
const tulish1 = document.getElementById("h1")
tulish1.innerHTML = ""
for(let i=0; i<10; i++){
    tulish1.innerHTML += h1[0].innerHTML + "<br>"
}