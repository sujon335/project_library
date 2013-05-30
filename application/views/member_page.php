<?php $this->load->view('includes/header')?>



</head>
  <body>


<?php $this-> load->view('includes/navigation')?>


    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <div class="container">
        <div class="page-header">
       <?php  $name=$this->session->userdata('username'); ?>
          <p>Welcome <?php echo $name; ?> </p>
        </div>
      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>



          </div>


      </div>
     </div>
    <!-- End: MAIN CONTENT -->






<?php $this->load->view('includes/footer')?>
