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

<h1 class="cover-heading">Welcome to myTodo</h1>
<p class="lead">myTodo us a simple and helpful application to help you manage your
    day to day tasks. You can add as many task lists as you want and as
    many tasks as you want. myTodo is absolutely free! Have fun.</p>

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
