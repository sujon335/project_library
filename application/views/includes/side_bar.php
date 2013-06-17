

<?php
$is_logged_in_admin = $this->session->userdata('is_logged_in_admin');
$is_logged_in_member = $this->session->userdata('is_logged_in_member');

if ((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (!isset($is_logged_in_member) || $is_logged_in_member != true)) {
    //NOT LOGGED  IN admin and employee
?>





<?php
} else {
    //LOGGED IN
?>

<?php
    if (!isset($is_logged_in_admin) || $is_logged_in_admin != true) {
        $name = $this->session->userdata('username');
        //member is logged in member nabbars
?>



        <div class="well sidebar-nav">
            <ul class="nav nav-list" id="my-collapse-nav">
                <li class="nav-header">Books</li>
                <li id="all_books_navbar"><a href="<?php echo site_url('book_list_member/show_books'); ?>"><i class="icon-book"></i>All Books</a></li>

                
                <li><a href="#" data-target="#demo">Categories</a>
                    <ul id="demo" class="collapse" style="height: 0px;">

                        <?php if (isset($books)){
                            foreach ($books as $row){

                            ?>



                        <li><a href="#"><?php echo $row->CATEGORY; ?></a></li>

                     <?php  }}?>
                    </ul>
                </li>
                <li><a href="#" data-target="#demo2">Authors</a></li>
                <ul id="demo2" class="collapse" style="height: 0px;">

                        <?php if (isset($books)){
                            foreach ($books as $row){

                            ?>


                        <li><a href="#"><?php echo $row->AUTHOR; ?></a></li>

                        <?php } }?>



                </ul>



                <li class="nav-header"><?php echo $name; ?></li>
                <li id="issued_books_navbar"><a href="<?php echo site_url('member_issued_books/show_books'); ?>">Issued Books</a></li>
                <li id="member_fine_navbar"><a href="<?php echo site_url('member_issued_books/show_fine'); ?>">Fines</a></li>
                <li id="edit_profile_navbar"><a  href="<?php echo site_url('member_edit_profile/edit_profile'); ?>">Edit Profile</a></li>


            </ul>
        </div><!--/.well -->






<?php
    } else {
        //admin is logged in
?>

        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Manage Books</li>

                        <li  id="book_list_admin_navbar"><a href="<?php echo site_url('book_list_admin/show_books'); ?>">Book list</a></li>
                        <li id="booking_data_navbar"><a href="<?php echo site_url('booking_data_admin/show_booking_data'); ?>">Booking Data</a></li>
                        <li id="booking_extend_navbar"><a href="<?php echo site_url('approve_booking_extend/extend_requests'); ?>">Approve Booking Extend</a></li>

                
                <li class="nav-header">Manage Members</li>
                <li id="member_list_navbar"><a href="<?php echo site_url('member_list/show_members'); ?>">Member list</a></li>
                <li id="member_fines_navbar"><a href="<?php echo site_url('member_fines/show_fines'); ?>">Member Fines</a></li>
                <li id="approve_member_navbar" ><a href="<?php echo site_url('approve_member/disapproved_members'); ?>">Approve Membership request</a></li>
                <li class="nav-header">Settings</li>
                <li id="edit_profile_navbar"><a href="<?php echo site_url('admin_edit_profile/edit_profile'); ?>">Update Profile</a></li>
                <li><a data-toggle="modal" href="#create_lib">Create Librarian</a></li>
            </ul>
        </div><!--/.well -->




<?php } ?>

<?php
}
?>



<script type="text/javascript" >
      
    $("#my-collapse-nav > li > a[data-target]").parent('li').hover(
    function() {
        target = $(this).children('a[data-target]').data('target');
        $(target).collapse('show')
    },
    function() {
        target = $(this).children('a[data-target]').data('target');
        $(target).collapse('hide');
    }
);

</script>







<div id="create_lib" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal" color="red" >Close</a>
        <h3>Create Librarian</h3>
    </div>
    <div class="modal-body">

        <form  method="post" action="<?php echo base_url(); ?>index.php/admin_edit_profile/create_librarian">
            <fieldset>
                <label>USERNAME</label>
                <input type="text" name="username" placeholder="Enter username">
                <label>Email</label>
                <input type="text" name="email" placeholder="Enter email">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password">


                <br/>
                <input type="submit" value="Save" class="btn btn-primary">

            </fieldset>
        </form>

    </div>
    <div class="modal-footer">

    </div>
</div>







