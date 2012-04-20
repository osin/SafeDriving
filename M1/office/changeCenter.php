<?php
include '../common/inc/init.inc';
Begin('Migrer des comptes', true, "Migrer des comptes dans d'autres centres");?>
<p style="font-style: italic; padding: 10px 0;">
 ATTENTION, Une personne inscrite en tant qu'admin, directeur ou intervenant n'aura pas accès au menu de l'utilisateur même s'il en poss-de les privilèges.
</p>
<form method="post">
<table align="center" width="85%">
  <thead>
    <th>Login</th>
    <th>Centre Associé</th>
  </thead>
  <tbody>
<?php foreach ($userList as $key => $pUser):?>
    <?php  if ($pUser->id != $user->id):?>
      <tr>
        <td style="width: 100px;"><?php print $pUser->username ?></td>
        <td>
        <select name="center<?php print($pUser->id)?>">
          <?php foreach ($centers as $center):?>
          <option value="<?php echo $center->id?>" <?php $center->id == $pUser->center_id ? print 'selected="true"' : print '' ?>/><?php echo $center->name?>
          <?php endforeach;?>
        </select>
          <?php foreach ($privileges as $privilege):?>
          <span style="display: inline-block; margin: 0px 20px; text-transform: capitalize"><input style="position: relative; top: 1px" type="checkbox" name="<?php print('privilege'.$pUser->id).'[]' ?>" value="<?php print $privilege->id?>" <?php print count($pUser->getPrivileges())>0 ? $pUser->isAuthorized($privilege->label) ? 'checked': '' : ''?>/><?php print $privilege->label?></span>
          <?php endforeach;?>
        </td>
      </tr>
      <?php endif;?>
<?php endForeach;?>
  </tbody>
</table>
  <input type="hidden" value="true" name="privilege_mode"/>
  <input type="submit" value="Migrer les comptes"  class="my_button btn-bleu" style="margin-top: 10px; width: 100%" />
</form>
<?php  Close();?>