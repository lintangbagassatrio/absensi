@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">KELOLA JURUSAN</h1>
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
                            <th>NAMA JURUSAN</th>
                            <th>NAMA KAPROG</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($jurusan as $jurusans)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$jurusans->jurusan}}</td>
                        <td>{{$jurusans->namakaprog}}</td>
                        <td>
                            <div class="text-center">
                                <button type="button"  id="btn-edit-jurusans" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editjurusansModal" data-id="{{ $jurusans->id }}">EDIT</button>
                         
                                <a class="btn btn-sm btn-danger btn-rounded" href="/admin/kelolajurusan/delete/{{$jurusans->id}}">HAPUS</a>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH JURUSAN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form class="forms-sample" method="post" action="{{ route('tambahjurusan')}}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
            <label for="jurusan">NAMA JURUSAN</label>
            <input type="text" class="form-control"name="jurusan" id="jurusan" required/>
        </div>
        <div class="form-group"> 
            <label for="namakaprog">NAMA KAPROG</label>
            <input type="text" class="form-control"name="namakaprog" id="namakaprog" required/>
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

<div class="modal fade" id="editjurusansModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT JURUSAN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="get" action="{{ route('kelolajurusan.update')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- @method('PATCH') -->
                         <div class="form-group">
                     <label for="jurusan">NAMA JURUSAN</label>
                          <input type="text" class="form-control"name="jurusan" id="edit-jurusan" required/>
                            </div>
                        <div class="form-group">
                     <label for="namakaprog">NAMA KAPROG</label>
                        <input type="text" class="form-control"name="namakaprog" id="edit-namakaprog" required/>
                        </div>
                        </select>
                         </div>
                         <div class="modal-footer justify-content-center">
                            <input type="text" name="id" id="edit-id"/>
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
                        <th>NAMA JURUSAN</th>
                         <th>NAMA KAPROG</th>
                        <th>AKSI</th>
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
          $(document).on('click','#btn-edit-jurusans', function(){

               let id = $(this).data('id'); 

               $.ajax({
                    type: "get",
                    url: "{{url('admin/kelolajurusan/ajax')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                         $('#edit-jurusan').val(res.jurusan);
                         $('#edit-namakaprog').val(res.namakaprog);
                         $('#edit-id').val(res.id);
                    },
               });
          });
     });
    

     function deleteConfirmation(npm, nama) {
            swal.fire({
                title: "Hapus",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus jurusan dengan Nama " + nama +"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya lakukan",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "jurusans/delete/"+ npm,
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



