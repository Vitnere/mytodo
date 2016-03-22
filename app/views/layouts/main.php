<!--Display Messages-->
<?php if($this->session->flashdata('registered')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('registered') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('logged_out') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('need_login')) : ?>
    <?php echo '<p class="text-error">' .$this->session->flashdata('need_login') . '</p>'; ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyTodo</title>

    <!--Bootstrap-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--HINT:PHP funkcija na liniji 16 daje adresu root foldera na koji se nadograduje
   putanja do zeljenog asseta-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css" type="text/css" />
</head>
<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">myTodo</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <!--komanda ispod ucitava sadrzaj main_content varjable koja je u
                kontroleru precizirana da sadrzi podatke iz home.php dokumenta-->
                <?php $this->load->view($main_content);  ?>
                <p class="lead">
                    <a href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Login</a>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <?php $this->load->view('users/login'); ?>
                        </div>
                    </div>
                </div>
                </p>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Created by <a href="http://nemanjakolar.bitballoon.com/">Nemanja Kolar</a>
                        and         <a href="http://www.codeigniter.com/">CodeIgniter</a>.
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<!--Google API Jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</body>
</html>

<?php if($this->session->userdata('logged_in')) : ?>
    <br />
    <!--Display Errors-->
    <?php echo validation_errors('<p class="text-error">'); ?>
    <p>
        <?php echo form_open('lists/quickadd'); ?>
        <?php $data = array("placeholder" => "Add a New List",
            "name" => "list_name"); ?>
        <?php echo form_input($data); ?>
        <!--Submit Buttons-->
        <?php $data = array("value" => "Login",
            "name" => "submit",
            "style"=> "vertical-align:top;",
            "class" => "btn btn-primary"); ?>
        <?php echo form_submit($data); ?>
        <?php echo form_close(); ?>
    </p>
    <br />
    <h3>My Latest Lists</h3>
    <table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
        <tr>
            <th>List Name</th>
            <th>Created On</th>
            <th>View</th>
        </tr>
        <?php if(isset($lists)) : ?>
            <?php foreach($lists as $list) : ?>
                <tr>
                    <td><?php echo $list->list_name; ?></td>
                    <td><?php echo $list->create_date; ?></td>
                    <td><a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">View List</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <h3>Latest Tasks</h3>
    <table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
        <tr>
            <th>Task Name</th>
            <th>List Name</th>
            <th>Created On</th>
            <th>View</th>
        </tr>
        <?php if(isset($tasks)) : ?>
            <?php foreach($tasks as $task) : ?>
                <tr>
                    <td> <?php echo $task->task_name; ?></td>
                    <td><?php echo $task->list_name; ?></td>
                    <td><?php echo $task->create_date; ?></td>
                    <td><a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->id; ?>">View Task</a></td>

                </tr>
            <?php endforeach; ?>
        <?php endif;?>
    </table>


<?php endif; ?>