 @extends('layouts.main')
 @section('content')
<div class="card shadow mb-4" data-aos="fade-up" data-aos-delay="100">
  <div class="card-header py-3 px-sm-3 px-2">
    <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-right" data-aos-delay="600">Edit PIC</h6>
  </div>
  <div class="card-body px-sm-3 px-2">
    <form action="{{ route('master_pic.update',$pic->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-6 px-0">
      @csrf
      @method('put')
      <label for="nama_pic" class="form-label" data-aos="fade-right" data-aos-delay="700">Nama PIC</label>
      <input type="text" class="mb-1 form-control @error('nama_pic') is-invalid @enderror" name="nama_pic" value="{{ $pic->mp_nama }}" required autofocus data-aos="fade-right" data-aos-delay="800">
      @error('nama_pic')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      <button class="btn btn-info mt-3 mb-1 mr-1" data-aos="fade-right" data-aos-delay="900">
        <a href="{{ route('master_pic.index') }}" class="text-white text-decoration-none">
          <i class="fa fa-angle-left"></i>
          Kembali
        </a>
      </button>
      <button type="submit" class="btn btn-success mt-3 mb-1" data-aos="fade-left" data-aos-delay="900">
        <i class="fa fa-edit"></i>
        Edit
      </button>
    </form>
  </div>
</div>
@endsection

