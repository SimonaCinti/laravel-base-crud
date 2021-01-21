<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('homepage') }}">Dream Theater Fanpage</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Homepage</a>
                </li>      
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cds.index') }}">Discography</a>
                </li>      
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cds.create') }}">New Cd</a>
                </li>      
            </ul>
        </div>
    </nav>
</header>