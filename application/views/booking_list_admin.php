<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "booking_data_navbar";
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

     
       
   
            <form class="navbar-search pull-right" method="post" action="<?php echo base_url(); ?>index.php/booking_data_admin/data_search_get">

    

                                <input type="text" name="search" class="search-query" placeholder="Search">
                        <input type="submit" value="search" class="btn btn-success">
                        
                        </form><br/><br/>
                      
                   

          


               <?php if(isset($booking_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr class="success">
                        <th colspan="6">list of bookings</th>
                    </tr>

               <tr >
                    <th>Book Title</th>
                     <th>Extension No</th>
                     <th>Member Name</th>
                     <th>Library Card No</th>
                     <th>Finishing Date</th>
                     <th>Status</th>
                    
                </tr>
                
                 <?php  foreach($booking_list as $row){?>


                     <tr >

                        <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->NAME; ?> </td>
                        <td> <?php echo $row->LIBRARY_CARD_NO; ?> </td>
                        <td> <?php echo $row->FINISHING_DATE; ?> </td>









                        <?php if ($row->TAKEN==0) {  ?>
                        <td>        <a href="<?php echo base_url(); ?>index.php/booking_data_admin/taken_book/<?php echo $row->BOOKING_ID; ?>" class="btn btn-info">Taken</a> </td>

                            <?php } else { ?>
                          <td>        <a href="<?php echo base_url(); ?>index.php/booking_data_admin/returned_book/<?php echo $row->BOOKING_ID; ?>" class="btn btn-success">Returned</a> </td>
                        <?php  }?>

                    </tr>


                  <div id="b-<?php echo $row->BOOK_ID; ?>" class="modal hide fade in" style="display: none; ">
                <div class="modal-header">
                <a class="close" data-dismiss="modal" color="red" >Close</a>
                <h3>Book details</h3>
                </div>
                <div id="pop-up-modal" class="modal-body">
                    <h2><?php echo $row->TITLE; ?></h2><br/>
                    written by:<?php echo $row->AUTHOR; ?><br/>
                    Category:<?php echo $row->CATEGORY; ?><br/>
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

                 

                

    <?php echo $this->pagination->create_links();  ?>
                    
            

 </div>
          </div>


      </div>
     </div>



    





<!--<script type="text/javascript">
    $(function(){

        $("#opener-<?php echo $row->BOOK_ID; ?>").click(function(){

            $.get("<?php echo base_url(); ?>index.php/booking_data_admin/get_book_info/<?php echo $row->BOOK_ID; ?>",function(data){

                $("#pop-up-modal").html(data);
            });
        });
    });
</script>-->

    

<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background', '#dff0d8');
</script>






<?php $this->load->view('includes/footer') ?>

 