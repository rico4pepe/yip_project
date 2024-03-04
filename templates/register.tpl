<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yip Registration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
  
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                  {if isset($successMessage)}
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {$successMessage}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                {elseif isset($errorMessage)}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {$errorMessage}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                
                    {/if}
                    <form method="POST" action = "index.php" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="User name" value = "{$name|default:""}" required/>
                        </div>
                        {if isset($errors.name)}
                            <div class="text-warning" >{$errors.name}</div>
                        {/if}
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" value = "{$email|default:""}" required/>
                        </div>
                            {if isset($errors.email)}
                            <div class="text-warning">{$errors.email}</div>
                        {/if}

                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>   
                        </div>

                         {if isset($errors.password)}
                             <span class="text-warning">{$errors['password']}</span>
                        {/if}
                    
                        <div class="form-group">
                            <input type="submit" name="btn" id="btn" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
     <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>