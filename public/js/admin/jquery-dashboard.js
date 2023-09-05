$(document).ready(function() {
    $("#hide").click(function () {
        $(".nav-dashboard").toggleClass("hide-nav-dashboard");
    });

    $(".title-item").click(function () {
        $(".nav-item").slideToggle(100);
        $(".arrow").toggleClass("down");
    });
});
