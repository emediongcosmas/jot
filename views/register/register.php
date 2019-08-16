<div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">REGISTER</h1>
                    </div>
                    <form class="user" method="POST" id="register-form" action="">
                        
                        
                        <?php
                       
                        if( isset($_POST['firstname']) && !empty($_POST['firstname']) &&
                            isset($_POST['lastname']) && !empty($_POST['lastname']) && 
                            isset($_POST['email']) && !empty($_POST['email']) &&
                            isset($_POST['password']) && !empty($_POST['password']))
                            {
                                user::register(
                                    $_POST['firstname'],
                                    $_POST['lastname'], 
                                    $_POST['email'], 
                                    $_POST['password']
                                );
                            }       
                        ?>
                         
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="firstname" class="form-control form-control-user" id="firstname" placeholder="First Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="lastname" class="form-control form-control-user" id="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                        </div>
                        <button class="btn btn-primary btn-user btn-block" type="submit">Register Account</button>
                        <!-- <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a> -->
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login">Already have an account? Login!</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>

  </div>