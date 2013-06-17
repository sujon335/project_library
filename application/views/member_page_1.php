<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "";
$this->load->view('includes/nav_helper', $data) ?>

    });
</script>



</head>
<body>

    <?php $this->load->view('includes/navigation') ?>

      <div class="content" style="min-height: 450px">
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




<?php $this->load->view('includes/footer') ?>
