<div class="btn-group text-center">
    <a type="button" title="Cliquez pour effectuer une action" class="dropdown" data-toggle="dropdown">
        <strong>... </strong></a>
    <ul class="dropdown-menu justify-content-center text-center" role="menu">
        <li class="text-center">
            <a href="javascript:void(0);" data-toggle="modal"
               data-target="#facture-view-modal{{ $value->bonlivraison_id }}" class="btn btn-success btn-sm ml-1"
               title="Visualiser les details"><i
                    class="fa fa-eye"></i></a>
            <a href="{{ route('bon.print',['id' =>$value->bonlivraison_id]) }}" target="_blank" class="btn btn-light btn-sm ml-1"
               title="Imprimer"><i
                    class="fa fa-file-pdf-o"></i></a>
            @if (Auth::user()->is_admin==1 || $value->statut <=1)
                @if(Auth::user()->is_admin==1 || Auth::user()->id===$value->id)
                    <a href="{{ route('bon.print',['id' =>$value->bonlivraison_id]) }}" class="btn btn-warning btn-sm ml-1"
                       title="Editer"><i
                            class="fa fa-edit"></i></a>
                @endif
            @endif

        </li>

        <li class="text-center mt-2">

            @if (Auth::user()->is_admin==1)
                <button class="btn btn-danger btn-sm ml-1 "
                        title="Supprimer ce bon de livraison" id="deletebtn{{ $value->bonlivraison_id }}"
                        onclick="deleteFun({{ $value->bonlivraison_id }})"><i
                        class="fa fa-trash"></i></button>
            @endif
        </li>
    </ul>
</div>

<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="facture-view-modal{{ $value->bonlivraison_id }}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détail du bon de commande: {{ $value->reference_bl }}</h5>
                <a href="{{ route('bon.view',['id' =>$value->bonlivraison_id]) }}" class="mx-5 ml-1"
                   title="Plus de details">Voir plus</a>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h5 class="">Bon de livraison</h5>
                        <h6>N° {{ $value->reference_bl }}</h6>
                        <h6>Date: {{ $value->date_bl }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h5 class="">COORDONNEES DU CLIENT</h5>
                        <h6>{{ $devis[0]->nom_client.' '.$devis[0]->prenom_client.' '.$devis[0]->raison_s_client }}</h6>
                        <h6>Tel: {{ $devis[0]->phone_1_client }}/{{ $devis[0]->phone_2_client }}</h6>
                        <h6>BP : {{ $devis[0]->postale }}</h6>
                    </div>
                </div>
                <label class="nav-label"><span class="font-weight-bold">Objet: </span>{{ $value->objet }}</label>
                <div class="for-produit table-responsive" style="max-height: 300px; overflow: auto">
                    <label class="nav-label h3 text-uppercase">Produits</label>
                    <table class="w-100 table table-bordered">
                        <thead class="bg-primary text-white text-center">
                        <tr class="text-white" style="color: #ffffff!important;">
                            <th>Réf.</th>
                            <th>Désignation</th>
                            <th>Qté</th>
                        </tr>

                        </thead>
                        <tbody style="color: #000000!important;">
                        @php
                            $montantTTC = 0;
                            $montantHT=0;
                            $montantTVA=0;
                        @endphp


                        @foreach($pocedes as $p)
                            @php
                                $remise = ($p->prix * $p->quantite *$p->remise)/100;
                                $montant = ($p->quantite * $p->prix) - $remise;
                                $HT = $montant;

                                $montantHT += $montant;
                                $tva = ($montant * $p->tva)/100;
                                $montant = $tva + $montant;
                                $TTC = $montant;
                                $montantTVA += $montant;
                            @endphp
                            <tr class="text-black  produit-input">

                                <td>{{ $p->reference }}</td>
                                <td>{{ $p->titre_produit }}</td>
                                <td>{{ $p->quantite }}</td>
{{--                                <td>{{ $p->prix }}</td>--}}
{{--                                <td>{{ $p->remise }}%</td>--}}
{{--                                --}}{{--                                <td>{{ $p->tva }}%</td>--}}
{{--                                <td>--}}
{{--                                    {{ number_format($HT,2, '.', '') }}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    {{  number_format($TTC, 2, '.', '')  }}--}}
{{--                                </td>--}}

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                {{--                        <button type="submit" class="btn btn-primary">Enregistrer</button>--}}
            </div>
        </div>
    </div>
</div>