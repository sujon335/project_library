<header>
    <!-- Start: Navigation wrapper -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a href="<?php echo site_url(); ?>" class="brand brand-bootbus"><i class="icon-home"></i>Library Management System</a>
                <!-- Below button used for responsive navigation -->

                <!-- Start: Primary navigation -->

                <ul class="nav pull-right">



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




                            <li><a href="<?php echo site_url('book_list_member/show_books'); ?>"><i class="icon-book"></i>All Books</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="70" data-close-others="false">
                           <i class="icon-user"></i> <?php echo $name; ?> <b></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo site_url('member_issued_books/show_books'); ?>">Issued Books</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="<?php echo site_url('member_issued_books/show_fine'); ?>">Fines</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="<?php echo site_url('member_edit_profile/edit_profile'); ?>">Edit Profile</a></li>
                        </ul>
                    </li>







                    <?php
                        } else {
                            //admin is logged in
                    ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="70" data-close-others="false">
                                    <i class="icon-book"></i>  Manage Books
                                </a>
                                <ul class="dropdown-menu">
                                    <li ><a tabindex="-1" href="<?php echo site_url('book_list_admin/show_books'); ?>">Book list</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="<?php echo site_url('booking_data_admin/show_booking_data'); ?>">Booking Data</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="<?php echo site_url('approve_booking_extend/extend_requests'); ?>">Approve Booking Extend</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="70" data-close-others="false">
                                    <i class="icon-user"></i>Manage Members
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="<?php echo site_url('member_list/show_members'); ?>">Member list</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="<?php echo site_url('member_fines/show_fines'); ?>">Member Fines</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="<?php echo site_url('approve_member/disapproved_members'); ?>">Approve Membership request</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="70" data-close-others="false">
                                    <i class="icon-wrench"></i>Settings<b></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="<?php echo site_url('admin_edit_profile/edit_profile'); ?>">Update Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a data-toggle="modal" href="#create_lib">Create Librarian</a></li>

                                </ul>
                            </li>


<?php } ?>

                        <li><a href="<?php echo site_url('admin_auth/logout'); ?>"><i class="icon-off"></i>Sign Out</a></li>


                    <?php
                    }
                    ?>

                </ul>

            </div>
        </div>
    </div>





    <!-- End: Navigation wrapper -->
</header>




