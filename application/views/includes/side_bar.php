

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



          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Books</li>
              <li id="all_books_navbar"><a href="<?php echo site_url('book_list_member/show_books'); ?>">All Books</a></li>

              <li class="nav-header"><?php  echo $name; ?></li>
              <li><a href="#">Issued Books</a></li>
              <li><a href="#">Fines</a></li>
              <li><a href="#">Edit Profile</a></li>

            </ul>
          </div><!--/.well -->

                                  <?php } else  {
                      //admin is logged in
                      ?>

                    <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Manage Books</li>
              <li  id="book_list_admin_navbar"><a href="<?php echo site_url('book_list_admin/show_books'); ?>">Book list</a></li>
             <li><a href="#">Booking Data</a></li>
              <li><a href="#">Approve Booking Extend</a></li>
              <li class="nav-header">Manage Members</li>
              <li><a href="#">Member list</a></li>
              <li><a href="#">Member Fines</a></li>
              <li id="approve_member_navbar" ><a href="<?php echo site_url('approve_member/disapproved_members'); ?>">Approve Membership request</a></li>
              <li class="nav-header">Settings</li>
              <li><a href="#">Update Profile</a></li>
              <li><a href="#">Create Librarian</a></li>
            </ul>
          </div><!--/.well -->




                          <?php  }?>

                          <?php
                }
                ?>