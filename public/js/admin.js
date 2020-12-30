// $(document).ready(function() {
// 	$(".search-icon").click(function() {
// 		$(this).css("width", "200px");
// 	});


// });
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
  jQuery.fn.textNodes = function() {
  return this.contents().filter(function() {
    return (this.nodeType === Node.TEXT_NODE && this.nodeValue.trim() !== "");
  });
}
}(jQuery));

$(document).ready(function() {
  $("#quan").inputFilter(function(value) {
    return /^\d*$/.test(value);    // Allow digits only, using a RegExp
  });

  $("#table_id").DataTable({
        "order": [[ 0, "desc" ]]
  })
    ;
  $("#table_id_filter").hide();
  $("#table_id_length label").textNodes().replaceWith('');
  $("#table_id_info").hide();
  $("#table_id_previous").textNodes().replaceWith('Précédent');
  $("#table_id_next").textNodes().replaceWith('Suivant');
  $("#table_id_length select").addClass("form-control");
  $("#table_id_length select").addClass("form-control-sm");
  $("#table_id_wrapper").addClass("tableLength");
  $("table#table_id").removeClass("dataTable");


});

function toggle()
{
	var x=document.getElementById("menu");
	x.style.display==='none'? x.style.display='block':x.style.display='none';
	
}
