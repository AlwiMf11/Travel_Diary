@extends('layouts.app')

@section('title', $travel->title)

@section('content')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('travels.index') }}" class="text-decoration-none text-muted small">&larr; Kembali ke Daftar Perjalanan</a>

                @if ($travel->image)
                    <img src="{{ asset('storage/' . $travel->image) }}" class="img-fluid rounded shadow-sm my-4 w-100" style="max-height: 420px; object-fit: cover;" alt="{{ $travel->title }}">
                @else
                    <div class="bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center rounded my-4" style="height: 320px;">
                        <span class="text-muted">Tidak ada foto</span>
                    </div>
                @endif

                <h1 class="fw-bold mb-2">{{ $travel->title }}</h1>
                <div class="d-flex flex-wrap gap-3 text-muted mb-4">
                    <span>📍 {{ $travel->location }}</span>
                    <span>📅 {{ $travel->date->translatedFormat('d F Y') }}</span>
                </div>

                <div class="card border-0 shadow-sm mb-4 story-card">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Cerita Perjalanan</h5>
                        <p class="card-text" style="white-space: pre-line;">{{ $travel->story }}</p>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('travels.edit', $travel) }}" class="btn btn-outline-secondary">Edit Cerita</a>
                    <form action="{{ route('travels.destroy', $travel) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus cerita perjalanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Hapus Cerita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
