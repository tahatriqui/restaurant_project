@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-center text-light">
                        Repas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                <h3><strong style="color:seagreen;font-size:20px">Category de repas :
                                    </strong>{{ $meal->category }}</h3>
                                </p>
                                <p>
                                <h3><strong style="color:seagreen;font-size:22px">Nom de repas : </strong>{{ $meal->name }}
                                </h3>
                                </p>
                                <p>
                                <h3><strong style="color:seagreen;font-size:22px">Prix de repas
                                        :</strong>{{ $meal->price }}</h3>
                                </p>
                                <p>
                                <h3><strong style="color:seagreen;font-size:22px">Les ingrédients du repas :
                                    </strong>{{ $meal->description }}</h3>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset($meal->image) }}" class="img-thumbnail" style="width:500px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-center text-light">Information de commande</div>
                    <div class="card-body ">
                        @if (Auth::check())
                            <form action="{{route('order.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <p><strong style="color: seagreen;font-size:18px">Nom :
                                        </strong>{{ auth()->user()->name }}</p>
                                    <p><strong style="color: seagreen;font-size:18px">E-mail :
                                        </strong>{{ auth()->user()->email }}</p>
                                    <p><strong style="color: seagreen;font-size:18px">Numero de
                                            telephone :</strong> <input type="number" class="form-control" name="phone"
                                            required></p>
                                    <p><strong style="color: seagreen;font-size:18px">Quantité
                                            :</strong> <input type="number" class="form-control" name="qty"
                                            value="0"></p>
                                    <input type="hidden" name="meal_id" value="{{$meal->id}}">
                                    <p><strong style="color: seagreen;font-size:18px">La date
                                            :</strong> <input type="date" class="form-control" name="date" required>
                                    </p>
                                    <p><strong style="color: seagreen;font-size:18px">Le temps
                                            :</strong> <input type="time" class="form-control" name="time" required>
                                    </p>
                                    <p><strong style="color: seagreen;font-size:18px">L'addresse
                                            :</strong>
                                        <textarea type="number" class="form-control" name="adress" required></textarea>
                                    </p>
                                    <p class="text-center">
                                        <button class="btn btn-success" type="submit" style="font-size: 20px">Commandez
                                            maintenant</button>
                                    </p>
                                </div>
                            </form>
                        @else
                            <p><a href="/login">Veuillez vous connecter, s'il vous plaît.</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
