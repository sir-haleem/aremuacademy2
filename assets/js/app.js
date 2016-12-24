var win = $(window);

fxel = $('nav.animation'), eloffset = fxel.offset().top;
contentTwo = $(".content-two");
win.scroll(function () {
    
    if (eloffset < win.scrollTop()) {
        contentTwo.css("height", "45px");
        fxel.addClass("fixed");
        $("#brand-name").css("display", "table-cell");
    } else {

        fxel.removeClass('fixed');
        contentTwo.css("height", "6%");
        $("#brand-name").css("display", "none");
        
    }
});



// ==============================================================

var appFunctions = {

    slider: function () {
        return $('.slider');
    },
    testimonials: function () {
        return $('.row.testimonials')
    },
    applicationForm: function () {
        return $('form.application-form');
    },
    applicationField: function () {
        return $('input.applicants');
    },
    contactForm: function () {
        var contact = $('form.contact-form');

        return contact;
    },

    contactFormName: function () {
        return $('.contact-form #name').val().length;
    },

    contactFormEmail: function () {
        return $('.contact-form #email').val().length;
    },

    contactFormBody: function () {
        return $('.contact-form #body').val().length;
    },

    contactFormSubect: function () {
        return $('.contact-form #subject').val().length;
    }



}

$(document).on('ready', function () {
    
    appFunctions.applicationForm().submit(function (evt) {
        
        var fieldLength = appFunctions.applicationField().val().length;
        if (fieldLength < 0 || fieldLength === 0) {

            $('p.help-block').html('<small class="text-danger">*</small> Provide A Valid Jamb Number');
        }
        
        if (fieldLength < 10 || fieldLength > 10 && fieldLength !== 0) {
            

            $('p.help-block').html('<small class="text-danger">*</small> Your Jamb number should be 10 characters');
        }

        if (fieldLength === 10) {
            
            var jqXHR = $.ajax({
                accepts: 'json',
                complete: function (xhr) {
                },
                url: "/application/check_admission.php",
                type: "POST",
                data: {jamb_number: appFunctions.applicationField().val() },
                dataType: 'json',
            });
            jqXHR.done(function (data) {
                console.log(data);
                if(data.status == "Not Admitted") {
                    $('p.help-block').
                        html('You are not yet admitted, your application is still <strong>' + data.message + '</strong>')
                        .addClass("text-info");
                }

                if(data.status == "Admitted") {
                    alert(data.status);
                    $('p.help-block').
                        html('You have been admitted, download your <a href="/application/admission-letter.php?' 
                            + data.jamb_number + 
                            '"><strong class="text-danger">Admission Letter</strong></a>');
                }
            });

            jqXHR.fail(function () {
                // console.log(arguments);
                $('p.help-block').
                        html('An error occurred while requesting the server');
            });
        }
 evt.preventDefault();
    });

    appFunctions.contactForm().submit(function (evt) {
        
        if(appFunctions.contactFormName() < 2) {
            evt.preventDefault();
        } 
        
        if(appFunctions.contactFormEmail() < 2) {
            evt.preventDefault();
        }
        
        if(appFunctions.contactFormSubect() < 4) {
            evt.preventDefault();
        } 
        
        if(appFunctions.contactFormBody() < 5) {
            evt.preventDefault();
        } 
         
    });

});
