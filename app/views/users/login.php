<!--
* Created by PhpStorm.
* User: Vitnere
* Date: 21-Mar-16
* Time: 8:54 PM
*-->

<h3>Login Form</h3>

<?php if($this->session->userdata('logged_in')) : ?><!-- Ako sam logovan  -->

    <!-- onda prikazi logout formu -->
    <p>You are logged in as <?php echo $this->session->userdata('username'); ?></p>
    <!--Start Logout Form-->
    <?php $attributes = array('id' => 'logout_form',
        'class' => 'form-horizontal'); ?>
    <?php echo form_open('users/logout',$attributes); ?>
    <!--Submit Buttons-->
    <?php $data = array("value" => "Logout",
                        "name" => "submit",
                        "class" => "btn btn-primary"); ?>
    <?php echo form_submit($data); ?>
    <?php echo form_close(); ?>

<?php else : ?><!-- inace prikazi login formu -->

    <!--atributi forme-->
<?php $attributes = array('id' => 'login_form', 'class' =>'form-horizontal'); ?>

    <!-- otvaranje forme,gdje se zadaju dva parametra,
     prvi je lokacija tj usmeravanje na login funkciju
     drugi parametar je davanje attributes varjable-->

<?php echo form_open('users/login', $attributes); ?>

<p><!-- USERNAME -->
    <?php echo form_label('Username'); ?><!--Label forme sa vrijednoscu Username-->
    <?php
    //Vrijednosti u formi pohranjene u array koji prosleduje podatke u $data varjablu
    // koja je standardni dio Codeignitera:
    $data = array('name' => 'username',//polje name sa predefinisanom vrijednoscu 'username'
    'placeholder' => 'Enter Username',//polje sa predefenisanom vrijednoscu Enter username
    'style'      => 'width:90%',//sirina teksta 90% od polja u kojem se nalazi
    'value'      =>  set_value('username'));//spasava username vrijednostu u slucaju greske
    //pri unosu forme
    ?>

    <?php echo form_input($data); ?><!-- komanda da CI prepozna associtave arrey i prosledi podatke iz njega
    Vise infro na manual:
    https://ellislab.com/codeigniter/user-guide/helpers/form_helper.html
    "Lets you generate a standard text input field."-->
</p>

<p><!-- PASSWORD -->
    <?php echo form_label('Password'); ?><!--Label forme sa vrijednoscu Password-->
    <?php
    //Vrijednosti u formi pohranjene u array koji prosleduje podatke u $data varjablu
    // koja je standardni dio Codeignitera:
    $data = array('name'        => 'password',//polje name sa predefinisanom vrijednoscu 'password'
    'placeholder' => 'Enter Password',//polje sa predefenisanom vrijednoscu Enter Password
    'style'      => 'width:90%',//sirina teksta 90% od polja u kojem se nalazi
    'value'     =>  set_value('password'));//spasava password vrijednostu u slucaju greske
    //pri unosu forme
    ?>

    <?php echo form_password($data); ?><!-- This function is identical in all respects
     to the form_input() function above except that is sets it as a "password" type.
    Vise infro na manual:
    https://ellislab.com/codeigniter/user-guide/helpers/form_helper.html-->
</p>

<p><!-- SUBMIT -->
    <?php
    //Vrijednosti u formi pohranjene u array koji prosleduje podatke u $data varjablu
    // koja je standardni dio Codeignitera:
    $data = array('name'        => 'submit',//dugme name sa predefinisanom vrijednoscu 'submit'
    'class'      => 'btn btn-primary',//klasa i bootstrap ime klase za primarno dugme
    'value'     =>  'Login'); //vrijednost Submit dugmeta,tj njegova labela
    //pri unosu forme
    ?>

    <?php echo form_submit($data); ?><!-- Lets you generate a standard submit button
    Vise info na manual:
    https://ellislab.com/codeigniter/user-guide/helpers/form_helper.html-->
</p>


<?php echo form_close(); ?><!-- zatvarenje forme -->

<?php endif; ?>

