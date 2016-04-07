<ul id="actions">
    <h4>List Actions</h4>
    <li> <a href="<?php echo base_url(); ?>tasks/add/<?php echo $list->id; ?>">Add Task</a></li>
    <li> <a href="<?php echo base_url(); ?>lists/edit/<?php echo $list->id; ?>">Edit List</a></li>
    <li> <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>lists/delete/<?php echo $list->id; ?>">Delete List</a></li>
</ul>

<h1><?php echo $list->list_name; ?></h1><!-- Ime liste -->
Created on:  <strong><?php echo date("n-j-Y",strtotime($list->create_date)); ?></strong><!-- vrijeme i datum -->
<br /><br />
<div style="max-width:500px;"><?php echo $list->list_body; ?></div> <!--Sadrzaj liste-->
<br /><br />
<h4> Current Open Tasks</h4>
<?php if($completed_tasks) : ?>
    <ul>
        <?php foreach($completed_tasks as $task) : ?>
            <li><a href="<?php echo base_url(); ?>tasks/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>There are no current tasks</p>
<?php endif; ?>
<br />


