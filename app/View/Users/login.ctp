<div align="center">
<h1>Log In</h1>


<p>You will need to login to edit any of the contents.</p>
   
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end(__('Login'));
?>
</div>