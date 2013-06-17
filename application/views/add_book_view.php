
<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "book_list_admin_navbar";
$this->load->view('includes/nav_helper', $data) ?>

    });
</script>
</head>
<body>

    <?php $this->load->view('includes/navigation') ?>


    <!-- Start: MAIN CONTENT -->
    <div class="content" style="min-height: 450px">
        <div class="container">

            <div class="row-fluid">
                <div class="span3">

                    <?php $this->load->view('includes/side_bar') ?>
                </div>





                <!-- End: MAIN CONTENT -->




                <div class="span9">
                    <?php
                    echo validation_errors();
                    if (isset($msg))
                        echo $msg;
                    ?>

                    <h4 class="widget-header"><i class="icon-pencil"></i> Add new book in the library</h4>
                    <div class="widget-body">
                        <div class="center-align">
                            <form class="form-horizontal form-signin-signup" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>index.php/book_list_admin/add_book">
                                <input type="text" name="title" placeholder="Title">
                                <input type="text" name="author" placeholder="Author">
                                <input type="text" name="category" placeholder="Category">
                                <input type="text" name="edition" placeholder="Edition">
                                <input type="text" name="keyword" placeholder="Keyword">
                                <input type="text" name="extension_no" placeholder="extension_no">
                                <input type="text" name="publisher" placeholder="publisher">
                                <input type="text" name="supplier" placeholder="supplier">


                                <br/>

                                <input type="submit" value="save and go back to the list" class="btn btn-primary btn-large"> &nbsp; <a href="<?php echo base_url(); ?>index.php/book_list_admin/show_books" class="btn btn-primary btn-large">Cancel</a>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: MAIN CONTENT -->




<?php $this->load->view('includes/footer') ?>
