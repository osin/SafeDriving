<?php
include '../common/inc/init.inc';
Begin('Inscription aux Sessions', true, 'Inscrire des élèves à une session');
if (isset($session)):
  ?>
  <script type="text/javascript">
    <!--//   LIMIT MULTIPLE SELECTED OPTIONS SCRIPT || 01-21-2005   \\;
    var selectedOptions = [];
    function countSelected(select,maxNumber){
      for(var i=0; i<select.options.length; i++){
        if(select.options[i].selected && !new RegExp(i,'g').test(selectedOptions.toString())){
          selectedOptions.push(i);
        }

        if(!select.options[i].selected && new RegExp(i,'g').test(selectedOptions.toString())){
          selectedOptions = selectedOptions.sort(function(a,b){return a-b});
          for(var j=0; j<selectedOptions.length; j++){
            if(selectedOptions[j] == i){
              selectedOptions.splice(j,1);
            }
          }
        }

        if(selectedOptions.length > maxNumber){
          alert('La capacité de cette session est limitée à '+maxNumber+' élève(s)!!');
          select.options[i].selected = false;
          selectedOptions.pop();
          document.body.focus();
        }
      }
    }
    //-->
  </script>

<form method="post" action="<?php print(CTRL_Path) ?>/suscribeMeeting.php?session_id=<?php print $session->id ?>"
    <table>
      <thead>
        <th>Choisisser <?php print $session->capacity ?> élèves</th>
      </thead>
      <tbody>
      <tr>
        <td>
          <select multiple name="students[]" size="10" onchange="countSelected(this, <?php print $session->capacity ?>)" style="width: 500px;">
            <?php foreach ($pUsers as $pUser): ?>
              <option value="<?php print $pUser->id ?>"/> <?php print $pUser->username ?> - <?php print $pUser->email ?>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Inscrire ces élèves à la session"/>
        </td>
      </tr>
      </tbody>
    </table>
    <input type="hidden" name="action" value="register"/>
  </form>
<?php else: ?>
         <h3>Sessions récemment crées:</h3>
  <div>
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
    <?php print('<a href="../office/suscribeMeeting.php?session_id=' . $session->id . '" title="assigner des etudiant à cette session"> ' . $session->name . '</a>'); ?>
          </td>
          <td>
    <?php print($session->description); ?>
          </td>
          <td>
    <?php print('Le ' . $session->start->format('d/m/Y') . ' de ' . $session->start->format('H:i') . ' à ' . $session->end->format('H:i')); ?>
          </td>
          <td>
    <?php print($session->capacity); ?>
          </td>
          </tr>
  <?php endforeach; ?>
      </tbody>
    </table>
<?php endif; ?>
</div>
<?php Close() ?>
