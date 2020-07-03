@extends('layout.master')

@push('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="container col-md-11 pt-4">
    <a href="/pertanyaan/create" class="btn btn-info mb-3">Tambah Pertanyaan</a>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach( $questions as $question )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><div class="font-weight-bold">{{ $question->judul }}</div></td>
                <td> <div>{{ $question->isi }}</div><a href="/jawaban/{{ $question->id }}" class="card-link">Lihat Jawaban</a></td>
                <td><a href="/jawaban/create/{{ $question->id }}" class="btn btn-success text-white mb-2 ">Jawab</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection