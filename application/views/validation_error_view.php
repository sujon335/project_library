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


     <div class="content" style="min-height: 450px">
      <div class="container">


      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>

        <div class="span5">



        <div class="alert alert-info"><?php echo validation_errors(); if(isset($msg)) echo $msg; ?></div>






 </div>
          </div>


      </div>
     </div>






<?php $this->load->view('includes/footer') ?>

 