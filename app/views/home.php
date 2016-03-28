<!--pozivanje poruke u slucaju uspjesne registracije po sistemu kljuca-->
<?php if($this->session->flashdata('registered')) : ?><!-- Ako je odradena uspjesna registracije -->
<p class="alert alert-dismissable alert-success"><!-- Bootstrap klasa koja ce obmotati poruku o uspjesnoj registraciji -->
    <?php echo $this->session->flashdata('registered');?><!-- onda printaj poruku za uspjesnu registraciju
    sa kljuce registered
    HINT:Ova poruka se nalazi u Controlers/Users-->
</p>
<?php endif; ?><!-- zatvarenje if izjave sa linije 2 -->



<?php if($this->session->flashdata('login_success')) : ?>
<p class="alert alert-dismissable alert-success">
    <?php echo $this->session->flashdata('login_success');?>
</p>
<?php endif; ?>


<h1 class="cover-heading">Welcome to myTodo</h1>
<p class="lead">myTodo us a simple and helpful application to help you manage your
    day to day tasks. You can add as many task lists as you want and as
    many tasks as you want. myTodo is absolutely free! Have fun.</p>