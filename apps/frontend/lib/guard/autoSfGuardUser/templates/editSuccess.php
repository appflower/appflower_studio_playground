<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardUser/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editing User "%%username%%"', array('%%username%%' => $sf_guard_user->getUsername()), 'messages') ?></h1>

  <?php include_partial('sfGuardUser/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sfGuardUser/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('sfGuardUser/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sfGuardUser/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
