<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <h2>LocalBazar</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                
            </ul>
            <div class="d-flex" role="search">
                <a href="cart.php"><i class="bi bi-bag"></i></a><span id="cart_no"></span>
               <div id="login-btn">
                 <a href="login.php" class="btn btn-success " id="login-btn">LogIn</a>
                </div>
                <div  id="logout-btn">
                    <button class="btn btn-outline-danger" onclick="Logout()">Logout</button>

                </div>
                <div id="signup-btn">
                    <a href="signup.php" class="btn btn-success" >signup</a>

                </div>
            </div>
        </div>
    </div>
</nav>