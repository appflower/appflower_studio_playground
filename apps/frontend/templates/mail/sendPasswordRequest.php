<p>Dear <?php echo $userObj->getName() ?>,</p>
 
<p>A request for seedControl password recovery was sent to this address.</p>
 
<p>For safety reasons, the seedControl does not store passwords in clear.
When you forget your password, seedControl creates a new one that can be used in place.</p>
 
<p>You can now connect to your seedControl profile with:</p>
 
<p>
email: <strong><?php echo $userObj->getUsername() ?></strong><br/>
password: <strong><?php echo $password ?></strong>
</p>
 
<p>To get connected, go to the <?php echo link_to('login page', '@login', array('absolute' => true)) ?> and enter these codes.</p>
 
<p>The seedcontrol email robot</p>    