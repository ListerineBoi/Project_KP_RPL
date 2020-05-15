@extends('layouts.appD')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container"> 
                        <div class="form-group">
                            <table class="table table-hover">
                                <tr>
                                    <td> NIK </td>
                                    <td> : </td>
                                    <td> 1D0613 </td>
                                </tr>
                                <tr>
                                    <td> Nama </td>
                                    <td> : </td>
                                    <td> Argo Wibowo </td>
                                </tr>
                                <tr>
                                    <td> Email </td>
                                    <td> : </td>
                                    <td> argo.wibowo@staff.ukdw.ac.id </td>
                                </tr>
                                <tr>
                                    <td> Status </td>
                                    <td> : </td>
                                    <td> Koordinator </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
