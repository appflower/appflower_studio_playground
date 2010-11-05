<td colspan="3">
  <?php echo __('%%username%% - %%created_at%% - %%last_login%%', array('%%username%%' => link_to($sf_guard_user->getUsername(), 'sf_guard_user_edit', $sf_guard_user), '%%created_at%%' => false !== strtotime($sf_guard_user->getCreatedAt()) ? format_date($sf_guard_user->getCreatedAt(), "f") : '&nbsp;', '%%last_login%%' => false !== strtotime($sf_guard_user->getLastLogin()) ? format_date($sf_guard_user->getLastLogin(), "f") : '&nbsp;'), 'messages') ?>
</td>
