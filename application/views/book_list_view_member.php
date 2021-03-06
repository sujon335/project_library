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


    <div class="content" style="min-height: 450px">
        <div class="container">


            <div class="row-fluid">
                <div class="span3">

                    <?php $this->load->view('includes/side_bar') ?>
                </div>

                <div class="span9">




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

                        <input type="text" name="search" class="search-query" placeholder="Search">
                        <input type="submit" value="search" class="btn btn-success">

                    </form>






                    <?php if (isset($book_list) && $num > 0) {
 ?>


                        <table class="table table-bordered">

                            <tr >
                                <th colspan="8">All books list(Total <?php echo $num; ?> Books)</th>
                            </tr>

                            <tr >
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Edition</th>
                                <th>Extension no</th>
                                <th>Publisher</th>
                                <th>Availability</th>
                                <th>booking</th>
                            </tr>

<?php foreach ($book_list as $row) { ?>




                        <?php
                            $a = 0;
                            if (isset($record))
                                foreach ($record as $r) {

                                    if ($row->BOOK_ID == $r->BOOK_ID) {

                                        $a = 2;
                                        $date = $r->FINISHING_DATE;
                                        break;
                                    }
                                }
                        ?>



<?php if ($a == 0 && $fine == 0) { ?>




                                <tr >

                                     <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                    <td> <?php echo $row->AUTHOR; ?> </td>
                                    <td> <?php echo $row->CATEGORY; ?> </td>
                                    <td> <?php echo $row->EDITION; ?> </td>
                                    <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                    <td> <?php echo $row->PUBLISHER; ?> </td>
                                    <td>Available</td>
                                    <td>        <a href="<?php echo base_url(); ?>index.php/book_list_member/issue_book/<?php echo $row->BOOK_ID; ?>" class="btn btn-success">Issue</a></td>


                                </tr>

<?php } ?>




                        <?php if ($a == 2 && $fine == 0) {
 ?>


                        <?php
                                $b = 0;
                                if (isset($issued_books))
                                    foreach ($issued_books as $ro) {

                                        if ($row->BOOK_ID == $ro->BOOK_ID) {

                                            $b = 2;
                                            $date = $ro->FINISHING_DATE;
                                            break;
                                        }
                                    }
                        ?>

<?php if ($b == 2) { ?>
                                    <tr >

                                         <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                        <td> <?php echo $row->AUTHOR; ?> </td>
                                        <td> <?php echo $row->CATEGORY; ?> </td>
                                        <td> <?php echo $row->EDITION; ?> </td>
                                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                        <td> <?php echo $row->PUBLISHER; ?> </td>
                                        <td> Booked until <?php echo $date; ?></td>
                                        <td>Booked</td>


                                    </tr>

                        <?php } else {
 ?>



<?php
                                    $c = 0;
                                    if (isset($adv_book))
                                        foreach ($adv_book as $t) {

                                            if ($r->BOOKING_ID == $t->BOOKING_ID) {

                                                $c = 2;
                                                break;
                                            }
                                        }
?>

<?php if ($c == 2) { ?>

                                        <tr>

                                             <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                            <td> <?php echo $row->AUTHOR; ?> </td>
                                            <td> <?php echo $row->CATEGORY; ?> </td>
                                            <td> <?php echo $row->EDITION; ?> </td>
                                            <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                            <td> <?php echo $row->PUBLISHER; ?> </td>
                                            <td> Will be available from <?php echo $date; ?></td>
                                            <td>Booked in advance</td>


                                        </tr>

<?php } else { ?>


                                        <tr>

                                             <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                            <td> <?php echo $row->AUTHOR; ?> </td>
                                            <td> <?php echo $row->CATEGORY; ?> </td>
                                            <td> <?php echo $row->EDITION; ?> </td>
                                            <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                            <td> <?php echo $row->PUBLISHER; ?> </td>
                                            <td> Will be available from <?php echo $date; ?></td>
                                            <td>   <a href="<?php echo base_url(); ?>index.php/book_list_member/advance_book/<?php echo $r->BOOKING_ID; ?>" class="btn btn-info">Advance</a></td>


                                        </tr>

<?php } ?>

<?php } ?>


<?php } ?>


<?php if ($a == 0 && $fine > 0) { ?>





                                <tr >

                                    <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                    <td> <?php echo $row->AUTHOR; ?> </td>
                                    <td> <?php echo $row->CATEGORY; ?> </td>
                                    <td> <?php echo $row->EDITION; ?> </td>
                                    <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                    <td> <?php echo $row->PUBLISHER; ?> </td>
                                    <td>Available</td>
                                    <td>You have to pay fine</td>


                                </tr>

                        <?php } ?>




                        <?php if ($a == 2 && $fine > 0) {
 ?>


<?php
                                $b = 0;
                                if (isset($issued_books))
                                    foreach ($issued_books as $ro) {

                                        if ($row->BOOK_ID == $ro->BOOK_ID) {

                                            $b = 2;
                                            $date = $ro->FINISHING_DATE;
                                            break;
                                        }
                                    }
?>

<?php if ($b == 2) { ?>
                                    <tr >

                                         <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                        <td> <?php echo $row->AUTHOR; ?> </td>
                                        <td> <?php echo $row->CATEGORY; ?> </td>
                                        <td> <?php echo $row->EDITION; ?> </td>
                                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                        <td> <?php echo $row->PUBLISHER; ?> </td>
                                        <td> Booked until <?php echo $date; ?></td>
                                        <td>Booked</td>


                                    </tr>

<?php } else { ?>



                                    <tr >

                                         <td ><a data-toggle="modal" href="#b-<?php echo $row->BOOK_ID; ?>"><?php echo $row->TITLE; ?> </a></td>
                                        <td> <?php echo $row->AUTHOR; ?> </td>
                                        <td> <?php echo $row->CATEGORY; ?> </td>
                                        <td> <?php echo $row->EDITION; ?> </td>
                                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                                        <td> <?php echo $row->PUBLISHER; ?> </td>
                                        <td> Will be available from <?php echo $date; ?></td>
                                        <td>You have to pay fine</td>


                                    </tr>


<?php } ?>












<?php } ?>




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

                                    


<?php } ?>

                        </table>

<?php } else { ?>
                        <br/>  <br/>
                        <div class="alert alert-error">
                            <p>No Book found</p>
                        </div>
<?php } ?>





<?php echo $this->pagination->create_links(); ?>



                </div>
            </div>


        </div>
    </div>


    <script type="text/javascript" charset="utf-8">
        $('tr:odd').css('background', '#dff0d8');
    </script>


<?php $this->load->view('includes/footer') ?>
