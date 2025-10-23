@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Sections</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-primary">Add Section</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Students Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                <tr>
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->description ?? 'N/A' }}</td>
                    <td>{{ $section->capacity }}</td>
                    <td>{{ $section->students_count }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('sections.show', $section) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('sections.edit', $section) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('sections.destroy', $section) }}" method="POST" class="m-0 p-0 d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $sections->links() }}
    </div>
</div>
@endsection