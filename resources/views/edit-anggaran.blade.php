@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Data Anggaran</h2>

        <form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal Anggaran --}}
            <div class="mb-3">
                <label for="tanggal_anggaran" class="form-label">Tanggal Anggaran</label>
                <input type="date" name="tanggal_anggaran" class="form-control"
                    value="{{ old('tanggal_anggaran', $anggaran->tanggal_anggaran) }}" required>
            </div>

            {{-- Judul (Kegiatan) --}}
            <div class="form-group mb-3">
                <label for="judul">Kegiatan</label>
                <select class="form-control" id="judul" name="judul">
                    <option value="">-- Pilih Kegiatan --</option>
                    @foreach ($judulList as $judul)
                        <option value="{{ $judul }}"
                            {{ $judul == old('judul', $anggaran->judul) ? 'selected' : '' }}>
                            {{ $judul }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="judul_baru" name="judul_baru"
                    placeholder="Atau tambahkan kegiatan baru" value="{{ old('judul_baru') ?: '' }}">
            </div>

            {{-- Sub Judul --}}
            <div class="form-group mb-3">
                <label for="sub_judul">Sub Kegiatan</label>
                <select class="form-control" id="sub_judul" name="sub_judul">
                    <option value="">-- Pilih Sub Kegiatan --</option>
                    @foreach ($subJudulList as $subJudul)
                        <option value="{{ $subJudul }}"
                            {{ $subJudul == old('sub_judul', $anggaran->sub_judul) ? 'selected' : '' }}>
                            {{ $subJudul }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="sub_judul_baru" name="sub_judul_baru"
                    placeholder="Atau tambahkan sub kegiatan baru" value="{{ old('sub_judul_baru') ?: '' }}">
            </div>

            {{-- Sub Sub Judul --}}
            <div class="form-group mb-3">
                <label for="sub_sub_judul">Sub Sub Kegiatan</label>
                <select class="form-control" id="sub_sub_judul" name="sub_sub_judul">
                    <option value="">-- Pilih Sub Sub Kegiatan --</option>
                    @foreach ($subSubJudulList as $subSubJudul)
                        <option value="{{ $subSubJudul }}"
                            {{ $subSubJudul == old('sub_sub_judul', $anggaran->sub_sub_judul) ? 'selected' : '' }}>
                            {{ $subSubJudul }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="sub_sub_judul_baru" name="sub_sub_judul_baru"
                    placeholder="Atau tambahkan sub sub kegiatan baru" value="{{ old('sub_sub_judul_baru') ?: '' }}">
            </div>

            {{-- Uraian --}}
            <div class="form-group mb-3">
                <label for="uraian">Spesifikasi</label>
                <select class="form-control" id="uraian" name="uraian">
                    <option value="">-- Pilih Spesifikasi --</option>
                    @foreach ($uraianList as $uraian)
                        <option value="{{ $uraian }}"
                            {{ $uraian == old('uraian', $anggaran->uraian) ? 'selected' : '' }}>
                            {{ $uraian }}
                        </option>
                    @endforeach
                </select>
                <textarea class="form-control mt-2" id="uraian_baru" name="uraian_baru" placeholder="Atau tambahkan spesifikasi baru">{{ old('uraian_baru') ?: '' }}</textarea>
            </div>

            {{-- Volume --}}
            <div class="mb-3">
                <label for="volume" class="form-label">Volume</label>
                <input type="number" step="0.01" name="volume" class="form-control"
                    value="{{ old('volume', $anggaran->volume) }}" required>
            </div>

            {{-- Satuan --}}
            <div class="form-group mb-3">
                <label for="satuan">Satuan</label>
                <select class="form-control" id="satuan" name="satuan">
                    <option value="">-- Pilih Satuan --</option>
                    @foreach ($satuanList as $satuan)
                        <option value="{{ $satuan }}"
                            {{ $satuan == old('satuan', $anggaran->satuan) ? 'selected' : '' }}>
                            {{ $satuan }}
                        </option>
                    @endforeach
                </select>
                <input type="text" class="form-control mt-2" id="satuan_baru" name="satuan_baru"
                    placeholder="Atau tambahkan satuan baru" value="{{ old('satuan_baru') ?: '' }}">
            </div>

            {{-- Harga --}}
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Satuan</label>
                <input type="number" step="0.01" name="harga" class="form-control"
                    value="{{ old('harga', $anggaran->harga) }}" required>
            </div>

            {{-- Jumlah Anggaran --}}
            <div class="mb-3">
                <label for="jumlah_anggaran" class="form-label">Jumlah Anggaran</label>
                <input type="number" step="0.01" name="jumlah_anggaran" class="form-control"
                    value="{{ old('jumlah_anggaran', $anggaran->jumlah_anggaran) }}" required>
            </div>

            {{-- Bobot --}}
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot (%)</label>
                <input type="number" step="0.01" name="bobot" class="form-control"
                    value="{{ old('bobot', $anggaran->bobot) }}">
            </div>

            {{-- Rencana Realisasi --}}
            <div class="mb-3">
                <label for="volume_nominal_rr" class="form-label">Volume Nominal Rencana Realisasi</label>
                <input type="number" step="0.01" name="volume_nominal_rr" class="form-control"
                    value="{{ old('volume_nominal_rr', $anggaran->volume_nominal_rr) }}">
            </div>

            <div class="mb-3">
                <label for="satuan_rr" class="form-label">Satuan Rencana Realisasi</label>
                <input type="text" name="satuan_rr" class="form-control"
                    value="{{ old('satuan_rr', $anggaran->satuan_rr) }}">
            </div>

            <div class="mb-3">
                <label for="fisik_rr" class="form-label">Fisik Rencana Realisasi</label>
                <input type="number" step="0.01" name="fisik_rr" class="form-control"
                    value="{{ old('fisik_rr', $anggaran->fisik_rr) }}">
            </div>

            <div class="mb-3">
                <label for="tertimbang_rr" class="form-label">Tertimbang Rencana Realisasi</label>
                <input type="number" step="0.01" name="tertimbang_rr" class="form-control"
                    value="{{ old('tertimbang_rr', $anggaran->tertimbang_rr) }}">
            </div>

            {{-- Rencana Fisik --}}
            <div class="mb-3">
                <label for="volume_nominal_rf" class="form-label">Volume Nominal Rencana Fisik</label>
                <input type="number" step="0.01" name="volume_nominal_rf" class="form-control"
                    value="{{ old('volume_nominal_rf', $anggaran->volume_nominal_rf) }}">
            </div>

            <div class="mb-3">
                <label for="satuan_rf" class="form-label">Satuan Rencana Fisik</label>
                <input type="text" name="satuan_rf" class="form-control"
                    value="{{ old('satuan_rf', $anggaran->satuan_rf) }}">
            </div>

            <div class="mb-3">
                <label for="fisik_rf" class="form-label">Fisik Rencana Fisik</label>
                <input type="number" step="0.01" name="fisik_rf" class="form-control"
                    value="{{ old('fisik_rf', $anggaran->fisik_rf) }}">
            </div>

            <div class="mb-3">
                <label for="tertimbang_rf" class="form-label">Tertimbang Rencana Fisik</label>
                <input type="number" step="0.01" name="tertimbang_rf" class="form-control"
                    value="{{ old('tertimbang_rf', $anggaran->tertimbang_rf) }}">
            </div>

            {{-- Realisasi Keuangan --}}
            <div class="mb-3">
                <label for="rupiah_rk" class="form-label">Rupiah Realisasi Keuangan</label>
                <input type="number" step="0.01" name="rupiah_rk" class="form-control"
                    value="{{ old('rupiah_rk', $anggaran->rupiah_rk) }}">
            </div>

            <div class="mb-3">
                <label for="persentase_rk" class="form-label">Persentase Realisasi Keuangan</label>
                <input type="number" step="0.01" name="persentase_rk" class="form-control"
                    value="{{ old('persentase_rk', $anggaran->persentase_rk) }}">
            </div>

            <div class="mb-3">
                <label for="tertimbang_rk" class="form-label">Tertimbang Realisasi Keuangan</label>
                <input type="number" step="0.01" name="tertimbang_rk" class="form-control"
                    value="{{ old('tertimbang_rk', $anggaran->tertimbang_rk) }}">
            </div>

            {{-- Sisa Anggaran --}}
            <div class="mb-3">
                <label for="sisa_anggaran" class="form-label">Sisa Anggaran</label>
                <input type="number" step="0.01" name="sisa_anggaran" class="form-control"
                    value="{{ old('sisa_anggaran', $anggaran->sisa_anggaran) }}">
            </div>

            {{-- Aksi --}}
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('anggaran.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
