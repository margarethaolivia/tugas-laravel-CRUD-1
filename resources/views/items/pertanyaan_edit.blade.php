@extends('layout.master')

@push('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="container col-md-11 pt-4">
    <h1 class="font-weight-bold pb-4">Edit Pertanyaan</h1>
    @foreach($questions as $question)
    <form action="/pertanyaan/{{$question->id}}" method="post">
    @method('put')
    @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $question->judul }}" required>
        </div>
        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea class="form-control" id="isi" name="isi" required>{{ $question->isi }}</textarea>
        </div>
        <input type="hidden" name="updated_at" value="{{\Carbon\Carbon::now()}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
@endsection