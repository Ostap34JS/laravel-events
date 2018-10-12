@extends('layouts.app')

@section('title', 'Організувати подію')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('events.store') }}" method="post" class="col-lg-6">
                @csrf

                <h3>Організувати подію</h3>

                <div class="form-group">
                    <label for="title">Назва</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Назва" required>
                </div>

                <div class="form-group">
                    <label for="body">Опис</label>
                    <textarea type="body" class="form-control" id="body" name="body" placeholder="Опис" cols="30"
                              rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="expire_at">Дата і час</label>
                    <input type="datetime-local" class="form-control" id="expire_at" name="expire_at"
                           placeholder="Дата і час" required>
                </div>

                <button type="submit" class="btn btn-success btn-block">Додати</button>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        flatpickr("#expire_at", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
@endsection