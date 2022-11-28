$(function() {
	var availableTags = [
    {label: "CNMT 100: Principles of Computing", value: "1"},
    {label: "CNMT 110: Introduction to Programming", value: "2"},
    {label: "CNMT 210: Web Design and Development I", value: "3"},
    {label: "CNMT 310: Production Programming", value: "4"},
    {label: "CNMT 480: Capstone", value: "5"},
    ];
    $( "#tags" ).autocomplete({
		source: availableTags,
	    select: function(event,ui) {
			$("#tags").val(ui.item.label);
			$("#selected_item").val(ui.item.value);
			event.preventDefault();  
		}
    });
  } );