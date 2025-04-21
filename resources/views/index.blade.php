<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penyewaan Komponen Elektronika</title>
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/st_ico.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5 mb-5">
        <div class="card border-0 mx-auto" style="max-width: 720px;">
            <div class="card-header text-white text-center">
                <h4 class="mb-0 fw-bold">Penyewaan Komponen Elektronika - SolveThink</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('penyewaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_penyewa" id="nama_penyewa" required>
                        <label for="nama"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" placeholder="No WhatsApp" name="no_penyewa" id="no_penyewa" required>
                        <label for="whatsapp"><i class="fab fa-whatsapp me-2"></i>No WhatsApp</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat_penyewa" id="alamat_penyewa" style="height: 100px" required></textarea>
                        <label for="alamat"><i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap</label>
                    </div>

                    <div class="accordion" id="komponenAccordion">
                        <!-- Komponen: Microcontroller -->
                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseMicrocontroller" aria-expanded="false" aria-controls="collapseMicrocontroller">
                                    <i class="fas fa-microchip me-2"></i> Microcontroller
                                </button>
                            </h2>
                            <div id="collapseMicrocontroller" class="accordion-collapse collapse" data-bs-parent="#komponenAccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <!-- Info Komponen -->
                                        @foreach ($barangMicrocontroller as $d)
                                        @php
                                            $stok = $stokPerBarang[$d->id_nama_barang] ?? 0;
                                        @endphp
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">{{ $d->namaBarang->nama_barang ?? '-' }}</span>
                                            <small class="text-muted">
                                                Rp. {{ number_format($d->harga_jual_barang, 0, ',', '.') }}/Minggu
                                            </small>
                                            @if (!empty($d->namaBarang->deskripsi))
                                                <a href="{{ $d->namaBarang->deskripsi }}" target="_blank" class="btn btn-sm btn-primary">
                                                    Detail
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" data-nama="{{ $d->namaBarang->nama_barang }}" data-harga="{{ $d->harga_jual_barang }}" data-stok="{{ $stok }}">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-komponen" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-minggu" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                    @foreach ($barangSensor as $d)
                                    @php
                                        $stok = $stokPerBarang[$d->id_nama_barang] ?? 0;
                                    @endphp
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">{{ $d->namaBarang->nama_barang ?? '-' }}</span>
                                            <small class="text-muted">
                                                Rp. {{ number_format($d->harga_jual_barang, 0, ',', '.') }}/Minggu
                                            </small>
                                            @if (!empty($d->namaBarang->deskripsi))
                                                <a href="{{ $d->namaBarang->deskripsi }}" target="_blank" class="btn btn-sm btn-primary">
                                                    Detail
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" data-nama="{{ $d->namaBarang->nama_barang }}" data-harga="{{ $d->harga_jual_barang }}" data-stok="{{ $stok }}">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-komponen" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-minggu" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        @foreach ($barangActuator as $d)
                                        @php
                                            $stok = $stokPerBarang[$d->id_nama_barang] ?? 0;
                                        @endphp
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">{{ $d->namaBarang->nama_barang ?? '-' }}</span>
                                            <small class="text-muted">
                                                Rp. {{ number_format($d->harga_jual_barang, 0, ',', '.') }}/Minggu
                                            </small>
                                            @if (!empty($d->namaBarang->deskripsi))
                                                <a href="{{ $d->namaBarang->deskripsi }}" target="_blank" class="btn btn-sm btn-primary">
                                                    Detail
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" data-nama="{{ $d->namaBarang->nama_barang }}" data-harga="{{ $d->harga_jual_barang }}" data-stok="{{ $stok }}">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-komponen" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-minggu" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        @foreach ($barangPower as $d)
                                        @php
                                            $stok = $stokPerBarang[$d->id_nama_barang] ?? 0;
                                        @endphp
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">{{ $d->namaBarang->nama_barang ?? '-' }}</span>
                                            <small class="text-muted">
                                                Rp. {{ number_format($d->harga_jual_barang, 0, ',', '.') }}/Minggu
                                            </small>
                                            @if (!empty($d->namaBarang->deskripsi))
                                                <a href="{{ $d->namaBarang->deskripsi }}" target="_blank" class="btn btn-sm btn-primary">
                                                    Detail
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" data-nama="{{ $d->namaBarang->nama_barang }}" data-harga="{{ $d->harga_jual_barang }}" data-stok="{{ $stok }}">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-komponen" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-minggu" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        @foreach ($barangEquipment as $d)
                                        @php
                                            $stok = $stokPerBarang[$d->id_nama_barang] ?? 0;
                                        @endphp
                                        <div class="col-md-6 mb-3">
                                            <span class="fw-medium d-block">{{ $d->namaBarang->nama_barang ?? '-' }}</span>
                                            <small class="text-muted">
                                                Rp. {{ number_format($d->harga_jual_barang, 0, ',', '.') }}/Minggu
                                            </small>
                                            @if (!empty($d->namaBarang->deskripsi))
                                                <a href="{{ $d->namaBarang->deskripsi }}" target="_blank" class="btn btn-sm btn-primary">
                                                    Detail
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" data-nama="{{ $d->namaBarang->nama_barang }}" data-harga="{{ $d->harga_jual_barang }}" data-stok="{{ $stok }}">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Komponen</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-komponen" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label small">Jumlah Minggu</label>
                                                    <div class="input-group qty-input">
                                                        <button class="btn btn-outline-danger btn-minus" type="button">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center qty-minggu" value="0" readonly>
                                                        <button class="btn btn-outline-success btn-plus" type="button">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="penyewaan" id="inputPenyewaan">

                    <div class="alert-total text-center fw-bold mt-3 mb-1">
                        <i class="fas fa-shopping-cart me-2"></i> Total Harga: Rp. 0
                    </div>
                    <i class="class">*Harga belum termasuk ongkir jika di luar Telkom University Bandung (Sukabirus dan Sukapura)</i><br>
                    <i class="class">*Ongkir akan diberitahu oleh admin kami setelah melakukan pemesanan</i><br>

                    <input type="hidden" name="total_harga" id="inputTotalHarga">

                    <button type="button" class="btn btn-warning w-100 mb-3 py-2 mt-3" data-bs-toggle="modal" data-bs-target="#qrisModal">
                        <i class="fas fa-qrcode me-2"></i> QRIS
                    </button>

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
                                    <p class="mb-0 text-muted">Scan QR Code menggunakan aplikasi e-wallet/m-banking Anda.</p>
                                    <p class="mb-0 text-muted">Bayar sesuai total harga yang tertera.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Bukti Bayar -->
                    <label class="btn upload-btn w-100 position-relative mb-1">
                        <i class="fas fa-upload me-2"></i> Upload Bukti Bayar
                        <input type="file" name="bukti_pembayaran_penyewa" id="bukti_pembayaran_penyewa" class="d-none">
                        <span class="file-name d-block mt-2 small text-muted">Belum ada file dipilih</span>
                    </label>
                    <i class="class">*Kosongkan jika pembayaran melalui cash</i>

                    <!-- Upload Bukti Identitas -->
                    <label class="btn upload-btn w-100 position-relative mt-3">
                        <i class="fas fa-upload me-2"></i> Upload Kartu Pelajar/KTM/KTP
                        <input type="file" name="bukti_identitas_penyewa" id="bukti_identitas_penyewa" class="d-none">
                        <span class="file-name d-block mt-2 small text-muted">Belum ada file dipilih</span>
                    </label>

                    <div class="mt-3 mb-3">
                        <p class="mb-2 fw-medium">Metode Pengiriman:</p>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check shipping-option ps-0">
                                <input class="form-check-input" type="radio" name="pengambilan_barang_penyewa" value="Pesanan Diantar" id="pengambilan_barang_penyewa">
                                <label class="form-check-label d-flex align-items-center bg-primary text-white p-2" style="width: 200px;" for="pengambilan_barang_penyewa">
                                    <i class="fas fa-truck me-2 text-white"></i> Pesanan Diantar
                                </label>
                            </div>
                            <div class="form-check shipping-option ps-0">
                                <input class="form-check-input" type="radio" name="pengambilan_barang_penyewa" value="Ambil di Toko" id="pengambilan_barang_penyewa">
                                <label class="form-check-label d-flex align-items-center bg-primary text-white p-2" style="width: 200px;" for="pengambilan_barang_penyewa">
                                    <i class="fas fa-store me-2 text-white"></i> Ambil di Toko
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success submit-btn w-100 mt-3">
                        <i class="fas fa-paper-plane me-2"></i> KIRIM PESANAN
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
                                <div class="modal-footer justify-content-center gap-3 flex-wrap">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-success" id="confirmSubmitBtn">Ya, Lanjutkan</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <div class="modal-footer d-flex justify-content-center gap-3 flex-wrap">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-2"></i> Tutup
                                    </button>
                                    <a id="whatsappLink" href="#" target="_blank" class="btn btn-success">
                                        <i class="fab fa-whatsapp me-2"></i> Konfirmasi Pemesanan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Error -->
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="errorModalLabel"><i class="fas fa-times-circle me-3"></i> Gagal Mengirim</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p class="mb-0">Pesanan gagal dikirim.</p>
                                    <p class="mb-0">Silahkan kembali buat pesanan dan cek kembali pesanan Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = new bootstrap.Modal(document.getElementById('pesananModal'));
    modal.show();

    // Ambil data dari sessionStorage
    const nama = sessionStorage.getItem('wa_nama') || '(Nama belum diisi)';
    const alamat = sessionStorage.getItem('wa_alamat') || '(Alamat belum diisi)';
    const pengambilan = sessionStorage.getItem('wa_pengambilan') || '(Metode belum dipilih)';

    // Format pesan
    const message = `Halo Admin, saya ingin konfirmasi pesanan penyewaan komponen elektronika.\n\n` +
                    `Nama: ${nama}\n` +
                    `Alamat: ${alamat}\n` +
                    `Pengambilan: ${pengambilan}`;

    // Set href WhatsApp
    const waLink = document.getElementById('whatsappLink');
    waLink.href = `https://wa.me/6281356565025?text=${encodeURIComponent(message)}`;

    // Bersihkan sessionStorage agar tidak tersisa
    sessionStorage.removeItem('wa_nama');
    sessionStorage.removeItem('wa_alamat');
    sessionStorage.removeItem('wa_pengambilan');
});
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
    });
