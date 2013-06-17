<?php $this->load->view('includes/header') ?>
<script>
    $(document).ready(

    function()
    {

<?php $data['selected_nav'] = "";
$this->load->view('includes/nav_helper', $data) ?>

    });
</script>


<style type="text/css" media="screen">


    table{
        border: 1px solid #cac9c9;
    }
    td {
        text-align: center;
        border: 1px solid #cac9c9;
        padding: 1em;
    }

    td:last-child {
        border-right: none;
    }

    th {
        text-align: center;
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

                <?php if (isset($books)) {
 ?>

<?php foreach ($books as $row) { ?>
                        <div class="span2">

                            <table class="center-align">

                                <tr class="success">
                                    <th colspan="1"><?php echo $row->TITLE; ?></th>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="<?php echo urldecode($row->IMAGE_PATH); ?>">
                                    </td>
                                </tr>

                                <tr >
                                    <td>
                                       BY: <?php echo $row->AUTHOR; ?>
                                    </td>
                                </tr>                          

                                <tr >
                                    <td >
                                <?php
                                $dat = array(
                                    'search_typ' =>'TITLE',
                                    'search' => $row->TITLE
                                );
                                $this->session->set_userdata($dat);
                                ?>
                                <a href="<?php echo base_url(); ?>index.php/book_list_member/book_search" class="btn btn-primary">Issue</a>
                            </td>
                        </tr>


                    </table>


                </div>

                <?php } ?>
<?php } ?>





                    </div>
                </div>
            </div>




    <?php $this->load->view('includes/footer') ?>
