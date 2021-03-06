<div class="brand">ghuri.com</div>
<div class="address-bar">Land of Dreams</div>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="index.html">Business Casual</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="home">Home</a>
                </li>
                <li>
                    <a href="about">About</a>
                </li>
                <li>
                    <a href="blog">Blog</a>
                </li>
                <li>
                    <a href="contact">Contact</a>
                </li>
                @if(\Auth::check())
                  <li>
                    <a href="logout">Logout</a> 
                  </li>
                @else
                  <li>
                    <a href="#login_section">Login</a> 
                  </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>