</script>
@endif

<script>
    // Event delegation untuk tombol plus dan minus
    document.addEventListener('DOMContentLoaded', function () {
        function updateTotalHargaDanPenyewaan() {
            let total = 0;
            let penyewaanList = [];

            document.querySelectorAll('.row[data-nama]').forEach(function (group) {
                const nama = group.dataset.nama;
                const harga = parseInt(group.dataset.harga) || 0;
                const stok = parseInt(group.dataset.stok) || 0;

                const qtyKomponenInput = group.querySelector('.qty-komponen');
                const qtyMingguInput = group.querySelector('.qty-minggu');

                const jumlahKomponen = parseInt(qtyKomponenInput.value) || 0;
                const jumlahMinggu = parseInt(qtyMingguInput.value) || 0;

                if (jumlahKomponen > 0 && jumlahMinggu > 0) {
                    const subtotal = jumlahKomponen * jumlahMinggu * harga;
                    total += subtotal;
                    penyewaanList.push(`${nama}: ${jumlahKomponen}, Jumlah Minggu: ${jumlahMinggu}.`);
                }
            });

            // Format rupiah
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            document.querySelector('.alert-total').innerHTML =
                `<i class="fas fa-shopping-cart me-2"></i> Total Harga: ${formatter.format(total)}`;

            document.getElementById('inputPenyewaan').value = penyewaanList.join(', ');
            document.getElementById('inputTotalHarga').value = total;
        }

        // Tombol untuk komponen
        document.querySelectorAll('.qty-komponen').forEach(function (input) {
            const group = input.closest('[data-nama]');
            const stok = parseInt(group.dataset.stok) || 0;

            const minusBtn = group.querySelectorAll('.btn-minus')[0];
            const plusBtn = group.querySelectorAll('.btn-plus')[0];

            minusBtn.addEventListener('click', function () {
                let val = parseInt(input.value);
                if (val > 0) {
                    input.value = val - 1;
                    updateTotalHargaDanPenyewaan();
                }
            });

            plusBtn.addEventListener('click', function () {
                let val = parseInt(input.value);
                if (val < stok) {
                    input.value = val + 1;
                    updateTotalHargaDanPenyewaan();
                }
            });
        });

        // Tombol untuk minggu (tanpa batasan)
        document.querySelectorAll('.qty-minggu').forEach(function (input) {
            const group = input.closest('[data-nama]');
            const minusBtn = group.querySelectorAll('.btn-minus')[1];
            const plusBtn = group.querySelectorAll('.btn-plus')[1];

            minusBtn.addEventListener('click', function () {
                let val = parseInt(input.value);
                if (val > 0) {
                    input.value = val - 1;
                    updateTotalHargaDanPenyewaan();
                }
            });

            plusBtn.addEventListener('click', function () {
                let val = parseInt(input.value);
                input.value = val + 1;
                updateTotalHargaDanPenyewaan();
            });
        });

        // Hitung ulang sebelum submit
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function () {
                updateTotalHargaDanPenyewaan();
            });
        }

        updateTotalHargaDanPenyewaan();
    });

    document.querySelectorAll('input[type="file"]').forEach(function (input) {
        input.addEventListener('change', function (e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
            e.target.parentElement.querySelector('.file-name').textContent = fileName;
        });
    });

    confirmSubmitBtn.addEventListener('click', function () {
        document.querySelector('form').submit(); // Kirim form Laravel
    });

    document.addEventListener('DOMContentLoaded', function () {
        const submitBtn = document.querySelector('.submit-btn');
        const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
        const confirmModalElement = document.getElementById('confirmSubmitModal');
        const form = document.querySelector('form');

        // Step 1: Tampilkan modal konfirmasi
        submitBtn.addEventListener('click', function (event) {
            event.preventDefault();
            const confirmModal = new bootstrap.Modal(confirmModalElement);
            confirmModal.show();
        });

        // Step 2: Simpan data ke sessionStorage lalu submit form
        confirmSubmitBtn.addEventListener('click', function () {
            // Ambil data dari input sebelum submit
            const nama = document.getElementById('nama_penyewa')?.value.trim() || '(Nama belum diisi)';
            const alamat = document.getElementById('alamat_penyewa')?.value.trim() || '(Alamat belum diisi)';
            const pengambilan = document.querySelector('input[name="pengambilan_barang_penyewa"]:checked')?.value || '(Metode belum dipilih)';

            // Simpan ke sessionStorage
            sessionStorage.setItem('wa_nama', nama);
            sessionStorage.setItem('wa_alamat', alamat);
            sessionStorage.setItem('wa_pengambilan', pengambilan);

            // Submit form
            form.submit();
        });
    });
</script>

</body>
</html>