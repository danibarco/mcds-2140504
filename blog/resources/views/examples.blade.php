@extends('layouts.app')

@section('content')

<div class="card card-dark bg-dark text-light container my-5 justify-content-center">
    <div class="card-header text-center">
        <h3>Usuarios</h3>
    </div>
    <div class="card-body">
    <h5><strong>El numero de usuarios es: </strong>{{$users->count()}}  </h5>
        @if ($users->count()<30)
                <h6 class="text-danger">Hay pocos usuarios</h6>
            @elseif($users->count()>=30 && $users->count()<=50)
                <h6 class="text-warning">Hay usuarios moderados</h6>
            @else
                <h6 class="text-primary">Hay muchos usuarios</h6>
            @endif

            <div class="py-3 justify-content-center">
                <table class="table table-striped table-hover table-warning">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->fullname}}</td>
                            <td>
                                @switch($user->gender)
                                    @case('Male')
                                    Masculino
                                    @break
                                    @case('Female')
                                    Femenino
                                    @break
                                    @default
                                    otro
                                    @endswitch
                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->birthdate}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
    </div>
</div>

<div class="card card-dark bg-dark text-light container my-5 justify-content-center">
        <div class="card-header text-center">
            <h3>Categorias</h3>
        </div>
        <div class="card-body">
            <h5><strong>El numero de categorias es: </strong>{{ $categories->count() }} </h5>
            @if ($categories->count() < 3)
                <h6 class="text-danger">Hay pocas categorias</h6>
            @elseif($categories->count()>=3 && $categories->count()<=5) <h6 class="text-warning">Hay categorias moderados</h6>
                @else
                    <h6 class="text-primary">Hay muchas categorias</h6>
            @endif
            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        @empty
                            <h5 class="text-secondary text-center">No hay categorias</h5>
                    @endforelse
                </table>
            </div>
        </div>
</div>

<div class="card card-dark bg-dark text-light container my-5 justify-content-center">
        <div class="card-header text-center">
            <h3>Juegos</h3>
        </div>
        <div class="card-body">
            <h5><strong>El numero de juegos es: </strong>{{ $games->count() }} </h5>
            @if ($games->count() < 3)
                <h6 class="text-danger">Hay pocos juegos</h6>
            @elseif($games->count()>=3 && $games->count()<=5) <h6 class="text-warning">Hay juegos moderados</h6>
                @else
                    <h6 class="text-primary">Hay muchos juegos</h6>
            @endif
            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    @php
                        $i = 0
                    @endphp
                    @while ($i< $games->count())
                        @php
                            $game = $games->get($i)
                        @endphp
                        <tr>
                            <td>{{$game->name}}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endwhile
                </table>
            </div>
        </div>
</div>

@endsection


