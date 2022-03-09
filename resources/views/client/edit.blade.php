@extends('layouts.app')
@section('css_before')
    <link rel="stylesheet" href="{{asset('template/vendor/select2/css/select2.min.css')}}">
    <style>
        .enterprisehide{
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Clients</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Clients</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <h4 class="w-50">Editer un client</h4>
                        <form action="{{ route('client.store') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $client->client_id }}" name="client_id">
                            <input type="hidden" value="{{ $client->date_ajout }}" name="date_ajout">
                            <div class="form-group">
                                <label for="type_client">Sélectionner le type du client</label>
                                <select class="form-control" onchange="filterFormInput()" required name="type_client" id="type_client">
                                    <option {{ $client->type_client=="0"?'selected':'' }} value="0">Personne physique</option>
                                    <option {{ $client->type_client=="1"?'selected':'' }} value="1">Entreprise</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 clienthide">
                                    <label for="nom_client">Nom<span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $client->nom_client }}" name="nom_client" id="nom_client" required placeholder="Nom" class="form-control">
                                </div>

                                <div class="form-group col-md-6 clienthide">
                                    <label for="prenom_client">prenom</label>
                                    <input type="text" value="{{ $client->prenom_client }}" name="prenom_client" id="prenom_client" placeholder="Prénom" class="form-control">
                                </div>
                            </div>

                            <div class="form-group enterprisehide" >
                                <label for="raison_s_client">Raison sociale<span class="text-danger">*</span></label>
                                <input type="text" value="{{ $client->raison_s_client }}" disabled name="raison_s_client" id="raison_s_client" placeholder="Raison sociale" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email_client">Email<span class="text-danger">*</span></label>
                                <input type="email" value="{{ $client->email_client }}"name="email_client" id="email_client" required placeholder="Email" class="form-control">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="phone_1">Téléphone 1<span class="text-danger">*</span></label>
                                    <input type="tel" value="{{ $client->phone_1_client }}" name="phone_1" id="phone_1" required placeholder="Téléphone" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone_2">Téléphone 2</label>
                                    <input type="tel" value="{{ $client->phone_2_client }}" name="phone_2" id="phone_2" placeholder="Téléphone" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="categorie">Pays</label>
                                <select class="form-control" required name="idpays" id="single-select">
                                    <option disabled="disabled" selected>Sélectionner un pays</option>
                                    @foreach($pays as $item)
                                        <option {{ $item->pays_is==$client->idpays?'selected':'' }} value="{{ $item->pays_id }}">{{ $item->nom_pays }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ville_client">Ville<span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $client->ville_client }}" name="ville_client" required id="ville_client" placeholder="Ville" class="form-control">
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="postale">Boite postale</label>
                                    <input type="text" value="{{ $client->postale }}" name="postale" id="postale" placeholder="" class="form-control">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="adresse_client">Adresse</label>
                                <input type="text" value="{{ $client->adresse_client }}" name="adresse_client" id="adresse_client" placeholder="Adresse" class="form-control">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 enterprisehide">
                                    <label for="contribuabe">Numéro de contibuabe</label>
                                    <input type="text" value="{{ $client->contribuabe }}" disabled name="contribuabe" id="contribuabe" placeholder="Contribuabe" class="form-control">
                                </div>

                                <div class="form-group enterprisehide col-md-6">
                                    <label for="rcm">RC</label>
                                    <input type="text" name="rcm" value="{{ $client->rcm }}" disabled id="rcm" placeholder="RC" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('script')
    <script>

        $(document).ready(function(){
            var type = $('#type_client').val();
            if (type==1){
                $('.enterprisehide').show(200)
                $('.clienthide').hide(200)
                $('#nom_client').prop('required',false)
                $('#raison_s_client').prop('required',true)
                $('#raison_s_client').attr('disabled',false)
                $('#nom_client').attr('disabled',true)
                $('#rcm').prop('required',true)
                $('#rcm').attr('disabled',false)
                $('#contribuabe').attr('disabled',false)
            }else {
                $('#raison_s_client').prop('required',false)
                $('#raison_s_client').attr('disabled',true)
                $('.enterprisehide').hide(200)
                $('.clienthide').show(200)
                $('#nom_client').prop('required',true)
                $('#nom_client').attr('disabled',false)
                $('#rcm').attr('disabled',true)
                $('#contribuabe').attr('disabled',true)
            }

        });
        function filterFormInput(){
            var type = $('#type_client').val();
            if (type==1){
                $('.enterprisehide').show(200)
                $('.clienthide').hide(200)
                $('#nom_client').prop('required',false)
                $('#raison_s_client').prop('required',true)
                $('#raison_s_client').attr('disabled',false)
                $('#nom_client').attr('disabled',true)
                $('#rcm').prop('required',true)
                $('#rcm').attr('disabled',false)
                $('#contribuabe').attr('disabled',false)
            }else {
                $('#raison_s_client').prop('required',false)
                $('#raison_s_client').attr('disabled',true)
                $('.enterprisehide').hide(200)
                $('.clienthide').show(200)
                $('#nom_client').prop('required',true)
                $('#nom_client').attr('disabled',false)
                $('#rcm').attr('disabled',true)
                $('#contribuabe').attr('disabled',true)
            }

        }
    </script>
    <!-- Selet search -->
    <script src="{{asset('template/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/select2-init.js')}}"></script>

@endsection