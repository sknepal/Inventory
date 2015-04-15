<div class="items view">
    <h2><?php echo __('Item'); ?></h2>


    <h4><?php echo __('Category: '); ?></h4><?php echo $this->Html->link($item['Category']['name'], array('controller' => 'categories', 'action' => 'index', $item['Category']['id'])); ?>
    &nbsp;
    <br>
    <h4><?php echo __('Title'); ?></h4>

    <?php echo h($item['Item']['title']); ?>
    &nbsp;
    <br>
    <h4><?php echo __('Total Count'); ?></h4>

    <?php echo h($item['Item']['total_quantity']); ?>
    &nbsp;
    <br>

    <h4><?php echo __('Remaining Count'); ?></h4>

    <?php echo h($item['Item']['remaining_quantity']); ?>
    &nbsp;
    <br>

    <h4><?php echo __('Price'); ?></h4>

    <?php echo h($item['Item']['price']); ?>
    &nbsp;


</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), array(), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Categorieas'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        
        
</div>
