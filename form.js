
setTimeout(function () {
    alert('Tu dors ?');
}, 100000);


$(document).ready(function () {
    function updateInputProgress() {
        var filledFields = 0;
        $("#input-progress").find("input, select, textarea").each(function () {
            if ($(this).val() !== "") {
                filledFields++;
            }
        });
        var percent = Math.ceil(100 * filledFields / totalFields);
        $("#progress-inputs .progress-bar").attr("aria-valuenow", percent).width(percent + "%");
        $("#sr-only").html(percent + "% Complete");

        return percent;
    }

    //Input Progress
    var totalFields = $("#input-progress").find("input, select, textarea").length;
    $("#input-progress").click(function () {
        updateInputProgress();
    });
    $("#input-progress .btn-primary").click(function () {
        var percent = updateInputProgress();
        if (percent === 100) {
            alert("Tout les champs sont remplis vous pouvez envoyer votre message !");
        }
    })

});
