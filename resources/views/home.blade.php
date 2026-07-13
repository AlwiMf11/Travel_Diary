@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <section class="py-5 hero-section">
        <div class="container py-5 text-center text-white">
            <h1 class="fw-bold display-5 mb-3">Simpan Cerita Perjalanan Terbaikmu</h1>
            <p class="lead mb-4">Abadikan setiap langkah dan pengalaman dalam satu tempat yang rapi dan mudah dikenang.</p>
            <p class="mb-4">Jelajahi tempat baru dan simpan kenangannya bersama TravelDiary — buku harian perjalanan pribadimu.</p>
            <a href="{{ route('travels.index') }}" class="btn btn-light btn-lg fw-semibold me-2">Lihat Daftar Perjalanan</a>
            <a href="{{ route('travels.create') }}" class="btn btn-outline-light btn-lg fw-semibold">Tulis Cerita Baru</a>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold section-title">Kenangan Perjalanan Pilihan</h2>
                <p class="text-muted">Catatan kecil dari perjalanan besar yang pernah dilalui.</p>
            </div>

            @if ($featuredTravels->isEmpty())
                <p class="text-center text-muted">Belum ada cerita perjalanan yang tersimpan.</p>
            @else
                <div class="row g-4">
                    @foreach ($featuredTravels as $travel)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm travel-card">
                                @if ($travel->image)
                                    <img src="{{ asset('storage/' . $travel->image) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $travel->title }}">
                                @else
                                    <div class="bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center" style="height: 220px;">
                                        <span class="text-muted">Tidak ada foto</span>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">{{ $travel->title }}</h5>
                                    <p class="card-text text-muted mb-1">📍 {{ $travel->location }}</p>
                                    <p class="card-text text-muted small">{{ $travel->date->translatedFormat('d F Y') }}</p>
                                    <a href="{{ route('travels.show', $travel) }}" class="btn btn-sm btn-outline-success">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@endsection
