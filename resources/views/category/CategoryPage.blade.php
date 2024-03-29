@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        catégorie
                    </div>
                    <form action="{{route('cat.store')}}" method="post">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="name">nom de catégorie</label>
                                <input type="text" name="cat_name" placeholder="nom de catégorie" class="form-control">
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button class="btn btn-danger" type="submit">sauvegarder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">les categories</div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="col">#</th>
                                    <th class="col">nom du category</th>
                                    <th class="col">modifier</th>
                                    <th class="col">supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope='row'>1</th>
                                    <td>nom de category</td>
                                    <td><a href=""><button class="btn btn-primary">modifier</button></a></td>
                                    <td><a href=""><button class="btn btn-danger">supprimer</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
