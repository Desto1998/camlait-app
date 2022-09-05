@extends('layouts.app')
@section('title','| D.I-ADD')
@section('css_before')
    <link rel="stylesheet" href="{{asset('template/vendor/select2/css/select2.min.css')}}">
    <style>
        .hide{
            display: none;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Créer une démande d'intervention</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">D.I</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">creer</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">

{{--                        <h4 class="card-title">{{ __('Créer un utilisateur') }}</h4>--}}
                        <form method="POST" action="{{ route('di.store') }}" id="registerForm">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="date_accepte">Date souhaitée <span class="text-danger">*</span></label>
                                    <input type="date" max="{{ date('Y-m-d') }}" name="date_accepte" id="date_accepte" class="form-control date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_souhaite">Date acceptée <span class="text-danger">*</span></label>
                                    <input type="date" max="{{ date('Y-m-d') }}" name="date_souhaite" id="date_souhaite" class="form-control date" required>
                                </div>
                            </div>
{{--                            id="single-select"--}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="emet">Emmetteur <span class="text-danger">*</span></label>
                                    <select class="form-control select2" required name="emet" id="emet">
                                        <option disabled="disabled" selected>Sélectionner un emmetteur</option>
                                        @foreach($personnels as $item)
                                            <option value="{{ $item->personnel_id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dest">Destinataire <span class="text-danger">*</span></label>
                                    <select class="form-control select2" required name="dest" id="dest">
                                        <option disabled="disabled" selected>Sélectionner un destinataire</option>
                                        @foreach($personnels as $item)
                                            <option value="{{ $item->personnel_id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="localisation">Localisation<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="localisation" id="localisation" required placeholder="Localisation..."></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="code_sympt">Symptome <span class="text-danger">*</span></label>
                                    <select class="form-control" required name="code_sympt" id="code_sympt">
                                        <option disabled="disabled" selected>Sélectionner un symptome</option>
                                        <option>Origine mécanique</option>
                                        <option>Origine logiciele</option>
                                        <option>Origine informatique</option>
                                        <option>Panne normale</option>
                                        <option>Disfontionnement d'un appareil</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="priorite">Priorité <span class="text-danger">*</span></label>
                                    <select class="form-control" required name="priorite" id="priorite">
                                        <option disabled="disabled" selected>Sélectionner une priorité</option>
                                        <option>Nomale</option>
                                        <option>Elevé</option>
                                        <option>Basse</option>
                                        <option>Tres urgent</option>
                                        <option>Urgent</option>
                                        <option>Nom urgent</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="observation">Observation<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="observation" id="observation" required placeholder="Observation..."></textarea>
                            </div>
                            <label for="" class="nav-label">Compléments</label>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="idequipement">Equipement <span class="text-danger">*</span></label>
                                    <select class="form-control select2" required name="idequipement" id="idequipement">
                                        <option disabled="disabled" selected>Sélectionner un equipement</option>
                                        @foreach($equipements as $item)
                                            <option value="{{ $item->equipement_id}}">{{ $item->code }} {{ $item->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="etat_equipement">Etat Equipement <span class="text-danger">*</span></label>
                                    <select class="form-control select2" required name="etat_equipement" id="etat_equipement">
                                        <option disabled="disabled" selected>Sélectionner un etat</option>
                                        <option>Ne fonctionne plus</option>
                                        <option>Fonctionne mais pas normal</option>
                                        <option>Endommagé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="organe">Organe <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="organe" id="organe">
{{--                                    <select class="form-control select2" required name="organe" id="organe">--}}
{{--                                        <option disabled="disabled" selected>Sélectionner un equipement</option>--}}
{{--                                        @foreach($equipements as $item)--}}
{{--                                            <option value="{{ $item->equipement_id}}">{{ $item->code }} {{ $item->libelle}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="etat_organe">Etat organe <span class="text-danger"></span></label>
                                    <select class="form-control select2" required name="etat_organe" id="etat_organe">
                                        <option disabled="disabled" selected>Sélectionner un etat</option>
                                        <option>Ne fonctionne plus</option>
                                        <option>Fonctionne mais pas normal</option>
                                        <option>Endommagé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0 text-centers justify-content-end">
                                <div class="col-md-12">
                                    <button type="reset" class="btn btn-light">
                                        {{ __('Annuler') }}
                                    </button>

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
    <script src="{{asset('template/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/select2-init.js')}}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
