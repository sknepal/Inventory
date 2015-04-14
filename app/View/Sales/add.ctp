<?php echo $this->Form->create('Sale'); ?>

<legend><?php echo __('Add Sale'); ?></legend>
<?php
echo $this->Form->input('user_id',
    array('type' => 'hidden',
        'default' => $this->Session->read('Auth.User.id')));

echo $this->Form->input('item_id');
?>

<?php echo $this->Form->input('sold_price'); ?>
<?php echo $this->Form->input('date'); ?>
<?php echo $this->Form->input('quantity'); ?>



<?php echo $this->Form->end(__('Submit')); ?>


