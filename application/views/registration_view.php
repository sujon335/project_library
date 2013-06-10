<?php $this->load->view('includes/header')?>

    <script>
$(document).ready(

function()
{

<?php $data['selected_nav'] = "signup";
$this-> load->view('includes/nav_helper',$data)?>

});
    </script>

</head>
  <body>


<?php $this-> load->view('includes/navigation')?>


   <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Signup Form</h1>
        </div>
          <?php echo validation_errors(); if(isset($msg)) echo $msg; ?>
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-gift"></i> Be a member of this library</h4>
            <div class="widget-body">
              <div class="center-align">
                <form class="form-horizontal form-signin-signup" method="post" action="<?php echo base_url(); ?>index.php/register/registration">
                  <input type="text" name="card" placeholder="Library Card no.">
                  <input type="text" name="name" placeholder="Name">
                  <input type="text" name="email" placeholder="Email">
                  <input type="text" name="contact" placeholder="Contact/phone no.">
                  <input type="text" name="username" placeholder="Username">
                  <input type="password" name="password" placeholder="Password">
                  <input type="password" name="password_confirmation" placeholder="Confirm Password">
                  
                    <?php
//                    $publickey = "6LchPOESAAAAACDK1kUYERoUb2DW227kIJp09Gi9";
//                    echo  recaptcha_get_html($publickey);
                    ?>
                    

                  <div>
                    <input type="submit" value="Signup" class="btn btn-primary btn-large">
                  </div>
                </form>
                <h4><i class="icon-question-sign"></i> Already have an account?</h4>
                <a href="<?php echo site_url(); ?>" class="btn btn-large bottom-space">Signin</a>
    
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End: MAIN CONTENT -->




<?php $this->load->view('includes/footer')?>
