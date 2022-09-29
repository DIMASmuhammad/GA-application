@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
<<<<<<< HEAD
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Kendaraan</h6>
  </div>
  <div class="card-body">
    <form action="{{ route('master_kendaraan.store') }}" method="POST" enctype="multipart/form-data" class="row">
      @csrf
			<div class="col-md-6 mb-2">
				<label for="mk_nama_kendaraan" class="form-label">Nama Kendaraan</label>
				<input type="text" class="form-control @error('nama') is-invalid @enderror" name="mk_nama_kendaraan" required>
				@error('nama')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
      <div class="col-md-6 mb-2">
				<label for="mk_no_polisi" class="form-label">No Polisi</label>
				<input type="text" class="form-control @error('nopolisi') is-invalid @enderror" name="mk_no_polisi" required>
				@error('nopolisi')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
      <div class="col-md-6">
      	<label class="form-label">Jenis Kendaraan</label>
				<select name="mk_jenis" id="mk_jenis" class="custom-select custom-select-md mb-3">
					<option value="Roda 2">Roda dua (2)</option>
					<option value="Roda 4">Roda empat (4)</option>
				</select>
			</div>
			<div class="col-md-6">
				<label for="mk_merk" class="form-label">Merk Kendaraan</label>
				<input type="text" class="form-control @error('merk') is-invalid @enderror" name="mk_merk" required>
				@error('merk')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="mk_warna" class="form-label">Warna Kendaraan</label>
				<input type="text" class="form-control @error('warna') is-invalid @enderror" name="mk_warna" required>
				@error('warna')
				<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="col-md-6">
				<label class="form-label">Perlengkapan</label>
				<select name="mk_perlengkapan" id="mk_perlengkapan" class="custom-select custom-select-md mb-3">
					<option value="STNK-BPKB">STNK-BPKB</option>
					<option value="STNK">STNK</option>
					<option value="BPKB">BPKB</option>
				</select>
			</div>
			<div class="col-md-6 mb-2">
				<button class="btn btn-primary my-3 mr-1">
					<i class="fa fa-angle-left"></i>
					<a href="{{ route('master_kendaraan.index') }}" class="text-white text-decoration-none">Kembali</a>
				</button>
				<button type="submit" class="btn btn-success my-3">
					<i class="fa fa-plus-circle"></i>
					Tambah
				</button>
			</div>
    </form>
  </div>
</div>
=======
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Kendaraan</h6>
    </div>
    <div class="card-body">
       <form action="{{ route('master_kendaraan.store') }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
           @csrf
               <label for="mk_nama_kendaraan" class="form-label">Nama Kendaraan</label>
               <input type="text" class="form-control @error('nama') is-invalid @enderror" name="mk_nama_kendaraan" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="mk_no_polisi" class="form-label">No Polisi</label>
               <input type="text" class="form-control @error('nopolisi') is-invalid @enderror" name="mk_no_polisi" required>
                @error('nopolisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

               <label class="form-label mt-3">Jenis Kendaraan</label>
               <select name="mk_jenis" id="mk_jenis" class="custom-select custom-select-md mb-3">
                <option value="Roda 2">Roda dua (2)</option>
                <option value="Roda 4">Roda empat (4)</option>
               </select>
            
                <label for="mk_merk" class="form-label">Merk Kendaraan</label>
               <input type="text" class="form-control @error('merk') is-invalid @enderror" name="mk_merk" required>
                @error('merk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="mk_warna" class="form-label">Warna Kendaraan</label>
               <input type="text" class="form-control @error('warna') is-invalid @enderror" name="mk_warna" required>
                @error('warna')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label class="form-label mt-3">Perlengkapan</label>
              <select name="mk_perlengkapan" id="mk_perlengkapan" class="custom-select custom-select-md mb-3">
                <option value="STNK-BPKB">STNK-BPKB</option>
                <option value="STNK">STNK</option>
                <option value="BPKB">BPKB</option>
                <option value="TIDAK-ADA">TIDAK ADA</option>
              </select>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Status Kendaraan</h6>
                </div>
                <div class="card-body">
                  <label class="form-label mt-3">Status</label>
                  <select name="mk_status" id="mk_status" class="custom-select custom-select-md mb-3">
                    <option class="text-success" value="tersedia">Tersedia</option>
                    <option class="text-primary" value="sedang dipakai" >Sedang DiPakai</option>
                    <option class="text-warning" value="akan dipakai">Akan DiPakai</option>
                  </select>

                   <label for="mk_bahan_bakar" class="form-label">jumlah Bahan Bakar</label>
               <input type="text" class="form-control @error('mk_bahan_bakar') is-invalid @enderror" name="mk_bahan_bakar" required>
                @error('mk_bahan_bakar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="mk_kilometer" class="form-label">Kilometer</label>
                <input type="text" class="form-control @error('mk_kilometer') is-invalid @enderror" name="mk_kilometer" required>
                @error('mk_kilometer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="mk_kondisi_lain" class="form-label">Kondisi Lain</label>
                <input type="text" class="form-control @error('mk_kondisi_lain') is-invalid @enderror" name="mk_kondisi_lain" required>
                @error('mk_kondisi_lain')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror


                </div>
              </div>

               
           <button type="submit" class="btn btn-primary my-3">Tambah</button>
           <button class="btn btn-primary my-3"><a  href="{{ route('master_kendaraan.index') }}" class="text-white text-decoration-none">Kembali</a></button>
       </form>
      </div>
    </div>
>>>>>>> c4fc768e20b4bd550448e1a78f8d41ffcdf8565a
@endsection


