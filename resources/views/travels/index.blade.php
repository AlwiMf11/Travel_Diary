@extends('layouts.app')

@section('title', 'Daftar Perjalanan')

@section('content')

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold section-title">Daftar Perjalanan</h1>
            <p class="text-muted">Jelajahi tempat baru dan simpan kenangannya.</p>
        </div>

        @if ($travels->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted mb-3">Belum ada cerita perjalanan yang tersimpan.</p>
                <a href="{{ route('travels.create') }}" class="btn btn-success">Tulis Cerita Pertamamu</a>
            </div>
        @else
            <div class="row g-4">
                @foreach ($travels as $travel)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm travel-card">
                            @if ($travel->image)
                                <img src="{{ asset('storage/' . $travel->image) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $travel->title }}">
                            @else
                                <div class="bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <span class="text-muted">Tidak ada foto</span>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">{{ $travel->title }}</h5>
                                <p class="card-text text-muted mb-1">📍 {{ $travel->location }}</p>
                                <p class="card-text text-muted small mb-3">{{ $travel->date->translatedFormat('d F Y') }}</p>
                                <div class="mt-auto d-flex gap-2">
                                    <a href="{{ route('travels.show', $travel) }}" class="btn btn-sm btn-outline-success">Lihat Detail</a>
                                    <a href="{{ route('travels.edit', $travel) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('travels.destroy', $travel) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus cerita perjalanan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
