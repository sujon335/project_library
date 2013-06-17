<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "issued_books_navbar";
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






               <?php if(isset($booking_list) && $num>0 ) { ?>

                    <div class="alert alert-info">
                            <p>Please collect book from the library within 2 days of booking Other wise booking will be canceled</p>
                                </div>
                    <div class="alert alert-error">
                            <p>Return the book within booking finishing date otherwise fine will be charged</p>
                                </div>
                <table class="table table-bordered">

                    <tr class="success">
                        <th colspan="4">list of issued books</th>
                    </tr>

               <tr >
                    <th>Book Title</th>
                     <th>Booking Date</th>
                     <th>Finishing Date</th>
                     <th>Extend Booking Date</th>

                </tr>

                 <?php  foreach($booking_list as $row){?>


                     <tr>

                         <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                        <td> <?php echo $row->BOOKING_DATE; ?> </td>
                        <td> <?php echo $row->FINISHING_DATE; ?> </td>


                          <td>
                        <form  method="post" action="<?php echo base_url(); ?>index.php/member_issued_books/extend_booking/<?php echo $row->BOOKING_ID; ?>">
                            <input type="text" name="booking_extend_date" value="" data-date-format="dd-mm-yy" class="datepicker">
                            <input type="submit" class ="btn btn-success" value="Send request" />
                              </form>
                        </td>
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
                            <p>No booking list found</p>
                                </div>
                    <?php  } ?>


<?php if(isset($adv_booking_list) && $n>0 ) { ?>

               <table class="table table-bordered">

                    <tr class="success">
                        <th colspan="4">Advance bookings</th>
                    </tr>

               <tr >
                    <th>Book Title</th>
                    <th>Author</th>
                     <th>Available Date</th>

                </tr>

                 <?php  foreach($adv_booking_list as $row){?>


                     <tr>

                           <td ><a data-toggle="modal" href="#c-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                       <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->FINISHING_DATE; ?> </td>



                    </tr>


                  <div id="c-<?php echo $row->BOOK_ID; ?>" class="modal hide fade in" style="display: none; ">
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
                            <p>No advance booking list found</p>
                                </div>
                    <?php  } ?>








 </div>
          </div>


      </div>
     </div>



<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background', '#dff0d8');
</script>


        <script>
    $('.datepicker').datepicker();
    </script>



<?php $this->load->view('includes/footer') ?>

 