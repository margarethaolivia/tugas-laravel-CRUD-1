@extends('layout.master')

@push('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="container col-md-11 py-4">

    <div class="row">
        <div class="col">
            <h3 class="font-weight-bold pb-2 d-inline float-left">Daftar Pertanyaan</h3>
            <a href="/pertanyaan/create" class="btn btn-info mb-3 float-right">Tambah Pertanyaan</a>
        </div>
    </div>

    @if (session('status'))
    <div class="row">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        </div>
    @endif

    @if($questions->count() > 0)
    <div class="row">
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach( $questions as $question )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><div class="font-weight-bold">{{ $question->judul }}</div></td>
                <td> <div>{{ $question->isi }}</div>
                <td><a href="/pertanyaan/{{ $question->id }}" class="btn btn-info text-white mb-2 float-right">Detail</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    @else
        <p class="text-muted font-italic">Belum terdapat pertanyaan</p>
    @endif
    
</div>
@endsection