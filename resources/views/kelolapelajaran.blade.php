@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">KELOLA MATA PELAJARAN</h1>
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
                            <th>GURU</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($pelajaran as $pelajarans)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$pelajarans->kode_mata_pelajaran}}</td>
                        <td>{{$pelajarans->mata_pelajaran}}</td>
                        <td>{{$pelajarans->guru}}</td>
                        <td>
                            <div class="text-center">
                                <button type="button"  id="btn-edit-pelajarans" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editpelajaransModal" data-id="{{ $pelajarans->id }}">EDIT</button>
                         
                                <a class="btn btn-sm btn-danger btn-rounded" href="/admin/kelolapelajaran/delete/{{$pelajarans->id}}">HAPUS</a>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH MATA PELAJARAN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form class="forms-sample" method="post" action="{{ route('tambahpelajaran')}}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
            <label for="kode_mata_pelajaran">KODE MATA PELAJARAN</label>
            <input type="text" class="form-control"name="kode_mata_pelajaran" id="kode_mata_pelajaran" required/>
        </div>
        <div class="form-group">
            <label for="mata_pelajaran">MATA PELAJARAN</label>
            <input type="text" class="form-control"name="mata_pelajaran" id="mata_pelajaran" required/>
        </div>
        <div class="form-group">
            <label for="guru">GURU</label>
            <input type="text" class="form-control"name="guru" id="guru" required/>
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

<div class="modal fade" id="editpelajaransModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT MATA PELAJARAN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="get" action="{{ route('kelolapelajaran.update')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- @method('PATCH') -->
                        <div class="form-group">
                             <label for="kode_mata_pelajaran">KODE MATA PELAJARAN</label>
                             <input type="text" class="form-control"name="kode_mata_pelajaran" id="edit-kode_mata_pelajaran" required/>
                        </div>
                        <div class="form-group">
                             <label for="mata_pelajaran">MATA PELAJARAN</label>
                             <input type="text" class="form-control"name="mata_pelajaran" id="edit-mata_pelajaran" required/>
                        </div>
                        <div class="form-group">
                            <label for="guru">GURU</label>
                            <input type="text" class="form-control"name="guru" id="edit-guru" required/>
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
                        <th>KODE MATA PELAJARAN</th>
                         <th>MATA PELAJARAN</th>
                        <th>GURU</th>
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
          $(document).on('click','#btn-edit-pelajarans', function(){

               let id = $(this).data('id'); 

               $.ajax({
                    type: "get",
                    url: "{{url('/admin/kelolapelajaran/ajax')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                         $('#edit-kode_mata_pelajaran').val(res.kode_mata_pelajaran);
                         $('#edit-mata_pelajaran').val(res.mata_pelajaran);
                         $('#edit-guru').val(res.guru);
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
                        url: "pelajarans/delete/"+ npm,
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



