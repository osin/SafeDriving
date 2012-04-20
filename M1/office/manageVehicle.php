<?php
include '../common/inc/init.inc';
Begin('Gestions des vehicules du centre', true, 'Enregistrer ou vendre un vehicule');
?>
<?php if (count($vehicles) < 0): ?>
  Il n'y a pas de vehicules dans ce centre

<?php else: ?>
  <h3 style="padding-top: 20px;">
    <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Les vehicules disponibles dans votre centre</span>
  </h3>
  <div style="padding-bottom: 100px;">
  <form method="post" action="<?php print(CTRL_Path) ?>/vehicleOperation.php">
    <table width="100%" align="center" border="1">
      <thead>
        <th></th>
        <th>Type</th>
        <th>Model</th>
        <th>Date de la dernière revision</th>
        <th>Status</th>
        <th>Date d'achat</th>
      </thead>
      <tbody>
        <?php foreach ($vehicles as $vehicle): ?>
          <tr>
          <td><input type="checkbox" name="vehicle[]" value="<?php print $vehicle->id ?>"</td>
          <td><?php print Vehicle::$type[$vehicle->type] ?></td>
          <td><?php print $vehicle->model ?></td>
          <td><?php print $vehicle->last_revision->format('d-m-Y') ?></td>
          <td><?php print (strtotime($vehicle->last_revision->format('d-m-Y')) + 7889231) < time() ? '<span style="color: red; font-weight: bold;">Revision nécessaire</span>' : '<span style="color: green; font-weight: bold;">Opérationnel</span>'  ?></td>
          <td><?php print $vehicle->created_at->format('d-m-Y') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <br/>
  Pour la selection :
  <select name="action">
    <option value=""/>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    <option value="delete"/>Vendre le vehicule
    <option value="update"/>Noter la maintenance effectuer
  </select>
  <input type="submit" class="my_button btn-bleu" value="Valider" style="width: 200px;"/>
  </form>
  </div>
<?php endif; ?>
  <h3>
    <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Enregistrer un nouveau véhicule</span>
  </h3>
  <div style="padding-bottom: 100px;">
  <form method="post" action="<?php print(CTRL_Path) ?>/vehicleOperation.php">
    <p style="padding: 5px 0;">
      <span style="display: inline-block; width: 70px;">Type </span>
        <select name="type">
          <option value=""/>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
          <option value="1"/>Voiture
          <option value="2"/>Moto
        </select>
    </p>
    <p style="padding: 5px 0;">
      <span style="display: inline-block; width: 70px;">Modèle</span>
      <input type="text" name="model"/>
    </p>
    <p style="padding: 5px 0;">
      <input type="hidden" name="action" value="register" >
      <input type="submit" class="my_button btn-bleu" value="Enregistrer un nouveau vehicule" style="width:350px;"/>
    </p>
  </form>
  </div>
<?php  Close();?>