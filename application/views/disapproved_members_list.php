<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "approve_member_navbar";
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

        <div class="span9">

     
       
         
                   

          


               <?php if(isset($member_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr class="success">
                        <th colspan="10">membership requests</th>
                    </tr>

               <tr class="success">
                    <th>Name</th>
                     <th>Email</th>
                     <th>Contact</th>
                     <th></th>
                     <th></th>
                </tr>
                
                 <?php  foreach($member_list as $row){?>


                     <tr class="success">

                        <td> <?php echo $row->NAME; ?> </td>
                        <td> <?php echo $row->EMAIL; ?> </td>
                        <td> <?php echo $row->CONTACT; ?> </td>

                        
                        <td>        <a href="<?php echo base_url(); ?>index.php/approve_member/change_status/<?php echo $row->MEMBER_ID; ?>" class="btn btn-success">Approve</a> </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/approve_member/cancel_request/<?php echo $row->MEMBER_ID; ?>" class="btn btn-danger">Disapprove</a> </td>
 

                    </tr>
                    
                 

                            <?php }  ?>

                       </table>

        <?php } else { ?>
                <br/>  <br/>
                    <div class="alert alert-error">
                            <p>No Book found</p>
                                </div>
                    <?php  } ?>

                 

                

    <?php echo $this->pagination->create_links();  ?>
                    
            

 </div>
          </div>


      </div>
     </div>


<br/>
<br/>
<br/>
<br/>
<br/>

<br/>



<?php $this->load->view('includes/footer') ?>
