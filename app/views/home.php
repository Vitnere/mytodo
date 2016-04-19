<!--pozivanje poruke u slucaju uspjesne registracije po sistemu kljuca-->
<?php if($this->session->flashdata('registered')) : ?><!-- Ako je odradena uspjesna registracije -->
<p class="alert alert-dismissable alert-success"><!-- Bootstrap klasa koja ce obmotati poruku o uspjesnoj registraciji -->
    <?php echo $this->session->flashdata('registered');?><!-- onda printaj poruku za uspjesnu registraciju
    sa kljuce registered
    HINT:Ova poruka se nalazi u Controlers/Users-->
</p>
<?php endif; ?><!-- zatvarenje if izjave sa linije 2 -->



<?php if($this->session->flashdata('login_success')) : ?><!-- Ako je odraden uspjesan login -->
<p class="alert alert-dismissable alert-success">
    <?php echo $this->session->flashdata('login_success');?>
</p>
<?php endif; ?>

<?php if($this->session->flashdata('logged_out')) : ?><!-- Ako je odraden log out -->
    <p class="alert alert-dismissable alert-success">
        <?php echo $this->session->flashdata('logged_out');?>
    </p>
<?php endif; ?>

<?php if($this->session->flashdata('noaccess')) : ?><!-- Blokiranje pristupa poruka-->
    <p class="alert alert-dismissable alert-danger">
        <?php echo $this->session->flashdata('noaccess');?>
    </p>
<?php endif; ?>

<?php if($this->session->userdata('logged_in')) : ?><!--ako je user logovan-->

<p><a href="<?php echo base_url(); ?>lists/add">Create a new list</a></p>

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
<?php else:?>
    <h1 class="cover-heading">Welcome to myTodo</h1>
    <p class="lead">myTodo is a simple and helpful application to help you manage your
        day to day tasks. You can add as many task lists as you want and as
        many tasks as you want. myTodo is absolutely free! Have fun.</p>
    <br>
    <p class="lead">myTodo je jednostavna i besplatna web aplikacija koja vam pomaze da upravljate
        svojim dnevnim zadacima.Mozete dodavati svoji zadatke i liste zadataka koliko vam
        je volja.myTodo je potpuno besplatan i bice uvijek besplatan!Uzivajte.</p>
<?php endif; ?>


