

<?php echo $this->Html->script('search'); ?>
<div class="sales index">
	<h2><?php echo __('Sales'); ?></h2>
        <section class="container">
        <input type="search" class="light-table-filter" data-table="order-table" placeholder="Search">
        <table cellpadding="0" cellspacing="0" class="order-table table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('sold_price'); ?></th>
                        <th><?php echo $this->Paginator->sort('total_price'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sales as $sale): ?>
	<tr>
		<td><?php echo h($sale['Sale']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sale['User']['username'], array('controller' => 'users', 'action' => 'view', $sale['User']['id'])); ?>
		</td>
		
		<td>
			<?php echo $this->Html->link($sale['Item']['title'], array('controller' => 'items', 'action' => 'view', $sale['Item']['id'])); ?>
		</td>
		<td><?php echo h($sale['Item']['price']); ?>&nbsp;</td>
		<td><?php echo h($sale['Sale']['sold_price']); ?>&nbsp;</td>
                <td><?php echo h($sale['Sale']['total_price']); ?>&nbsp;</td>
		<td><?php echo h($sale['Sale']['date']); ?>&nbsp;</td>
		<td><?php echo h($sale['Sale']['quantity']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sale['Sale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sale['Sale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sale['Sale']['id']), array(), __('Are you sure you want to delete # %s?', $sale['Sale']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
        </section>	
</div>
   
    
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Export Report'),  array('controller' => 'sales', 'action' => 'export')); ?> </li>
	</ul>
</div>
