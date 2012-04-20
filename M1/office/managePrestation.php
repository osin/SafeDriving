<?php
include '../common/inc/init.inc';
Begin('Gestions des prestations', true, 'Gérer les prestations à inclure dans vos offres');
?>
<?php if (count($prestations) < 0): ?>
  Il n'y pas d'offres disponibles, crée en une.
<?php else: ?>
  <div style="padding-top: 30px">
    <h3 style="padding-top: 20px;">
      <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Les prestations de votre centre</span>
    </h3>
    <form method="post" action="<?php print(CTRL_Path) ?>/prestationOperation.php">
      <table width="80%" align="center" border="1">
        <thead>
          <th></th>
          <th>Nom</th>
          <th>Description</th>
          <th>Prix</th>
        </thead>
        <tbody>
          <?php foreach ($prestations as $prestation): ?>
            <tr>
            <td><input type="checkbox" name="prestation[]" value="<?php print $prestation->id ?>"</td>
            <td><input type="text" value="<?php print $prestation->name ?>" name="name<?php print $prestation->id ?>"</td>
            <td><input type="text" value="<?php print $prestation->description ?>" name="description<?php print $prestation->id ?>"</td>
            <td><input type="text" value="<?php print number_format($prestation->price, 2, ',', null); ?>" name="price<?php print $prestation->id ?>"</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <br/>
      Pour la selection :
      <select name="action">
        <option value=""/>- - - - - - - Choisir une action - - - - - - - - - - - - -
        <option value="delete"/>Supprimer
        <option value="update"/>Mettre à jour
      </select>
      <input type="submit" class="my_button btn-bleu" value="Valider" style="width: 200px;"/>
    </form>
  </div>
  <div style="padding-top: 100px">
    <h3>
      <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Enregistrer un nouvelle offre</span>
    </h3>

    <form method="post" action="<?php print(CTRL_Path) ?>/prestationOperation.php">
      <table style="border: 0">
        <tr>
        <td><b>Nom</b></td>
        <td><input type="text" name="name"/></td>
        </tr>
        <tr>
        <td><b>Description</b></td>
        <td><input type="text" name="description"/></td>
        </tr>
        <tr>
        <td><b>Prix</b></td>
        <td><input type="text" name="price"/></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="register"/>
      <input type="submit" class="my_button btn-bleu" value="Enregistrer la prestation" style="width: 415px;"/>
    </form>
  </div>
<?php endif; ?>
<?php  Close();?>