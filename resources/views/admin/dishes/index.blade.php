@extends('layouts.app')

@section('page-title', 'Menù')

@section('main-content')
    <section class="menu">
        <div class="img-container">
            <div class="container_top">
                <div>
                    <h1>
                        {{ $restaurant->company_name }}
                    </h1>
                </div>
                <div>
                    <button class="button add">
                        <a href="{{ route('admin.dishes.create') }}">
                            Aggiungi piatto
                        </a>
                    </button>
                </div>
            </div>
        </div>
        {{-- @dd($dishes) --}}
        <div class="mycontaineroverflow">
            @if (session('dishDeleted'))
            <div class="container alert alert-danger">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-md-6">
                        {{session('dishDeleted')}}
                    </div>
                </div>
            </div>
                
            @endif
            @foreach ($dishes as $Singledish) 
                <div class="mycontainermenu">
                    <div class="cardmenu">
                        
                        <div class="container_card_img">
                            @if ($Singledish->img != null)
                                <img src="{{ asset('storage/'.$Singledish->img) }}">
                                
                            @else
                                <img src="{{ asset('storage/images/Logo/img-not-found.png') }}">
                            @endif
                        </div>
                        <div class="container_card_content">
                            <ul>
                                <li>
                                    <h2>
                                        {{ $Singledish->name }}
                                    </h2>
                                </li>
                                <li>
                                    <p>
                                        {{ $Singledish->description }}
                                    </p>
                                </li>
                                <li>
                                    <h5>
                                        {{ $Singledish->price.'€' }} 
                                    </h5>
                                </li>
                                <li> @if ($Singledish->visible != 1)
                                    <h6>
                                        Non Disponibile 
                                    </h6>
                                    @endif
                                    <h6>
                                        Disponibile
                                    </h6>
                                </li>
                            </ul>
                        </div>
                        <div class="button_container">
                            <div>
                                <button class="button show">
                                    <a href="{{ route('admin.dishes.show', ['dish' => $Singledish->slug]) }}">
                                        Show
                                    </a>
                                </button>
                            </div>
                            <div>
                                <button class="button edit">
                                    <a href="{{ route('admin.dishes.edit', ['dish' => $Singledish->slug]) }}">
                                        Edit
                                    </a>
                                </button>
                            </div>
                            <div>
                                <form action="{{ route('admin.dishes.destroy', ['dish' => $Singledish->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button delete" type="submit">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
