

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bootbusiness | Short description about company">
        <meta name="author" content="Your name">


        <title>Library Management System </title>
        <script src="<?php echo base_url() . 'jquery' ?>/jquery.js"></script>
        <!-- Bootstrap -->
        <link href="<?php echo base_url() . 'css' ?>/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() . 'css' ?>/cus-icons.css" rel="stylesheet">
        <!-- Bootstrap responsive -->
        <link href="<?php echo base_url() . 'css' ?>/bootstrap-responsive.min.css" rel="stylesheet">
        <!-- Font awesome - iconic font with IE7 support -->
        <link href="<?php echo base_url() . 'css' ?>/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() . 'css' ?>/font-awesome-ie7.css" rel="stylesheet">
        <!-- Bootbusiness theme -->
        <link href="<?php echo base_url() . 'css' ?>/boot.css" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets' ?>/css/datepicker.css" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

	<style type="text/css" media="screen">

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
            <!-- Start: SERVICE LIST -->
            <div class="container">
                <div class="page-header">
                    <div class="row-fluid">

                        <h2 class="span4">Sample books</h2>

                        <div class="span8">
                            <form class="navbar-search pull-right" method="post" action="<?php echo base_url(); ?>index.php/book_list_member/book_search_get">

                                <i class="icon-search"></i> Search type
                                <select name="search_type" >
                                    <option value="all">-----</option>
                                    <option value="TITLE">By Title</option>
                                    <option value="CATEGORY">By Category</option>
                                    <option value="AUTHOR">By Author</option>
                                    <option value="KEYWORD">By Keyword</option>
                                    <option value="PUBLISHER">By Publisher</option>
                                </select>

                                <input type="text" name="search" class="search-query" placeholder="Search book">
                                <input type="submit" value="search" class="btn btn-success">

                            </form>
                        </div>

                    </div>
                </div>
                
                    
                    <?php $count=1;  if (isset($books)) {?>

<?php foreach ($books as $row) { ?>

                 <?php   if($count==1) { ?>

                                    <div class="row-fluid">
                                        <ul class="thumbnails">

                                        <?php } ?>


                                <li class="span2">
                                    <div class="thumbnail" >
                                        <img src="<?php echo base_url(); ?><?php echo urldecode($row->IMAGE_PATH); ?>">


                                        
                                            <div class="center-align" >
                                            
                                                <br/>
                                                <a href="<?php echo site_url("get_books/show_books_by_id/$row->BOOK_ID"); ?>" class="btn btn-success">Book now</a>

                                            </div>
                                       
                                    </div>
                                </li>

                            

                                           <?php   if($count==6) { ?>

                                        </ul>
                                    </div>

                                        <?php } ?>


                    <?php  $count++;  if($count==7) { $count=1;}?>

                    <?php } ?>
                <?php } ?>

                <?php echo $this->pagination->create_links();  ?>
                
            </div>
        </div>




 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/boot-business.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/twitter-bootstrap-hover-dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/twitter-bootstrap-hover-dropdown.min.js"></script>







</body>
</head>

