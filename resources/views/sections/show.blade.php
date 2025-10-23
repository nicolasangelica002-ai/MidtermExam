@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Section: {{ $section->name }}</h2>
    <div>
        <a href="{{ route('sections.edit', $section) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Section Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $section->name }}</p>
                <p><strong>Description:</strong> {{ $section->description ?? 'N/A' }}</p>
                <p><strong>Capacity:</strong> {{ $section->capacity }}</p>
                <p><strong>Current Students:</strong> {{ $section->students->count() }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Students in this Section</h5>
            </div>
            <div class="card-body">
                @if($section->students->count() > 0)
                    <ul class="list-group">
                        @foreach($section->students as $student)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $student->full_name }}
                                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No students in this section yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection