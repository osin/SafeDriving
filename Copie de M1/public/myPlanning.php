<?php include '../common/inc/init.inc';
 Begin('Calendar', true, 'Les événements auxquels je participe');
?>
<p>Ici vous pouvez voir les événements sur lesquels vous êtes inscrit.</p>
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span>
				</li>
				<li>
					<label for="start">A partir de: </label><select name="start"><option value="">Choisir la date de début</option></select>
				</li>
				<li>
					<label for="end">Jusqu'à: </label><select name="end"><option value="">Choisir la date de fin</option></select>
				</li>
				<li>
					<label for="title">Titre: </label><input type="text" name="title" />
				</li>
				<li>
					<label for="body">Contenu: </label><textarea name="body"></textarea>
				</li>
				<li>
        Session :
        <br />initial<input type="radio" id ="initial" name="capacity" />
          perfectionnement <input type="radio" id="perfectionnement" name="capacity" />
				</li>
        <li>
					<label for="intervenant">Intervenant: </label>
          <select name="intervenant">
            <option value=""/>-------
            <?php foreach ($intervenants as $intervenant):?>
              <option value="<?php print $intervenant->id?>"/><?php echo $intervenant->username?>
            <?php endforeach;?>
          </select>
				</li>
			</ul>
		</form>
	</div>

  <script type="text/javascript">
