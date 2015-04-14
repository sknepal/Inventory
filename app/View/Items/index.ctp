<?php echo $this->Html->script('search');?>
<div class="items index">
	<h2><?php echo __('Items'); ?></h2>
        <section class="container">
        <input type="search" class="light-table-filter" data-table="order-table" placeholder="Search">
	<table cellpadding="0" cellspacing="0" class="order-table table">
	<thead>
	<tr>
			
			
			<th>Title</th>
			<th>Created</th>
			<th>Modified</th>
			<th>Count</th>
			<th>Price</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
                        <th> Sale </th>
	</tr>
	</thead>
	<tbody>
            
	<?php foreach ($items as $item): ?>
	<tr>
		
		
		<td><?php echo h($item['Item']['title']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['created']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['modified']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['total_quantity']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['price']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), array(),
                                __('Are you sure you want to delete # %s?', $item['Item']['title'])); ?>
		</td>
                <td>  <?php echo $this->Html->link('Sale',array('controller'=>'sales','action'=>'add',
                    $item['Item']['id'])) ;?> </td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</section>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
