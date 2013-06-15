<?php $this->load->view('includes/header')?>



</head>
  <body>


<?php $this-> load->view('includes/navigation')?>


    <!-- Start: MAIN CONTENT -->
      <div class="content" style="min-height: 450px">
      <div class="container">
        <div class="page-header">
          <h1>Login to Issue a Book</h1>
        </div>
          
         <?php echo validation_errors(); if(isset($msg)) { ?>
              <div class="alert alert-error">
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
                      <a data-toggle="modal" href="#f_pass">Forgot password?</a>
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









<div id="f_pass" class="modal hide fade in" style="display: none; ">
<div class="modal-header">
<a class="close" data-dismiss="modal" color="red" >Close</a>
<h3>Recover Password</h3>
</div>
<div class="modal-body">

             <form  method="post" action="<?php echo base_url(); ?>index.php/send_mail/password">
                   <fieldset>
                 <label>Email</label>
                 <input type="text" name="email" placeholder="Enter email address">
                  <br/>
                          <input type="submit" value="Recover" class="btn btn-primary">

                       </fieldset>
                </form>

</div>
<div class="modal-footer">
<p>Your password will be send by an email</p>
</div>
</div>


    

      
<?php $this->load->view('includes/footer')?>
