$(document).ready(function () {
    $("#addComzBtn").on("click", function () {

        $.post("traitementComz.php", {
            idComz: $_GET["id"]
        }, function (data) {

        }
        })


})










})