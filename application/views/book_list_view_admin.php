<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "book_list_admin_navbar";
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



              <a href="<?php echo base_url(); ?>index.php/book_list_admin/add_book" class="btn btn-info"><i class="icon-pencil"></i>Add New Book</a>
            <form class="navbar-search pull-right" method="post" action="<?php echo base_url(); ?>index.php/book_list_admin/book_search_get">

                       <i class="icon-search"></i> Search type
                  <select name="search_type" >
                    <option value="all">-----</option>
                    <option value="TITLE">By Title</option>
                    <option value="CATEGORY">By Category</option>
                    <option value="AUTHOR">By Author</option>
                    <option value="KEYWORD">By Keyword</option>
                    <option value="PUBLISHER">By Publisher</option>
                </select>

                       <input type="text" name="search" class="search-query" placeholder="Search">
           <input type="submit" value="search" class="btn btn-success">

                        </form>






               <?php if(isset($book_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr >
                        <th colspan="6">All books list(Total <?php echo $num; ?> Books)</th>
                    </tr>

               <tr >
                    <th>Title</th>
                     <th>Author</th>
                     <th>Extension no</th>
                     <th>Supplier</th>
                     <th></th>
                     <th></th>
                </tr>

                 <?php  foreach($book_list as $row){?>


                     <tr >

                        <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->SUPPLIER; ?> </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/book_list_admin/book_edit/<?php echo $row->BOOK_ID; ?>" class="btn btn-success">Edit</a>
 </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/book_list_admin/book_delete/<?php echo $row->BOOK_ID; ?>" class="btn btn-danger">Delete</a>
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
                            <p>No Book found</p>
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
