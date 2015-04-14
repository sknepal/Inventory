<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>

        <h4><?php echo __('Username'); ?></h4>

        <?php echo h($user['User']['username']); ?>
        &nbsp;


        <h4><?php echo __('Role'); ?></h4>

        <?php echo h($user['User']['role']); ?>
        &nbsp;

        <h4><?php echo __('Created'); ?></h4>

        <?php echo h($user['User']['created']); ?>
        &nbsp;

    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Sales'); ?></h3>
    <?php if (!empty($user['Sale'])): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('User Id'); ?></th>
                <th><?php echo __('Category Id'); ?></th>
                <th><?php echo __('Item Id'); ?></th>
                <th><?php echo __('Price'); ?></th>
                <th><?php echo __('Sold Price'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Quantity'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($user['Sale'] as $sale): ?>
                <tr>
                    <td><?php echo $sale['id']; ?></td>
                    <td><?php echo $sale['user_id']; ?></td>
                    <td><?php echo $sale['category_id']; ?></td>
                    <td><?php echo $sale['item_id']; ?></td>
                    <td><?php echo $sale['price']; ?></td>
                    <td><?php echo $sale['sold_price']; ?></td>
                    <td><?php echo $sale['date']; ?></td>
                    <td><?php echo $sale['quantity']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'sales', 'action' => 'view', $sale['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'sales', 'action' => 'edit', $sale['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sales', 'action' => 'delete', $sale['id']), array(), __('Are you sure you want to delete # %s?', $sale['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