$(document).ready(function() {
   var $calendar = $('#calendar');
   var id = <?php print(Center::last()->id)?>;

   $calendar.weekCalendar({
      timeslotsPerHour : 2,
      allowCalEventOverlap : true,
      overlapEventsSeparate: true,
      firstDayOfWeek : 1,
      use24Hour : true,
      businessHours :{start: 9, end: 18, limitDisplay: true },
      daysToShow : 6,
      buttonText : {
            today : "Aujourd'hui",
            lastWeek : "Semaine précédente",
            nextWeek : "Semaine suivante"
         },
      height : function($calendar) {
         return $(window).height() - $("h1").outerHeight() - 1;
      },
      eventRender : function(calEvent, $event) {
         if (calEvent.end.getTime() < new Date().getTime()) {
            $event.css("backgroundColor", "#888");
            $event.find(".wc-time").css({
               "backgroundColor" : "#999",
               "border" : "1px solid #888"
            });
         }
      },
      draggable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      resizable : function(calEvent, $event) {
         return calEvent.readOnly != true;
      },
      eventNew : function(calEvent, $event) {
         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']");
         var bodyField = $dialogContent.find("textarea[name='body']");
 // Ajout intervenant et capacity_id
        var intervant_id = $dialogContent.find("select[name='intervenant']");
        /*if($dialogContent.find("select[name='type']:checked").val()) {
            alert('Nothong is checked');
            return false;
        }
        else {
              alert('One of the radio buttons is checked');
        }*/
        var capacity_id = $dialogContent.find("input[name='capacity']");

         $dialogContent.dialog({
            modal: true,
            title: "Créer une session",
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               save : function() {
                  calEvent.id = id;
                  id++;
                  calEvent.start = new Date(startField.val());
                  calEvent.end = new Date(endField.val());
                  calEvent.title = titleField.val();
                  calEvent.body = bodyField.val();
                  calEvent.capacity = 0; // = capacity_id.val();
                  calEvent.intervenant = intervant_id.val();

                  $calendar.weekCalendar("removeUnsavedEvents");
                  $calendar.weekCalendar("updateEvent", calEvent);
                  if(document.getElementById('initial').checked)
                    {
                      calEvent.capacity = 12;
                    }else if(document.getElementById('perfectionnement').checked){
                      calEvent.capacity = 5;
                    }
                  $.post('<?php echo CTRL_Path?>/MeetingOperation.php',
                        {
                          type:'save',
                          id:calEvent.id+1,
                          start:calEvent.start.getFullYear()+'-'+(calEvent.start.getMonth()+1)+'-'+calEvent.start.getDate()+' '+calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                          end:calEvent.end.getFullYear()+'-'+(calEvent.end.getMonth()+1)+'-'+calEvent.end.getDate()+' '+calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds(),
                          name:calEvent.title,
                          description:calEvent.body,
                          capacity:calEvent.capacity,
                          intervenant:calEvent.intervenant},
                          function(result){
                            var coolVar = result;
                            var partsArray = coolVar.split('-');
                            alert(partsArray[0]);
                            location.reload();
                          });

               },
               cancel : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));

      },
      eventDrop : function(calEvent, $event) {

      },
      eventResize : function(calEvent, $event) {
      },
      eventClick : function(calEvent, $event) {

         if (calEvent.readOnly) {
            return;
         }

         var $dialogContent = $("#event_edit_container");
         resetForm($dialogContent);
         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
         var bodyField = $dialogContent.find("textarea[name='body']");
         bodyField.val(calEvent.body);


         $dialogContent.dialog({
            modal: true,
            title: "Edit une session - " + calEvent.title,
            close: function() {
               $dialogContent.dialog("destroy");
               $dialogContent.hide();
               $('#calendar').weekCalendar("removeUnsavedEvents");
            },
            buttons: {
               save : function() {

                  calEvent.start = new Date(startField.val()).toString();
                  calEvent.end = new Date(endField.val()).toString();
                  calEvent.title = titleField.val();
                  calEvent.body = bodyField.val();

                  $calendar.weekCalendar("updateEvent", calEvent);
                  $.post('<?php echo CTRL_Path?>/MeetingOperation.php',
                        {
                          type:'edit',
                          id:calEvent.id,
                          start:calEvent.start.getFullYear()+'-'+(calEvent.start.getMonth()+1)+'-'+calEvent.start.getDate()+' '+calEvent.start.getHours()+':'+calEvent.start.getMinutes()+':'+calEvent.start.getSeconds(),
                          end:calEvent.end.getFullYear()+'-'+(calEvent.end.getMonth()+1)+'-'+calEvent.end.getDate()+' '+calEvent.end.getHours()+':'+calEvent.end.getMinutes()+':'+calEvent.end.getSeconds(),
                          name:calEvent.title,
                          description:calEvent.body},
                          function(result){
                            var coolVar = result;
                            var partsArray = coolVar.split('-');
                            alert(partsArray[0]);
                          });
                  $dialogContent.dialog("close");
               },
               "delete" : function() {
                  $calendar.weekCalendar("removeEvent", calEvent.id);
                  $.post('<?php echo CTRL_Path?>/MeetingOperation.php',
                  {
                    type:'delete',
                    id:calEvent.id},
                  function(result){
                            var coolVar = result;
                            var partsArray = coolVar.split('-');
                            alert(partsArray[0]);
                          });
                  $dialogContent.dialog("close");
               },
               cancel : function() {
                  $dialogContent.dialog("close");
               }
            }
         }).show();

         var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
         var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
         $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
         setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
         $(window).resize().resize(); //fixes a bug in modal overlay size ??

      },
      eventMouseover : function(calEvent, $event) {
      },
      eventMouseout : function(calEvent, $event) {
      },
      noEvents : function() {

      },
      data : function(start, end, callback) {
         callback(getEventData());
      }
   });

   function resetForm($dialogContent) {
      $dialogContent.find("input").val("");
      $dialogContent.find("textarea").val("");
   }

   function getEventData() {
      return {
         events : [
           <?php echo $events;?>
         ]
      };
   }


   /*
    * Sets up the start and end time fields in the calendar event
    * form for editing based on the calendar event being edited
    */
   function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

      for (var i = 0; i < timeslotTimes.length; i++) {
         var startTime = timeslotTimes[i].start;
         var endTime = timeslotTimes[i].end;
         var startSelected = "";
         if (startTime.getTime() === calEvent.start.getTime()) {
            startSelected = "selected=\"selected\"";
         }
         var endSelected = "";
         if (endTime.getTime() === calEvent.end.getTime()) {
            endSelected = "selected=\"selected\"";
         }
         $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
         $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

      }
      $endTimeOptions = $endTimeField.find("option");
      $startTimeField.trigger("change");
   }

   var $endTimeField = $("select[name='end']");
   var $endTimeOptions = $endTimeField.find("option");

   //reduces the end time options to be only after the start time options.
   $("select[name='start']").change(function() {
      var startTime = $(this).find(":selected").val();
      var currentEndTime = $endTimeField.find("option:selected").val();
      $endTimeField.html(
            $endTimeOptions.filter(function() {
               return startTime < $(this).val();
            })
            );

      var endTimeSelected = false;
      $endTimeField.find("option").each(function() {
         if ($(this).val() === currentEndTime) {
            $(this).attr("selected", "selected");
            endTimeSelected = true;
            return false;
         }
      });

      if (!endTimeSelected) {
         //automatically select an end date 2 slots away.
         $endTimeField.find("option:eq(1)").attr("selected", "selected");
      }

   });
});
</script>

<?php  Close();?>
