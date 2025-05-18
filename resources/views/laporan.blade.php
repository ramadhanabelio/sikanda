<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Realisasi Anggaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 8px;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 2px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #f2f2f2;
        }

        .bg-primary {
            background-color: #007bff;
            color: #fff;
        }

        .bg-info {
            background-color: #d6eaff;
        }

        .bg-warning {
            background-color: #ffe699;
        }

        .bg-secondary {
            background-color: #dee2e6;
        }

        .bg-purple {
            background-color: #d9d2e9;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .text-left {
            text-align: left;
        }

        .text-bold {
            font-weight: bold;
        }

        .signature-container {
            width: 100%;
            margin-top: 20px;
            text-align: right;
        }

        .signature-box {
            display: inline-block;
            text-align: left;
            margin-right: 40px;
            width: 200px;
        }

        .signature-title {
            margin-bottom: 50px;
        }

        .signature-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .calculation-box {
            width: 350px;
            margin: 10px 0;
            padding: 5px;
            font-size: 9px;
            text-align: left;
        }

        .calculation-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .calculation-item {
            margin-bottom: 3px;
        }

        .calculation-label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
        }

        .header-container {
            width: 100%;
            position: relative;
        }

        @page {
            size: A4 landscape;
            margin: 5px;
        }
    </style>
</head>

