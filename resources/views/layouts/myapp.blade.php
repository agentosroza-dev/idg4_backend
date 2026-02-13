<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }

        .sidebar a {
            color: #fff;
            padding: 12px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar a.bg-secondary {
            background-color: #6c757d !important;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <h5 class="text-white text-center py-3">Menu</h5>
                <a href="{{ route('students.index') }}"
                    class="{{ request()->routeIs('students.*') ? 'bg-secondary' : '' }}">
                    <i class="bi bi-box-seam"></i> Students
                </a>
                <h5 class="text-white text-center py-3">Option</h5>
                <a href="{{ route('majors.index') }}"
                    class="{{ request()->routeIs('majors.*') ? 'bg-secondary' : '' }}">
                    <i class="bi bi-box-seam"></i> Majors
                </a>
                <a href="{{ route(name: 'categories.index') }}"
                    class="{{ request()->routeIs('categories.*') ? 'bg-secondary' : '' }}">
                    <i class="bi bi-box-seam"></i> Category
                </a>
            </nav>
            <!-- Main content -->
            <main class="col-md-10 p-4">
                <h3>@yield('title')</h3>
                <hr>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>

</html>
