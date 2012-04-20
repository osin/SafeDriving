<?php include '../common/inc/init.inc';
 Begin('Nos prestations', true, 'Consulter nos prestations');
?>
<div>
  <?php  if (!$liste):?>
  <table align="center" border="0" width="80%">
    <?php foreach ($vehicles as $vehicle):?>
    <tr>
      <td><?php print $vehicle->model?></td>
      <td><a href="../public/vehicle.php?vehicle=<?php print $vehicle->id?>" title="en savoir plus"><i> En savoir plus<i></a></td>
    </tr>
    <?php endforeach;?>
  </table>
  <?php else:
    print $vehicle->model;
  endif?>
</div>
<?php  Close();?>