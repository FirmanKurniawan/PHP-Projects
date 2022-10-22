@extends('layouts.main')

@section('content')
    <form class="pendapatan ml-5" method="POST" action="{{ route('omset.store') }}">
        @csrf
        <h1>Tambah Data Pendapatan</h1>
        <div class="col-sm-5 mb-3 mb-sm-0">
            <div class="form-group">
                <p>Tanggal</p>
                <input type="date" name="created_at"
                    class="form-control form-control-user @error('created_at') is-invalid @enderror" id="exampleInputDate"
                    placeholder="Date" value="{{ old('created_at') }}">
                @error('created_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>No Polisi</p>
                <input type="text" name="nopol" class="form-control form-control-user @error('nopol') is-invalid @enderror"
                    id="exampleInputNoPol" placeholder="No Polisi" value="{{ old('nopol') }}">
                @error('nopol')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Nama Supir</p>
                <input type="text" name="nama_supir"
                    class="form-control form-control-user @error('nama_supir') is-invalid @enderror" id="exampleInputNoPol"
                    placeholder="Nama Supir" value="{{ old('nama_supir') }}">
                @error('nama_supir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Biaya/1 Mobil</p>
                <input type="text" class="form-control form-control-user @error('biaya_mobil') is-invalid @enderror"
                    id="biaya_mobil_show" placeholder="Biaya/1 Mobil" value="{{ old('biaya_mobil') }}">
                <input type="hidden" name="biaya_mobil" class="form-control form-control-user" id="biaya_mobil"
                    value="{{ old('biaya_mobil') }}">
                @error('biaya_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Pengeluaran JKT</p>
                <input type="text" class="form-control form-control-user @error('pengeluaran_jkt') is-invalid @enderror"
                    id="pengeluaran_jkt_show" placeholder="Pengeluaran JKT" value="{{ old('pengeluaran_jkt') }}">
                <input type="hidden" name="pengeluaran_jkt" class="form-control form-control-user" id="pengeluaran_jkt"
                    value="{{ old('pengeluaran_jkt') }}">
                @error('pengeluaran_jkt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Pengeluaran LPG</p>
                <input type="text" class="form-control form-control-user @error('pengeluaran_lpg') is-invalid @enderror"
                    id="pengeluaran_lpg_show" placeholder="Pengeluaran LPG" value="{{ old('pengeluaran_lpg') }}">
                <input type="hidden" name="pengeluaran_lpg" class="form-control form-control-user" id="pengeluaran_lpg"
                    value="{{ old('pengeluaran_lpg') }}">
                @error('pengeluaran_lpg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Jumlah Omset Bersih</p>
                <input type="text" readonly
                    class="form-control form-control-user @error('jumlah_omset_bersih') is-invalid @enderror"
                    id="jumlah_omset_bersih_show" value="{{ old('jumlah_omset_bersih', 0) }}">
                <input type="hidden" name="jumlah_omset_bersih" class="form-control form-control-user"
                    id="jumlah_omset_bersih" value="{{ old('jumlah_omset_bersih', 0) }}">
                @error('jumlah_omset_bersih')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-user btn-block">
                Simpan
            </button>
        </div>
    </form>
@endsection

@section('myscript')
    <script>
        $(document).ready(function() {
            $("#biaya_mobil_show").keyup(function() {
                $("#biaya_mobil").val(rupiahToNumber($("#biaya_mobil_show").val()));
                $("#biaya_mobil_show").val(rupiah($("#biaya_mobil").val()));

                const biaya_mobil = $("#biaya_mobil").val() || 0;
                const pengeluaran_jkt = $("#pengeluaran_jkt").val() || 0;
                const pengeluaran_lpg = $("#pengeluaran_lpg").val() || 0;
                const jumlah_omset_bersih = parseInt(biaya_mobil) - parseInt(pengeluaran_jkt) - parseInt(
                    pengeluaran_lpg);
                $("#jumlah_omset_bersih_show").val(rupiah(jumlah_omset_bersih));
                $("#jumlah_omset_bersih").val(jumlah_omset_bersih);
            });
            $("#pengeluaran_jkt_show").keyup(function() {
                $("#pengeluaran_jkt").val(rupiahToNumber($("#pengeluaran_jkt_show").val()));
                $("#pengeluaran_jkt_show").val(rupiah($("#pengeluaran_jkt").val()));

                const biaya_mobil = $("#biaya_mobil").val() || 0;
                const pengeluaran_jkt = $("#pengeluaran_jkt").val() || 0;
                const pengeluaran_lpg = $("#pengeluaran_lpg").val() || 0;
                const jumlah_omset_bersih = parseInt(biaya_mobil) - parseInt(pengeluaran_jkt) - parseInt(
                    pengeluaran_lpg);
                $("#jumlah_omset_bersih_show").val(rupiah(jumlah_omset_bersih));
                $("#jumlah_omset_bersih").val(jumlah_omset_bersih);
            });
            $("#pengeluaran_lpg_show").keyup(function() {
                $("#pengeluaran_lpg").val(rupiahToNumber($("#pengeluaran_lpg_show").val()));
                $("#pengeluaran_lpg_show").val(rupiah($("#pengeluaran_lpg").val()));

                const biaya_mobil = $("#biaya_mobil").val() || 0;
                const pengeluaran_jkt = $("#pengeluaran_jkt").val() || 0;
                const pengeluaran_lpg = $("#pengeluaran_lpg").val() || 0;
                const jumlah_omset_bersih = parseInt(biaya_mobil) - parseInt(pengeluaran_jkt) - parseInt(
                    pengeluaran_lpg);
                $("#jumlah_omset_bersih_show").val(rupiah(jumlah_omset_bersih));
                $("#jumlah_omset_bersih").val(jumlah_omset_bersih);
            });

        });
        const omset = document.querySelector("#jumlah_omset_bersih_show");
        omset.value = rupiah(omset.value)
    </script>
@endsection