<body>
    <h2>PERHITUNGAN REALISASI FISIK DAN KEUANGAN</h2>

    <div class="calculation-box">
        @php
            $totalPagu = $anggarans->flatten(1)->sum('jumlah_anggaran');
            $totalRealisasiKeuangan = $anggarans->flatten(1)->sum('rupiah_rk');
            $persenRealisasiKeuangan = $totalPagu > 0 ? ($totalRealisasiKeuangan / $totalPagu) * 100 : 0;

            $totalRealisasiFisik = $anggarans->flatten(1)->sum('tertimbang_rf');
        @endphp

        <div class="calculation-item">
            <span class="calculation-label">TOTAL PAGU:</span>
            <span>Rp. {{ number_format($totalPagu, 0, ',', '.') }}</span>
        </div>
        <div class="calculation-item">
            <span class="calculation-label">TARGET:</span>
            <span>100%</span>
        </div>
        <div class="calculation-item">
            <span class="calculation-label">REALISASI KEUANGAN (Rp.) / (%):</span>
            <span>Rp. {{ number_format($totalRealisasiKeuangan, 0, ',', '.') }} /
                {{ number_format($persenRealisasiKeuangan, 2) }}%</span>
        </div>
        <div class="calculation-item">
            <span class="calculation-label">REALISASI FISIK (%):</span>
            <span>{{ number_format($totalRealisasiFisik, 2) }}%</span>
        </div>
    </div>

    <h2>Laporan Realisasi Anggaran</h2>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Tanggal Anggaran</th>
                <th rowspan="2">Uraian</th>
                <th rowspan="2">Pejabat / Penanggung Jawab</th>
                <th rowspan="2">Waktu Pelaksanaan</th>
                <th rowspan="2">Volume</th>
                <th rowspan="2">Satuan</th>
                <th rowspan="2">Harga Satuan</th>
                <th rowspan="2">Jumlah Anggaran (Rp)</th>
                <th rowspan="2">Bobot (%)</th>
                <th colspan="4" class="bg-warning">Rencana Realisasi</th>
                <th colspan="4" class="bg-secondary">Realisasi Fisik</th>
                <th colspan="3" class="bg-purple">Realisasi Keuangan</th>
                <th rowspan="2">Sisa Anggaran</th>
            </tr>
            <tr>
                <th>Volume/Nominal</th>
                <th>Satuan</th>
                <th>Fisik (%)</th>
                <th>Tertimbang (%)</th>

                <th>Volume/Nominal</th>
                <th>Satuan</th>
                <th>Fisik (%)</th>
                <th>Tertimbang (%)</th>

                <th>Rupiah</th>
                <th>Persentase (%)</th>
                <th>Tertimbang (%)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $totalBudget = $anggarans->flatten(1)->sum('jumlah_anggaran');
            @endphp
            @foreach ($anggarans as $judul => $byJudul)
                @php
                    $totalJudulAnggaran = $byJudul->sum('jumlah_anggaran');
                    $totalJudulSisaAnggaran = $byJudul->sum('sisa_anggaran');
                @endphp
                <tr class="bg-primary">
                    <td colspan="8" class="text-left text-bold">{{ $judul }}</td>
                    <td>{{ number_format($totalJudulAnggaran, 0, ',', '.') }}</td>
                    <td colspan="12"></td>
                    <td>{{ number_format($totalJudulSisaAnggaran, 0, ',', '.') }}</td>
                </tr>

                @php
                    $subGrouped = $byJudul->groupBy('sub_judul');
                    $subIndex = 1;
                @endphp

                @foreach ($subGrouped as $subJudul => $bySubJudul)
                    @php
                        $totalSubJudulAnggaran = $bySubJudul->sum('jumlah_anggaran');
                        $totalSubJudulSisaAnggaran = $bySubJudul->sum('sisa_anggaran');
                    @endphp
                    <tr class="bg-info">
                        <td></td>
                        <td colspan="7" class="text-left text-bold">{{ chr(96 + $subIndex++) }}. {{ $subJudul }}
                        </td>
                        <td>{{ number_format($totalSubJudulAnggaran, 0, ',', '.') }}</td>
                        <td colspan="12"></td>
                        <td>{{ number_format($totalSubJudulSisaAnggaran, 0, ',', '.') }}</td>
                    </tr>

                    @php
                        $subSubGrouped = $bySubJudul->groupBy('sub_sub_judul');
                        $subSubIndex = 1;
                    @endphp

                    @foreach ($subSubGrouped as $subSubJudul => $bySubSubJudul)
                        @php
                            $totalSubSubJudulAnggaran = $bySubSubJudul->sum('jumlah_anggaran');
                            $totalSubSubJudulSisaAnggaran = $bySubSubJudul->sum('sisa_anggaran');
                        @endphp
                        <tr class="bg-secondary">
                            <td></td>
                            <td></td>
                            <td colspan="6" class="text-left text-bold">{{ $subSubIndex++ }}) {{ $subSubJudul }}
                            </td>
                            <td>{{ number_format($totalSubSubJudulAnggaran, 0, ',', '.') }}</td>
                            <td colspan="12"></td>
                            <td>{{ number_format($totalSubSubJudulSisaAnggaran, 0, ',', '.') }}</td>
                        </tr>

                        @foreach ($bySubSubJudul as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->tanggal_anggaran }}</td>
                                <td class="text-left">{{ $item->uraian }}</td>
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
                                <td>{{ $item->fisik_rf ?? '-' }}</td>
                                <td>{{ $item->tertimbang_rf }}</td>

                                {{-- Realisasi Keuangan --}}
                                <td>{{ number_format($item->rupiah_rk, 0, ',', '.') }}</td>
                                <td>{{ $item->persentase_rk }}</td>
                                <td>{{ $item->tertimbang_rk }}</td>

                                <td>{{ number_format($item->sisa_anggaran, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach

            @php
                $grandTotalAnggaran = $anggarans->flatten(1)->sum('jumlah_anggaran');
                $grandTotalSisaAnggaran = $anggarans->flatten(1)->sum('sisa_anggaran');
            @endphp
            <tr class="bg-dark text-white">
                <td colspan="8" class="text-center text-bold">TOTAL KESELURUHAN</td>
                <td>{{ number_format($grandTotalAnggaran, 0, ',', '.') }}</td>
                <td colspan="12"></td>
                <td>{{ number_format($grandTotalSisaAnggaran, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="signature-container">
        <div class="signature-box">
            <div class="signature-title">
                Pekanbaru, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                <br>
                PPTK
            </div>
            <div class="signature-name">DESI RIAWATI, S.Sos</div>
            <div>NIP. 19791228 201001 2 008</div>
        </div>
    </div>
</body>

</html>
