@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff; border-top: 5px solid black;">
        <h4 class="fw-bold text-dark mb-4">Create Company</h4>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Name and Email in the same row -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Logo and Website in the same row -->
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Logo (min: 100x100)</label>
                        <input type="file" name="logo" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label fw-semibold">Website</label>
                        <input type="url" name="website" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-dark add-company-btn">Save</button>
                <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
            </div>
        </form>
    </div>
</div>

<style>
/* Page Styling */
body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
}

/* Card Styling */
.card {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border-radius: 12px;
}

/* Form Controls */
.form-group {
    display: flex;
    flex-direction: column;
}

.form-label {
    color: #212529;
    font-size: 14px;
    margin-bottom: 6px;
    font-weight: 600;
}

.form-control {
    padding: 12px;
    font-size: 14px;
    border-radius: 10px;
    border: 1px solid #dee2e6;
    transition: all 0.2s ease-in-out;
}

.form-control:focus {
    border-color: #212529;
    box-shadow: 0 0 0 0.2rem rgba(33, 37, 41, 0.15);
}

/* Buttons */
.btn {
    transition: all 0.2s ease-in-out;
}

.add-company-btn {
    background: #212529;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 600;
    color: white;
    border: none;
}

.add-company-btn:hover {
    background: #000;
}

.btn-outline-secondary {
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 600;
}

/* Alert Styling */
.alert {
    border-radius: 10px;
    font-size: 14px;
}

.alert ul {
    padding-left: 20px;
}
</style>

@endsection
