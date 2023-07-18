@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">KELOLA PENJADWALAN</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-defauld">
            <div class="card-bady">
                <div class="navbar-menu-wrappr d-blok align-item-center justify-content-between mb-3">
                    <p class="mb-0"></p>
                    <div class="ml-3 mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah 
                        </button>
                    </div>
                </div>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>KODE MATA PELAJARAN</th>
                            <th>MATA PELAJARAN</th>
                            <th>KELAS</th>
                            <th>GURU</th>
                            <th>JURUSAN</th>
                            <th>TANGGAL</th>
                            <th>WAKTU</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($jadwal as $jadwals)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$jadwals->kode_mata_pelajaran}}</td>
                        <td>{{$jadwals->mata_pelajaran}}</td>
                        <td>{{$jadwals->idkelas}}</td>
                        <td>{{$jadwals->guru}}</td>
                        <td>{{$jadwals->jurusan}}</td>
                        <td>{{$jadwals->tanggal}}</td>
                        <td>{{$jadwals->waktu}}</td>
                        <td>
                            <div class="text-center">
                                <button type="button"  id="btn-edit-jadwals" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editjadwalsModal" data-id="{{ $jadwals->id }}">EDIT</button>
                         
                                <a class="btn btn-sm btn-danger btn-rounded" href="/admin/kelolapenjadwalan/delete/{{$jadwals->id}}">HAPUS</a>
                            </div>
                        </td>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH JADWAL PELAJARAN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form class="forms-sample" method="post" action="{{ route('tambahpenjadwalan')}}" enctype="multipart/form-data">
       @csrf
       <div class="form-group">
                            <label for="kode_mata_pelajaran">KODE MATA PELAJARAN</label>
                            <select name="kode_mata_pelajaran" class="form-control" id="kode_mata_pelajaran">
                                <option selected >Pilih kode mata kode_mata_pelajaran</option>
                                @foreach($pelajaran as $data)
                                    <option value="{{$data->id}}" id="getname">
                                            {{$data->kode_mata_pelajaran}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
         <div class="form-group">
                            <label for="mata_pelajaran">MATA PELAJARAN</label>
                            <select name="mata_pelajaran" class="form-control" id="mata_pelajaran">
                                <option selected >Pilih mata pelajaran</option>
                                @foreach($pelajaran as $data)
                                    <option value="{{$data->id}}" id="getname">
                                            {{$data->mata_pelajaran}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
                            <label for="idkelas">KELAS</label>
                            <select name="idkelas" class="form-control" id="idkelas">
                                <option selected >Pilih kelas</option>
                                @foreach($kelas as $data)
                                    <option value="{{$data->id}}" id="getname">
                                            {{$data->idkelas}} -  {{$data->jurusan}} -  {{$data->kelas}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
                            <label for="guru">GURU</label>
                            <select name="guru" class="form-control" id="guru">
                                <option selected >Pilih guru</option>
                                @foreach($guru as $data)
                                    <option value="{{$data->id}}" id="getname">
                                            {{$data->nama_guru}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
                            <label for="jurusan">JURUSAN</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option selected >Pilih jurusan</option>
                                @foreach($jurusan as $data)
                                    <option value="{{$data->id}}" id="getname">
                                            {{$data->jurusan}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
            <label for="tanggal">TANGGAL</label>
            <input type="date" class="form-control"name="tanggal" id="tanggal" required/>
        </div>
        <div class="form-group">
            <label for="waktu">WAKTU</label>
            <input type="time" class="form-control"name="waktu" id="waktu" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editjadwalsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT JADWAL PELAJARAN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="get" action="{{ route('kelolapenjadwalan.update')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- @method('PATCH') -->
                        <input type="id" class="form-control"name="id" id="edit-id" required/>
                        <div class="form-group">
                            <label for="kode_mata_pelajaran">KODE MATA PELAJARAN</label>
                            <select name="kode_mata_pelajaran" class="form-control" id="kode_mata_pelajaran">
                                <option selected >Pilih kode mata kode_mata_pelajaran</option>
                                @foreach($pelajaran as $data)
                                    <option value="{{$data->id}}" id="edit-getname">
                                            {{$data->kode_mata_pelajaran}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
         <div class="form-group">
                            <label for="mata_pelajaran">MATA PELAJARAN</label>
                            <select name="mata_pelajaran" class="form-control" id="mata_pelajaran">
                                <option selected >Pilih mata pelajaran</option>
                                @foreach($pelajaran as $data)
                                    <option value="{{$data->id}}" id="edit-getname">
                                            {{$data->mata_pelajaran}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
                            <label for="idkelas">KELAS</label>
                            <select name="idkelas" class="form-control" id="idkelas">
                                <option selected >Pilih kelas</option>
                                @foreach($kelas as $data)
                                    <option value="{{$data->id}}" id="edit-getname">
                                            {{$data->idkelas}} -  {{$data->jurusan}} -  {{$data->kelas}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
                            <label for="guru">GURU</label>
                            <select name="guru" class="form-control" id="edit-guru">
                                <option selected >Pilih guru</option>
                                @foreach($guru as $data)
                                    <option value="{{$data->id}}" id="edit-getname">
                                            {{$data->nama_guru}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
                            <label for="jurusan">JURUSAN</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option selected >Pilih jurusan</option>
                                @foreach($jurusan as $data)
                                    <option value="{{$data->id}}" id="edit-getname">
                                            {{$data->jurusan}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        <div class="form-group">
            <label for="tanggal">TANGGAL</label>
            <input type="date" class="form-control"name="tanggal" id="edit-tanggal" required/>
        </div>
        <div class="form-group">
            <label for="waktu">WAKTU</label>
            <input type="time" class="form-control"name="waktu" id="edit-waktu" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade " id="LihatData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH KELAS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="navbar-menu-wrappr d-flex align-item-center justify-content-between mb-3">
                <p class="mb-0"></p>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                    </button>
                </div>
            </div>
                    
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>KODE MATA PELAJARAN</th>
                         <th>MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th>GURU</th>
                        <th>JURUSAN</th>
                        <th>TANGGAL</th>
                        <th>WAKTU</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-warning">Lihat</button>
                        </td>
                    </tr>
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
 @stop

 @section('js')
 <script>
     $(function(){
          $(document).on('click','#btn-edit-jadwals', function(){

               let id = $(this).data('id'); 

               $.ajax({
                    type: "get",
                    url: "{{url('/admin/kelolapenjadwalan/ajax')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                         $('#edit-id').val(res.id);
                         $('#edit-kode_mata_pelajaran').val(res.kode_mata_pelajaran);
                         $('#edit-mata_pelajaran').val(res.mata_pelajaran);
                         $('#edit-idkelas').val(res.kelas);
                         $('#edit-guru').val(res.guru);
                         $('#edit-jurusan').val(res.jurusan);
                         $('#edit-tanggal').val(res.tanggal);
                         $('#edit-waktu').val(res.waktu);
                         $('#edit-id').val(res.id);
                    },
               });
          });
     });
    

     function deleteConfirmation(npm, nama) {
            swal.fire({
                title: "Hapus",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus jadwal pelajaran dengan Nama " + nama +"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya lakukan",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "jadwals/delete/"+ npm,
                        data: {_token: CSRF_TOKEN},
                        datatype: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                // REFRESH PAGE AFTER 2
                                setTimeout(function(){
                                    location.reload();
                                },1000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }


     </script>

@stop