<?php
include '../common/inc/init.inc';
Begin('Assigner des notes', true, 'Choisissez la session que vous souhaitez noter');
?>
<?php if (isset($sessions)):?>
<table border="1" width="100%" align="center">
  <thead>
    <th>Nom</th>
    <th>Description</th>
    <th>Date</th>
    <th>Capacity</th>
  </thead>
  <tbody>
    <?php foreach ($sessions as $session): ?>
      <tr>
      <td>
        <?php print('<a href="../office/assignNote.php?session_id='.$session->id.'" title="noter cette session"> '.$session->name.'</a>'); ?>
      </td>
      <td>
        <?php print($session->description); ?>
      </td>
      <td>
        <?php print('Le '.$session->start->format('d/m/Y').' de '.$session->start->format('H:i').' à '.$session->end->format('H:i')); ?>
      </td>
      <td>
        <?php print($session->capacity); ?>
      </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else:?>
  <?php  if (!isset($pUsers)) :
    print "Aucun utilisateur a participer à cette session";
  else:?>
  <form  method="POST" action="<?php print(CTRL_Path);?>/updateMarks.php">
    <table border="1" width="" align="center">
      <?php foreach ($pUsers as $pUser):?>
      <tr>
        <td><?php print($pUser->username)?></td>
        <td><input type="text" name="<?php print $pUser->id?>" value="<?php $pUser->getMark($session->id) != 0 ? print $pUser->getMark($session->id) : print 0 ?>" width="" />/20</td>
        <td><textarea name="comment<?php print $pUser->id?>"><?php $pUser->getComment($session->id) != '' ? print $pUser->getComment($session->id) : print 'aucun commentaire' ?></textarea></td>
      </tr>
        <?php endforeach;?>
    </table>
    <p align="right">
      <input type="hidden" value="<?php print($session->id)?>" name="session_id"/>
      <input type="submit" value="Mettre à jour les notes" />
    </p>
  </form>
  <?php endif;?>
<?php endif; ?>
<?php  Close();?>
