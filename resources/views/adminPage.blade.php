@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <nav class="breadcrumb ">
                <ol class="breadcrumb bg-warning">
                    <li class="breadcrumb-item active" aria-current="page">
                        les demandes des clents
                    </li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cat.show') }}">
                        <button class="btn btn-success btn-default" style="margin-left: 6px">
                            Ajouter une category
                        </button></a>
                    <a href="{{route('meal.index')}}">
                        <button style="background-color: #F0F8FF" class="btn  btn-default" style="margin-left:6px">
                            Afficher les repas
                        </button></a>
                    <a href="{{ route('meal.create') }}">
                        <button class="btn btn-danger btn-default" style="margin-left: 6px">
                            Ajouter une repas
                        </button></a>
                </div>
                <div class="card-body text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">téléphone</th>
                                <th scope="col">e-mail</th>
                                <th scope="col">La date</th>
                                <th scope="col">Le temps</th>
                                <th scope="col">Nom du repas</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix de repas($)</th>
                                <th scope="col">Total($)</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Demande rejetée</th>
                                <th scope="col">Demande complète</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
