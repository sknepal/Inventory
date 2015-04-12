<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Management System');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                echo $this->Html->css('bootstrap');
                echo $this->Html->css('font-awesome');
                echo $this->Html->css('font-awesome.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h2 class="header-content"><?php echo $this->Html->link($cakeDescription, ''); ?></h2>
                         
                         </div>
            
            
            
            
		<div id="content">
            <ul class="nav nav-pills">
                        
                        
                            <?php if(AuthComponent::user()) :?>
                        <li role="presentation"><a href="/inventory/Categories"> Categories</a></li>
                         <li role="presentation"><a href="/inventory/Sales">Sales</a></li>
	                
	                
                        <li role="presentation"><a href="/inventory/users">Users</a></li>
                        <li> <a href="/inventory/users/logout" align="right">Log out   </a></li>
                        <div align="right">
                        <li role="presentation"> <strong> Hello 
                            <?php echo $this->Session->read('Auth.User.username') ; ?> </strong></li>
                       </div>
                        </ul>
                    <?php echo $this->Session->flash(); ?>
                        <?php else: ?>
                           
                            <?php endif; ?>
                           
                            
	            
			<?php echo $this->Session->flash(); ?>

                            <div> <?php echo $this->fetch('content'); ?> </div>
		</div>
		<footer>
                <address>&copy; Copyright 2015 All Rights Reserved.<br>CKP INC.</address>
</footer>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
