@extends('layouts.app')
@section('title','| D.I')
@section('css_before')
    <link href="{{asset('template/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <style>
        .hide {
            display: none;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>GESTION DES DEMANDES D'INTERVENTION</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">D.i</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Index</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">
                    <div class="card-body">
                        <a href="{{ route('di.create') }}" title="Ajouter un utilisateur"
                           class="btn btn-primary mb-3 float-right">
                            <i class="fa fa-plus"></i>&nbsp;&nbsp;Nouveau
                        </a>
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead class="bg-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Code D.I</th>
                                    <th>Date souhaité</th>
                                    <th>Emmeteur</th>
                                    <th>Desinataire</th>
                                    <th>Equipement</th>
                                    <th>Priorité</th>
                                    <th>Symptome</th>
                                    <th>Crée le</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=> $value)
                                    <tr id="table-row-{{ $value->di_id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->num_di }}</td>
                                        <td>
                                            @foreach($personnels as $p)
                                                @if ($p->personnel_id==$value->emet)
                                                    {{ $p->nom }}  {{ $p->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($personnels as $p)
                                                @if ($p->personnel_id==$value->dest)
                                                    {{ $p->nom }}  {{ $p->nom }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $value->date_souhaite }}</td>
                                        <td>
                                            @foreach($equipements as $p)
                                                @if ($p->equipement_id==$value->idequipement)
                                                      {{ $p->libelle }} ({{ $p->code }})
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $value->priorite }}</td>
                                        <td>{{ $value->code_sympt }}</td>

                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('di.show', ['id'=>$value->di_id]) }}"
                                                   class="btn btn-success btn-sm" title="Voir les détails"><i
                                                        class="fa fa-eye"></i></a>

                                                <a href="{{ route('di.edit', ['id'=>$value->di_id]) }}"
                                                   class="btn btn-warning btn-sm ml-1" title="Modifier D.I"><i
                                                        class="fa fa-edit"></i></a>

                                                <button class="btn btn-danger btn-sm ml-1 " title="Supprimer"
                                                        onclick="deleteFun({{ $value->di_id}})"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
    <script>
        function deleteFun(id) {
            swal.fire({
                title: "Supprimer cette D.I?",
                icon: 'question',
                text: "Cette sera supprimée de façon définitive.",
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
                        url: "{{ route('di.delete') }}",
                        data: {id: id},
                        dataType: 'json',
                        success: function (res) {
                            if (res) {
                                swal.fire("Effectué!", "Supprimé avec succès!", "success")
                                $('#table-row-' + id).hide(100)

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
