

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


    </head>
    <body>

        <?php $this->load->view('includes/navigation') ?>

        <div class="content">
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
                <div class="row-fluid">
                    <ul class="thumbnails">



                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/1.jpg">


                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/2.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/3.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/4.jpg">

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/5.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/6.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>


                </div>

                <div class="row-fluid">
                    <ul class="thumbnails">



                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/7.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/8.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/9.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/10.gif">

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/11.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/12.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>


                </div>

                <div class="row-fluid">
                    <ul class="thumbnails">



                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/13.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/14.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/15.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/16.jpg">

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/17.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="span2">
                            <div class="thumbnail" >
                                <img src="img/18.jpg">
                  <!--                  <img  src="img/Asshadimbo-by-Anisul-Haque2.png" alt="product name">-->

                                <div class="caption">
                                    <p class="center-align">
                                        <a href="<?php echo site_url('book_list_member/show_books'); ?>" class="btn btn-success">Book now</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>


                </div>

            </div>
        </div>

        <?php $this->load->view('includes/footer') ?>

