@extends('layouts.app')

@section('content')
<div class="container">
<!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Verifikasi </li>
        </ol>
    </nav>

    <div class="col-md-4" >
        <select class="form-control">
            <option> KP </option>
            <option> Pra-KP </option>
            <option> Surat Keterangan </option>
        </select> <br>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Verifikasi KP </strong> </div>

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
                                <th> Judul </th>
                                <th> Tool </th>
                                <th> Spek </th>
                                <th> Action </th>
                                <th> Status </th>
                            <tr>
                            <tr>
                                <td> 1 </td>
                                <td> 72180198 </td>
                                <td> Rico Alex </td>
                                <td> Kebakaran Hutan </td>
                                <td> Pencil</td>
                                <td> Pencil </td>
                                <td>  
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"> Verifikasi </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"> Verifikasi KP </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            <div class="modal-body">
                                                <p> Yakin ingin memverifikasi ? </p>
                                                <p> NIM </p>
                                                <p> Nama </p>
                                                <p> Judul </p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                                                <button type="button" class="btn btn-success"> Konfirmasi </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </td>
                                <td> <button disabled="true" class="btn btn-success"> Y </button> </td>
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