<div class="sales form">

    <?php echo $this->Form->create('Sale'); ?>
	<fieldset>
		<legend><?php echo __('Add Sale'); ?></legend>
	<?php 
        echo $this->Form->input('id');
		echo $this->Form->input('user_id',
                        array('type'=>'hidden','default'=>$this->Session->read('Auth.User.id')));//,array('type'=>'hidden',$this->Session->read('User.id'))); 
                 //   $this->Session->read('Auth.User.id')));
	
		echo $this->Form->input('item_id');
		
		echo $this->Form->input('sold_price');
		echo $this->Form->input('date');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

