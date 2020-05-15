@extends('layouts.app')

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
                                    <td> NIM </td>
                                    <td> : </td>
                                    <td> 72180198 </td>
                                </tr>
                                <tr>
                                    <td> Nama </td>
                                    <td> : </td>
                                    <td> Rico Alex Sandra </td>
                                </tr>
                                <tr>
                                    <td> Semester </td>
                                    <td> : </td>
                                    <td> 2019/2020 </td>
                                </tr>
                                <tr>
                                    <td> Periode </td>
                                    <td> : </td>
                                    <td> Genap </td>
                                </tr>
                                <tr>
                                    <td> Email </td>
                                    <td> : </td>
                                    <td> rico.alex@si.ukdw.ac.id </td>
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
