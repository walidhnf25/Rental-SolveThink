<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penyewaan Komponen Elektronika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5 mb-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card border-0 mx-auto" style="max-width: 700px;">
            <div class="card-header text-white text-center">
                <h4 class="mb-0 fw-bold">Penyewaan Komponen Elektronika</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('penyewaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" required>
                        <label for="nama"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="whatsapp" placeholder="No WhatsApp" name="whatsapp" required>
                        <label for="whatsapp"><i class="fab fa-whatsapp me-2"></i>No WhatsApp</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <textarea class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat" style="height: 100px" required></textarea>
                        <label for="alamat"><i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap</label>
                    </div>

                    <div class="accordion" id="komponenAccordion">
                        <!-- Komponen: Microcontroller -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseMicrocontroller" aria-expanded="true" aria-controls="collapseMicrocontroller">
                                    <i class="fas fa-microchip me-2"></i> Microcontroller
                                </button>
                            </h2>
                            <div id="collapseMicrocontroller" class="accordion-collapse collapse show" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <!-- Info Komponen -->
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">Arduino UNO R3</span>
                                            <small class="text-muted">Rp. 75.000/Minggu</small>
                                        </div>
                                        <!-- Input Jumlah & Minggu -->
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('komponen_microcontroller')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="komponen_microcontroller" value="0" oninput="validateInput('komponen_microcontroller')" onblur="validateInput('komponen_microcontroller')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('komponen_microcontroller')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('minggu_microcontroller')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="minggu_microcontroller" value="0" oninput="validateInput('minggu_microcontroller')" onblur="validateInput('minggu_microcontroller')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('minggu_microcontroller')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                </div>
                            </div>
                        </div>

                        <!-- Komponen: Sensor -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSensor" aria-expanded="false" aria-controls="collapseSensor">
                                    <i class="fas fa-thermometer-half me-2"></i> Sensor
                                </button>
                            </h2>
                            <div id="collapseSensor" class="accordion-collapse collapse" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">DHT11 (Temperature & Humidity)</span>
                                            <small class="text-muted">Rp. 20.000/Minggu</small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('komponen_sensor')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="komponen_sensor" value="0" oninput="validateInput('komponen_sensor')" onblur="validateInput('komponen_sensor')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('komponen_sensor')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('minggu_sensor')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="minggu_sensor" value="0" oninput="validateInput('minggu_sensor')" onblur="validateInput('minggu_sensor')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('minggu_sensor')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Komponen: Actuator -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseActuator" aria-expanded="false" aria-controls="collapseActuator">
                                    <i class="fas fa-cogs me-2"></i> Actuator
                                </button>
                            </h2>
                            <div id="collapseActuator" class="accordion-collapse collapse" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">Servo Motor SG90</span>
                                            <small class="text-muted">Rp. 30.000/Minggu</small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('komponen_actuator')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="komponen_actuator" value="0" oninput="validateInput('komponen_actuator')" onblur="validateInput('komponen_actuator')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('komponen_actuator')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('minggu_actuator')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="minggu_actuator" value="0" oninput="validateInput('minggu_actuator')" onblur="validateInput('minggu_actuator')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('minggu_actuator')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Komponen: Power -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePower" aria-expanded="false" aria-controls="collapsePower">
                                    <i class="fas fa-bolt me-2"></i> Power
                                </button>
                            </h2>
                            <div id="collapsePower" class="accordion-collapse collapse" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">Battery Li-Ion 18650</span>
                                            <small class="text-muted">Rp. 15.000/Minggu</small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('komponen_power')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="komponen_power" value="0" oninput="validateInput('komponen_power')" onblur="validateInput('komponen_power')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('komponen_power')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('minggu_power')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="minggu_power" value="0" oninput="validateInput('minggu_power')" onblur="validateInput('minggu_power')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('minggu_power')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Komponen: Equipment -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEquipment" aria-expanded="false" aria-controls="collapseEquipment">
                                    <i class="fas fa-tools me-2"></i> Equipment
                                </button>
                            </h2>
                            <div id="collapseEquipment" class="accordion-collapse collapse" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">Solder Listrik 40W</span>
                                            <small class="text-muted">Rp. 25.000/Minggu</small>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('komponen_equipment')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="komponen_equipment" value="0" oninput="validateInput('komponen_equipment')" onblur="validateInput('komponen_equipment')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('komponen_equipment')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger" type="button" onclick="decreaseValue('minggu_equipment')"><i class="fas fa-minus"></i></button>
                                                        <input type="text" class="form-control text-center" id="minggu_equipment" value="0" oninput="validateInput('minggu_equipment')" onblur="validateInput('minggu_equipment')">
                                                        <button class="btn btn-outline-success" type="button" onclick="increaseValue('minggu_equipment')"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="alert-total text-center fw-bold mt-4 mb-4">
                        <i class="fas fa-shopping-cart me-2"></i> Total Harga: Rp. 0
                    </div>

                    <button type="button" class="btn btn-warning w-100 mb-3 py-2" data-bs-toggle="modal" data-bs-target="#qrisModal">
                        <i class="fas fa-qrcode me-2"></i> QRIS
                    </button>
                    <!-- Modal Konfirmasi Sebelum Kirim -->
                    <div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-labelledby="confirmSubmitModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="confirmSubmitModalLabel"><i class="fas fa-question-circle me-2"></i>Konfirmasi Pesanan</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p class="mb-0">Apakah Anda yakin ingin menyelesaikan pesanan ini?</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-success" id="confirmSubmitBtn">Ya, Lanjutkan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- QRIS Modal -->
                    <div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="qrisModalLabel"><i class="fas fa-qrcode me-2"></i>Scan QRIS</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-4">
                                    <img src="{{ asset('images/qris.png') }}" alt="QRIS Code" class="img-fluid mx-auto d-block mb-3" style="width: 70%;">
                                    <p class="mb-0 text-muted">Scan kode QR menggunakan aplikasi e-wallet Anda</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Bukti Bayar -->
                    <label class="btn upload-btn w-100 position-relative">
                        <i class="fas fa-upload me-2"></i> Upload Bukti Bayar
                        <input type="file" name="bukti_bayar" class="d-none">
                        <span class="file-name d-block mt-2 small text-muted">Belum ada file dipilih</span>
                    </label>

                    <!-- Upload KTM/KTP -->
                    <label class="btn upload-btn w-100 position-relative mt-3">
                        <i class="fas fa-id-card me-2"></i> Upload KTM/KTP
                        <input type="file" name="ktm_ktp" class="d-none" accept=".jpg,.jpeg,.png,.pdf">
                        <span class="file-name d-block mt-2 small text-muted">Belum ada file dipilih</span>
                    </label>

                    <div class="mt-4 mb-3">
                        <p class="mb-2 fw-medium">Metode Pengiriman:</p>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check shipping-option ps-0">
                                <input class="form-check-input" type="radio" name="pengiriman" value="diantar" id="diantar">
                                <label class="form-check-label d-flex align-items-center p-2" for="diantar">
                                    <i class="fas fa-truck me-2 text-primary"></i> Pesanan Diantar
                                </label>
                            </div>
                            <div class="form-check shipping-option ps-0">
                                <input class="form-check-input" type="radio" name="pengiriman" value="ambil" id="ambil">
                                <label class="form-check-label d-flex align-items-center p-2" for="ambil">
                                    <i class="fas fa-store me-2 text-primary"></i> Ambil di Toko
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success submit-btn w-100 mt-3">
                        <i class="fas fa-paper-plane me-2"></i> KIRIM PESANAN
                    </button>

                    <!-- Modal Konfirmasi WhatsApp -->
                    <div class="modal fade" id="pesananModal" tabindex="-1" aria-labelledby="pesananModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="pesananModalLabel"><i class="fas fa-exclamation-circle me-2"></i> Konfirmasi Sewa</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body text-start p-4">
                                    <p class="mb-2"><i class="fas fa-check-circle me-2 text-success"></i>Terimakasih telah melakukan pemesanan.</p>
                                    <p class="mb-3"><i class="fas fa-bell me-2 text-warning"></i>Harap konfirmasi pesanan anda ke WhatsApp Admin agar dapat diproses.</p>
                                    <p class="mb-1"><strong><i class="fas fa-list-alt me-2"></i>Format Konfirmasi:</strong></p>
                                    <small>
                                        <i class="fas fa-user me-2"></i> Nama: (Nama Anda)<br>
                                        <i class="fas fa-map-marker-alt me-2"></i> Alamat: (Alamat Anda)<br>
                                        <i class="fas fa-truck me-2"></i> Pengambilan: Diantar / Ambil di Toko
                                    </small>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" id="backToOrderBtn" class="btn btn-secondary">
                                        <i class="fas fa-rotate-left me-2"></i> Kembali ke Form
                                    </button>
                                    <a id="whatsappLink" href="#" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp me-2"></i>Konfirmasi Pemesanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function increaseValue(id) {
        let input = document.getElementById(id);
        let value = parseInt(input.value) || 0;
        input.value = value + 1;
    }

    function decreaseValue(id) {
        let input = document.getElementById(id);
        let value = parseInt(input.value) || 0;
        if (value > 0) {
            input.value = value - 1;
        }
    }

    function validateInput(id) {
        let input = document.getElementById(id);
        let value = input.value;

        value = value.replace(/[^0-9]/g, '');

        let number = parseInt(value);

        if (isNaN(number) || number < 0) {
            input.value = 0;
        } else {
            input.value = number;
        }
    }

    document.querySelector('input[type="file"]').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
        e.target.parentElement.querySelector('.file-name').textContent = fileName;
    });

    document.addEventListener('DOMContentLoaded', function () {
    let tempData = {}; // Data disimpan sementara

    // Saat tombol "KIRIM PESANAN" diklik
    document.querySelector('.submit-btn').addEventListener('click', function (event) {
        event.preventDefault();

        let nama = document.getElementById('nama').value;
        let alamat = document.getElementById('alamat').value;
        let pengiriman = document.querySelector('input[name="pengiriman"]:checked')?.value || "Belum Dipilih";

        if (!nama || !alamat || pengiriman === "Belum Dipilih") {
            alert("Harap lengkapi semua data sebelum mengirim!");
            return;
        }

        // Simpan data untuk nanti
        tempData = { nama, alamat, pengiriman };

        // Tampilkan modal konfirmasi custom
        let confirmModal = new bootstrap.Modal(document.getElementById('confirmSubmitModal'));
        confirmModal.show();
    });

    // Ketika user klik "Ya, Lanjutkan" di modal konfirmasi
    document.getElementById('confirmSubmitBtn').addEventListener('click', function () {
        let { nama, alamat, pengiriman } = tempData;

        let message = `Halo Admin, saya ingin konfirmasi pesanan.\n\nNama: ${nama}\nAlamat: ${alamat}\nPengambilan: ${pengiriman}`;
        let whatsappURL = `https://wa.me/6281293768288?text=${encodeURIComponent(message)}`;

        document.getElementById('whatsappLink').href = whatsappURL;

        // Tutup modal konfirmasi
        bootstrap.Modal.getInstance(document.getElementById('confirmSubmitModal')).hide();

        // Tampilkan modal konfirmasi WhatsApp
        let pesananModal = new bootstrap.Modal(document.getElementById('pesananModal'));
        pesananModal.show();
    });

    document.querySelector('#pesananModal .btn-close').addEventListener('click', function () {
    setTimeout(() => {
        location.reload();
    }, 300); // kasih jeda sedikit agar animasi modal selesai
});

    document.getElementById('backToOrderBtn').addEventListener('click', function () {
    location.reload(); // Reload halaman
});

    // Saat klik WhatsApp
    document.getElementById('whatsappLink').addEventListener('click', function () {
        bootstrap.Modal.getInstance(document.getElementById('pesananModal')).hide();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Wait a short moment to ensure all elements are fully loaded
    setTimeout(function() {
        console.log("Attempting to find KTM/KTP input with delay");

        // Try to get all file inputs and find the right one
        const allFileInputs = document.querySelectorAll('input[type="file"]');
        console.log("Found", allFileInputs.length, "file inputs on page");

        allFileInputs.forEach(function(input, index) {
            console.log(`File input #${index}:`, input.name, input);

            // Check if this is our KTM/KTP input
            if (input.name === "ktm_ktp") {
                console.log("Found KTM/KTP input, attaching event listener");

                input.addEventListener('change', function() {
                    console.log("File changed event triggered");
                    const fileName = this.files[0] ? this.files[0].name : 'Belum ada file dipilih';
                    const label = this.closest('label');

                    if (label) {
                        const fileNameDisplay = label.querySelector('.file-name');
                        if (fileNameDisplay) {
                            fileNameDisplay.textContent = fileName;
                            console.log("Updated file name display to:", fileName);
                        } else {
                            console.error("Could not find .file-name element inside label");
                        }
                    } else {
                        console.error("Could not find parent label element");
                    }
                });
            }
        });
    }, 500); // 500ms delay
});

    </script>
</body>
</html>