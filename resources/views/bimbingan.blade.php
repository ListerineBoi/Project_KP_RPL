@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Daftar Bimbingan </li>
  </ol>
</nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> DAFTAR MAHASISWA BIMBINGAN </strong> </div>

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
                                <th> Lembaga </th>
                            <tr>
                            <tr>
                                <td> 1 </td>
                                <td> 72180198 </td>
                                <td> Rico Alex </td>
                                <td> Kebakaran Sampah </td>
                                <td> PT.McD </td>
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