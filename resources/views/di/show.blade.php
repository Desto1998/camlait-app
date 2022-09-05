@extends('layouts.app')
@section('title','| D-I-DETAILS')
@section('css_before')
    <link href="{{asset('template/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/vendor/select2/css/select2.min.css')}}">
    <style>
        table thead tr th{
            color: white!important;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>DETAILS D.I {{ $data->num_diS }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">D.I</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Details</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#infos">Infos</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade fade show active" id="infos">

                                    <div class="pt-4">
                                        <div class="col-md-12 mb-5">
                                            <label class="float-left h4">Informations du D.I</label>
                                            <a href="{{ route('di.edit',['id'=>$data->di_id]) }}" class="btn btn-sm btn-warning float-right" title="Editer le client">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="table-responsive-sm table-responsive-md">
                                            <table class="table text-black fs-4 font-weight-bold table-bordered table-hover">
                                                <tr>
                                                    <td>
                                                        D.I Code
                                                    </td>
                                                    <td>
                                                        {{ $data->num_di }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Date souhaité</td>
                                                    <td>{{ $data->date_souhaite }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Emmeteur</td>
                                                    <td>{{ $emet->nom }} {{ $emet->prenom }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Destinataire</td>
                                                    <td>{{ $emet->nom }} {{ $emet->prenom }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Localisation</td>
                                                    <td>{{ $data->localisation}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Priorité</td>
                                                    <td>{{ $data->priorite }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Symptome</td>
                                                    <td>{{ $data->code_sympt }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Observation</td>
                                                    <td>{{ $data->observation }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Equipement</td>
                                                    <td>{{ $equipement->code }}  {{ $equipement->libelle }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Etat equipement</td>
                                                    <td>{{ $data->etat_equipement}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Organe</td>
                                                    <td>{{ $data->organe }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Etat organe</td>
                                                    <td>{{ $data->etat_organe }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date creation</td>
                                                    <td>{{ $data->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Cree par</td>
                                                    <td>
                                                        {{ $user->firstname }} {{ $user->lastname }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="tab-pane" id="detail" role="tabpanel">--}}
{{--                                    <div class="pt-4">--}}
{{--                                        @include('client.devis')--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane fade" id="message">--}}
{{--                                    <div class="pt-4">--}}
{{--                                        @include('client.facture')--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

    <!-- Datatable -->
    <script src="{{asset('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <!-- Selet search -->
    <script src="{{asset('template/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/select2-init.js')}}"></script>

@stop
