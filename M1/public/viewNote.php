<?php
include '../common/inc/init.inc';
Begin('Consulter mes notes', true, 'Vous pouvez consulter ici vos notes disponible');
?>

<?php if (isset($sessions)):?>
<table border="1" width="80%" align="center">
  <thead>
    <th>Nom</th>
    <th>Description</th>
    <th>Date</th>
    <th>Note</th>
    <th>Commentaire</th>
    <th>Intervenant</th>
  </thead>
  <tbody>
    <?php foreach ($sessions as $session): ?>
      <tr>
      <td>
        <?php print ($session->name); ?>
      </td>
      <td>
        <?php print($session->description); ?>
      </td>
      <td>
        <?php print('Le '.$session->start->format('d/m/Y').' de '.$session->start->format('H:i').' à '.$session->end->format('H:i')); ?>
      </td>
      <td>
        <?php print($user->getMark($session->id)); ?>
      </td>
      <td>
        <?php print($user->getComment($session->id)); ?>
      </td>
      <td>
        <?php print(User::find($session->user_id)->username); ?>
      </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else:?>
  Vous n'avez pas encore de notes disponibles
<?php endif; ?>
<?php  Close();?>
