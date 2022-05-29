
<?php
session_start();
include('./db_connect.php');


?>
<?php include 'header2.php' ?>

<body class="hold-transition login-page ">
<div class="container">

  <!-- /.login-logo -->
  <div class="forms-container">
    <div class="signin-signup">
      <form action="sign-up.php" class="sign-in-form" id="signup-form" method="POST">
      <h2 class="title">Sign Up</h2>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input type="text" name="firstname" placeholder="Firstname">
        </div>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input type="text" name="lastname" placeholder="Lastname">
        </div>
        <div class="input-field">
        <i class="fas fa-user"></i>
          <input type="email"  name="email" required placeholder="Email">
        </div>
        <div class="input-field">
        <i class="fas fa-lock"></i>
          <input type="password" name="password" required placeholder="Password">
        </div>
        <div class="input-field">
        <i class="fas fa-lock"></i>
          <input type="password" name="cpass" required placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn solid">Sign Up</button>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <img src="images/login.png" alt="">
</div>
<!-- /.login-box -->
<?php

?>
<script>
    $(document).ready(function(){
    $('#signup-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=signup',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
   })
  })
</script>

<?php include 'footer.php' ?>

