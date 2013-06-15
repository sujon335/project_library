<?php $this->load->view('includes/header')?>



</head>
  <body>


<?php $this-> load->view('includes/navigation')?>


    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Recover password</h1>
        </div>
          
         <?php echo validation_errors(); if(isset($msg)) { ?>
              <div class="alert alert-info">
            <?php  echo $msg; ?>
              </div>
          <?php  }?>
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-lock"></i>Member Login Panel</h4>
            <div class="widget-body">
              <div class="center-align">
                <form class="form-horizontal form-signin-signup" method="post" action="<?php echo base_url(); ?>index.php/member_auth/login">
                  <input type="text" name="username" placeholder="username/Email">
                  <input type="password" name="password" placeholder="Password"><br/>

                  
                  <input type="submit" value="Login" class="btn btn-primary btn-large">
                </form>
                    <div>
                      <a href="<?php echo site_url('send_mail/password'); ?>">Forgot password?</a>
                    </div><br/>
                <h4><i class="icon-question-sign"></i> Don't have an account?</h4>
                <a href="<?php echo base_url(); ?>index.php/register/registration" class="btn btn-large bottom-space">Signup</a>

                
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    <!-- End: MAIN CONTENT -->



    

      
<?php $this->load->view('includes/footer')?>
