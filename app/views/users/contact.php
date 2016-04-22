<h1>Contact</h1>
<p>Please fill out the form to contact</p>
<p><b>Portofolio:</b><a href="http://nemanjakolar.bitballoon.com/">Click</a></p>
<p>Number:(+387)065/217-621<br>
Mail:nemanjakolar@gmail.com</p>


<!--Display Errors-->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<?php echo form_open('users/contact'); ?>

<!--Field: Name-->
<p>
    <?php echo form_label('Name:'); ?>
    <?php
    $data = array(
        'name'        => 'name',
        'value'       => set_value('name')
    );
    ?>
    <?php echo form_input($data); ?>
</p>

<!--Field: Email Address-->
<p>
    <?php echo form_label('Email:'); ?>
    <?php
    $data = array(
        'name'        => 'email',
        'value'       => set_value('email')
    );
    ?>
    <?php echo form_input($data); ?>
</p>

<!--Field: Message-->
<p>
    <?php echo form_label('Message:'); ?>
    <?php
    $data = array(
        'name'        => 'message',
        'value'       => set_value('message')
    );
    ?>
    <?php echo form_input($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Submit",
    "name" => "submit",
    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>


