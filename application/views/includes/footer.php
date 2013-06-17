<!-- Start: FOOTER -->
<footer>


    <?php
    $is_logged_in_admin = $this->session->userdata('is_logged_in_admin');
    $is_logged_in_member = $this->session->userdata('is_logged_in_member');

    if ((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (!isset($is_logged_in_member) || $is_logged_in_member != true)) {
        //NOT LOGGED  IN admin and employee
    ?>

        <div class="container">
            <a href="<?php echo site_url('admin_auth/login'); ?>">Admin Panel</a>

        </div>

    <?php
    } else {
        //LOGGED IN
    ?>

    <?php
        if (!isset($is_logged_in_admin) || $is_logged_in_admin != true) {
            $name = $this->session->userdata('username');
            //member is logged in member nabbars
    ?>


            <div class="container">
                <div class="row">
                    <div class="span2">
                        <h4><i class="icon-star icon-white"></i>Books</h4>
                        <nav>
                            <ul class="quick-links">
                                <li><a href="">Physics</a></li>
                                <li><a href="">Chemistry</a></li>
                                <li><a href="">Mathematics</a></li>
                                <li><a href="">Accounting</a></li>
                            </ul>
                        </nav>
                        <h4><i class="icon-cogs icon-white"></i> Services</h4>
                        <nav>
                            <ul class="quick-links">
                                <li><a href="">Service1</a></li>
                                <li><a href="">Service2</a></li>
                                <li><a href="">Service3</a></li>
                                <li><a href="">All services</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="span2">
                        <h4><i class="icon-beaker icon-white"></i> About</h4>
                        <nav>
                            <ul class="quick-links">
                                <li><a href="our_works.html">Our works</a></li>
                                <li><a href="patnerships.html">Patnerships</a></li>
                                <li><a href="leadership.html">Leadership</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="events.html">Events</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <ul>
                                    </nav>
                                    </div>
                                    <div class="span2">
                                        <h4><i class="icon-thumbs-up icon-white"></i> Support</h4>
                                        <nav>
                                            <ul class="quick-links">
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="contact_us.html">Contact us</a></li>
                                            </ul>
                                        </nav>

                                    </div>
                                    <div class="span3">

                                        <div class="span3">

                                        </div>
                                    </div>
                                    </div>

                                    </div>


                                    <hr class="footer-divider">

                            <?php } ?>

                            <?php } ?>
                            <div class="container">

                                <p>
                                    &copy; 2013 library management system. All Rights Reserved.
                                </p>
                            </div>
                            </footer>
                            <!-- End: FOOTER -->


                            <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>js/boot-business.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>js/twitter-bootstrap-hover-dropdown.js"></script>
                            <script type="text/javascript" src="<?php echo base_url(); ?>js/twitter-bootstrap-hover-dropdown.min.js"></script>



                            </body>
                            </html>