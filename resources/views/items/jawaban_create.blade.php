@extends('layout.master')

@push('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="container col-md-11 pt-4">
    <h1 class="font-weight-bold pb-4">Tambah Jawaban</h1>
    <form action="/jawaban/{{ $id }}" method="post">
    @csrf
        <div class="form-group">
            <textarea class="form-control" id="isi" name="isi" required></textarea>
        </div>
        <input type="hidden" name="pertanyaan_id" value="{{ $id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection