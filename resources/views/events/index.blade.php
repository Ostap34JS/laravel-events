@extends('layouts.app')

@section('title', 'Події')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                search form
            </div>
            <div class="col-md-3">
                <a href="{{ route('events.create') }}" class="btn btn-success btn-lg btn-block text-uppercase">Організувати
                    подію</a>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($events as $event)
                <div class="col-sm-6 mb-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            @if($event->image)
                                <img class="card-img-top" src="{{ $event->image }}" alt="{{ $event->title }} image">
                            @endif
                            <h5 class="card-title">{{ $event->title }}</h5>
                            @if($event->body)
                                <p class="card-text">{{ $event->body }}</p>
                            @endif
                            <div class="alert alert-secondary" role="alert">
                                <strong>Відбудеться:</strong> {{ $event->expire_at }}
                            </div>
                            <div class="btn-group w-100">
                                <a href="#" class="btn btn-warning btn-lg w-100">Записатися</a>
                                @if($event->user_id == Auth::id())
                                    <a href="" class='btn btn-danger btn-lg w-100'
                                       onclick="event.preventDefault(); document.getElementById('destroy_form{{$loop->iteration}}').submit();">
                                        Видалити
                                    </a>
                                    <form action="{{ route('events.destroy',$event->id)}}" method="post"
                                          id='destroy_form{{$loop->iteration}}'>
                                        @csrf
                                        @method('delete')
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>На даний момент немає подій</h2>
            @endforelse
        </div>
    </div>
@endsection
