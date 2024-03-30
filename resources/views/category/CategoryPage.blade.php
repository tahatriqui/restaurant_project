@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        catégorie
                    </div>
                    <form action="{{ route('cat.store') }}" method="post">
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
                    <div class="card-header text-center">les catégories</div>
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
                                    <th class="col">nom de catégorie</th>
                                    <th class="col">modifier</th>
                                    <th class="col">supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cats as $key => $row)
                                    <tr>
                                        <th scope='row'>{{ $key + 1 }}</th>
                                        <td hidden>{{ $row->id }}</td>
                                        <td>{{ $row->cat_name }}</td>
                                        <td style="width:15%"><button class="btn btn-primary editbtn">modifier</button></td>
                                        <td style="width:15%">
                                            <a href="{{ route('cat.delete', $row->id) }}"class="btn btn-danger"
                                                id="delete">
                                                supprimer
                                            </a>
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



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nom de category</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">nom de category:</label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ">modifier</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#exampleModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#id').val(data[2]);
                $('#cat_name').val(data[1]);
            });
        });
    </script>
@endsection
