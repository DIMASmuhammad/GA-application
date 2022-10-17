@extends('layouts.main')

@section('content')
@include('sweetalert::alert')
<div class="card shadow mb-4">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Aktivitas</h6>
    <button class="btn btn-primary mt-2">
      <i class="fa fa-plus"></i>
      <a href="{{ route('master_aktivitas.create') }}" class="text-white text-decoration-none" >Tambah</a>
    </button>
  </div>
  <div class="card-body px-sm-3 px-1">
    <div class="row">
      @if($cek == 0)
      <div class="col">
        <div class="card mb-3 border-danger">
          <div class="card-body">
            <div class="row">
              <div class="col-12 px-1">
                <div class="font-weight-bold text-primary text-uppercase text-center">
                  <i class="fas fa-info-circle"></i>
                  Belum Ada Data Disini
                  <i class="fas fa-info-circle"></i>
                </div>
              </div>                      
            </div>
          </div>
        </div>
      </div>
      @endif

      @if($cek > 0)
      <div class="table-responsive col-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="">
              <th class="border border-secondary col-5 col-sm-9">Nama Aktivitas</th>
              <th class="border border-secondary col-3 col-sm-3 col-md-2 col-xl-1">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dataaktivitas as $aktivitas)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $aktivitas->id }}">
              <td class="border-secondary">{{ $aktivitas->ma_nama_aktivitas }}</td>
              <td class="border-secondary">
                <a class="btn-sm btn-warning btn-circle mb-sm-0 mb-1" href="{{ route('master_aktivitas.edit',$aktivitas->id) }}"  data-toggle="tooltip" data-placement="left" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('master_aktivitas.destroy',$aktivitas->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  {{-- <input class="btn btn-danger btndelete3" type="submit" value="Delete"> --}}
                  <a href="" class="btn-sm btn-danger btn-circle mb-sm-0 mb-1 btndelete3"  data-toggle="tooltip" data-placement="left" title="Delete">
                    <i class="fas fa-trash"></i>
                  </a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $dataaktivitas->links() }}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

