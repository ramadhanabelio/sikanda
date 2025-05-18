@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Anggaran</h3>
            </div>
        </div>

        <button id="btn-tambah" class="btn btn-primary mb-3">Tambah Data Anggaran</button>

        <div class="card" id="form-tambah" style="display: none;">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Data Anggaran</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('anggaran.store') }}" method="POST">
                    @csrf

                    {{-- Tanggal --}}
                    <div class="form-group mb-3">
                        <label for="tanggal_anggaran">Tanggal Anggaran</label>
                        <input type="date" class="form-control" id="tanggal_anggaran" name="tanggal_anggaran" required>
                    </div>

                    {{-- Judul --}}
                    <div class="form-group mb-3">
                        <label for="judul">Kegiatan</label>
                        <select class="form-control" id="judul" name="judul">
                            <option value="">-- Pilih Kegiatan --</option>
                            @foreach ($judulList as $judul)
                                <option value="{{ $judul }}">{{ $judul }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control mt-2" id="judul_baru" name="judul_baru"
                            placeholder="Atau tambahkan kegiatan baru">
                    </div>

                    {{-- Sub Judul --}}
                    <div class="form-group mb-3">
                        <label for="sub_judul">Sub Kegiatan</label>
                        <select class="form-control" id="sub_judul" name="sub_judul">
                            <option value="">-- Pilih Sub Kegiatan --</option>
                            @foreach ($subJudulList as $subJudul)
                                <option value="{{ $subJudul }}">{{ $subJudul }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control mt-2" id="sub_judul_baru" name="sub_judul_baru"
                            placeholder="Atau tambahkan sub kegiatan baru">
                    </div>

                    {{-- Sub Sub Judul --}}
                    <div class="form-group mb-3">
                        <label for="sub_sub_judul">Sub Sub Kegiatan</label>
                        <select class="form-control" id="sub_sub_judul" name="sub_sub_judul">
                            <option value="">-- Pilih Sub Sub Kegiatan --</option>
                            @foreach ($subSubJudulList as $subSubJudul)
                                <option value="{{ $subSubJudul }}">{{ $subSubJudul }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control mt-2" id="sub_sub_judul_baru" name="sub_sub_judul_baru"
                            placeholder="Atau tambahkan sub sub kegiatan baru">
                    </div>

                    {{-- Uraian --}}
                    <div class="form-group mb-3">
                        <label for="uraian">Spesifikasi</label>
                        <select class="form-control" id="uraian" name="uraian">
                            <option value="">-- Pilih Spesifikasi --</option>
                            @foreach ($uraianList as $uraian)
                                <option value="{{ $uraian }}">{{ $uraian }}</option>
                            @endforeach
                        </select>
                        <textarea class="form-control mt-2" id="uraian_baru" name="uraian_baru" placeholder="Atau tambahkan spesifikasi baru"></textarea>
                    </div>

                    {{-- Volume & Satuan --}}
                    <div class="form-group mb-3">
                        <label for="volume">Volume</label>
                        <input type="number" step="0.01" class="form-control" id="volume" name="volume" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="satuan">Satuan</label>
                        <select class="form-control" id="satuan" name="satuan">
                            <option value="">-- Pilih Satuan --</option>
                            @foreach ($satuanList as $satuan)
                                <option value="{{ $satuan }}">{{ $satuan }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control mt-2" id="satuan_baru" name="satuan_baru"
                            placeholder="Atau tambahkan satuan baru">
                    </div>

                    {{-- Harga --}}
                    <div class="form-group mb-3">
                        <label for="harga">Harga Satuan</label>
                        <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
                    </div>

                    {{-- Jumlah --}}
                    <div class="form-group mb-3">
                        <label for="jumlah_anggaran">Jumlah Anggaran</label>
                        <input type="number" step="0.01" class="form-control" id="jumlah_anggaran"
                            name="jumlah_anggaran" required>
                    </div>

                    {{-- Bobot --}}
                    <div class="form-group mb-3">
                        <label for="bobot">Bobot (%)</label>
                        <input type="number" step="0.01" class="form-control" id="bobot" name="bobot">
                    </div>

                    {{-- Rencana Realisasi --}}
                    <div class="form-group mb-3">
                        <label for="volume_nominal_rr">Volume Rencana Realisasi</label>
                        <input type="number" step="0.01" class="form-control" id="volume_nominal_rr"
                            name="volume_nominal_rr">
                    </div>
                    <div class="form-group mb-3">
                        <label for="satuan_rr">Satuan Rencana Realisasi</label>
                        <input type="text" class="form-control" id="satuan_rr" name="satuan_rr">
                    </div>
                    <div class="form-group mb-3">
                        <label for="fisik_rr">Fisik Rencana Realisasi (%)</label>
                        <input type="number" step="0.01" class="form-control" id="fisik_rr" name="fisik_rr">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tertimbang_rr">Tertimbang Rencana Realisasi (%)</label>
                        <input type="number" step="0.01" class="form-control" id="tertimbang_rr"
                            name="tertimbang_rr">
                    </div>

                    {{-- Realisasi Fisik --}}
                    <div class="form-group mb-3">
                        <label for="volume_nominal_rf">Volume Realisasi Fisik</label>
                        <input type="number" step="0.01" class="form-control" id="volume_nominal_rf"
                            name="volume_nominal_rf">
                    </div>
                    <div class="form-group mb-3">
                        <label for="satuan_rf">Satuan Realisasi Fisik</label>
                        <input type="text" class="form-control" id="satuan_rf" name="satuan_rf">
                    </div>
                    <div class="form-group mb-3">
                        <label for="fisik_rf">Fisik Realisasi Fisik (%)</label>
                        <input type="number" step="0.01" class="form-control" id="fisik_rf" name="fisik_rf">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tertimbang_rf">Tertimbang Realisasi Fisik (%)</label>
                        <input type="number" step="0.01" class="form-control" id="tertimbang_rf"
                            name="tertimbang_rf">
                    </div>

                    {{-- Realisasi Keuangan --}}
                    <div class="form-group mb-3">
                        <label for="rupiah_rk">Rupiah (Rp)</label>
                        <input type="number" step="0.01" class="form-control" id="rupiah_rk" name="rupiah_rk">
                    </div>
                    <div class="form-group mb-3">
                        <label for="persentase_rk">Persentase Realisasi Keuangan (%)</label>
                        <input type="number" step="0.01" class="form-control" id="persentase_rk"
                            name="persentase_rk">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tertimbang_rk">Tertimbang Realisasi Keuangan (%)</label>
                        <input type="number" step="0.01" class="form-control" id="tertimbang_rk"
                            name="tertimbang_rk">
                    </div>

                    {{-- Sisa Anggaran --}}
                    <div class="form-group mb-3">
                        <label for="sisa_anggaran">Sisa Anggaran (Rp)</label>
                        <input type="number" step="0.01" class="form-control" id="sisa_anggaran"
                            name="sisa_anggaran">
                    </div>

                    {{-- Aksi --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" id="btn-batal" class="btn btn-dark">Batal</button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Data Anggaran</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <form action="{{ route('anggaran.index') }}" method="GET"
                            class="form-inline justify-content-end">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari Kegiatan..."
                                    value="{{ $searchTerm ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <form action="{{ route('anggaran.index') }}" method="GET" class="form-inline mb-3 px-3">
                <div class="form-group mr-2">
                    <label for="bulan" class="mr-2">Bulan:</label>
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">Pilih Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $selectedBulan == $i ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="form-group mr-2">
                    <label for="tahun" class="mr-2">Tahun:</label>
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">Pilih Tahun</option>
                        @php
                            $currentYear = date('Y');
                            $startYear = $currentYear - 5;
                            $endYear = $currentYear + 5;
                        @endphp
                        @for ($year = $startYear; $year <= $endYear; $year++)
                            <option value="{{ $year }}" {{ $selectedTahun == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Filter</button>
                <a href="{{ route('anggaran.index') }}" class="btn btn-dark">Reset</a>
            </form>

            <div class="card-body">

                <a href="{{ route('laporan.export.pdf') }}" class="btn btn-danger mb-3">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>

                <div class="table-wrapper">
                    <table class="table table-bordered table-striped anggaran-table">
                        <thead>
                            <tr class="table-white text-center align-middle">
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Tanggal Anggaran</th>
                                <th rowspan="2">Uraian</th>
                                <th rowspan="2">Pejabat / Penanggung Jawab</th>
                                <th rowspan="2">Waktu Pelaksanaan</th>
                                <th rowspan="2" class="bg-gold text-dark">Volume</th>
                                <th rowspan="2" class="bg-gold text-dark">Satuan</th>
                                <th rowspan="2" class="bg-gold text-dark">Harga Satuan</th>
                                <th rowspan="2">Jumlah Anggaran (Rp)</th>
                                <th rowspan="2" class="bg-gold text-dark">Bobot (%)</th>
                                <th colspan="4" class="bg-warning text-dark">Rencana Realisasi</th>
                                <th colspan="4" class="bg-secondary text-white">Realisasi Fisik</th>
                                <th colspan="3" class="bg-purple text-white">Realisasi Keuangan</th>
                                <th rowspan="2">Sisa Anggaran</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr class="text-center bg-light">
                                <th class="bg-warning text-dark">Volume / Nominal</th>
                                <th class="bg-warning text-dark">Satuan</th>
                                <th class="bg-warning text-dark">Fisik (%)</th>
                                <th class="bg-warning text-dark">Tertimbang (%)</th>

                                <th class="bg-secondary text-white">Volume / Nominal</th>
                                <th class="bg-secondary text-white">Satuan</th>
                                <th class="bg-secondary text-white">Fisik (%)</th>
                                <th class="bg-secondary text-white">Tertimbang (%)</th>

                                <th class="bg-purple text-white">Rupiah</th>
                                <th class="bg-purple text-white">Persentase (%)</th>
                                <th class="bg-purple text-white">Tertimbang (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $grouped = $anggarans->groupBy('judul');
                                // Calculate total budget for the entire dataset
                                $totalBudget = $anggarans->sum('jumlah_anggaran');

                                function alphabetIndex($i)
                                {
                                    return chr(96 + $i);
                                }
                            @endphp

                            @foreach ($grouped as $judul => $byJudul)
                                @php
                                    // Calculate total jumlah_anggaran for current judul
                                    $totalJudulAnggaran = $byJudul->sum('jumlah_anggaran');
                                    $totalJudulSisaAnggaran = $byJudul->sum('sisa_anggaran');
                                    // Calculate bobot for judul
                                    $bobotJudul = $totalBudget > 0 ? ($totalJudulAnggaran / $totalBudget) * 100 : 0;
                                @endphp

                                <tr style="background-color: #d6eaff; font-weight: bold;">
                                    <td colspan="8" class="bg-primary text-white">{{ $judul }}</td>
                                    <td class="bg-primary text-white text-end">
                                        {{ number_format($totalJudulAnggaran, 0, ',', '.') }}</td>
                                    <td class="bg-primary text-white text-center">{{ number_format($bobotJudul, 2) }}%
                                    </td>
                                    <td colspan="11" class="bg-primary text-white"></td>
                                    <td class="bg-primary text-white text-end">
                                        {{ number_format($totalJudulSisaAnggaran, 0, ',', '.') }}</td>
                                    <td class="bg-primary text-white"></td>
                                </tr>

                                @php
                                    $subGrouped = $byJudul->groupBy('sub_judul');
                                    $subIndex = 1;
                                @endphp

                                @foreach ($subGrouped as $subJudul => $bySubJudul)
                                    @php
                                        // Calculate total jumlah_anggaran for current sub_judul
                                        $totalSubJudulAnggaran = $bySubJudul->sum('jumlah_anggaran');
                                        $totalSubJudulSisaAnggaran = $bySubJudul->sum('sisa_anggaran');
                                        // Calculate bobot for sub_judul
                                        $bobotSubJudul =
                                            $totalBudget > 0 ? ($totalSubJudulAnggaran / $totalBudget) * 100 : 0;
                                    @endphp

                                    <tr style="background-color: #eef7ff; font-weight: bold;">
                                        <td></td>
                                        <td colspan="7" style="background-color: #eef7ff;">
                                            {{ alphabetIndex($subIndex++) }}. {{ $subJudul }}</td>
                                        <td class="text-end" style="background-color: #eef7ff;">
                                            {{ number_format($totalSubJudulAnggaran, 0, ',', '.') }}</td>
                                        <td class="text-center" style="background-color: #eef7ff;">
                                            {{ number_format($bobotSubJudul, 2) }}%</td>
                                        <td colspan="11" style="background-color: #eef7ff;"></td>
                                        <td class="text-end" style="background-color: #eef7ff;">
                                            {{ number_format($totalSubJudulSisaAnggaran, 0, ',', '.') }}</td>
                                        <td style="background-color: #eef7ff;"></td>
                                    </tr>

                                    @php
                                        $subSubGrouped = $bySubJudul->groupBy('sub_sub_judul');
                                        $subSubIndex = 1;
                                    @endphp

                                    @foreach ($subSubGrouped as $subSubJudul => $bySubSubJudul)
                                        @php
                                            // Calculate total for sub_sub_judul
                                            $totalSubSubJudulAnggaran = $bySubSubJudul->sum('jumlah_anggaran');
                                            $totalSubSubJudulSisaAnggaran = $bySubSubJudul->sum('sisa_anggaran');
                                            // Calculate bobot for sub_sub_judul
                                            $bobotSubSubJudul =
                                                $totalBudget > 0 ? ($totalSubSubJudulAnggaran / $totalBudget) * 100 : 0;
                                        @endphp

                                        <tr style="background-color: #f8f9fa;">
                                            <td></td>
                                            <td></td>
                                            <td colspan="6"><strong>{{ $subSubIndex++ }}) {{ $subSubJudul }}</strong>
                                            </td>
                                            <td class="text-end">
                                                {{ number_format($totalSubSubJudulAnggaran, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ number_format($bobotSubSubJudul, 2) }}%</td>
                                            <td colspan="11"></td>
                                            <td class="text-end">
                                                {{ number_format($totalSubSubJudulSisaAnggaran, 0, ',', '.') }}</td>
                                            <td></td>
                                        </tr>

                                        @foreach ($bySubSubJudul as $item)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}.</td>
                                                <td>{{ $item->tanggal_anggaran }}</td>
                                                <td>{{ $item->uraian }}</td>
                                                <td>{{ $item->penanggung_jawab ?? '-' }}</td>
                                                <td>{{ $item->waktu_pelaksanaan ?? '-' }}</td>
                                                <td>{{ $item->volume }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td>{{ number_format($item->jumlah_anggaran, 0, ',', '.') }}</td>
                                                <td class="text-center bobot-col">
                                                    @if ($totalBudget > 0)
                                                        {{ number_format(($item->jumlah_anggaran / $totalBudget) * 100, 2) }}%
                                                    @else
                                                        0.00%
                                                    @endif
                                                </td>

                                                {{-- Rencana Realisasi --}}
                                                <td>{{ $item->volume_nominal_rr }}</td>
                                                <td>{{ $item->satuan_rr }}</td>
                                                <td>{{ $item->fisik_rr ?? '-' }}</td>
                                                <td>{{ $item->tertimbang_rr }}</td>

                                                {{-- Realisasi Fisik --}}
                                                <td>{{ $item->volume_nominal_rf }}</td>
                                                <td>{{ $item->satuan_rf }}</td>
                                                <td>{{ $item->fisik_rf }}</td>
                                                <td>{{ $item->tertimbang_rf }}</td>

                                                {{-- Realisasi Keuangan --}}
                                                <td>{{ number_format($item->rupiah_rk, 0, ',', '.') }}</td>
                                                <td>{{ $item->persentase_rk }}</td>
                                                <td>{{ $item->tertimbang_rk }}</td>

                                                <td>{{ number_format($item->sisa_anggaran, 0, ',', '.') ?? '-' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('anggaran.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm me-1">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <form action="{{ route('anggaran.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach

                            @php
                                // Calculate grand totals
                                $grandTotalAnggaran = $anggarans->sum('jumlah_anggaran');
                                $grandTotalSisaAnggaran = $anggarans->sum('sisa_anggaran');
                            @endphp
                            <tr style="background-color: #343a40; font-weight: bold;">
                                <td colspan="8" class="text-white text-center">TOTAL KESELURUHAN</td>
                                <td class="text-white text-end">{{ number_format($grandTotalAnggaran, 0, ',', '.') }}</td>
                                <td class="text-white text-center">100.00%</td>
                                <td colspan="11" class="text-white"></td>
                                <td class="text-white text-end">{{ number_format($grandTotalSisaAnggaran, 0, ',', '.') }}
                                </td>
                                <td class="text-white"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tableWrapper = document.querySelector('.table-wrapper');
                    const table = tableWrapper.querySelector('table');

                    function checkScroll() {
                        if (table.offsetWidth > tableWrapper.offsetWidth) {
                            tableWrapper.classList.add('scrollable');
                        } else {
                            tableWrapper.classList.remove('scrollable');
                        }
                    }

                    checkScroll();

                    window.addEventListener('resize', checkScroll);
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tableWrapper = document.querySelector('.table-wrapper');
                    const table = tableWrapper.querySelector('table');

                    function checkScroll() {
                        if (table.offsetWidth > tableWrapper.offsetWidth) {
                            tableWrapper.classList.add('scrollable');
                        } else {
                            tableWrapper.classList.remove('scrollable');
                        }
                    }

                    checkScroll();

                    window.addEventListener('resize', checkScroll);
                });
            </script>

            <script>
                document.getElementById('btn-tambah').addEventListener('click', function() {
                    document.getElementById('form-tambah').style.display = 'block';
                    this.style.display = 'none';
                });

                document.getElementById('btn-batal').addEventListener('click', function() {
                    document.getElementById('form-tambah').style.display = 'none';
                    document.getElementById('btn-tambah').style.display = 'inline-block';
                });
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let tanggalInput = document.getElementById("tanggal_anggaran");

                    tanggalInput.addEventListener("focus", function() {
                        this.showPicker();
                    });
                });
            </script>
        @endsection

        <style>
            .table-wrapper {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .anggaran-table thead th {
                background-color:
                    color: white;
                vertical-align: middle;
                text-align: center;
                padding: 15px 10px;
            }

            .anggaran-table th.no-col,
            .anggaran-table td.no-col {
                width: 50px;
                min-width: 50px;
            }

            .anggaran-table th.tanggal-col,
            .anggaran-table td.tanggal-col {
                width: 100px;
                min-width: 100px;
            }

            .anggaran-table th.uraian-col,
            .anggaran-table td.uraian-col {
                width: auto;
                min-width: 250px;
            }

            .anggaran-table th.satuan-col,
            .anggaran-table td.satuan-col {
                width: 80px;
                min-width: 80px;
            }

            .anggaran-table th.harga-col,
            .anggaran-table td.harga-col {
                width: 120px;
                min-width: 120px;
            }

            .anggaran-table th.volume-col,
            .anggaran-table td.volume-col {
                width: 80px;
                min-width: 80px;
            }

            .anggaran-table th.jumlah-col,
            .anggaran-table td.jumlah-col {
                width: 120px;
                min-width: 120px;
            }

            .anggaran-table th.bobot-col,
            .anggaran-table td.bobot-col {
                width: 70px;
                min-width: 70px;
            }

            .anggaran-table th.aksi-col,
            .anggaran-table td.aksi-col {
                width: 130px;
                min-width: 130px;
            }

            .row-header {
                background-color:
                    font-weight: bold;
            }

            .indent-1 {
                padding-left: 1.5rem !important;
            }

            .indent-2 {
                padding-left: 3rem !important;
            }

            .indent-3 {
                padding-left: 4.5rem !important;
            }

            .anggaran-table {
                border-collapse: collapse;
                width: 100%;
            }

            .anggaran-table th,
            .anggaran-table td {
                border: 1px solid padding: 8px;
            }

            .anggaran-table tbody tr:hover {
                background-color: rgba(0, 0, 0, 0.05);
            }

            .table-wrapper::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 15px;
                height: 100%;
                background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.3));
                pointer-events: none;
                display: none;
            }

            @media (max-width: 992px) {
                .table-wrapper.scrollable::after {
                    display: block;
                }
            }

            .bg-purple {
                background-color: #6f42c1 !important;
                color: white;
            }

            .bg-gold {
                background-color: #dcd080 !important;
                color: white;
            }
        </style>
