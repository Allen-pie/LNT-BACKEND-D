<nav class="navbar navbar-expand-lg bg-primary ">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/home">My App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/collection">Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/item/add">Add Item</a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link" href="/item/list">List Item</a>
                </li>
            </ul>
        </div>

        <div>

            @if(Auth::user())
            <ul class="navbar-nav"> 

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
             
                <li class="nav-item">
                    <h1>
                        {{ Auth::user()->name  }}
                    </h1>
                </li>

            </ul>

            @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
            @endif

        </div>
</nav>