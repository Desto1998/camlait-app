@extends('layouts.app')
@section('title','| PERSONNELS')
@section('css_before')
    <link href="{{asset('template/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
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
                    <h4>Personnels</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Personnels</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Index</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <span class="float-left h4">Liste des personnels</span>
                        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                                data-target="#personnelModal"><i class="fa fa-plus">&nbsp; Ajouter</i></button>

                        <div class="table-responsive">
                            <table id="example" class="display text-center w-100">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Maticule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Poste</th>
                                    <th>Tel</th>
                                    <th>Crée le</th>
{{--                                    <th>Crée par</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->nom }}</td>
                                            <td>{{ $item->prenom }}</td>
                                            <td>{{ $item->email_p }}</td>
                                            <td>{{ $item->poste }}</td>
                                            <td>{{ $item->tel }}</td>
                                            <td>{{ $item->date_ajout }}</td>
{{--                                            <td>{{ $item->date_ajout }}</td>--}}
                                            <td class="d-flex">
                                                <button class="btn btn-sm btn-success" title="Voir les details"><i class="fa fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning ml-1" data-toggle="modal"
                                                        data-target="#personnelModal{{ $item->personnel_id }}" title="Editer"><i class="fa fa-edit"></i></button>
                                                @if (Auth::user()->is_admin==1)
                                                    <button class="btn btn-danger btn-sm ml-1 "
                                                            title="Supprimer cette dépense" id="deletebtn{{ $item->personnel_id }}"
                                                            onclick="deleteFun({{ $item->personnel_id }})"><i
                                                            class="fa fa-trash"></i></button>
                                                @endif
                                                <!-- Modal ajouter une personnel -->
                                                <div class="modal fade" data-backdrop="static" id="personnelModal{{ $item->personnel_id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ajouter un personnel</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('personnel.store') }}" method="post" id="charge-form{{$item->personnel_id}}">
                                                                    @csrf
                                                                    <input type="hidden" name="personnel_id" value="{{ $item->personnel_id }}">
                                                                    <div class="form-group">
                                                                        <label for="code{{ $item->personnel_id }}">Matricule du personnel <span class="text-danger">*</span></label>
                                                                        <input type="text" name="code" id="code{{ $item->personnel_id }}" value="{{ $item->code }}" placeholder="Code" required class="form-control">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="nom{{ $item->personnel_id }}">Nom <span class="text-danger">*</span></label>
                                                                            <input type="text" name="nom" id="nom{{ $item->personnel_id }}" value="{{ $item->nom }}" placeholder="Nom" required class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="prenom{{ $item->personnel_id }}">Prenom <span class="text-danger">*</span></label>
                                                                            <input type="text" name="prenom" id="prenom{{ $item->personnel_id }}" value="{{ $item->prenom }}" placeholder="Prenom" required class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="tel{{ $item->personnel_id }}">Tel <span class="text-danger">*</span></label>
                                                                            <input type="tel" name="tel" id="tel{{ $item->personnel_id }}" value="{{ $item->tel }}" placeholder="Tel" required class="form-control">
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label for="email_p{{ $item->personnel_id }}">Email</label>
                                                                            <input type="email" name="email_p" id="email_p{{ $item->personnel_id }}" value="{{ $item->email_p }}" placeholder="Email"  class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="poste{{ $item->personnel_id }}">Poste <span class="text-danger">*</span></label>
                                                                        <input type="text" name="poste" id="poste{{ $item->personnel_id }}" value="{{ $item->poste }}" placeholder="Poste" required class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="adresse_p{{ $item->personnel_id }}">Adresse</label>
                                                                        <input type="text" name="adresse_p" id="adresse_p{{ $item->personnel_id }}" value="{{ $item->adresse_p }}" placeholder="Adresse" required class="form-control">
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
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        {!! $data->links() !!}--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal ajouter une personnel -->
    <div class="modal fade" data-backdrop="static" id="personnelModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier un personnel</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('personnel.store') }}" method="post" id="charge-form">
                        @csrf
                        <div class="form-group">
                            <label for="code">Matricule du personnel <span class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" placeholder="Code" required class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nom">Nom <span class="text-danger">*</span></label>
                                <input type="text" name="nom" id="nom" placeholder="Nom" required class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prenom">Prenom <span class="text-danger">*</span></label>
                                <input type="text" name="prenom" id="prenom" placeholder="Prenom" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tel">Tel <span class="text-danger">*</span></label>
                                <input type="tel" name="tel" id="tel" placeholder="Tel" required class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email_p">Email</label>
                                <input type="email" name="email_p" id="email_p" placeholder="Email"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="poste">Poste <span class="text-danger">*</span></label>
                            <input type="text" name="poste" id="poste" placeholder="Poste" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="adresse_p">Adresse</label>
                            <input type="text" name="adresse_p" id="adresse_p" placeholder="Adresse" required class="form-control">
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





@endsection
@section('script')
<script>
    // delete funtion
    function deleteFun(id) {
        swal.fire({
            title: "Supprimer ce personnel?",
            icon: 'question',
            text: "Cet personnel sera supprimé de façon définitive.",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Oui, supprimer!",
            cancelButtonText: "Non, annuler !",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                // if (confirm("Supprimer cette tâches?") == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('personnel.delete') }}",
                    data: {id: id},
                    dataType: 'json',
                    success: function (res) {
                        if (res) {
                            swal.fire("Effectué!", "Supprimé avec succès!", "success")
                            $('#deletebtn' + id).parents('tr').remove()

                        } else {
                            sweetAlert("Désolé!", "Erreur lors de la suppression!", "error")
                        }

                    },
                    error: function (resp) {
                        sweetAlert("Désolé!", "Une erreur s'est produite.", "error");
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
        // }
    }
</script>
    <!-- Datatable -->
    <script src="{{asset('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
@endsection
