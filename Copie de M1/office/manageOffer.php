<?php
include '../common/inc/init.inc';
  Begin('Gestions des offres', true, 'Ajouter des prestations à une offre');
?>
<?php if ($editmode == true):
  include_once '../common/inc/lib/fckeditor/fckeditor.php';
?>
  <h3 style="padding-top: 20px;">
    <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Choisissez les prestations à ajouter</span><br/>
  </h3>
<form method="post" action="<?php print(CTRL_Path) ?>/offerOperation.php">
  <table width="80%" align="center" border="1">
    <thead>
      <th>Nom</th>
      <th>Description</th>
      <th>Prix</th>
      <th>Quantity</th>
    </thead>
    <tbody>
      <?php foreach ($prestations as $prestation): ?>
        <tr>
          <td><input type="text" name="name" value="<?php print $prestation->name?>"/></td>
          <td><input type="text" name="description" value="<?php print $prestation->description?>"/></td>
          <td><input type="text" name="price" value="<?php print $prestation->price?>"/></td>
          <td><input style="width: 60px; font-weight: bold;" type="text" value="<?php print $offer->isOffer($prestation->id)?>" name="<?php print $prestation->id ?>" /></td>
        </tr>
      <?php endforeach; ?>
        <input type="hidden" name="action" value="prestation"/>
        <input type="hidden" name="offer_id" value="<?php print $offer->id?>"/>
    </tbody>
  </table>
  <br/>

  <table align="center" width="80%">
        <tr><td>Description</td></tr>
        <tr>
          <td><?php $oFCKeditor = new FCKeditor('description') ; $oFCKeditor->BasePath = '../common/inc/lib/fckeditor/' ; $oFCKeditor->Config['EnterMode'] = 'br'; $oFCKeditor->Height =250; $oFCKeditor->Width =850; $oFCKeditor->Create()?></td>
        </tr>
  </table>

  <p align="left"><input type="reset" value="Mettre les quantités à 0" /></p><p align="right"><input type="submit" value="Mettre à jour l'offre"/></p>
</form>
  </div>
<?php elseif (count($offers) < 0): ?>
  <div style="padding-top: 30px; ">
    <h3 style="padding-top: 20px;">
      <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Il n'y a pas d'offres disponibles</span><br/>
    </h3>
  </div>
<?php else: ?>
  <div style="padding-top: 30px; ">
    <h3 style="padding-top: 20px;">
      <span style="background: #FFF; text-transform: uppercase; color: #BBB;">Les offres disponibles sur le site</span><br/>
      Une fois l'offre crée vous pouvez y inserer des prestations
    </h3>
    <br/>
    <form method="post" action="<?php print(CTRL_Path) ?>/offerOperation.php">
      <table width="80%" align="center" border="1">
        <thead>
          <th></th>
          <th>Nom</th>
          <th>Prix</th>
          <th></th>
        </thead>
        <tbody>
          <?php foreach ($offers as $offer): ?>
            <tr>
            <td><input type="checkbox" name="offer[]" value="<?php print $offer->id ?>"</td>
            <td><input type="text" style="width: 120px;" value="<?php print $offer->name ?>" name="name<?php print $offer->id ?>"</td>
            <?php
            if (isset($_POST['description'.$offer->id]))
              $oFCKeditor->Value = $_POST['description'.$offer->id];
            ?>
            <td><input style="width: 60px; font-weight: bold;" type="text" value="<?php print number_format($offer->price, 2, ',', null); ?>" value="Si vous ne souhaitez pas définir de Prix préférentiel, laissez ce champs" name="price<?php print $offer->id ?>"/>&nbsp;€uros</td>
            <td><a href="../office/manageOffer.php?offer=<?php print $offer->id ?>" title="Editer cette offre">Editer cette offre</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <br/>
      Pour la selection :
      <select name="action">
        <option value=""/>- - - - - - Choisir une action - - - - - - - - - - -
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

    <form method="post" action="<?php print(CTRL_Path) ?>/offerOperation.php">
      <table style="border: 0">
        <tr>
        <td><b>Nom</b></td>
        <td><input type="text" name="name" value="<?php isset($_POST['name'])? $_POST['name'] : ''?>"</td>
        </tr>
        <tr>
        <td><b>Description</b></td>
        <td><input type="text" name="description" value="<?php isset($_POST['description'])? $_POST['description'] : ''?>"</td>
        </tr>
        <tr>
        <td><b>Prix</b></td>
        <td><input type="text" name="price"/></td>
        </tr>
        <tr>
        <td><b>Prestations incluses</b></td>
        <td><input type="text" name="prestations" value=""/></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="register"/>
      <input type="submit" class="my_button btn-bleu" value="Enregistrer l'offre" style="width: 415px;"/>
    </form>
  </div>
<?php endif; ?>
<?php  Close();?>