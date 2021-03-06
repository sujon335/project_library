
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
                    <?php echo validation_errors();
                    if (isset($msg))
                        echo $msg; ?>

                    <?php if (isset($record)) {
                        foreach ($record as $row) {
 ?>
 

                            <h4 class="widget-header"><i class="icon-pencil"></i> Add new book in the library</h4>
                            <div class="widget-body">
                                <div class="center-align">
                                    <form  method="post" action="<?php echo base_url(); ?>index.php/book_list_admin/book_edit/<?php echo $row->BOOK_ID; ?>">
                                        <fieldset>
                                            <label>title</label>
                                            <input type="text" name="title" value="<?php echo $row->TITLE; ?>">
                                            <label>Author</label>
                                            <input type="text" name="author" value="<?php echo $row->AUTHOR; ?>">
                                            <label>Category</label>
                                            <input type="text" name="category" value="<?php echo $row->CATEGORY; ?>">
                                            <label>Edition</label>
                                            <input type="text" name="edition" value="<?php echo $row->EDITION; ?>">
                                            <label>Keyword</label>
                                            <input type="text" name="keyword" value="<?php echo $row->KEYWORD; ?>">
                                            <label>Extension_no</label>
                                            <input type="text" name="extension_no" value="<?php echo $row->EXTENSION_NO; ?>">
                                            <label>Publisher</label>
                                            <input type="text" name="publisher" value="<?php echo $row->PUBLISHER; ?>">
                                            <label>Supplier</label>
                                            <input type="text" name="supplier" value="<?php echo $row->SUPPLIER; ?>">

        
                                            <br/>

                                            <input type="submit" value="update and go back to the list" class="btn btn-primary btn-large"> &nbsp; <a href="<?php echo base_url(); ?>index.php/book_list_admin/show_books" class="btn btn-primary btn-large">Cancel</a>

                                        </fieldset>
                                    </form>

<?php }
                    } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: MAIN CONTENT -->




<?php $this->load->view('includes/footer') ?>
