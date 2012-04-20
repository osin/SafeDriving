<?php
include '../common/inc/init.inc';
Begin('Créer un centre', true, 'Crée un centre');

if (isset($_GET['error']) && $_GET['error'] == true) {
  print '<span style="color:red; font-weight:bold;">Erreur</span>';
}?>
<div style="padding-top: 100px">
  <table style="border: 0" width="80%" align="center">
    <thead>
      <th>ID</th>
      <th>Centre</th>
      <th>Description</th>
      <th>Adresse</th>
      <th>Responsable</th>
    </thead>
    <tbody>
      <?php foreach (Center::find('all') as $center): ?>
      <tr>
        <td><?php print $center->id?></td>
        <td><?php print $center->name?></td>
        <td><?php print $center->description?></td>
        <td><?php print $center->address?></td>
        <td><?php print User::find($center->user_id)->username?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <form method="post" action="<?php print(CTRL_Path) ?>/createCenter.php">
    <table style="border: 0">
      <thead>
        <th>Nom</th>
        <th>Description</th>
        <th>Adresse</th>
        <th>Responsable</th>
      </thead>
      <tbody>
        <tr>
        <td><input type="text" name="name"/></td>
        <td><input type="text" name="description"/></td>
        <td><input type="text" name="address"/></td>
        <td><select name="user_id" size="5">
            <?php foreach ($pUsers as $admin): ?>
              <option value="<?php print $admin->id ?>"><?php print $admin->username ?>
              <?php endforeach; ?>
          </select></td>
        </tr>
    </table>
    <input type="hidden" name="action" value="register"/>
    <input type="submit" class="my_button btn-bleu" value="Enregistrer la prestation" style="width: 415px;"/>
  </form>
</div>
<?php Close(); ?>