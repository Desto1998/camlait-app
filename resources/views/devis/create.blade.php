@extends('layouts.app')
@section('css_before')
    <link rel="stylesheet" href="{{asset('template/vendor/select2/css/select2.min.css')}}">
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Créer un dévis</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Devis</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <!-- Button trigger modal -->
{{--                        <h4 class="w-50">Ajouter un devis</h4>--}}
                        <form action="{{ route('devis.store') }}" method="post" id="devis-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 float-left d-flex">
                                    <div class="form-group col-md-6">
                                        <label for="date">Date de la profomat: </label>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <label for="echeance">Date d'echeance: </label>--}}
{{--                                        <input type="date" name="echeance" id="echeance" class="form-control" required>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col-md-7 float-right d-flex" id="client-block">
                                    <div class="form-group col-md-6">
                                        <label for="echeance">Client: </label>
                                        <select name="idclient" id="single-select" class="form-control">
                                            <option selected="selected" disabled>Sélectionez un client</option>
                                            @foreach($clients as $cl)
                                                <option
                                                    value="{{ $cl->client_id }}">{{ $cl->nom_client }} {{ $cl->prenom_client }}{{ $cl->raison_s_client }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-center pl-3">Coordonnées du client</label>
                                        @foreach($clients as $cl)
                                            <div class="hidden infos_client pl-3" id="infos_client{{ $cl->client_id }}">
                                                <label
                                                    class="h5 font-weight-bold mt-1">{{ $cl->nom_client }} {{ $cl->prenom_client }}{{ $cl->raison_s_client }}</label><br>
                                                <label
                                                    class="h5 font-weight-bold mt-1">Tel: {{ $cl->phone_1_client }}  {{ $cl->phone_client }}</label><br>
                                                <label
                                                    class="h5 font-weight-bold mt-1">Bp: {{ $cl->postale }}</label><br>
                                                {{--                                                <label class="h5 font-weight-bold mt-1"> {{ $cl->rcm }}</label><br>--}}
                                                {{--                                                <label class="h5 font-weight-bold mt-1">NC: {{ $cl->contribuabe }}</label><br>--}}
                                            </div>

                                        @endforeach
                                    </div>


                                </div>


                            </div>
                            <div class="form-group">
                                <label for="objet">Objet: </label>
                                <input type="text" name="objet" id="objet" class="form-control" required>
                            </div>
                            <div class="for-produit" style="max-height: 300px; overflow: auto">
                                <label class="nav-label">Produits</label>
                                <table class="w-100 table table-striped table-bordered table-active" id="table-produit">
                                    <thead class="bg-primary text-white text-center">
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Qté</th>
                                        <th>P.U.HT.</th>
                                        <th>Remise</th>
                                        <th>TVA</th>
                                        <th>M. HT</th>
                                        <th>M. TTC</th>
                                        <th><i class="fa fa-trash"></i></th>
                                    </tr>

                                    </thead>
                                    <tbody style="color: #000000!important;">
                                    <tr class="text-black  produit-input font-weight-bold" id="product-row0">
                                        <td style="width: 250px;">
                                            <select name="idproduit[]" class="dropdown-groups form-control" id="select-pro0" onchange="setPrix(0)" style="color: #000000">
                                                <option selected="selected" disabled>Sélectionez un produit</option>
                                                @foreach($categories as $cat)
                                                    <optgroup class="" label="{{ $cat->titre_cat }}">
                                                        @foreach($produits as $p)
                                                            @if ($p->idcategorie===$cat->categorie_id)
                                                                <option
                                                                    value="{{ $p->produit_id }}">{{ $p->titre_produit }}</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" min="0" value="0" name="quantite[]" onchange="calculeHT(0)" id="quantite0" class="form-control quantite"
                                                   required></td>
                                        <td><input type="number" min="0" value="0" name="prix[]" onchange="calculeHT(0)" id="prix0" class="form-control prix"
                                                   required></td>
                                        <td><input type="number" min="0" value="0" name="remise[]" onchange="calculeHT(0)" step="any" id="remise0"
                                                   class="form-control remise" required></td>
                                        <td><input type="number" min="0" value="0" name="tva[]" step="any" id="tva0" onchange="calculeHT(0)"
                                                   class="form-control tva" required></td>
                                        <td><input type="number" min="0" readonly  name="totalHT[]" value="0" step="any" id="totalHT0"
                                                   class="form-control totalHT"></td>
                                        <td><input type="number" min="0" value="0" readonly name="totalTTC[]" step="any" id="totalTTC0"
                                                   class="form-control totalTTC"></td>
                                        <td class="text-center">
                                            <button type="button" onclick="removeLigne(0)"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 d-flex">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-sm btn-primary" id="add-row-produit"><i
                                            class="fa fa-plus"></i> Ajouter une ligne
                                    </button>
                                </div>

                                <div class="col-md-8 d-flex">
                                    <div class="d-flex form-group col-md-6">
                                        <label>Montant HT</label>
                                        <input type="number" readonly name="ht" id="ht" class="form-control">
                                    </div>
                                    <div class="d-flex form-group col-md-6">
                                        <label>Montant TTC</label>
                                        <input type="number" readonly name="ttc" id="ttc" class="form-control">
                                    </div>
                                </div>


                            </div>

                            <div class="row mt-2">
                                <div class="col-md-3 form-group">
                                    <label for="validite">Validité de l'offre(en semaine)<span class="text-danger"> *</span></label>
                                    <input type="number" id="validite" required min="0" name="validite"
                                           class="form-control">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="disponibilite">Disponibilité<span class="text-danger"> *</span></label>
                                    <input type="text" id="disponibilite" required min="0" name="disponibilite"
                                           class="form-control">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Garentie<span class="text-danger"> *</span></label>
                                    <input type="text" min="0" name="garentie" class="form-control">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="condition">Conditions financières<span
                                            class="text-danger"> *</span></label>
                                    <input type="text" id="condition" required min="0" name="condition"
                                           class="form-control">
                                </div>
                            </div>
                            <hr class="mt-2">

                            <div class="for-produit" style="max-height: 300px; overflow: auto">
                                <label class="nav-label">OFFRE COMPLEMENTAIRE</label>
                                <table class="w-100 table table-striped table-bordered table-active" id="table-complement">
                                    <thead class="bg-primary text-white text-center">
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Qté</th>
                                        <th>P.U.HT.</th>
                                        <th>Remise</th>
                                        <th>TVA</th>
                                        <th>M. HT</th>
                                        <th>M. TTC</th>
                                        <th><i class="fa fa-trash"></i></th>
                                    </tr>

                                    </thead>
                                    <tbody style="color: #000000!important;">
                                    <tr class="text-black  produit-input font-weight-bold" id="complement-row0">
                                        <td style="width: 250px;">
                                            <select name="idproduit_com[]" class="dropdown-groups form-control" id="select-com0" onchange="setComPrix(0)" style="color: #000000">
                                                <option selected="selected" disabled>Sélectionez un produit</option>
                                                @foreach($categories as $cat)
                                                    <optgroup class="" label="{{ $cat->titre_cat }}">
                                                        @foreach($produits as $p)
                                                            @if ($p->idcategorie===$cat->categorie_id)
                                                                <option
                                                                    value="{{ $p->produit_id }}">{{ $p->titre_produit }}</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" value="0" min="0" name="quantite_com[]" onchange="calculeComHT(0)" id="quantite_com0" class="form-control quantite_com"
                                                   ></td>
                                        <td><input type="number" value="0" min="0" name="prix_com[]" onchange="calculeComHT(0)" id="prix_com0" class="form-control prix_com"
                                                   ></td>
                                        <td><input type="number" value="0" min="0" name="remise_com[]" onchange="calculeComHT(0)" step="any" id="remise_com0"
                                                   class="form-control remise_com"></td>
                                        <td><input type="number" value="0" min="0" name="tva_com[]" step="any" id="tva_com0" onchange="calculeComHT(0)"
                                                   class="form-control tva_com"></td>
                                        <td><input type="number" min="0" readonly  name="total_comHT[]" value="0" step="any" id="total_comHT0"
                                                   class="form-control total_comHT"></td>
                                        <td><input type="number" min="0" value="0" readonly name="total_comTTC[]" step="any" id="total_comTTC0"
                                                   class="form-control total_comTTC"></td>
                                        <td class="text-center">
                                            <button type="button" onclick="removeComLigne(0)"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <div class="col-md-12 d-flex mb-3">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-sm btn-primary" id="add-row-complement"><i
                                                class="fa fa-plus"></i> Ajouter une ligne
                                        </button>
                                    </div>
{{--                                    <div class="col-md-8 d-flex">--}}
{{--                                        <div class="d-flex form-group col-md-6">--}}
{{--                                            <label>Montant HT</label>--}}
{{--                                            <input type="number" readonly name="ht" id="ht" class="form-control">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex form-group col-md-6">--}}
{{--                                            <label>Montant TTC</label>--}}
{{--                                            <input type="number" readonly name="ttc" id="ttc" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

{{--    ici on garde les donnees des produit pour ne pas attaquer le serveur a chaque fois--}}
    @foreach($produits as $p)

        <input type="hidden" name="produit_idproduit" value="{{ $p->produit_id }}" id="data_p_idproduit{{ $p->produit_id }}">
        <input type="hidden" name="produit_reference" value="{{ $p->reference }}" id="data_p_reference{{ $p->produit_id }}">
        <input type="hidden" name="produit_prix" value="{{ $p->prix_produit }}" id="data_p_prix{{ $p->produit_id }}">
        <input type="hidden" name="produit_quantite" value="{{ $p->quantite_produit }}" id="data_p_quantite{{ $p->produit_id }}">
        <input type="hidden" name="produit_categorie" value="{{ $p->idcategorie }}" id="data_p_categorie{{ $p->idcategorie }}">

    @endforeach
@endsection
@section('script')
    <script>
        //  variabes qui comptes les entrees
        var totalProduit = 0;
        var totalComplement = 0;
        $(document).ready(function () {
            // ici on affiche les informations du client en fonction du client selectionneee

            $('#single-select').on('change', function (e) {
                var idclient = $('#single-select').val();
                // on cache d'abord toutes les infos client
                $('.infos_client').hide(200);
                //on affiche l'info client correspondant
                $('#infos_client' + idclient).show(250);
            });

            // cette methode ajoute une nouvelle ligne de produit sur le tableau
            $('#add-row-produit').on('click', function (e) {

                totalProduit++;
                var cloned = $("#table-produit tbody").find("tr").first().clone();
                var id = 'product-row' + totalProduit;
                // $('.dropdown-groups').val(null).trigger('change');
                var selectid = 'select-pro' + totalProduit;
                var row = '<tr class="text-black  produit-input font-weight-bold" id="' + id + '">' +
                    '<td style="width: 250px;">' +
                    '<select onchange="setPrix('+totalProduit+')" class="dropdown-groups form-control" id="' + selectid + '" style="color: #000000" name="idproduit[]">'+
                    '<option selected="selected" disabled>Sélectionez un produit</option>';
                row += '@foreach($categories as $cat)' +
                    '<optgroup class="" label="{{ $cat->titre_cat }}">' +
                    '@foreach($produits as $p)' +
                    ' @if ($p->idcategorie===$cat->categorie_id)' +
                    '<option value="{{ $p->produit_id }}">{{ $p->titre_produit }}</option>' +
                    '@endif' +
                    ' @endforeach' +
                    '</optgroup>' +
                    ' @endforeach' +
                    '</select>' +
                    ' </td>';
                row += '<td><input type="number" min="0" name="quantite[]" value="0" onchange="calculeHT('+totalProduit+')" id="quantite'+totalProduit+'" class="form-control quantite" required></td>' +
                    '<td><input type="number" min="0" name="prix[]" value="0" onchange="calculeHT('+totalProduit+')" id="prix'+totalProduit+'" class="form-control prix" required></td>' +
                    '<td><input type="number" min="0" name="remise[]" value="0" onchange="calculeHT('+totalProduit+')" id="remise'+totalProduit+'" step="any" class="form-control remise" required></td>' +
                    '<td><input type="number" min="0"  name="tva[]" value="0" onchange="calculeHT('+totalProduit+')"  id="tva'+totalProduit+'" step="any" class="form-control tva" required></td>' +
                    '<td><input type="number" min="0" value="0"  readonly name="totalHT[]" id="totalHT'+totalProduit+'" step="any" class="form-control totalHT" ></td>' +
                    '<td><input type="number" min="0" value="0" readonly name="totalTTC[]" id="totalTTC'+totalProduit+'" step="any" class="form-control totalTTC" ></td>' +
                    '<td class="text-center"><button type="button" onclick="removeLigne(' + totalProduit + ')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></td>' +
                    '</tr>';
                $('#table-produit tbody').append(row);

                $('#' + selectid).select2();
            });
        });


        // cette fonction retire une ligne dans le tableau de produit
        function removeLigne(number) {

            if ($('#table-produit tbody').find("tr").length > 1) {
                $('#product-row' + number).remove();
                total();
            } else {
                alert("Vous ne pouvez pas supprimer tous les elements.");
            }
        }


        // fontion qui charge le prix d'un produit
        function setPrix(number) {
           var productId =  $('#select-pro'+number).val();
           var defaultPrice = $('#data_p_prix'+productId).val();
           $('#prix'+number).val(defaultPrice);
        }


        // fonction qui calcule le montant HT  par produit
        function calculeHT(number){

            var remise =0;
            var qte =0;
            var prix =0;
            var tva = 0;
            if ($('#select-pro'+number).val()){
                if ($('#remise'+number).val()!=''){
                    remise = $('#remise'+number).val()
                }
                if ($('#quantite'+number).val()!=''){
                    prix = $('#quantite'+number).val()
                }
                if ($('#prix'+number).val()!=''){
                    qte = $('#prix'+number).val()
                }

                if ($('#tva'+number).val()!=''){
                    tva = $('#tva'+number).val()
                }

                var montant = (qte*prix) - (qte*prix*remise)/100 ;

                var ttc = (montant * tva )/100 + montant;
                ttc = Number(ttc).toFixed(2) ;
                montant =Number(montant).toFixed(2)
                $('#totalHT'+number).val(montant);
                $('#totalTTC'+number).val(ttc);
                total();
            }
        }


     // fonction qui calcule les totaux HT et TTC
        function total(){
            var totalht = 0;
            var totalttc = 0;
                $('input[name="totalHT[]"]').each(function (){
                   totalht += Number($(this).val());
                });
                $('input[name="totalTTC[]"]').each(function (){
                   totalttc +=Number( $(this).val());
                });
                // $('input[name="prix[]"]').each(function (){
                //    prix += $(this).val();
                // });
            $('#ht').val(Number(totalht).toFixed(2));
            $('#ttc').val(Number(totalttc).toFixed(2));
        }


        // fontions pour la partie des complements


        // cette methode ajoute une nouvelle ligne de produit sur le tableau des complements
        $('#add-row-complement').on('click', function (e) {

            totalComplement++;
            // var cloned = $("#table-complement tbody").find("tr").first().clone();
            var id = 'complement-row' + totalComplement;
            // $('.dropdown-groups').val(null).trigger('change');
            var selectid = 'select-com' + totalComplement;
            var row = '<tr class="text-black  complement-input font-weight-bold" id="' + id + '">' +
                '<td style="width: 250px;">' +
                '<select onchange="setComPrix('+totalComplement+')" class="dropdown-groups form-control" id="' + selectid + '" style="color: #000000" name="idproduit_com[]">'+
                '<option selected="selected" disabled>Sélectionez un produit</option>';
            row += '@foreach($categories as $cat)' +
                '<optgroup class="" label="{{ $cat->titre_cat }}">' +
                '@foreach($produits as $p)' +
                ' @if ($p->idcategorie===$cat->categorie_id)' +
                '<option value="{{ $p->produit_id }}">{{ $p->titre_produit }}</option>' +
                '@endif' +
                ' @endforeach' +
                '</optgroup>' +
                ' @endforeach' +
                '</select>' +
                ' </td>';
            row += '<td><input type="number" min="0" name="quantite_com[]" value="0"  onchange="calculeComHT('+totalComplement+')" id="quantite_com'+totalComplement+'" class="form-control quantite_com" required></td>' +
                '<td><input type="number" min="0" name="prix_com[]" value="0" onchange="calculeComHT('+totalComplement+')" id="prix_com'+totalComplement+'" class="form-control prix_com" required></td>' +
                '<td><input type="number" min="0" name="remise_com[]" value="0" onchange="calculeComHT('+totalComplement+')" id="remise_com'+totalComplement+'" step="any" class="form-control remise_com" required></td>' +
                '<td><input type="number" min="0"  name="tva_com[]" value="0" onchange="calculeComHT('+totalComplement+')"  id="tva_com'+totalComplement+'" step="any" class="form-control tva_com" required></td>' +
                '<td><input type="number" min="0" value="0"  readonly name="total_comHT[]" id="total_comHT'+totalComplement+'" step="any" class="form-control total_comHT" ></td>' +
                '<td><input type="number" min="0" value="0" readonly name="total_comTTC[]" id="total_comTTC'+totalComplement+'" step="any" class="form-control total_comTTC" ></td>' +
                '<td class="text-center"><button type="button" onclick="removeComLigne(' + totalComplement + ')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></td>' +
                '</tr>';
            $('#table-complement tbody').append(row);

            $('#' + selectid).select2();
        });


        // cette fonction retire une ligne dans le tableau de produit
        function removeComLigne(number) {
            $('#complement-row'+number).remove();
            // if ($('#table-complement tbody').find("tr").length > 1) {
            //
            //     // total();
            // } else {
            //     alert("Vous ne pouvez pas supprimer tous les elements.");
            // }
        }
        // fontion qui charge le prix d'un produit
        function setComPrix(number) {
            var productId =  $('#select-com'+number).val();
            var defaultPrice = $('#data_p_prix'+productId).val();
            $('#prix_com'+number).val(defaultPrice);
        }
        function calculeComHT(number){

            var remise =0;
            var qte =0;
            var prix =0;
            var tva = 0;
            if ($('#select-com'+number).val()){
                if ($('#remise_com'+number).val()!=''){
                    remise = $('#remise_com'+number).val()
                }
                if ($('#quantite_com'+number).val()!=''){
                    prix = $('#quantite_com'+number).val()
                }
                if ($('#prix_com'+number).val()!=''){
                    qte = $('#prix_com'+number).val()
                }

                if ($('#tva_com'+number).val()!=''){
                    tva = $('#tva_com'+number).val()
                }

                var montant = (qte*prix) - (qte*prix*remise)/100 ;

                var ttc = (montant * tva )/100 + montant;
                ttc = Number(ttc).toFixed(2) ;
                montant =Number(montant).toFixed(2)
                $('#total_comHT'+number).val(montant);
                $('#total_comTTC'+number).val(ttc);
                total();
            }
        }
        // fonction qui calcule les totaux HT et TTC
        // function totalComp(){
        //     var totalht = 0;
        //     var totalttc = 0;
        //         $('input[name="total_comHT[]"]').each(function (){
        //            totalht += Number($(this).val());
        //         });
        //         $('input[name="total_comTTC[]"]').each(function (){
        //            totalttc +=Number( $(this).val());
        //         });
        //         // $('input[name="prix[]"]').each(function (){
        //         //    prix += $(this).val();
        //         // });
        //     $('#comht').val(Number(totalht).toFixed(2));
        //     $('#comttc').val(Number(totalttc).toFixed(2));
        // }
    </script>

    <!-- Selet search -->
    <script src="{{asset('template/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/select2-init.js')}}"></script>

@endsection
