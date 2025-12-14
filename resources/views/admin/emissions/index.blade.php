@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Greenhouse Gas Emissions</h2>

    <a href="{{ route('admin.emissions.create') }}" class="btn btn-primary mb-3">
        Add Emission Data
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Waste Type</th>
                <th>Volume</th>
                <th>CO₂ Equivalent (kg)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($emissions as $emission)
            <tr>
                <td>{{ $emission->waste_type }}</td>
                <td>{{ $emission->volume }}</td>
                <td>{{ $emission->co2_equivalent }}</td>
                <td>
                    <a href="{{ route('admin.emissions.edit', $emission) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.emissions.destroy', $emission) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this record?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
