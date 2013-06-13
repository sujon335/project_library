<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "edit_profile_navbar";
$this->load->view('includes/nav_helper', $data) ?>

    });
</script>
</head>
<body>

    <?php $this->load->view('includes/navigation') ?>


  <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">

      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>




          <div class="span5">
    <!-- End: MAIN CONTENT -->


                        <?php echo validation_errors(); if(isset($msg)) echo $msg; ?>

                          <div class="widget-body">
                              <div class="center-align">
                             <?php if(isset($record)){
                foreach ($record as $row) { ?>

                <form  method="post" action="<?php echo base_url(); ?>index.php/member_edit_profile/edit_profile">
                   <fieldset>
                  <legend>Edit Basic info</legend>
                 <label>Name</label>
                 <input type="text" name="name" value="<?php echo $row->NAME;?>">
                 <label>Email</label>
                 <input type="text" name="email" value="<?php echo $row->EMAIL;?>">
                 <label>Contact</label>
                 <input type="text" name="contact" value="<?php echo $row->CONTACT;?>">
                 <label>USERNAME</label>
                  <input type="text" name="username" value="<?php echo $row->USERNAME;?>">

                  <br/>
                          <input type="submit" value="Save" class="btn btn-primary">

                       </fieldset>
                </form>
                  <?php } }?>

                  </div>
                   </div>
</div>

          <div class="span4">



                          <div class="widget-body">
                    <div class="center-align">
                   <form  method="post" action="<?php echo base_url(); ?>index.php/member_edit_profile/change_password">
            <fieldset>
            <legend>Change Password</legend>
            <label>Password</label>
            <input type="password" placeholder="Enter Current password" name="password">
            <label>New password</label>
            <input type="password" placeholder="Enter new password" name="c_password"> <br/>

            </fieldset>
                     <input type="submit" class ="btn btn-primary" value="Change" />
        </form>

            </div>
             </div>


              </div>

         </div>
         </div>
     </div>

    <!-- End: MAIN CONTENT -->




<?php $this->load->view('includes/footer')?>
