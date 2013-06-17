<?php

// In an application, this could be moved to a config file
$upload_errors = array(
	// http://www.php.net/manual/en/features.file-upload.errors.php
	UPLOAD_ERR_OK 				=> "No errors.",
	UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
  UPLOAD_ERR_NO_FILE 		=> "created without image file.",
  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
);

if(isset($_POST['submit'])) {
	// process the form data
	$tmp_file = $_FILES['file_upload']['tmp_name'];
	$target_file = basename($_FILES['file_upload']['name']);
	$upload_dir = "img";

	// You will probably want to first use file_exists() to make sure
	// there isn't already a file by the same name.

	// move_uploaded_file will return false if $tmp_file is not a valid upload file
	// or if it cannot be moved for any other reason
	if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
		$message = "File uploaded and book added successfully.";
	} else {
		$error = $_FILES['file_upload']['error'];
		$message = $upload_errors[$error];
	}

}

?>
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
                    <?php if(!empty($message)) { echo "<p>{$message}</p>"; } ?>

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
                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000000" />
                                <input type="file" name="file_upload" /><br/>

                             

                                <input type="submit" name="submit" value="Create" class="btn btn-primary btn-large"> &nbsp; <a href="<?php echo base_url(); ?>index.php/book_list_admin/show_books" class="btn btn-primary btn-large">Cancel</a>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: MAIN CONTENT -->




<?php $this->load->view('includes/footer') ?>
