




$(document).ready(function() {

    $('.nav-button').click(function() {
        $('.nav-button').toggleClass('change');
    });


    // $("[href]").each(function() {
    //     if (this.href == window.location.href) {
    //         $(this).addClass("nav-active");
    //     }
    // });


    $('input:radio[name=selectwatermark]').change(function () {
        if ($("input[name='selectwatermark']:checked").val() == 'WatermarkText') {
            $('#watermarkedtext').removeAttr("hidden");
        }
        else {
            $('#watermarkedtext').attr("hidden",true);
        }

        if ($("input[name='selectwatermark']:checked").val() == 'WatermarkLogo') {
            $('#watermarkedlogo').removeAttr("hidden");
        }
        else{
            $('#watermarkedlogo').attr("hidden",true);
        }
    });


});