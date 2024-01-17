<nav class="navbar navbar-expand-md fixed-top bg-body border-bottom">
                <div class="container-fluid"><a class="navbar-brand" href="#">My App</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                    <?php if(!isset($_SESSION['is_loggedin'])) :?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                </ul>
                <?php endif; ?>


                <?php if(isset($_SESSION['is_loggedin'])) :?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/member">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user">User</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                </ul>
                <?php endif; ?>
                    </div>
                </div>
        </nav>



      


  
