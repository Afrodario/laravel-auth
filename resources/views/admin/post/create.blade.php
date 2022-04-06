@extends('admin.layouts.admin-base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Crea un nuovo post</h1>

                {{-- Il form con metodo POST punta alla rotta store --}}
                <form method="POST" action={{route('admin.posts.store')}}>

                    {{-- Controllo --}}
                    @csrf

                    <div class="form-group">
                      <label for="title">Titolo</label>
                      <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="content">Contenuto del post</label>
                        <textarea class="form-control" id="content" rows="10" name="content"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Salva post</button>

                  </form>
            </div>
        </div>
    </div>
@endsection