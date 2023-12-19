document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("nextButton").addEventListener("click", function () {      
        $.ajax({
            type: 'POST', 
            url: 'php/sign_up_coor_next.php', 
            dataType: 'json', 
            success: function (response) {
             return;   
            },
            error: function (error) {
                return;
            }
        });
    });
});