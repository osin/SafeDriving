<?php include '../common/inc/init.inc';
Begin('Centre de controle', true, 'Journal de bord'); ?>

<?php // <editor-fold defaultstate="collapsed" desc="Intervenant">
if ($user->isAuthorized('intervenant')): ?>
  <h3>Je suis disponible pour les sessions de formation:</h3></br>
  <table><tr>
    <td>Cette semaine</td>
    <td><input type="radio" name="currentWeek" value="1" <?php print $currentWeek ? 'checked' : ''  ?> onclick="updateIndisponibilitie(this)"/> OUI</td>
    <td><input type="radio" name="currentWeek" value="0" <?php print $nextWeek ? 'checked' : ''  ?> onclick="updateIndisponibilitie(this)"/> NON</td>
  </tr>
  <td>La semaine prochaine</td>
  <td><input type="radio" name="nextWeek" value="1" onclick="updateIndisponibilitie(this)"/>OUI</td>
  <td><input type="radio" name="nextWeek" value="0" onclick="updateIndisponibilitie(this)"/>NON</td>
  </tr>
  </table></br></br>
  <h3>Vos dernières activités:</h3></br>
  <?php if (isset($sessions)): ?>
    <h4>Vous êtes intervenu sur ces sessions:</h4></br>
    <table border="1" width="80%" align="center">
      <thead>
        <th>Nom</th>
        <th>Description</th>
        <th>Date</th>
        <th>Note</th>
      </thead>
      <tbody>
        <?php foreach ($psessions as $session): ?>
          <tr>
          <td>
            <?php print($session->name . '</a>'); ?>
          </td>
          <td>
            <?php print($session->description); ?>
          </td>
          <td>
            <?php print('Le ' . $session->start->format('d/m/Y') . ' de ' . $session->start->format('H:i') . ' à ' . $session->end->format('H:i')); ?>
          </td>
          <td>
            <a href="<?php print('../office/assignNote.php?session_id=' . $session->id . '" title="noter cette session"'); ?>">Noter</a>
          </td>
          </tr>
          <?php
        endforeach;
      endif;
    endif;
    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="user">
    if ($user->isAuthorized('user')):?>
  <?php if (isset($sessions)): ?>
        <table border="1" width="80%" align="center">
          <thead>
            <th>Nom</th>
            <th>Description</th>
            <th>Date</th>
            <th>Note</th>
          </thead>
          <tbody>
    <?php foreach ($sessions as $session): ?>
              <tr>
              <td>
      <?php print($session->name . '</a>'); ?>
              </td>
              <td>
      <?php print($session->description); ?>
              </td>
              <td>
      <?php print('Le ' . $session->start->format('d/m/Y') . ' de ' . $session->start->format('H:i') . ' à ' . $session->end->format('H:i')); ?>
              </td>
              <td>
      <?php print($user->getMark($session->id)); ?>
              </td>
              </tr>
    <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
<?php endif;
// </editor-fold>
?>
    <div>
      <p>Votre centre est accessible à cette adresse : <br/>
        <?php print Center::find($user->center_id)->address; ?>
      </p>
    </div>
    <?php Close(); ?>
