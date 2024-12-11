@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <!-- Section Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4">Openstaande Storingen</h1>
        <a href="{{ route('malfunctions.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle"></i> Voeg Nieuwe Storing Toe
        </a>
    </div>
        <!-- Grid Layout for Malfunctions -->
        <div class="row g-4">
            @foreach ($malfunctions as $malfunction)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header 
                            @if ($malfunction->status->name === 'Critical') bg-danger text-white
                            @elseif ($malfunction->status->name === 'Major') bg-warning text-dark
                            @else bg-secondary text-white
                            @endif">
                            <h5 class="card-title mb-0">Storing </h5>
                        </div>
                        <div class="card-body">
                            <!-- Date and Description -->
                            <p><strong>Datum:</strong> {{ $malfunction->created_at->format('d-m-Y H:i') }}</p>
                            <p><strong>Beschrijving:</strong> {{ $malfunction->description }}</p>

                            <!-- Machine and User Information -->
                            <p><strong>Machine:</strong> {{ $malfunction->machine->name }}</p>
                            <p><strong>Medewerker:</strong> {{ $malfunction->user->name ?? 'Geen' }}</p><!-- Hier wordt 'geen' gebruikt als een standaardwaarde als de linkerzijde null is -->

                            <!-- Status Badge -->
                            <div class="mb-3">
                                <span class="badge 
                                    @if ($malfunction->status->name === 'Critical') bg-danger
                                    @elseif ($malfunction->status->name === 'Major') bg-warning
                                    @else bg-secondary
                                    @endif">
                                    {{ $malfunction->status->name }}
                                </span>
                            </div>

                            <!-- Action Button -->
                            <a href="{{ route('malfunctions.edit', $malfunction->id) }}" class="btn btn-sm btn-warning w-100">
                                <i class="bi bi-pencil-square"></i> Aanpassen
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endsection
