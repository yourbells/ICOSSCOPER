<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand logo" href="/">
            <img src="img/logo.jpeg" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('registration') ? 'active' : '' }}" href="/registration">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('term') ? 'active' : '' }}" href="/term-and-condition">Term & Condition</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('previous') ? 'active' : '' }}" href="/previous-seminar-and-publication">Previous Seminar & Publication</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('template') ? 'active' : '' }}" href="/template">Template</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="/gallery">Gallery</a>
                </li>
            </ul>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>