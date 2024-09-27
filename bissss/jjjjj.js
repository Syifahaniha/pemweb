function createTable() {
  const tableContainer = document.getElementById("tableContainer");

  // Create table element
  const table = document.createElement("table");

  // Create table header

  const thead = document.createElement("thead");
  const headerRow = document.createElement("tr");
  const headers = ["NO", "NAMA", "NIM", "PRODI", "Kelas"];

  headers.forEach((headerText) => {
    const th = document.createElement("th");
    th.textContent = headerText;
    headerRow.appendChild(th);
  });

  thead.appendChild(headerRow);
  table.appendChild(thead);

  // Create table body
  const tbody = document.createElement("tbody");

  // Sample data for the table
  const students = [
    {
      no: 1,
      Nama: "Syifa Hani Hurul Aini",
      NIM: "2308157",
      Prodi: "Sistem Informasi Kelautan",
    },
    {
      no: 2,
      Nama: "Syifa",
      NIM: "2308157",
      Prodi: "Sistem Informasi Kelautan",
    },
    {
      no: 3,
      Nama: "Syifa Hani",
      NIM: "2308157",
      Prodi: "Sistem Informasi Kelautan",
    },
    {
      no: 4,
      Nama: "Syifa Hani Hurul",
      NIM: "2308157",
      Prodi: "Sistem Informasi Kelautan",
    },
    {
      no: 5,
      Nama: "Syifa Hani Hurul Aini",
      NIM: "2308157",
      Prodi: "Sistem Informasi Kelautan",
    },
  ];

  // Fill the table with student data
  students.forEach((student) => {
    const row = document.createElement("tr");

    // Add each student property to a cell
    Object.values(student)
      .slice(0, 5)
      .forEach((value) => {
        const td = document.createElement("td");
        td.textContent = value;
        row.appendChild(td);
      });

    // Create the action cell with a link
    const actionCell = document.createElement("td");
    const link = document.createElement("a");
    link.textContent = "Detail";
    link.href = "#"; // Prevent default link behavior

    // Different actions based on the student
    link.addEventListener("click", (e) => {
      e.preventDefault(); // Prevent default link action
      switch (student.no) {
        case 1:
          alert(`Syifa's PRODI: ${student.NIM}`);
          break;
        case 2:
          row.style.backgroundColor = "#95A5A6"; // Change row color
          break;
        case 3:
          const moon = document.createElement("span");
          moon.textContent = "🌙🌙🌙🌙🌙"; // Ganti bintang dengan emot bulan
          row.cells[2].appendChild(moon);
          break;
        case 4:
          createHearts(300); // Create 10 hearts falling from the top
          break;
        case 5:
          row.style.display = "none"; // Hide the row without alert
          break;
        default:
          break;
      }
    });

    actionCell.appendChild(link);
    row.appendChild(actionCell);
    tbody.appendChild(row);
  });

  table.appendChild(tbody);
  tableContainer.appendChild(table);
}

// Function to create heart elements
function createHearts(count) {
  for (let i = 0; i < count; i++) {
    const heart = document.createElement("span");
    heart.textContent = "❤"; // Heart emoji
    heart.className = "heart";

    // Randomize horizontal position
    heart.style.left = Math.random() * 100 + "vw";

    // Append heart to the body
    document.body.appendChild(heart);

    // Set timeout to remove heart after animation
    setTimeout(() => {
      heart.remove();
    }, 1500); // Match this to the animation duration
  }
}

createTable();
