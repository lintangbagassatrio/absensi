@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">KELOLA  DATA KELAS</h1>
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
                            <th>KELAS</th>
                            <th>JURUSAN</th>
                            <th>NAMA KELAS</th>
                            <th>WALI KELAS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($kelas as $kelass)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$kelass->idkelas}}</td>
                        <td>{{$kelass->jurusan}}</td>
                        <td>{{$kelass->kelas}}</td>
                        <td>{{$kelass->walikelas}}</td>
                        <td>
                            <div class="text-center">
                                <button type="button"  id="btn-edit-kelas" class="btn btn-success" data-toggle="modal" data-target="#editkelas" data-id="{{ $kelass->id }}">EDIT</button>
                         
                                <a class="btn btn-sm btn-danger btn-rounded" href="/admin/kelolakelas/delete/{{$kelass->id}}">HAPUS</a>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH KELAS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post" action="{{ route('tambahkelas') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idkelas">KELAS</label>
                        <input type="text" class="form-control"name="idkelas" id="idkelas" required/>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">JURUSAN</label>
                        <select name="jurusan" class="form-control" id="jurusan">
                            <option selected >Pilih Jurusan</option>
                            @foreach($jurusan as $data)
                                <option value="{{$data->jurusan}}" id="getname">
                                        {{$data->jurusan}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">NAMA KELAS</label>
                        <input type="text" class="form-control"name="kelas" id="kelas" required/>
                    </div>
                    <div class="form-group">
                        <label for="walikelas">WALI KELAS</label>
                        <input type="text" class="form-control"name="walikelas" id="walikelas" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editkelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT KELAS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="get" action="{{ route('kelolakelas.update')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- @method('PATCH') -->
                        <div class="form-group">
                            <label for="idkelas">KELAS</label>
                            <input type="text" class="form-control"name="idkelas" id="edit-idkelas" required/>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">JURUSAN</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option selected >Pilih Jurusan</option>
                                @foreach($jurusan as $data)
                                    <option value="{{$data->id}}" id="getname">
                                            {{$data->jurusan}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">NAMA KELAS</label>
                            <input type="text" class="form-control"name="kelas" id="edit-kelas" required/>
                        </div>
                        
                        <div class="form-group">
                            <label for="walikelas">WALI KELAS</label>
                            <input type="text" class="form-control"name="walikelas" id="edit-walikelas" required/>
                        </div>
                         </div>
                         <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                         </div>
                    </form>
               </div>
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
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>NAMA KELAS</th>
                        <th>WALI KELAS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
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
          $(document).on('click','#btn-edit-kelas', function(){

               let id = $(this).data('id'); 

               $.ajax({
                    type: "get",
                    url: "{{url('/admin/kelolakelas/ajax')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                         $('#edit-idkelas').val(res.kelas);
                         $('#edit-jurusan').val(res.jurusan);
                         $('#edit-kelas').val(res.kelas);
                         $('#edit-walikelas').val(res.walikelas);
                         $('#edit-id').val(res.id);
                    },
               });
          });
     });
    

     function deleteConfirmation(npm, nama) {
            swal.fire({
                title: "Hapus",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data Siswa dengan Nama " + nama +"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya lakukan",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "kelass/delete/"+ npm,
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
