
function loadColor(date) {
    
    $(document).ready(function () {
        
        $.ajax({
            url: "controllers/CalendarController.php",
            async: true,
            type: "POST",
            data: { date : date },
            success: function(pct) {
                if (pct < 50) {
                    $("#" + date)[0].style.background = "#99e075";
                } else if (pct >= 50 && pct < 100) {
                    $("#" + date)[0].style.background = "#e0d775";
                } else if (pct == 100){
                    $("#" + date)[0].style.background = "#e07575";
                }
            }
        });
        
    });
    
}

