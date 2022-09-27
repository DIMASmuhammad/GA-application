@extends('layouts.main')

@section('content')

@include('sweetalert::alert')
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Perencanaan Aktivitas</h6>
      <!-- <button class="btn btn-primary mt-3"><a href="{{ route('app_perencanaan.create') }}" class="text-white text-decoration-none">Tambah</a></button> -->
    </div>
    <div class="row">
    <div class="card-body col-md-7 ml-3">
      @foreach ($dataperencanaan as $perencanaan)
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <?php 
            $string = $perencanaan->ap_bulan;
            $result = preg_replace("/[^0-9]/", "",$string);

            $monthnum = $result;
            $dateObj = DateTime::createFromFormat('!m', $monthnum);
            $monthName = $dateObj->format('F');
             ?>
          <h5 class="card-title">{{ $monthName.'-'.$perencanaan->ap_tahun }}</h5>
          <a href="{{ route('app_perencanaan.show',$perencanaan->id) }}" class=" btn btn-primary">Lihat</a>
          <form action="{{ route('app_perencanaan.destroy',$perencanaan->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
              <input class="btn btn-danger" type="submit" value="Delete">
          </form>
        </div>
        </div>
      </div>
      @endforeach
      {{ $dataperencanaan->links() }}
    </div>
    
<div class="card mt-3 ml-5 mb-3">

    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah List Perencanaan</h6>
    </div>
       <form class="ml-2 mr-2" action="{{ route('app_perencanaan.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
              <label class="form-label mt-3">Bulan</label>
              <select name="ap_bulan" class="custom-select custom-select-md mb-3">
                <option value="-01">Januari</option>
                <option value="-02">Februari</option>
                <option value="-03">Maret</option>
                <option value="-04">april</option>
                <option value="-05">mei</option>
                <option value="-06">juni</option>
                <option value="-07">Juli</option>
                <option value="-08">Agustus</option>
                <option value="-09">September</option>
                <option value="-10">Oktober</option>
                <option value="-11">November</option>
                <option value="-12">Desember</option>
              </select>

                <label class="form-label mt-3">Tahun</label>
               <input name="ap_tahun" type="number" class="form-control" required>                 
           <button type="submit" class="btn btn-primary mt-3">Tambah</button>
       </form>
      </div>

  </div>
  </div>
@endsection



