@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="brand">Edit Medicine</h1>
    <form method="POST" action="{{ route('medicines.update', $medicine) }}">
        @csrf
        @method('PUT') <!-- استخدم PUT لتحديث البيانات -->
        
        <div class="mb-3">
            <label for="name" class="form-label edit-label">Medicine Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $medicine->name) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="dosage_quantity" class="form-label edit-label">Dosage Quantity</label>
            <input type="number" class="form-control" id="dosage_quantity" name="dosage_quantity" value="{{ old('dosage_quantity', $medicine->dosage_quantity) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="dosage_unit" class="form-label edit-label">Dosage Unit</label>
            <input type="text" class="form-control" id="dosage_unit" name="dosage_unit" value="{{ old('dosage_unit', $medicine->dosage_unit) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="frequency_quantity" class="form-label edit-label">Frequency Quantity</label>
            <input type="number" class="form-control" id="frequency_quantity" name="frequency_quantity" value="{{ old('frequency_quantity', $medicine->frequency_quantity) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="frequency_unit" class="form-label edit-label">Frequency Unit</label>
            <input type="text" class="form-control" id="frequency_unit" name="frequency_unit" value="{{ old('frequency_unit', $medicine->frequency_unit) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Medicine</button>
    </form>
</div>
@endsection

