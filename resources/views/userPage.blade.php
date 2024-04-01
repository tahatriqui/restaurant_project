@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">La liste</div>
                    <div class="card-body">
                        <form action="" method="get">
                            @csrf
                            <ul class="list-group">
                                <a href="/" class="list-group-item list-group-item-action">la page d'accueil</a>
                            </ul>
                            @foreach ($cats as $row)
                                <ul class="list-group">
                                    <input type="submit" value="{{ $row->cat_name }}" name="category"
                                        class="list-group-item list-group-item-action">
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>{{ $cat1 }}</h5>
                        Nombre des repas ({{ count($meals) }})
                    </div>
                    <div class="card-body">

                        <div class="row">
                            @forelse ($meals as $meal)
                                <div class="col-md-4 mt-2 text-center" style="border:1px solid rgba(149,212,159)">
                                    <img src="{{ asset($meal->image) }}" class="img-thmbnail" style="width:100%"
                                        alt="">
                                    <strong>{{ $meal->name }}</strong>
                                    <p>{{ $meal->description }}</p>
                                    <div class="">
                                        <a href="{{ route('meal.details',$meal->id) }}" style='font-size:16px' title="Add Cart"
                                            class="btn btn-success">
                                            <i class="fa fa-bell-slash-o" style="font-size: 12px;color:white">Demande
                                                maintenant
                                        </a></i>
                                    </div>
                                    <br>
                                </div>
                            @empty
                                no repas exist maintenant
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- style part --}}
    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: rgb(61, 114, 56);
            color: #fff;
        }

        .card-header {
            background-color: rgb(47, 160, 36);
            color: #ffff;
            font-size: 20px
        }
    </style>
@endsection
