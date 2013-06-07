 <header>
      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a href="<?php echo site_url(); ?>" class="brand brand-bootbus">Library Management System</a>
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

                      <?php if (!isset($is_logged_in_admin) || $is_logged_in_admin != true)
                            {
                          $name=$this->session->userdata('username');
                          //member is logged in member nabbars
                            ?>


                  <li><a href="<?php echo site_url('book_list_member/show_books'); ?>">All Books</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">
                              <?php  echo $name; ?> <b></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo site_url('member_auth/howkow'); ?>">Issued Books</a></li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="#">Fines</a></li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="#">Edit Profile</a></li>
                            </ul>
                        </li>
                            
                                  <?php } else  {
                      //admin is logged in
                      ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">
                        Manage Books <b ></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li ><a tabindex="-1" href="<?php echo site_url('book_list_admin/show_books'); ?>">Book list</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">Booking Data</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="">Approve Booking Extend</a></li>
                    </ul>
                </li>
                        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">
                        Manage Members<b></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">Member list</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">Member Fines</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo site_url('approve_member/disapproved_members'); ?>">Approve Membership request</a></li>
                    </ul>
                </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">
                            Settings<b></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">Update Profile</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#">Create Librarian</a></li>

                        </ul>
                    </li>


                          <?php  }?>

                        <li><a href="<?php echo site_url('admin_auth/logout'); ?>">Sign Out</a></li>


                <?php
                }
                ?>

              </ul>
            
          </div>
        </div>
      </div>
      <!-- End: Navigation wrapper -->
    </header>