document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('productForm');
    const namaProduk = document.getElementById('namaProduk');
    const deskripsi = document.getElementById('deskripsi');
    const kategori = document.getElementById('kategori');
    const subKategori = document.getElementById('subKategori');
    const hargaSatuan = document.getElementById('hargaSatuan');
    const hargaGrosir = document.getElementById('hargaGrosir');
    const captchaText = document.getElementById('captchaText');
    const captchaInput = document.getElementById('captchaInput');
    
    // Subkategori options based on Kategori selection
    const subKategoriOptions = {
        "Baju": ["Baju Pria", "Baju Wanita", "Baju Anak"],
        "Elektronik": ["Mesin Cuci", "Kulkas", "AC"],
        "Alat Tulis": ["Kertas", "Map", "Pulpen"]
    };
    
    kategori.addEventListener('change', function() {
        const selectedKategori = kategori.value;
        subKategori.innerHTML = '<option value="">--Pilih Sub Kategori--</option>';
        if (subKategoriOptions[selectedKategori]) {
            subKategoriOptions[selectedKategori].forEach(function(sub) {
                const option = document.createElement('option');
                option.value = sub;
                option.textContent = sub;
                subKategori.appendChild(option);
            });
        }
    });
    
    // Generate random captcha
    function generateCaptcha() {
        let captcha = '';
        for (let i = 0; i < 5; i++) {
            captcha += String.fromCharCode(65 + Math.floor(Math.random() * 26));
        }
        captchaText.value = captcha;
    }
    
    generateCaptcha();
    
    form.addEventListener('submit', function(event) {
        let isValid = true;

        // Nama Produk validation
        if (namaProduk.value.length < 5 || namaProduk.value.length > 30) {
            isValid = false;
            alert("Nama produk harus diisi, minimal 5 karakter, maksimal 30 karakter.");
        }

        // Deskripsi validation
        if (deskripsi.value.length < 5 || deskripsi.value.length > 100) {
            isValid = false;
            alert("Deskripsi harus diisi, minimal 5 karakter, maksimal 100 karakter.");
        }

        // Kategori validation
        if (kategori.value === "") {
            isValid = false;
            alert("Kategori harus diisi.");
        }

        // Sub Kategori validation
        if (subKategori.value === "") {
            isValid = false;
            alert("Sub kategori harus diisi sesuai dengan kategori yang dipilih.");
        }

        // Harga Satuan validation
        if (isNaN(hargaSatuan.value) || hargaSatuan.value === "") {
            isValid = false;
            alert("Harga satuan harus diisi dengan nilai numerik.");
        }

        // Grosir and Harga Grosir validation
        const grosir = form.elements['grosir'].value;
        if (grosir === "Ya" && (isNaN(hargaGrosir.value) || hargaGrosir.value === "")) {
            isValid = false;
            alert("Harga grosir harus diisi jika Grosir adalah Ya.");
        }

        // Jasa Kirim validation
        const jasaKirimChecked = form.querySelectorAll('input[name="jasaKirim"]:checked').length;
        if (jasaKirimChecked < 3) {
            isValid = false;
            alert("Minimal jasa kirim yang dipilih adalah 3.");
        }

        // Captcha validation
        if (captchaInput.value !== captchaText.value) {
            isValid = false;
            alert("Captcha tidak sesuai.");
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
