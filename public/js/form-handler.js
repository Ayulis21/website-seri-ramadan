// function showSection(sectionNumber) {
//     // Update nilai input hidden
//     document.getElementById("activeSection").value = sectionNumber;
//     document.getElementById("sectionTitle").innerText = sectionNumber;
//     document.getElementById("simpanButton").innerText =
//         "Simpan Section " + sectionNumber;

//     // Ukuran gambar berdasarkan section
//     let ukuranGambar = {
//         1: "Ukuran gambar: 5640x2030 px",
//         2: "Ukuran gambar: 38x3260 px",
//         3: "Ukuran gambar: 4290x3260 px",
//         4: "Ukuran gambar: 6760x2780 px",
//         5: "Ukuran gambar: 6760x2780 px",
//     };

//     // Perbarui hint ukuran gambar
//     document.getElementById("gambarHint").innerText =
//         ukuranGambar[sectionNumber] || "";

//     // Hapus kelas "active" dari semua list item
//     document.querySelectorAll(".list-group-item").forEach((item) => {
//         item.classList.remove("active");
//     });

//     // Tambahkan kelas "active" pada section yang diklik
//     document
//         .querySelectorAll(".list-group-item")
//         [sectionNumber - 1].classList.add("active");

//     // Update nilai input hidden
//     document.getElementById("activeSection").value = sectionNumber;
//     document.getElementById("sectionTitle").innerText = sectionNumber;

//     // Hapus "active" dari semua list item
//     document.querySelectorAll(".list-group-item").forEach((item) => {
//         item.classList.remove("active");
//     });

//     // Tambahkan "active" pada section yang diklik
//     let selectedItem =
//         document.querySelectorAll(".list-group-item")[sectionNumber - 1];
//     selectedItem.classList.add("active");
// }
