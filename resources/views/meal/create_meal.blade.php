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
                            <a href="{{route('meal.index')}}" class="list-group-item list-group-item-action">Afficher les repas </a>
                            <a href="" class="list-group-item list-group-item-action">Les demandes des clients</a>
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
                    <form action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='card-body '>
                            <div class="form-group">
                                <label for="name">Nom de repas</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="entrer le nom du repas">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Description de repas</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="price">Prix de repas ($) </label>
                                    <input type="number" name="price" class="form-control" placeholder="entrer le prix">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <h5>Choisit la categorie<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category" id="" class="form-control" required>
                                        <option value="" selected disabled>Choisit la category</option>
                                        @foreach ($cats as $row)
                                            <option value="{{ $row->cat_name }}">{{ $row->cat_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <div class="form-group">
                                        <label>Ajouter une photo de repas</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                            style="width:100px;height:100px">
                                    </div>
                                    <br>
                                    <div class="form-group text-center">
                                        <button style="background-color: #A52A2A" class="btn text-light"
                                            type="submit">Sauvegarder</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr("src", e.target.result);
                    }
                    reader.readAsDataURL(e.target.files["0"]);
                });
            });
        </script>


    @endsection
