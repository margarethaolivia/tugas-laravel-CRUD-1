@extends('layout.master')

@push('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="container col-md-11 pt-4">
    <a href="/pertanyaan" class="btn btn-info mb-3">Kembali ke Daftar Pertanyaan</a>
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Isi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach( $answers as $answer )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td> <div>{{ $answer->isi }}</div>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/jawaban/create/{{ $answer->pertanyaan_id }}" class="btn btn-success">Tambah Jawaban</a>
</div>
@endsection