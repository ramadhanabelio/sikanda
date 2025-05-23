// 1. Cek scroll tabel
document.addEventListener("DOMContentLoaded", function () {
    const tableWrapper = document.querySelector(".table-wrapper");
    if (tableWrapper) {
        const table = tableWrapper.querySelector("table");

        function checkScroll() {
            if (table.offsetWidth > tableWrapper.offsetWidth) {
                tableWrapper.classList.add("scrollable");
            } else {
                tableWrapper.classList.remove("scrollable");
            }
        }

        checkScroll();
        window.addEventListener("resize", checkScroll);
    }
});

// 2. Tampilkan form tambah
document.addEventListener("DOMContentLoaded", function () {
    const btnTambah = document.getElementById("btn-tambah");
    const btnBatal = document.getElementById("btn-batal");
    const formTambah = document.getElementById("form-tambah");

    if (btnTambah && btnBatal && formTambah) {
        btnTambah.addEventListener("click", function () {
            formTambah.style.display = "block";
            btnTambah.style.display = "none";
        });

        btnBatal.addEventListener("click", function () {
            formTambah.style.display = "none";
            btnTambah.style.display = "inline-block";
        });
    }
});

// 3. Tampilkan date picker saat fokus
document.addEventListener("DOMContentLoaded", function () {
    const tanggalInput = document.getElementById("tanggal_anggaran");
    if (tanggalInput) {
        tanggalInput.addEventListener("focus", function () {
            this.showPicker?.(); // showPicker bisa tidak tersedia di semua browser
        });
    }
});

// 4. Hitung jumlah anggaran otomatis
document.addEventListener("DOMContentLoaded", function () {
    const volumeInput = document.getElementById("volume");
    const hargaInput = document.getElementById("harga");
    const jumlahInput = document.getElementById("jumlah_anggaran");

    if (volumeInput && hargaInput && jumlahInput) {
        function updateJumlah() {
            const volume = parseFloat(volumeInput.value) || 0;
            const harga = parseFloat(hargaInput.value) || 0;
            const jumlah = volume * harga;
            jumlahInput.value = jumlah.toFixed(2);
        }

        volumeInput.addEventListener("input", updateJumlah);
        hargaInput.addEventListener("input", updateJumlah);
    }
});
