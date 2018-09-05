    /*
     * @package I2sIngenierie
     * @subpackage JS Script
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */


jQuery(document).ready(function(){
    jQuery(".company-slider").lightSlider({
        auto:true,
        loop:true,
        pauseOnHover:true,
        keyPress:true,
        autoWidth:true,
        item:5,
        slideMove:2,
        speed:600,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                    slideMove:1
                }
            }
        ]
    });

    jQuery(function(){
       jQuery("form[name='contact']").validate({
          rules: {
                name: "required",
                subject: "required",
                email: {
                    required: true,
                    email: true
                },
                msg: "required",
          },
           messages: {
                name: "Entrez votre nom",
                subject: "Entrez le sujet du message",
                email: "Entrez votre correct email",
                msg: "Entrez votre message..."
           },
           submitHandler:
               function(form){
                  form.submit();
               }
       });
    });

    //jQuery("time.timeago").timeago();
});