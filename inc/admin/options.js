    /*
    * @package I2sIngenierie
    * @subpackage Admin JS Options
    * @Author @5Baddi - http://www.baddi.info
    * @Version 1.0.0
    */

    jQuery(function($){
        var frame = wp.media({
            title   :   'Téléchargé des fichiers',
            button  :   {
                text    :   'Envoyer les fichiers'
            },
            multiple    :   true
        });

        $("#uploader").click(function(e){
           e.preventDefault();

            frame.open();
        });

        frame.on('select', function(){
            var attachment = frame.state().get('selection').toJSON();
            var input = $("input[name=result]");
            $("#num").text(attachment.length);
            input.val("");
            $.each(attachment, function(key, value){
                if(!input.val()){
                    input.val(value.url);
                }else{
                    input.val(input.val() + ";" + value.url);
                }

            });
        });
    });