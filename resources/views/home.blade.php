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
                                    <td> {{Auth::user()->NIM}}  </td>
                                </tr>
                                <tr>
                                    <td> Nama </td>
                                    <td> : </td>
                                    <td> {{Auth::user()->name}} </td>
                                </tr>
                                <tr>
                                    <td> Semester </td>
                                    <td> : </td>
                                    <td> {{DB::table('periode')->where('id_periode', Auth::user()->id_periode)->value('semester')}} </td>
                                </tr>
                                <tr>
                                    <td> Tahun </td>
                                    <td> : </td>
                                    <td> {{DB::table('periode')->where('id_periode', Auth::user()->id_periode)->value('tahun')}} </td>
                                </tr>
                                <tr>
                                    <td> Email </td>
                                    <td> : </td>
                                    <td> {{Auth::user()->email}} </td>
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
