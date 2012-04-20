<?php include '../common/inc/init.inc';
 Begin('Nos prestations', true, 'Consulter nos prestations');
?>
<div>
  <?php  if (!$liste):?>
  <table align="center" border="0" width="80%">
    <?php foreach ($offers as $offer):?>
    <tr>
      <td><?php print $offer->name?></td>
      <td><a href="../public/offer.php?offer=<?php print $offer->id?>" title="en savoir plus"><i> En savoir plus<i></a></td>
    </tr>
    <?php endforeach;?>
  </table>
  <?php else:
    print $offer->name;
    print $offer->description;
  endif?>
</div>
<?php  Close();?>