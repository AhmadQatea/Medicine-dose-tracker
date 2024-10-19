@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <h1 class="brand">Medicines</h1>
    <a href="{{ route('medicines.create') }}" class="btn btn-add mb-2">Add Medicine</a>
    <table class="table">
        <thead>
            <tr class="tr">
                <th>Name</th>
                <th>Dosage Quantity</th>
                <th>Dosage Unit</th>
                <th>Frequency Quantity</th>
                <th>Frequency Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
            <tr>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->dosage_quantity }}</td>
                <td>{{ $medicine->dosage_unit }}</td>
                <td>{{ $medicine->frequency_quantity }}</td>
                <td>{{ $medicine->frequency_unit }}</td>
                <td>
                    <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
