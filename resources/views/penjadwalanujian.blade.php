@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Penjadwalan Ujian </li>
        </ol>
    </nav>

    <div class="col-md-4" >
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Set Jadwal Ujian  </button> <br><br>
    </div>

    <div class="col-md-4" >
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"> Set Batas Ujian </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <div class="modal-body">
                        <p> NIM </p>
                        <select class="form-control">
                            <option> NIM 1 </option>
                            <option> NIM 2 </option>
                        </select> <br>

                        <p> Nama </p>
                        <select class="form-control">
                            <option> Nama 1 </option>
                            <option> Nama 2 </option>
                        </select> <br>

                        <p> Tanggal Ujian </p>
                        <input type="date" name="tglujian" class="form-control"> <br>

                        <p> Ruangan </p>
                        <input type="text" name="ruang" class="form-control">


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                        <button type="button" class="btn btn-success"> Konfirmasi </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Jadwal Ujian </strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <div class="container">
                        <table class="table table-hover">
                            <tr>
                                <th> No </th>
                                <th> NIM </th>
                                <th> Nama </th>
                                <th> Dosen Pendamping </th>
                                <th> Dosen Penguji </th>
                            <tr>
                            <tr>
                                <td> 1 </td>
                                <td> 72180198 </td>
                                <td> Rico Alex </td>
                                <td> Dr. Argo Wibowo, S.Kom. </td>
                                <td> Joko Purwadi S.Kom., M.Kom </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> <br>

            <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('home') }}"> BACK </a> </button>

        </div>


    </div>
</div>

@endsection