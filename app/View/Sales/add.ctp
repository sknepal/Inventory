<script>
    $('#quantity').on('change',function{
        document.getElementById("sold_price").val()= "lamo";
        $('#total_price').val('#sold_price'.val() * '#quantity'.valueOf());
    })
</script>

    <?php echo $this->Form->create('Sale'); ?>
	
		<legend><?php echo __('Add Sale'); ?></legend>
	<?php 
        echo $this->Form->input('id');
		echo $this->Form->input('user_id',
                        array('type'=>'hidden','default'=>$this->Session->read('Auth.User.id')));//,array('type'=>'hidden',$this->Session->read('User.id'))); 
                 //   $this->Session->read('Auth.User.id')));
		echo $this->Form->input('item_id');
            ?>		
                
         <?php	echo $this->Form->input('sold_price',array('id'=>'sold_price')); ?>
	 <?php	echo $this->Form->input('date',array('type'=>'hidden')); ?>
	<?php	echo $this->Form->input('quantity',array('id'=>'quantity')); ?>
              <?php      echo $this->Form->input('total_price',array('id'=>'total_price')); ?>
	
	
<?php echo $this->Form->end(__('Submit')); ?>


