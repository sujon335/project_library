<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "approve_member_navbar";
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

     
       
         
                   

          


               <?php if(isset($member_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr>
                        <th colspan="10">membership requests</th>
                    </tr>

               <tr>
                     <th>Library Card No. </th>
                    <th>Name</th>
                     <th>Email</th>
                     <th>Contact</th>
                     <th></th>
                     <th></th>
                </tr>
                
                 <?php  foreach($member_list as $row){?>


                     <tr >
                        <td> <?php echo $row->LIBRARY_CARD_NO; ?> </td>
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
                            <p>No membership request found</p>
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
