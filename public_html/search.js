$(function() {
    $("#term").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "zipcity.php",
                cache: false,
                data: {
                    term: request.term
                },
                dataType: "json",
                method: "post",
                success: function(data) {
                    console.log(data);
                    result = data.response;
                    if (result = "Fail") {
                        $("#results").empty().append(data.response)
                    }
                        response(data);
                    }
                    return false;
                }
            });
        },
        select: function(event, ui) {
            $('#term').val(ui.item.value);
            $("#results").empty().append("ZIP:<br>")
            $("#results").append(ui.item.id)
            return false;
        },
    })
})