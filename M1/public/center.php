<?php include '../common/inc/init.inc';
 Begin('Nos Sites', true, 'Emplacement de nos Agences');
?>
<div>
  <?php  if (!$liste):?>
  <table align="center" border="0" width="80%">
    <?php foreach ($centers as $center):?>
    <tr>
      <td><?php print $center->name?></td>
      <td><a href="../public/center.php?center=<?php print $center->id?>" title="en savoir plus"><i> En savoir plus<i></a></td>
    </tr>
    <?php endforeach;?>
  </table>
  <?php else:
    print $center->name;
    print $center->description;
  endif?>
</div>
<?php  Close();?>