<?php
include '../common/inc/init.inc';
Begin('Deplacer un vehicule centre', true, 'Déplacer un vehicule');
?>
<?php if (count($vehicles) < 0): ?>
  Il n'y a pas de vehicules dans ce centre
<?php else: ?>
  <form method="post" action="<?php print(CTRL_Path) ?>/moveVehicle.php">
    <table width="100%" align="center" border="1">
      <thead>
        <th></th>
        <th>Type</th>
        <th>Model</th>
        <th>Date de la dernière revision</th>
        <th>Status</th>
      </thead>
      <tbody>
        <?php foreach ($vehicles as $vehicle): ?>
          <tr>
          <td><input type="checkbox" name="vehicle[]" value="<?php print $vehicle->id ?>"</td>
          <td><?php print Vehicle::$type[$vehicle->type] ?></td>
          <td><?php print $vehicle->model ?></td>
          <td><?php print $vehicle->last_revision->format('d-m-Y') ?></td>
          <td><?php print (strtotime($vehicle->last_revision->format('d-m-Y')) + 7889231) < time() ? '<span style="color: red"><b>Revision nécessaire</b></span>' : '<span style="color: green"><b>Opérationnel</b></span>'  ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <br/>
  Déplacer les vehicules dans le centre suivant
  <select name="center">
    <option value=""/>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    <?php foreach ($centers as $center):?>
    <option value="<?php print $center->id?>"/><?php print $center->name?>
    <?php endforeach;?>
  </select>
  <input type="submit" value="Valider" class="my_button btn-bleu" style="width: 200px; "/>
  </form>
<?php endif; ?>
<?php  Close();?>