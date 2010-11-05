<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo link_to($sf_guard_user->getUsername(), 'sf_guard_user_edit', $sf_guard_user) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($sf_guard_user->getCreatedAt()) ? format_date($sf_guard_user->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_login">
  <?php echo false !== strtotime($sf_guard_user->getLastLogin()) ? format_date($sf_guard_user->getLastLogin(), "f") : '&nbsp;' ?>
</td>
