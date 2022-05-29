
<?php 
session_start();
include('./db_connect.php');
  ob_start();
 

  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header2.php' ?>

<body class="hold-transition login-page ">
<div class="container">

  <!-- /.login-logo -->
  <div class="forms-container">
    <div class="signin-signup">
      <form action="" class="sign-in-form" id="login-form">
      <h2 class="title">Sign in</h2>
        <div class="input-field">
        <i class="fas fa-user"></i>
          <input type="email"  name="email" required placeholder="Email">
        </div>
        <div class="input-field">
        <i class="fas fa-lock"></i>
          <input type="password" name="password" required placeholder="Password">
        </div>
        <button type="submit" class="btn solid">Sign In</button>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <img src="images/login.png" alt="">
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
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


