<!-- resources/views/students/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-users"></i> {{ __('messages.student_list') }}</h2>
    <a href="{{ route('students.create') }}" class="btn-primary">
        <i class="fas fa-user-plus"></i> {{ __('messages.add_student') }}
    </a>
</div>

<div class="search-container">
    <form method="GET" action="{{ route('students.index') }}" class="search-form">
        <div class="search-box">
            <input type="text" 
                   name="search" 
                   placeholder="{{ __('messages.search') }}" 
                   value="{{ $searchTerm }}">
            <button type="submit" class="btn-search">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>

@if($students->isEmpty())
    <div class="no-data">
        <i class="fas fa-user-slash"></i>
        <p>{{ __('messages.no_students') }}</p>
    </div>
@else
    <div class="table-responsive">
        <table class="students-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('messages.first_name') }}</th>
                    <th>{{ __('messages.last_name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.phone') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone ?? '-' }}</td>
                    <td class="actions">
                        <a href="{{ route('students.edit', $student->id) }}" 
                           class="btn-edit" 
                           title="{{ __('messages.edit') }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('students.destroy', $student->id) }}" 
                           class="btn-delete" 
                           title="{{ __('messages.delete') }}"
                           onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection