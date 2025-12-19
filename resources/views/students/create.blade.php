<!-- resources/views/students/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="page-header">
    <h2><i class="fas fa-user-plus"></i> {{ __('messages.new_student') }}</h2>
    <a href="{{ route('students.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left"></i> {{ __('messages.cancel') }}
    </a>
</div>

<div class="form-container">
    <form method="POST" action="{{ route('students.store') }}" class="student-form">
        @csrf
        
        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">{{ __('messages.first_name') }} *</label>
                <input type="text" 
                       id="first_name" 
                       name="first_name" 
                       value="{{ old('first_name') }}"
                       required 
                       maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="last_name">{{ __('messages.last_name') }} *</label>
                <input type="text" 
                       id="last_name" 
                       name="last_name" 
                       value="{{ old('last_name') }}"
                       required 
                       maxlength="50">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="email">{{ __('messages.email') }} *</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       required 
                       maxlength="100">
            </div>
            
            <div class="form-group">
                <label for="phone">{{ __('messages.phone') }}</label>
                <input type="tel" 
                       id="phone" 
                       name="phone" 
                       value="{{ old('phone') }}"
                       maxlength="20">
            </div>
        </div>
        
        <div class="form-group">
            <label for="birth_date">{{ __('messages.birth_date') }}</label>
            <input type="date" 
                   id="birth_date" 
                   name="birth_date"
                   value="{{ old('birth_date') }}">
        </div>
        
        <div class="form-group">
            <label for="address">{{ __('messages.address') }}</label>
            <textarea id="address" 
                      name="address" 
                      rows="3" 
                      maxlength="500">{{ old('address') }}</textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> {{ __('messages.save') }}
            </button>
            <a href="{{ route('students.index') }}" class="btn-secondary">
                <i class="fas fa-times"></i> {{ __('messages.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection