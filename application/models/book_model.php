<?php

class Book_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


      function create_book(){


            $this->db->where('EXTENSION_NO',$this->input->post('extension_no',true));
            $q= $this->db->get('BOOK');
            if($q->num_rows>=1)
            {
                return false;
            }


            $file_name = basename($_FILES['file_upload']['name']);
            if($file_name=="")
            {
                $file_name="n.jpg";
            }
            $upload_dir = "img";
            $directory=$upload_dir."/".$file_name;

            $TITLE=$this->input->post('title',true);
           $AUTHOR=$this->input->post('author',true);
            $EDITION=$this->input->post('edition',true);
            $CATEGORY=$this->input->post('category',true);
            $KEYWORD = $this->input->post('keyword',true);
            $EXTENSION_NO=$this->input->post('extension_no',true);
            $PUBLISHER=$this->input->post('publisher',true);
            $SUPPLIER = $this->input->post('supplier',true);

       $query="INSERT INTO BOOK (BOOK_ID,TITLE,EDITION,AUTHOR,CATEGORY,EXTENSION_NO,KEYWORD,PUBLISHER,SUPPLIER,IMAGE_PATH)
               VALUES (SEQ_USER.nextval,'$TITLE','$EDITION','$AUTHOR','$CATEGORY','$EXTENSION_NO','$KEYWORD','$PUBLISHER','$SUPPLIER','$directory')";

        $insert=$this->db->query($query);



        return $insert;
    }



   function update_book($book_id){




      

            $TITLE=$this->input->post('title',true);
           $AUTHOR=$this->input->post('author',true);
            $EDITION=$this->input->post('edition',true);
            $CATEGORY=$this->input->post('category',true);
            $KEYWORD = $this->input->post('keyword',true);
            $EXTENSION_NO=$this->input->post('extension_no',true);
            $PUBLISHER=$this->input->post('publisher',true);
            $SUPPLIER = $this->input->post('supplier',true);

       $query="UPDATE BOOK
  set
  TITLE = '$TITLE',
  AUTHOR = '$AUTHOR',EDITION ='$EDITION',EXTENSION_NO = '$EXTENSION_NO',
  KEYWORD = '$KEYWORD',
  PUBLISHER = '$PUBLISHER',
  CATEGORY = '$CATEGORY',
  SUPPLIER = '$SUPPLIER' WHERE BOOK_ID='$book_id'";


       
        $update=$this->db->query($query);
        return $update;
    }





    function get_librarian_id()
    {
        $name=$this->session->userdata('username');

        $this->db->where('USERNAME',$name);
        $query=$this->db->get('LIBRARIAN');


        if($query->num_rows==1)
        {
           foreach ($query->result() as $row)
            {
                $id= $row->ID;
            }

        }

        else
        {
                $this->db->where('EMAIL',$name);
                $query=$this->db->get('LIBRARIAN');
                foreach ($query->result() as $row)
                {
                    $id= $row->ID;
                }

        }

        return $id;

    }














}

?>
