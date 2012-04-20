<script type="text/javascript">
  $(document).ready(function(){
    $("#intervenant-menu").click(function(){
      $("#intervenant-submenu").slideToggle("fast");
      $(this).addClass("selected").removeClass("unselected");
      $(".unselected").hide();
    });
  });
</script>

<ul>
  <li id="intervenant-menu">
    <a href="javascript:void(0)" title="Les vehicules du centres">
      Mes interventions
    </a>
  </li>
  <li>
    <div id="intervenant-submenu" class="sub-menu unselected" style="display: none;">
      <p><a href="../office/assignNote.php" title="Assigner des notes">Assigner des notes</a></p>
    </div>
  </li>
</ul>