  $(document).ready(function() {
    try{

    function _setChange(team){
      var values = $("select#player_"+team+" > option").map(function() { return $(this).val(); }).get().join();
      console.log( values );
      $('input[name='+team+']').val(values);
    }

    function _setOldTeamPlayers(team) {
      var aTeam = $('input[name='+team+']').val().split(',').map((x) => Number.parseInt(x, 10));
      $("select#players > option").each(function(){
          //console.log(typeof $(this).val(), aTeam, aTeam.includes($(this).val()));
          if(  aTeam.includes( Number.parseInt( $(this).val() , 10) ) )
            $(this).appendTo("select#player_"+team );
      });
    }

    function _setPlayers(team) {
      var aTeam = $('input[name='+team+']').val().split(',').map((x) => Number.parseInt(x, 10));
      $("select#players > option").each(function(){
          //console.log(typeof $(this).val(), aTeam, aTeam.includes($(this).val()));
          if(  aTeam.includes( Number.parseInt( $(this).val() , 10) ) )
            $(this).detach();
      });
    }

    $('.input-group.date').datepicker({
      format: "mm. dd. yyyy",
      todayBtn: "linked",
      language: "sk",
      orientation: "bottom auto",
      daysOfWeekHighlighted: "0,6",
      calendarWeeks: true,
      autoclose: true,
      todayHighlight: true
    });
    // Init formular data
    _setOldTeamPlayers("blue");
    _setOldTeamPlayers("white");
    _setChange("blue");
    _setChange("white");
    _setPlayers("blue");
    _setPlayers("white");

/**
    $( "#start_date" ).datepicker({
        regional: "sk",
        showOn: "button",
        constrainInput: true,
        buttonImage: "< ?= base_url()?>assets/img/calendar.gif",
        buttonImageOnly: false
    });

    $( "#end_date" ).datepicker({
        regional: "sk",
        showOn: "button",
        constrainInput: true,
        buttonImage: "< ?= base_url()?>assets/img/calendar.gif",
        buttonImageOnly: false
    });
**/
    // add del buttons
    $("#blue_add").click(function(){
      console.log( "click add modry." );
      $("select#players option:selected").each(function(){
        $(this).appendTo("select#player_blue");
      });
      _setChange("blue");
      return false;
    });

    $("#blue_del").click(function(){
      console.log( "click del modry." );
      $("select#player_blue option:selected").each(function(){
        $(this).appendTo("select#players");
      });
      _setChange("blue");
      return false;
    });

    $("#white_add").click(function(){
      console.log( "click add biely." );
      $("select#players option:selected").each(function(){
        $(this).appendTo("select#player_white");
      });
      _setChange("white");
      return false;
    });

    $("#white_del").click(function(){
      console.log( "click del biely." );
      $("select#player_white option:selected").each(function(){
        $(this).appendTo("select#players");
      });
      _setChange("white");
      return false;
    });

 }catch(e){}
 return false;
});
