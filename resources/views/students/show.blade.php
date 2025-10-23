@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Student: {{ $student->full_name }}</h2>
    <div>
        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Student Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
                <p><strong>First Name:</strong> {{ $student->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Birth Date:</strong> {{ $student->birth_date->format('M d, Y') }}</p>
                <p><strong>Section:</strong> 
                    <a href="{{ route('sections.show', $student->section) }}">
                        {{ $student->section->name }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection