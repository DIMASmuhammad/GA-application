@extends('layouts.main')

@section('content')

@include('sweetalert::alert')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Kendaraan</h6>
      <button class="btn btn-primary mt-3"><a href="{{ route('master_kendaraan.create') }}" class="text-white text-decoration-none">Tambah</a></button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered border" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Nama Kendaraan</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datakendaraan as $kendaraan)
            <tr>
              <input type="hidden" class="delete_id" value="{{ $kendaraan->id }}">
              <td>{{ $kendaraan->mk_nama_kendaraan }}</td>
              <td><a class="btn btn-warning" href="{{ route('master_kendaraan.edit',$kendaraan->id) }}">Edit</a>
                <form action="{{ route('master_kendaraan.destroy',$kendaraan->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger btndelete" type="submit" value="Delete">
                </form>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $datakendaraan->links() }}

      </div>
    </div>
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
      $(document).ready(function () {

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $('.btndelete').click(function (e) {
              e.preventDefault();

              var deleteid = $(this).closest("tr").find('.delete_id').val();

              swal({
                      title: "Apakah anda yakin?",
                      text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                      if (willDelete) {

                          var data = {
                              "_token": $('input[name=_token]').val(),
                              'id': deleteid,
                          };
                          $.ajax({
                              type: "DELETE",
                              url: 'master_kendaraan/' + deleteid,
                              data: data,
                              success: function (response) {
                                  swal(response.status, {
                                          icon: "success",
                                      })
                                      .then((result) => {
                                          location.reload();
                                      });
                              }
                          });
                      }
                  });
          });

      });

  </script>
@endsection

