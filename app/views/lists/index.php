<h1>Lists</h1>

<?php if($this->session->flashdata('list_created')) : ?><!--flashdata za obavestenje pri kreiranju liste-->
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_created') . '</p>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('list_deleted')) : ?><!--flashdata za obavestenje pri brisanju liste-->
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_deleted') . '</p>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('list_updated')) : ?><!--flashdata za obavestenje pri editovanju/update liste-->
    <?php echo '<p class="text-success">' .$this->session->flashdata('list_updated') . '</p>'; ?>
<?php endif; ?>

<p>These are your current lists</p>
<ul class="list_items">

<?php  foreach($lists as $list): ?><!--petlja kroz svaki element iz tabele lists-->

    <li>
        <div class="list_name">

            <!-- Link do root foldera/lists kontrolera/show metodu u lists kontroleru-->
            <a href="<?php echo base_url();?>lists/show/<?php echo $list->id; ?>"><!-- printanje id iz tabelu list,
                     valjda je potrebno oko identifikacije, tako mi i treba kad se pravim pametan
                      pa hocu da budem PHP nindza :D -->
                     <?php echo $list->list_name.'<br>'; ?><!-- printanje imena liste iz tabele lists  -->
            </a>
        </div>
        <div class="list_name">
            <?php echo $list->list_body.'<br>'; ?><!--printanje sadrzaja liste iz tabele lists-->
        </div>
    </li>

<?php endforeach; ?><!-- kraj petlje -->
</ul>
<br>
<p><a href="<?php echo base_url(); ?>lists/add">Create a new list</a></p>




