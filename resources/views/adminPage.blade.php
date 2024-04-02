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
                    <a href="{{ route('meal.index') }}">
                        <button class="btn text-light  btn-info btn-default" style="margin-left:6px">
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
                                <th scope="col">Demande accepter</th>
                                <th scope="col">Demande rejetée</th>
                                <th scope="col">Demande complète</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $row)
                                <tr>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->user->email }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->time }}</td>
                                    <td>{{ $row->meal->name }}</td>
                                    <td>{{ $row->qty }}</td>
                                    <td>{{ $row->meal->price }} DH</td>
                                    <td>{{ $row->meal->price * $row->qty }} DH</td>
                                    <td>{{ $row->adress }}</td>
                                    <td><strong>{{ $row->status }}</strong></td>


                                <form action="{{route('order.status',$row->id)}}" method="post">
                                    @csrf
                                    <td> <input type="submit" name="status" class="btn btn-info" value="accetpte"></td>
                                    <td> <input type="submit" name="status" class="btn btn-danger" value="refuse"></td>
                                    <td><input type="submit" name="status" class="btn btn-success" value="complete"></td>
                                </form>
                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>


        td {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        td:hover {
            background-color: gray;
            color: white;
        }
    </style>
@endsection
