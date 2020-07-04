@extends('layout.master')
@push('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@section('content')
<div class="container col-md-11 pt-4">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach ($questions as $question)
        <div class="card">
            <div class="row">
                <div class="card-body col-md-9 float-left">
                    <h3 class="font-weight-bold d-inline">{{ $question->judul }}</h3>
                    <p class="card-text mt-4">{{ $question->isi }}</p>
                    <p class="card-text d-inline mr-2"><small class="text-muted">Created at {{ $question->created_at }}</small></p>
                    @if( $question->created_at != $question->updated_at )
                        <p class="d-inline card-text"><small class="text-muted">|</small></p>
                        <p class="card-text d-inline ml-2"><small class="text-muted">Edited at {{ $question->updated_at }}</small></p>
                    @endif
                </div>
                <div class="card-body col-md-3">
                    <form action="/pertanyaan/{{ $question->id }}" method="post">
                    @method('delete')
                    @csrf
                        <button type="submit" class="btn btn-danger float-right mr-2" onclick="return confirm('Apakah kamu yakin?')">Delete</button>
                    </form>


                    <a href="/pertanyaan/{{ $question->id }}/edit" class="btn btn-info float-right mr-2">Edit</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="container col-md-11 py-4">

    <h5 class="font-weight-bold">Semua Jawaban</h5>
    @if($answers->count() > 0)
    @foreach($answers as $answer)
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-block">
                    <p class="card-text">{{ $answer->isi }}</p>
                    <p class="card-text d-inline"><small class="text-muted">Answered at {{ $answer->created_at }}</small></p>
                </li>
            </ul>
        </div>
    @endforeach
    @else
        <p class="text-muted font-italic">Belum terdapat jawaban</p>
    @endif
</div>

<div class="container col-md-11 py-4">
    <h5 class="font-weight-bold">Tambah Jawaban</h5>
        <form action="/pertanyaan/{{ $questions[0]->id }}" method="post">
        @csrf
            <div class="form-group">
                <textarea class="form-control" id="isi" name="isi" required autofocus></textarea>
            </div>
            <input type="hidden" name="pertanyaan_id" value="{{ $questions[0]->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection