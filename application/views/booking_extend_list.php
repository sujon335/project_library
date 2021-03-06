<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "booking_extend_navbar";
$this->load->view('includes/nav_helper', $data) ?>

    });
</script>

	<style type="text/css" media="screen">


	td {
	 border-right: 1px solid #aaaaaa;
	 padding: 1em;
	}

	td:last-child {
	 border-right: none;
	}

	th {
	 text-align: left;
	 padding-left: 1em;
	 background: #cac9c9;
	border-bottom: 1px solid white;
	border-right: 1px solid #aaaaaa;
	}

	#pagination a, #pagination strong {
	 background: #e3e3e3;
	 padding: 4px 7px;
	 text-decoration: none;
	border: 1px solid #cac9c9;
	color: #292929;
	font-size: 13px;
	}

	#pagination strong, #pagination a:hover {
	 font-weight: normal;
	 background: #cac9c9;
	}
	</style>

</head>
<body>

    <?php $this->load->view('includes/navigation') ?>


      <div class="content" style="min-height: 450px">
      <div class="container">


      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>

        <div class="span9">

     
       
         
                   

          


               <?php if(isset($booking_extend_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr>
                        <th colspan="7">Booking extend requests</th>
                    </tr>

               <tr>
                     <th>Book Title</th>
                     <th>Member</th>
                     <th>Booking Date</th>
                     <th>Finishing Date</th>
                     <th>Extend Request date</th>
                     <th></th>
                     <th></th>
                </tr>
                
                 <?php  foreach($booking_extend_list as $row){?>


                     <tr >
                        <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                        <td> Name:<?php echo $row->NAME; ?><br/>
                           Email:<?php echo $row->EMAIL; ?><br/>
                           Library card No:<?php echo $row->LIBRARY_CARD_NO; ?>
                        </td>
                        <td> <?php echo $row->BOOKING_DATE; ?> </td>
                        <td> <?php echo $row->FINISHING_DATE; ?> </td>
                        <td> <?php echo $row->EXTEND_DATE; ?> </td>

                        
                        <td>        <a href="<?php echo base_url(); ?>index.php/approve_booking_extend/change_finishing_date/<?php echo $row->BOOKING_ID; ?>/<?php echo $row->EXTEND_DATE; ?>" class="btn btn-success">Approve</a> </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/approve_booking_extend/cancel_request/<?php echo $row->BOOKING_ID; ?>" class="btn btn-danger">Disapprove</a> </td>
 

                    </tr>


                 <div id="b-<?php echo $row->BOOK_ID; ?>" class="modal hide fade in" style="display: none; ">
                <div class="modal-header">
                <a class="close" data-dismiss="modal" color="red" >Close</a>
                <h3>Book details</h3>
                </div>
                <div id="pop-up-modal" class="modal-body">
                    <h2><?php echo $row->TITLE; ?></h2>
                   <img src="<?php echo base_url(); ?><?php echo urldecode($row->IMAGE_PATH); ?>">
                       <br/>
                    Author:<?php echo $row->AUTHOR; ?><br/>
                    Category:<?php echo $row->CATEGORY; ?><br/>
                    Edition:<?php echo $row->EDITION; ?><br/>
                    Publisher:<?php echo $row->PUBLISHER; ?><br/>
                </div>
                <div class="modal-footer">

                </div>
                </div>




                 

                            <?php }  ?>

                       </table>

        <?php } else { ?>
                <br/>  <br/>
                    <div class="alert alert-error">
                            <p>No request found</p>
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

<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background', '#dff0d8');
</script>



<?php $this->load->view('includes/footer') ?>
