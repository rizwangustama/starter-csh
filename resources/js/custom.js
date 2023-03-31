export default {
    /** init */
    init() {
        jQuery(document).ready(function ($) {
            $("#registration-navbar").on("click","button",function() {
                let panel = $(this).attr("data-panel");
                // console.log(panel)
                if (panel == "login") {
                    $("#login-panel").show();
                    $("#register-panel").hide();
                }else{
                    $("#register-panel").show();
                    $("#login-panel").hide();
                }
            })
        });
    }
}