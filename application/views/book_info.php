              <table class="table table-bordered">

               <tr >
                    <th>Title</th>
                     <th>Author</th>
                     <th>Category</th>

                </tr>


                 <?php  foreach($selected_book as $row){?>



                     <tr >

                        <td> <?php echo $row->TITLE; ?> </td>
                        <td> <?php echo $row->AUTHOR; ?> </td>
                        <td> <?php echo $row->CATEGORY; ?> </td>


                        </tr>


                        <?php } ?>
                        </table>