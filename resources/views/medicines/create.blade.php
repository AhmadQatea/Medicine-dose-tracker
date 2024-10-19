@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="brand">Add Medicine</h1>
    <form method="POST" action="{{ route('medicines.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label add-label">Medicine Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="dosage_quantity" class="form-label add-label">Dosage Quantity</label>
            <input type="number" class="form-control" id="dosage_quantity" name="dosage_quantity" required>
        </div>
        <div class="mb-3">
            <label for="dosage_unit" class="form-label add-label">Dosage Unit</label>
            <input type="text" class="form-control" id="dosage_unit" name="dosage_unit" required>
        </div>
        <div class="mb-3">
            <label for="frequency_quantity" class="form-label add-label">Frequency Quantity</label>
            <input type="number" class="form-control" id="frequency_quantity" name="frequency_quantity" required>
        </div>
        <div class="mb-3">
            <label for="frequency_unit" class="form-label add-label">Frequency Unit</label>
            <input type="text" class="form-control" id="frequency_unit" name="frequency_unit" value="يوميا" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Medicine</button>
    </form>
</div>
@endsection

