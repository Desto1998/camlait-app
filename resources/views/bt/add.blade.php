@extends('layouts.app')
@section('title','| D.I-ADD')
@section('css_before')
    <link rel="stylesheet" href="{{asset('template/vendor/select2/css/select2.min.css')}}">
    <style>
        .hide{
            display: none!important;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Créer un bon de travail</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">B.T</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">créer</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">

                        {{--                        <h4 class="card-title">{{ __('Créer un utilisateur') }}</h4>--}}
                        <form method="POST" action="{{ route('bt.store') }}" id="registerForm">
                            @csrf
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label for="date_accepte">Date souhaitée <span class="text-danger">*</span></label>--}}
{{--                                    <input type="date" max="{{ date('Y-m-d') }}" name="date_accepte" id="date_accepte" class="form-control date" required>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-md-6">--}}
{{--                                    <label for="date_souhaite">Date acceptée <span class="text-danger">*</span></label>--}}
{{--                                    <input type="date" max="{{ date('Y-m-d') }}" name="date_souhaite" id="date_souhaite" class="form-control date" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="di_id">D.I N° <span class="text-danger">*</span></label>
                                    <select class="form-control select2" required name="di_id" id="di_id">
{{--                                        <option disabled="disabled" selected>Sélectionner une D.I</option>--}}
                                        @foreach($di as $item)
                                            <option value="{{ $item->di_id }}">{{ $item->num_di }} {{ $item->observation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="intervenant_1">Intervenant <span class="text-danger">*</span></label>
                                    <select class="form-control select2" required name="intervenant_1" id="intervenant_1">
                                        <option disabled="disabled" selected>Sélectionner un destinataire</option>
                                        @foreach($personnels as $item)
                                            <option value="{{ $item->personnel_id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--                            id="single-select"--}}

                            @foreach($di as $d)
                                <div class="di-bloc hide" id="di-bloc{{$d->di_id}}">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="emet{{$d->di_id}}">Emmetteur <span class="text-danger">*</span></label>
                                            <select class="form-control select2" disabled name="emet" id="emet{{$d->di_id}}">
                                                @foreach($personnels as $item)
                                                    <option {{ $d->emet==$item->personnel_id? "selected":"" }} value="{{ $item->personnel_id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="dest{{$d->di_id}}">Destinataire <span class="text-danger">*</span></label>
                                            <select class="form-control select2" disabled name="dest" id="dest{{$d->di_id}}">
{{--                                                <option disabled="disabled" selected>Sélectionner un destinataire</option>--}}
                                                @foreach($personnels as $item)
                                                    <option {{ $d->dest==$item->personnel_id? "selected":"" }} value="{{ $item->personnel_id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="code_sympt{{$d->di_id}}">Symptome <span class="text-danger">*</span></label>
                                            <select class="form-control" disabled name="code_sympt" id="code_sympt{{$d->di_id}}">
                                                {{--                                            <option disabled="disabled" selected>Sélectionner un symptome</option>--}}
                                                <option {{ $d->code_sympt=="Origine mécanique"? "selected":"" }}>Origine mécanique</option>
                                                <option {{ $d->code_sympt=="Origine logiciele"? "selected":"" }}>Origine logiciele</option>
                                                <option {{ $d->code_sympt=="Origine informatique"? "selected":"" }}>Origine informatique</option>
                                                <option {{ $d->code_sympt=="Panne normale"? "selected":"" }}>Panne normale</option>
                                                <option {{ $d->code_sympt=="Disfontionnement d'un appareil"? "selected":"" }}>Disfontionnement d'un appareil</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="priorite{{$d->di_id}}">Priorité <span class="text-danger">*</span></label>
                                            <select class="form-control" disabled name="priorite" id="priorite{{$d->di_id}}">
                                                {{--                                            <option disabled="disabled" selected>Sélectionner une priorité</option>--}}
                                                <option {{ $d->priorite=="Nomale"? "selected":"" }}>Nomale</option>
                                                <option {{ $d->priorite=="Elevé"? "selected":"" }}>Elevé</option>
                                                <option {{ $d->priorite=="Basse"? "selected":"" }}>Basse</option>
                                                <option {{ $d->priorite=="Tres urgent"? "selected":"" }}>Tres urgent</option>
                                                <option {{ $d->priorite=="Urgent"? "selected":"" }}>Urgent</option>
                                                <option {{ $d->priorite=="Nom urgent"? "selected":"" }}>Nom urgent</option>
                                            </select>
                                        </div>

                                    </div> <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="idequipement{{$d->di_id}}">Equipement <span class="text-danger">*</span></label>
                                            <select class="form-control select2" disabled name="idequipement" id="idequipement{{$d->di_id}}">
                                                {{--                                            <option disabled="disabled" selected>Sélectionner un equipement</option>--}}
                                                @foreach($equipements as $item)
                                                    <option {{ $d->idequipement==$item->equipement_id? "selected":"" }} value="{{ $item->equipement_id}}">{{ $item->code }} {{ $item->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="etat_equipement{{$d->di_id}}">Etat Equipement <span class="text-danger">*</span></label>
                                            <select class="form-control select2" disabled name="etat_equipement" id="etat_equipement{{$d->di_id}}">
                                                {{--                                            <option disabled="disabled" selected>Sélectionner un etat</option>--}}
                                                <option {{ $d->etat_equipement=="Ne fonctionne plus"? "selected":"" }}>Ne fonctionne plus</option>
                                                <option {{ $d->etat_equipement=="Fonctionne mais pas normal"? "selected":"" }}>Fonctionne mais pas normal</option>
                                                <option {{ $d->etat_equipement=="Endommagé"? "selected":"" }}>Endommagé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="organe{{$d->di_id}}">Organe <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" disabled name="organe" value="{{ $d->organe }}" id="organe{{$d->di_id}}">
                                            {{--                                    <select class="form-control select2" required name="organe" id="organe">--}}
                                            {{--                                        <option disabled="disabled" selected>Sélectionner un equipement</option>--}}
                                            {{--                                        @foreach($equipements as $item)--}}
                                            {{--                                            <option value="{{ $item->equipement_id}}">{{ $item->code }} {{ $item->libelle}}</option>--}}
                                            {{--                                        @endforeach--}}
                                            {{--                                    </select>--}}
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="etat_organe{{$d->di_id}}">Etat organe <span class="text-danger"></span></label>
                                            <select class="form-control select2" disabled name="etat_organe" id="etat_organe{{$d->di_id}}">
                                                {{--                                            <option disabled="disabled" selected>Sélectionner un etat</option>--}}
                                                <option{{ $d->etat_organe=="Ne fonctionne plus"? "selected":"" }}>Ne fonctionne plus</option>
                                                <option {{ $d->etat_organe=="Fonctionne mais pas normal"? "selected":"" }}>Fonctionne mais pas normal</option>
                                                <option {{ $d->etat_organe=="Endommagé"? "selected":"" }}>Endommagé</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
{{--                            <label for="" class="nav-label">Compléments</label>--}}
                            <div class="form-group">
                                <label for="observation">Observation<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="observation" id="observation" required placeholder="Observation..."></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="code_sympt">Rubriques <span class="text-danger">*</span></label>
                                    <select class="form-control" required name="code_sympt" id="code_sympt">
                                        <option>Réparation</option>
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
        // $('.di-bloc').toggle();
        // function showDi(id){
        //
        // }
        $('#di_id').on('change',function (e){
            var  id = $('#di_id').val();
            $('.di-bloc').hide(200);
            $('#di-bloc'+id).show(200).removeClass("hide");
            // $('#di-bloc'+id).show(200);
        });
    </script>
@endsection
