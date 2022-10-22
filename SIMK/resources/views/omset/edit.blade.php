@extends("layouts.main")

@section("content")
<form class="pendapatan ml-5" method="POST" action="{{ route("omset.update", $omset->id) }}">
    @csrf
    @method("PUT")
    <h1>Edit Data Pendapatan</h1>
    <div class="col-sm-5 mb-3 mb-sm-0">
            <div class="form-group">
                <p>Tanggal</p>
                <input type="date" name="created_at"
                    class="form-control form-control-user @error('created_at') is-invalid @enderror" id="exampleInputDate"
                    placeholder="Date" value="{{ old('created_at', $omset->created_at->format("Y-m-d")) }}">
                @error('created_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>No Polisi</p>
                <input type="text" name="nopol" class="form-control form-control-user @error('nopol') is-invalid @enderror"
                    id="exampleInputNoPol" placeholder="No Polisi" value="{{ old('nopol', $omset->nopol) }}">
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
                    placeholder="Nama Supir" value="{{ old('nama_supir', $omset->nama_supir) }}">
                @error('nama_supir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Biaya/1 Mobil</p>
                <input type="number" name="biaya_mobil"
                    class="form-control form-control-user @error('biaya_mobil') is-invalid @enderror" id="biaya_mobil"
                    placeholder="Biaya/1 Mobil" value="{{ old('biaya_mobil', $omset->biaya_mobil) }}">
                @error('biaya_mobil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Pengeluaran JKT</p>
                <input type="number" name="pengeluaran_jkt"
                    class="form-control form-control-user @error('pengeluaran_jkt') is-invalid @enderror"
                    id="pengeluaran_jkt" placeholder="Pengeluaran JKT" value="{{ old('pengeluaran_jkt', $omset->pengeluaran_jkt) }}">
                @error('pengeluaran_jkt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Pengeluaran LPG</p>
                <input type="number" name="pengeluaran_lpg"
                    class="form-control form-control-user @error('pengeluaran_lpg') is-invalid @enderror"
                    id="pengeluaran_lpg" placeholder="Pengeluaran LPG" value="{{ old('pengeluaran_lpg', $omset->pengeluaran_lpg) }}">
                @error('pengeluaran_lpg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Jumlah Omset Bersih</p>
                <input type="number" readonly name="jumlah_omset_bersih" class="form-control form-control-user @error('jumlah_omset_bersih') is-invalid @enderror"
                    id="jumlah_omset_bersih" placeholder="Jumlah Rp." value="{{ old('jumlah_omset_bersih', $omset->jumlah_omset_bersih) }}">
                @error('jumlah_omset_bersih')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning btn-user btn-block">
                Edit
            </button>
        </div>
</form>
@endsection
@section('myscript')
    <script>
        $(document).ready(function() {
            $("#biaya_mobil").keyup(function() {
                const biaya_mobil = $("#biaya_mobil").val() || 0;
                const pengeluaran_jkt = $("#pengeluaran_jkt").val() || 0;
                const pengeluaran_lpg = $("#pengeluaran_lpg").val() || 0;
                const jumlah_omset_bersih = parseInt(biaya_mobil) - parseInt(pengeluaran_jkt) - parseInt(
                    pengeluaran_lpg);
                $("#jumlah_omset_bersih").val(jumlah_omset_bersih);
            });
            $("#pengeluaran_jkt").keyup(function() {
                const biaya_mobil = $("#biaya_mobil").val() || 0;
                const pengeluaran_jkt = $("#pengeluaran_jkt").val() || 0;
                const pengeluaran_lpg = $("#pengeluaran_lpg").val() || 0;
                const jumlah_omset_bersih = parseInt(biaya_mobil) - parseInt(pengeluaran_jkt) - parseInt(
                    pengeluaran_lpg);
                $("#jumlah_omset_bersih").val(jumlah_omset_bersih);
            });
            $("#pengeluaran_lpg").keyup(function() {
                const biaya_mobil = $("#biaya_mobil").val() || 0;
                const pengeluaran_jkt = $("#pengeluaran_jkt").val() || 0;
                const pengeluaran_lpg = $("#pengeluaran_lpg").val() || 0;
                const jumlah_omset_bersih = parseInt(biaya_mobil) - parseInt(pengeluaran_jkt) - parseInt(
                    pengeluaran_lpg);
                $("#jumlah_omset_bersih").val(jumlah_omset_bersih);
            });
        });
    </script>
@endsection