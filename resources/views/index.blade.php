<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            font-size: 2.5rem;
            color: #343a40;
            margin-bottom: 1.5rem;
        }
        .table {
            background: #ffffff;
        }
        .table th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table td {
            vertical-align: middle;
        }
        .form-control {
            border-radius: 0.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.5rem;
        }
        .btn-secondary {
            border-radius: 0.5rem;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .page-link {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Student List</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ url('/students') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="id" class="form-control" placeholder="Search by ID" value="{{ request('id') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="email" class="form-control" placeholder="Search by Email" value="{{ request('email') }}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ url('/students') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Students Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $students->links() }}
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
