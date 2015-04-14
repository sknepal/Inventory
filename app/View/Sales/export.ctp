<?php echo $this->Html->css('jquery-ui-1.8.4.custom'); ?>
<?php echo $this->Html->script('jquery-1.4.2.min'); ?>
<?php echo $this->Html->script('jquery-ui-1.8.4.custom.min'); ?>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales','action' => 'add')); ?></li>
    
        <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
       
      
        <li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Export Report'),  array('controller' => 'sales', 'action' => 'export')); ?> </li>
    </ul>
</div>
<div class="sales index">
<section class="container">
<?php echo $this->Form->create('Export'); ?>

<br><br>
    Select a date period to generate report.
    <br><br>
<p>From:  <input name="from" type="date" id="from" size="30"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;
    To:  <input type="date" id="to" name="to" size="30"/>

<?php echo $this->Ajax->datepicker('from', array(
    'maxDate' => '"+0D"',
    'dateFormat' => 'yy-mm-dd')); ?>


<?php echo $this->Ajax->datepicker('to', array(
    'maxDate' => '"+0D"',
    'dateFormat' => 'yy-mm-dd')); ?>

<?php echo $this->Form->end(__('Generate')); ?>

</section>
</div>