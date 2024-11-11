<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container">
        <h4>Post Management</h4>
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{route('post.index')}}>Post</a>
                </li>
            </ul>
            
            <!-- Left links -->

            <div class="d-flex align-items-center">
                <a href={{route('login')}} data-mdb-ripple-init class="btn btn-link px-3 me-2">
                    Login
                </a>
                <a href={{route('userProfile.create')}} data-mdb-ripple-init class="btn btn-primary me-3">
                    Sign up for free
                </a>
            </div>
        </div>
    </div>       
</nav>