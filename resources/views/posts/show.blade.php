@extends('layouts.app')

@section('title', 'Edit Post')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <ul>
                                <li><label class="font-weight-bold">GAMBAR</label> 
                                    <img src="{{ asset('/storage/posts/'.$post->image) }}">
                                </li>
                            </ul>
                            <ul>
                                <li><label class="font-weight-bold">JUDUL</label>
                                    : {{ $post->title }}
                                </li>
                            </ul>
                            <ul>
                                <li><label class="font-weight-bold">KONTEN</label>
                                    : {{ $post->content }}
                                </li>
                            </ul>
                            <ul>
                                <li><label class="font-weight-bold">TANGGAL POSTING</label> 
                                    : {{ $post->created_at }} 
                                </li>
                            </ul>
                            @include('posts.komentar.show-komentar')
                            <div class="mt-4">
                                <form action="{{ url('/comment/store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        <ul>
                                            <li><label class="font-weight-bold">KOMENTAR</label></li>
                                        </ul>
                                        <input type="text" class="form-control @error('komentar')is-invalid @enderror"
                                        name="komentar"
                                        placeholder="Masukkan Komentar Post">
                                    @error('komentar')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary mb-4">
                                        SIMPAN
                                    </button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ url('posts') }}" class="btn btn-danger btn-sm">BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection