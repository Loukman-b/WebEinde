    <!-- An unexamined life is not worth living. - Socrates -->
    @extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4">Nieuwe Storing Aanmaken</h1>
    </div>

    <!-- Create Form -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('malfunctions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Machine Selection -->
                <div class="mb-3">
                    <label for="machine_id" class="form-label">Machine</label>
                    <select name="machine_id" id="machine_id" class="form-select" required>
                        <option value="">Selecteer een machine</option>
                        @foreach ($machines as $machine)
                            <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Selection -->
                <div class="mb-3">
                    <label for="status_id" class="form-label">Status</label>
                    <select name="status_id" id="status_id" class="form-select" required>
                        <option value="">Selecteer een status</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- User Selection -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">Medewerker (optioneel)</label>
                    <select name="user_id" id="user_id" class="form-select">
                        <option value="">Geen medewerker</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Beschrijving</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Submit and Cancel -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Opslaan
                    </button>
                    <a href="{{ route('malfunctions.index') }}" class="btn btn-secondary">
                        Annuleer
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
