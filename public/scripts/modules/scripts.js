$(document).ready(function () {
    if ($("[data-toggle=mode]").length) {
        $("[data-toggle=mode]").on("click", function () {
            let toggle = $($(this).find("i")[0]).attr("class");

            $("body").toggleClass("dark-mode", { duration: 10 });

            if (toggle.indexOf("fas") > -1) {
                $($(this).find("i")[0]).removeClass("fas").addClass("far");
                $("aside")
                    .removeClass("sidebar-light-info")
                    .addClass("sidebar-dark-info", { duration: 100 });
            } else {
                $($(this).find("i")[0]).removeClass("far").addClass("fas");
                $("aside")
                    .removeClass("sidebar-dark-info")
                    .addClass("sidebar-light-info", { duration: 100 });
            }
        });
    }
});
