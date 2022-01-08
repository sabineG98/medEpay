$("document").ready(function () {
    $("#buttton").click(function () {
        $('#myform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "listrecord.php",
                type: "GET",
                data: "data",
                success: function (data) {
                    $("#form_output").html(data);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            }); // AJAX Get Jquery statment
        });
    }); // Click effect     
}); //Begin of Jquery Statement // JavaScript Document