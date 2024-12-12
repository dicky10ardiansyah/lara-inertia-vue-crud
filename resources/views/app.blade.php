<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body>
    <div class="container mx-auto px-4">
        <div class="navbar bg-base-100 mb-3">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl">Larevel Inertia VueJS</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="{{ url('/customers') }}">Home</a></li>
                    <li><a href="{{ url('customers/create') }}">Create</a></li>
                </ul>
            </div>
        </div>
        @inertia
    </div>
</body>

</html>