<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		
		
		<h4> <?php echo __('Name'); ?></h4>
		
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		
	</dl>
</div>
<!--<div class="actions">
	<h3><?php// echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php // echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php //echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>-->