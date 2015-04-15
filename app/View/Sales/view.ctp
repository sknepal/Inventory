<div class="sales view">
    <h2><?php echo __('Sale'); ?></h2>
    <dl>

        <h4><?php echo __('Category'); ?></h4>

        <?php echo $this->Html->link($sale['Category']['name'], array('controller' => 'categories', 'action' => 'view', $sale['Category']['id'])); ?>
        &nbsp;

        <h4><?php echo __('Item'); ?></h4>

        <?php echo $this->Html->link($sale['Item']['title'], array('controller' => 'items', 'action' => 'view', $sale['Item']['id'])); ?>
        &nbsp;

        <h4><?php echo __('Price'); ?></h4>

        <?php echo h($sale['Item']['price']); ?>
        &nbsp;

        <h4><?php echo __('Sold Price'); ?></h4>

        <?php echo h($sale['Sale']['sold_price']); ?>
        &nbsp;

        <h4><?php echo __('Date'); ?></h4>

        <?php echo h($sale['Sale']['date']); ?>
        &nbsp;

        <h4><?php echo __('Quantity'); ?></h4>

        <?php echo h($sale['Sale']['quantity']); ?>
        &nbsp;

    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Sale'), array('action' => 'edit', $sale['Sale']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Sale'), array('action' => 'delete', $sale['Sale']['id']), array(), __('Are you sure you want to delete # %s?', $sale['Sale']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Sales'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Sale'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>

    </ul>
</div>
