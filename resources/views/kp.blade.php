@extends('layouts.app')

@section('content')
<div class="container">
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
    <li class="breadcrumb-item active">Pengajuan</li>
    <li class="breadcrumb-item active" aria-current="page">Kerja Praktek</li>
  </ol>
</nav>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Data Pengajuan KP </strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"> Semester </label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option> Genap </option>
                                <option> Gasal </option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="formGroupExampleInput"> Tahun </label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> NIM </label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Judul Kerja Prakter </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Tools </label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Spesifikasi Perangkat Lunak / Pekerjaan Kerja Praktek </label>
                            <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> Lembaga </label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Pimpinan </label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> No.Telepon </label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Alamat </label>
                            <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Fax </label>
                            <input type="text" class="form-control" id="formGroupExampleInput">
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Dokumen (PDF Scan) </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Daftar Pengajuan Pra KP </strong> </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <table class="table table-hover" align="center">
                                <tr>
                                    <th> No </th>
                                    <th> Judul </th>
                                    <th> Pembimbing </th>
                                    <th> Tanggal </th>
                                    <th> Disetujui </th>
                                </tr>
                                <tr>
                                    <td> 1 </td>
                                    <td> Kebakaran Hutan </td>
                                    <td> Dr. Argo Wibowo, S.Kom., </td>
                                    <td> 11/10/2019 </td>
                                    <td> YES </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-header"> <strong> Daftar Pengajuan KP </strong> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <table class="table table-hover" align="center">
                                <tr>
                                    <th> No </th>
                                    <th> Judul </th>
                                    <th> Pembimbing </th>
                                    <th> Tanggal </th>
                                    <th> Disetujui </th>
                                </tr>
                                <tr>
                                    <td> 1 </td>
                                    <td> Kebakaran Hutan </td>
                                    <td> Dr. Argo Wibowo, S.Kom., </td>
                                    <td> 11/10/2019 </td>
                                    <td> YES </td>
                                </tr>
                            </table>
                        </div>
                    </div>
             </div>
        </div>
    </div>
</div>

@endsection