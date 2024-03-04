<?php
/* Smarty version 4.4.1, created on 2024-03-04 00:58:37
  from 'C:\xampp\htdocs\Yip_Project\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_65e50ead793fa7_03555926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1339a12319f8b66fb62fe07ac18df087f89e19fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Yip_Project\\templates\\register.tpl',
      1 => 1709510310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65e50ead793fa7_03555926 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                  <?php if ((isset($_smarty_tpl->tpl_vars['successMessage']->value))) {?>
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $_smarty_tpl->tpl_vars['successMessage']->value;?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                <?php } elseif ((isset($_smarty_tpl->tpl_vars['errorMessage']->value))) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                
                    <?php }?>
                    <form method="POST" action = "index.php" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="User name" value = "<?php echo (($tmp = $_smarty_tpl->tpl_vars['name']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required/>
                        </div>
                        <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['name']))) {?>
                            <div class="text-warning" ><?php echo $_smarty_tpl->tpl_vars['errors']->value['name'];?>
</div>
                        <?php }?>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email" value = "<?php echo (($tmp = $_smarty_tpl->tpl_vars['email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required/>
                        </div>
                            <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['email']))) {?>
                            <div class="text-warning"><?php echo $_smarty_tpl->tpl_vars['errors']->value['email'];?>
</div>
                        <?php }?>

                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>   
                        </div>

                         <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['password']))) {?>
                             <span class="text-warning"><?php echo $_smarty_tpl->tpl_vars['errors']->value['password'];?>
</span>
                        <?php }?>
                    
                        <div class="form-group">
                            <input type="submit" name="btn" id="btn" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <?php echo '<script'; ?>
 src="../assets/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../assets/js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="../assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../assets/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
