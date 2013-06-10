<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "all_books_navbar";
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
        <div class="span2">

        <?php $this-> load->view('includes/side_bar')?>
        </div>

        <div class="span10">

     
       

            <form class="navbar-search pull-right" method="post" action="<?php echo base_url(); ?>index.php/book_list_member/book_search_get">

                             Search type
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
                        <th colspan="10">All books list</th>
                    </tr>

               <tr >
                    <th>Title</th>
                     <th>Author</th>
                     <th>Category</th>
                     <th>Edition</th>
                     <th>Keyword</th>
                     <th>Extension no</th>
                     <th>Publisher</th>
                     <th>Supplier</th>
                     <th>Availability</th>
                     <th>booking</th>
                </tr>
                
                 <?php  foreach($book_list as $row){?>



                
                               <?php $a=0; if(isset ($record)) foreach($record as $r){

                                    if($row->BOOK_ID == $r->BOOK_ID){
                                        
                                        $a=2;
                                        $date=$r->FINISHING_DATE;
                                        break;
                                    }
                                }
                                ?>



<?php if($a==0 && $fine==0){ ?>


                

                     <tr >

                        <td> <?php echo $row->TITLE; ?> </td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->CATEGORY; ?> </td>
                        <td> <?php echo $row->EDITION; ?> </td>
                        <td> <?php echo $row->KEYWORD; ?> </td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->PUBLISHER; ?> </td>
                        <td> <?php echo $row->SUPPLIER; ?> </td>
                        <td>Available</td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/book_list_member/issue_book/<?php echo $row->BOOK_ID; ?>" class="btn btn-success">Issue</a></td>
 

                    </tr>

                    <?php } ?>




       <?php  if($a==2 && $fine==0) { ?>




                     <tr >

                        <td> <?php echo $row->TITLE; ?> </td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->CATEGORY; ?> </td>
                        <td> <?php echo $row->EDITION; ?> </td>
                        <td> <?php echo $row->KEYWORD; ?> </td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->PUBLISHER; ?> </td>
                        <td> <?php echo $row->SUPPLIER; ?> </td>
                        <td> Will be available from <?php echo $date;  ?></td>
                        <td>   <a href="<?php echo base_url(); ?>index.php/book_list_member/advance_book/<?php echo $row->BOOK_ID; ?>" class="btn btn-info">Advance Book</a></td>


                    </tr>

                    <?php } ?>


<?php  if($a==0 && $fine>0) { ?>




                     <tr >

                        <td> <?php echo $row->TITLE; ?> </td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->CATEGORY; ?> </td>
                        <td> <?php echo $row->EDITION; ?> </td>
                        <td> <?php echo $row->KEYWORD; ?> </td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->PUBLISHER; ?> </td>
                        <td> <?php echo $row->SUPPLIER; ?> </td>
                        <td>Available</td>
                        <td>You have to pay your fine to issue book</td>


                    </tr>

                    <?php } ?>




       <?php  if($a==2 && $fine>0) { ?>




                     <tr >

                        <td> <?php echo $row->TITLE; ?> </td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->CATEGORY; ?> </td>
                        <td> <?php echo $row->EDITION; ?> </td>
                        <td> <?php echo $row->KEYWORD; ?> </td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->PUBLISHER; ?> </td>
                        <td> <?php echo $row->SUPPLIER; ?> </td>
                        <td>Not Available now will be available at <?php echo $date;  ?></td>
                        <td>You have to pay your fine to issue book</td>


                    </tr>

                    <?php } ?>







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
