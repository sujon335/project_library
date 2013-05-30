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


    <div class="content">
      <div class="container">


      <div class="row-fluid">
        <div class="span3">

        <?php $this-> load->view('includes/side_bar')?>
        </div>

        <div class="span9">

     
       
              <a href="<?php echo base_url(); ?>index.php/book_list_admin/add_book" class="btn btn-info">+Add New Book</a>    
            <form class="navbar-search pull-right" method="post" action="<?php echo base_url(); ?>index.php/book_list_admin/book_search_get">

                             Search type
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
                      
                   

          


               <?php if(isset($book_list) && $num>0 ) { ?>


                <table class="table table-bordered">

                    <tr class="success">
                        <th colspan="10">All books list</th>
                    </tr>

               <tr class="success">
                    <th>Title</th>
                     <th>Author</th>
                     <th>Category</th>
                     <th>Edition</th>
                     <th>Keyword</th>
                     <th>Extension no</th>
                     <th>Publisher</th>
                     <th>Supplier</th>
                     <th></th>
                     <th></th>
                </tr>
                
                 <?php  foreach($book_list as $row){?>


                     <tr class="success">

                        <td> <?php echo $row->TITLE; ?> </td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->CATEGORY; ?> </td>
                        <td> <?php echo $row->EDITION; ?> </td>
                        <td> <?php echo $row->KEYWORD; ?> </td>
                        <td> <?php echo $row->EXTENSION_NO; ?> </td>
                        <td> <?php echo $row->PUBLISHER; ?> </td>
                        <td> <?php echo $row->SUPPLIER; ?> </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/book_list_admin/book_edit/<?php echo $row->BOOK_ID; ?>" class="btn btn-success">Edit</a>
 </td>
                        <td>        <a href="<?php echo base_url(); ?>index.php/book_list_admin/book_delete/<?php echo $row->BOOK_ID; ?>" class="btn btn-danger">Delete</a>
 </td>
 

                    </tr>
                    
                 

                            <?php }  ?>

                       </table>

        <?php } else { ?>
                <br/>  <br/>
                    <div class="alert alert-error">
                            <p>No Book found</p>
                                </div>
                    <?php  } ?>

                 

                

    <?php echo $this->pagination->create_links();  ?>
                    
            

 </div>
          </div>


      </div>
     </div>





<?php $this->load->view('includes/footer') ?>
