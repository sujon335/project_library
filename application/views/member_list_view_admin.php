<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "member_list_navbar";
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


    <div class="content">
      <div class="container">


      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>

        <div class="span9">




            <form class="navbar-search pull-right" method="post" action="<?php echo base_url(); ?>index.php/member_list/member_search_get">



                                <input type="text" name="search" class="search-query" placeholder="Search member">
                        <input type="submit" value="search" class="btn btn-success">

                        </form><br/><br/>






               <?php if(isset($member_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr class="success">
                        <th colspan="6">All Member list(total <?php echo $num; ?> members) </th>
                    </tr>

               <tr >
                    <th>Member name</th>
                     <th>username</th>
                     <th>Email</th>
                     <th>Library Card No</th>
                     <th></th>
                </tr>

                 <?php  foreach($member_list as $row){?>


                     <tr >

                        <td> <?php echo $row->NAME; ?> </td>
                        <td> <?php echo $row->USERNAME; ?> </td>
                        <td> <?php echo $row->EMAIL; ?> </td>
                        <td> <?php echo $row->LIBRARY_CARD_NO; ?> </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/member_list/member_delete/<?php echo $row->MEMBER_ID; ?>" class="btn btn-danger">Delete</a> </td>


                    </tr>



                            <?php }  ?>

                       </table>

        <?php } else { ?>
                <br/>  <br/>
                    <div class="alert alert-error">
                            <p>No member list found</p>
                                </div>
                    <?php  } ?>





    <?php echo $this->pagination->create_links();  ?>



 </div>
          </div>


      </div>
     </div>



<script type="text/javascript" charset="utf-8">
	$('tr:odd').css('background', '#dff0d8');
</script>


<?php $this->load->view('includes/footer') ?>
