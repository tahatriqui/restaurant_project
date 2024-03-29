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
                    <a href="{{route('cat.show')}}">
                        <button class="btn btn-success btn-default" style="margin-left: 6px">
                            ajouter une category
                        </button></a>
                    <a href="">
                        <button class="btn btn-info btn-default" style="margin-left:6px">
                            afficher les repas
                        </button></a>
                    <a href="">
                        <button class="btn btn-danger btn-default" style="margin-left: 6px">
                            ajouter une repas
                        </button></a>
                </div>
                <div class="card-body text-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">téléphone</th>
                                <th scope="col">e-mail</th>
                                <th scope="col">la date</th>
                                <th scope="col">le temps</th>
                                <th scope="col">Nom du repas</th>
                                <th scope="col">quantité</th>
                                <th scope="col">prix de repas($)</th>
                                <th scope="col">total($)</th>
                                <th scope="col">adress</th>
                                <th scope="col">etat</th>
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
