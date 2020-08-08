
$(document).ready(function () {
    $("#signUp").click(function () {
       document.getElementById('container').classList.add("right-panel-active");
    });
    $("#signIn").click(function () {
        document.getElementById('container').classList.remove("right-panel-active");
    });
});
