@extends('layouts.app')

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-center">
                    Repas
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <h3><strong style="color:seagreen;font-size:20px">Category de repas : </strong>{{$meal->category}}</h3>
                            </p>
                            <p>
                                <h3><strong style="color:seagreen;font-size:22px">Nom de repas : </strong>{{$meal->name}}</h3>
                            </p>
                            <p>
                                <h3><strong style="color:seagreen;font-size:22px">Prix de repas :</strong>{{$meal->price}}</h3>
                            </p>
                            <p>
                                <h3><strong style="color:seagreen;font-size:22px">Les ingrédients du repas : </strong>{{$meal->description}}</h3>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset($meal->image)}}" class="img-thumbnail" style="width:500px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
