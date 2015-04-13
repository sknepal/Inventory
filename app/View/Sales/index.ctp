

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
			<?php echo $this->Html->link($sale['User']['id'], array('controller' => 'users', 'action' => 'view', $sale['User']['id'])); ?>
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
    <!--<script src="https://www.google.com/jsapi"></script>
<div id="test"> </div>
<script type="text/javascript">
  google.load("visualization", "1", {packages: ["corechart"]});
</script>
<script type="text/javascript">
  google.setOnLoadCallback(function() {
    var data = new google.visualization.DataTable({"cols":[{"label":"Sample","type":"string"},{"label":"Piston 1","type":"number"},{"label":"Piston 2","type":"number"}],"rows":[{"c":[{"v":"S1"},{"v":74.01},{"v":74.03}]},{"c":[{"v":"S2"},{"v":74.05},{"v":74.04}]},{"c":[{"v":"S3"},{"v":74.03},{"v":74.01}]},{"c":[{"v":"S4"},{"v":74},{"v":74.02}]},{"c":[{"v":"S5"},{"v":74.12},{"v":74.05}]},{"c":[{"v":"S6"},{"v":74.04},{"v":74.04}]},{"c":[{"v":"S7"},{"v":74.05},{"v":74.06}]},{"c":[{"v":"S8"},{"v":74.03},{"v":74.02}]},{"c":[{"v":"S9"},{"v":74.01},{"v":74.03}]},{"c":[{"v":"S10"},{"v":74.04},{"v":74.01}]}]});
    var chart = new google.visualization.LineChart(document.getElementById("test"));
    chart.draw(data, {
      width: 450,
      height: 300,
      is3D: true,
      legend: "bottom",
      title: "Pie Chart"
    });
  });
</script>
--><?php
/*echo $this->GChart->start('test');
echo $this->GChart->visualize('test', $data); */?>

    
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales','action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Export Report'),  array('controller' => 'sales', 'action' => 'export')); ?> </li>
	</ul>
</div>
