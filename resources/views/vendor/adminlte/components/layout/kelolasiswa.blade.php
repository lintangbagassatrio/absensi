@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">KELOLA DATA SISWA</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-defauld">
        <div class="card-header">{{ __('kelola data siswa') }}</div>
            <div class="card-bady">
                <div class="navbar-menu-wrappr d-blok align-item-center justify-content-between mb-3">
                    <p class="mb-0"></p>
                    <div class="ml-3 mt-3">
                       
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah 
                        </button>

                        <button type="button" class="btn btn-primary" >
                            Edit
                        </button>

                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NOMOR INDUK</th>
                            <th>NISN</th>
                            <th>NAMA SISWA</th>
                            <th>KELAS</th>
                            <th>JURUSAN</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($siswa as $siswas)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$siswas->nomer_induk}}</td>
                        <td>{{$siswas->nisn}}</td>
                        <td>{{$siswas->nama_siswa}}</td>
                        <td>{{$siswas->kelas}}</td>
                        <td>{{$siswas->jurusan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH DATA SISWA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form class="forms-sample" method="post" action="{{ route('tambah')}}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
            <label for="nomer_induk">NOMOR INDUK</label>
            <input type="text" class="form-control"name="nomer_induk" id="nomer_induk" required/>
        </div>
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control"name="nisn" id="nisn" required/>
        </div>
        <div class="form-group">
            <label for="nama_siswa">NAMA SISWA</label>
            <input type="text" class="form-control"name="nama_siswa" id="nama_siswa" required/>
        </div>
        <div class="form-group">
            <label for="kelas">KELAS</label>
            <input type="text" class="form-control"name="kelas" id="kelas" required/>
        </div>
        <div class="form-group">
            <label for="jurusan">JURUSAN</label>
            <input type="text" class="form-control"name="jurusan" id="jurusan" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
