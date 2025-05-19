<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class AnggaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggaran::query();

        if ($request->has('bulan') && $request->has('tahun')) {
            $bulan = $request->input('bulan');
            $tahun = $request->input('tahun');

            $query->whereMonth('tanggal_anggaran', $bulan)
                ->whereYear('tanggal_anggaran', $tahun);
        }

        if ($request->has('search') && !empty($request->input('search'))) {
            $searchTerm = $request->input('search');

            $query->where(function ($q) use ($searchTerm) {
                $q->where('judul', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('sub_judul', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('sub_sub_judul', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('uraian', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('satuan', 'LIKE', "%{$searchTerm}%");
            });
        }

        return view('anggaran', [
            'judulList' => Anggaran::distinct()->pluck('judul'),
            'subJudulList' => Anggaran::distinct()->pluck('sub_judul'),
            'subSubJudulList' => Anggaran::distinct()->pluck('sub_sub_judul'),
            'uraianList' => Anggaran::distinct()->pluck('uraian'),
            'satuanList' => Anggaran::distinct()->pluck('satuan'),
            'anggarans' => $query->get(),
            'selectedBulan' => $request->input('bulan', ''),
            'selectedTahun' => $request->input('tahun', '')
        ]);
    }

    public function create()
    {
        return view('anggaran');
    }

    public function store(Request $request)
    {
        $jumlah_anggaran = $request->volume * $request->harga;

        $totalBudget = Anggaran::sum('jumlah_anggaran');
        $bobot = $totalBudget > 0 ? ($jumlah_anggaran / $totalBudget) * 100 : 0;

        $anggaran = new Anggaran();
        $anggaran->tanggal_anggaran = $request->tanggal_anggaran;
        $anggaran->judul = $request->judul_baru ?: $request->judul;
        $anggaran->sub_judul = $request->sub_judul_baru ?: $request->sub_judul;
        $anggaran->sub_sub_judul = $request->sub_sub_judul_baru ?: $request->sub_sub_judul;
        $anggaran->uraian = $request->uraian_baru ?: $request->uraian;
        $anggaran->volume = $request->volume;
        $anggaran->satuan = $request->satuan_baru ?: $request->satuan;
        $anggaran->harga = $request->harga;
        $anggaran->jumlah_anggaran = $jumlah_anggaran;
        $anggaran->bobot = $bobot;

        $anggaran->volume_nominal_rr = $request->volume_nominal_rr;
        $anggaran->satuan_rr = $request->satuan_rr;
        $anggaran->fisik_rr = $request->fisik_rr;
        $anggaran->tertimbang_rr = $request->tertimbang_rr;
        $anggaran->volume_nominal_rf = $request->volume_nominal_rf;
        $anggaran->satuan_rf = $request->satuan_rf;
        $anggaran->fisik_rf = $request->fisik_rf;
        $anggaran->tertimbang_rf = $request->tertimbang_rf;
        $anggaran->rupiah_rk = $request->rupiah_rk;
        $anggaran->persentase_rk = $request->persentase_rk;
        $anggaran->tertimbang_rk = $request->tertimbang_rk;
        $anggaran->sisa_anggaran = $request->sisa_anggaran;

        $anggaran->save();

        return redirect()->back()->with('success', 'Data anggaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggaran = Anggaran::findOrFail($id);

        $judulList = Anggaran::distinct()->pluck('judul');
        $subJudulList = Anggaran::distinct()->pluck('sub_judul');
        $subSubJudulList = Anggaran::distinct()->pluck('sub_sub_judul');
        $uraianList = Anggaran::distinct()->pluck('uraian');
        $satuanList = Anggaran::distinct()->pluck('satuan');

        return view('edit-anggaran', compact('anggaran', 'judulList', 'subJudulList', 'subSubJudulList', 'uraianList', 'satuanList'));
    }

    public function update(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $jumlah_anggaran = $request->volume * $request->harga;
        $totalBudget = Anggaran::where('id', '!=', $id)->sum('jumlah_anggaran') + $jumlah_anggaran;
        $bobot = $totalBudget > 0 ? ($jumlah_anggaran / $totalBudget) * 100 : 0;

        $anggaran->tanggal_anggaran = $request->tanggal_anggaran;
        $anggaran->judul = $request->judul_baru ?: $request->judul;
        $anggaran->sub_judul = $request->sub_judul_baru ?: $request->sub_judul;
        $anggaran->sub_sub_judul = $request->sub_sub_judul_baru ?: $request->sub_sub_judul;
        $anggaran->uraian = $request->uraian_baru ?: $request->uraian;
        $anggaran->volume = $request->volume;
        $anggaran->satuan = $request->satuan_baru ?: $request->satuan;
        $anggaran->harga = $request->harga;
        $anggaran->jumlah_anggaran = $jumlah_anggaran;
        $anggaran->bobot = $bobot;

        $anggaran->volume_nominal_rr = $request->volume_nominal_rr;
        $anggaran->satuan_rr = $request->satuan_rr;
        $anggaran->fisik_rr = $request->fisik_rr;
        $anggaran->tertimbang_rr = $request->tertimbang_rr;
        $anggaran->volume_nominal_rf = $request->volume_nominal_rf;
        $anggaran->satuan_rf = $request->satuan_rf;
        $anggaran->fisik_rf = $request->fisik_rf;
        $anggaran->tertimbang_rf = $request->tertimbang_rf;
        $anggaran->rupiah_rk = $request->rupiah_rk;
        $anggaran->persentase_rk = $request->persentase_rk;
        $anggaran->tertimbang_rk = $request->tertimbang_rk;
        $anggaran->sisa_anggaran = $request->sisa_anggaran;

        $anggaran->save();

        return redirect()->route('anggaran.index')->with('success', 'Data anggaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        $anggaran->delete();

        return redirect()->route('anggaran.index')->with('success', 'Data anggaran berhasil dihapus!');
    }

    public function exportPdf()
    {
        $anggarans = Anggaran::all()->groupBy('judul');

        $tanggalSekarang = date('d F Y');
        $namaFile = $tanggalSekarang . ' - Laporan Realisasi Anggaran.pdf';

        $pdf = PDF::loadView('laporan', compact('anggarans'))->setPaper('a4', 'landscape');
        return $pdf->download($namaFile);
    }
}
