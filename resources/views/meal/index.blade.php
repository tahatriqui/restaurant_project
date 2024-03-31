@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- card --}}
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div style="background-color: #A52A2A" class="card-header  text-light text-center">La liste</div>
                    <div class="card-body ">
                        <ul class="list-group">
                            <a href="{{ route('cat.show') }}" class="list-group-item list-group-item-action">Ajouter une
                                categorie
                            </a>
                            <a href="{{ route('meal.create') }}" class="list-group-item list-group-item-action">Ajouter une
                                repas </a>
                            <a href="" class="list-group-item list-group-item-action">les demandes des clients</a>
                        </ul>
                    </div>
                </div>

                {{-- condition if any errors happend it will showed here --}}
                @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div style="background-color: #A52A2A" class="card-header text-center text-light">Les repas</div>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo du repas</th>
                                <th scope="col">Nom de repas</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Prix ($)</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>

                            </tr>

                        </thead>
                        <tbody>

                            @if (count($meals)>0)
                            @foreach ($meals as $row)
                            <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td><img src="{{asset($row->image)}}" width="80"></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->category }}</td>
                                    <td>{{ $row->price }} DH</td>
                                    <td><a href="{{route('meal.edit',$row->id)}}"><button class="btn btn-primary">Modifier</button></a></td>
                                    <td> <a href="" class="btn btn-danger" id="delete">Supprier</a></td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="7">Il n'y a aucun repas</td>
                            @endif
                        </tbody>
                    </table>
                   <span class="ms-5">{{$meals->links()}}</span>
                </div>
            </div>
        </div>




    @endsection
