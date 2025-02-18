@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff; border-top: 5px solid black;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark mb-5">Companies</h4>
        <a href="{{ route('companies.create') }}" class="btn btn-dark add-company-btn">
            <i class="fas fa-plus"></i> Add New Company
        </a>
    </div>




        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" 
                                         class="rounded-circle border shadow-sm company-logo" 
                                         width="50" height="50">
                                @else
                                    <div class="default-logo d-flex align-items-center justify-content-center text-white">
                                        <i class="fas fa-building"></i>
                                    </div>
                                @endif
                                <span class="fw-semibold text-dark">{{ $company->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $company->email }}</td>
                        <td>
                            <a href="{{ $company->website }}" target="_blank" class="text-primary text-decoration-none fw-medium">
                                {{ $company->website }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this company?");
    }
</script>

<style>
body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
}

.card {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border-radius: 12px;
}

.custom-table {
    width: 100%;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
}

.custom-table thead {
    background: black;
    color: white;
    text-transform: uppercase;
    font-weight: bold;
}

.custom-table thead th {
    padding: 16px;
    text-align: left;
    font-size: 14px;
    letter-spacing: 0.5px;
}

.custom-table tbody tr:hover {
    background: #f1f1f1;
}

.custom-table td {
    padding: 16px;
    vertical-align: middle;
    font-size: 14px;
    color: #555;
}

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
    white-space: nowrap; 
}

.add-company-btn:hover {
    background: #000;
}


.btn-outline-primary:hover {
    background: #007bff;
    color: white;
}

.btn-outline-danger:hover {
    background: #dc3545;
    color: white;
}

.company-logo {
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.default-logo {
    width: 50px;
    height: 50px;
    background: #6c757d;
    font-size: 20px;
    border-radius: 50%;
}

.d-flex.gap-3 {
    gap: 12px;
}
</style>
@endsection
