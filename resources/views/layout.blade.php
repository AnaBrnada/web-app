<!DOCTYPE html>  
<html>  
<head>  
    <title>@yield('title', 'Project Aplikacija')</title>  
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">  
</head>  
<body>  
    <header>  
        <h1>Project Aplikacija</h1>  
        <nav>  
            <ul>  
                <li><a href="{{ route('projects.index') }}">Lista Projekata</a></li>  
                <li><a href="{{ route('projects.create') }}">Dodaj Novi Projekt</a></li>  
            </ul>  
        </nav>  
    </header>  
    
    <main>  
        @yield('content')  
    </main>  

    <footer>  
        <p>&copy; 2024 Project Aplikacija</p>  
    </footer>  
</body>  
</html>