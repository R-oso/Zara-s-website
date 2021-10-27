require('./bootstrap');
(function ($) {
    'use strict';

    /*[ File Input Config ]
        ===========================================================*/

    try {

        let file_input_container = $('.js-input-file');

        if (file_input_container[0]) {

            file_input_container.each(function () {

                let that = $(this);

                let fileInput = that.find(".input-file");
                let info = that.find(".input-file__info");

                fileInput.on("change", function () {

                    let fileName;
                    fileName = $(this).val();

                    if (fileName.substring(3,11) == 'fakepath') {
                        fileName = fileName.substring(12);
                    }

                    if(fileName == "") {
                        info.text("No file chosen");
                    } else {
                        info.text(fileName);
                    }

                })

            });

        }



    }
    catch (e) {
        console.log(e);
    }

})(jQuery);
