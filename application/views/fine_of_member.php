<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "member_fine_navbar";
$this->load->view('includes/nav_helper', $data) ?>

    });
</script>






</head>
<body>

    <?php $this->load->view('includes/navigation') ?>


    <div class="content">
      <div class="container">


      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>

        <div class="span3">






               <?php if($num>0 ) { ?>

                    <div class="alert alert-error">
                                  <p>Your fine is <?php echo $num; ?> taka</p>
                                </div>
 
        <?php } else { ?>
                <br/>  <br/>
                    <div class="alert alert-info">
                            <p>Your fine is 0 taka</p>
                                </div>
                    <?php  } ?>









 </div>
          </div>


      </div>
     </div>






<?php $this->load->view('includes/footer') ?>

 