<script type="text/javascript">
  $(document).ready(function(){
    $("#user-menu").click(function(){
      $("#user-submenu").slideToggle("fast");
      $(this).addClass("selected").removeClass("unselected");
      $(".unselected").hide();
    });
  });
</script>

<ul>
  <li id="user-menu">
    <a href="javascript:void(0)" title="Les vehicules du centres">
      <?php echo strtoupper($privilege->label); ?>
    </a>
  </li>
  <li>
    <div id="user-submenu" class="sub-menu unselected" style="display: none;">
      <p><a href="../public/viewNote.php" title="Consulter mes notes">Consulter mes notes</a></p>
      <p><a href="../public/myPlanning.php" title="Voir mon planning">Voir mon planning</a></p>
    </div>
  </li>
</ul>
<ul>
  <li>
    <a href="../public/offer.php" title="Consulter mes prestations">Nos prestations</a>
  </li>
</ul>
