    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    @extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<div class="container mt-5">
    <!-- Section Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4">Storing Bewerken</h1>
    </div>

    <!-- Form for Editing Malfunction -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Bewerk Storing</h2>
            <form action="{{ route('malfunctions.update', $malfunction->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Machine Selection -->
                <div class="mb-3">
                    <label for="machine_id" class="form-label">Machine</label>
                    <div class="input-group">
                        <select name="machine_id" id="machine_id" class="form-select" required>
                            <option value="">Selecteer een machine</option>
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}" {{ $machine->id == $malfunction->machine_id ? 'selected' : '' }}> 
                                    <!--Met selected-logica = noodzakelijk voor een vooraf ingevulde dropdown en bij het geval dat het waarde leeg is dan wordt er een lege string getoond-->
                                    {{ $machine->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Status Selection -->
                <div class="mb-3">
                    <label for="status_id" class="form-label">Status</label>
                    <div class="input-group">
                        <select name="status_id" id="status_id" class="form-select" required>
                            <option value="">Selecteer een status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" {{ $status->id == $malfunction->status_id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- User Selection -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">Medewerker (optioneel)</label>
                    <div class="input-group">
                        <select name="user_id" id="user_id" class="form-select">
                            <option value="">Geen medewerker</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $malfunction->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Description Input -->
                <div class="mb-3">
                    <label for="description" class="form-label">Beschrijving</label>
                    <textarea name="description" id="description" rows="4" class="form-control" required>{{ $malfunction->description }}</textarea>
                </div>

                <!-- Finished Date -->
                <div class="mb-3">
                    <label for="finished_at" class="form-label">Afhandelingsdatum</label>
                    <input type="date" name="finished_at" id="finished_at" class="form-control" value="{{ $malfunction->finished_at ? $malfunction->finished_at->toDateString() : '' }}">
                </div>

                <!-- Save Button -->
                <button type="submit" class="btn btn-primary w-100 mt-4">
                    <i class="bi bi-save"></i> Opslaan
                </button>
            </form>

            <!-- Delete Button -->
            <form action="{{ route('malfunctions.destroy', $malfunction->id) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-trash"></i> Verwijderen
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
