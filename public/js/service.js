var $this, $options, $input, $sPlaceholder, $select, $fakeBtn;

$(document).on("click", ".service:not([data-disabled])", function (event) {
    event.preventDefault();
    showLoader();
    $this = $(this);

    $options = {
        target: $this.data("target")
    };

    $.ajax({
        "dataType": "json",
        "type": "GET",
        "url": $(this).attr("href")
    }).done(function (data) {

        actions($this, data, $options);
    }).fail(function () {
        alert("error");
    }).always(function () {
        removeLoader();
    });

    return false;
});
$(document).on("submit", ".formservice:not([data-disabled])", function (event) {

    event.preventDefault();

    var $form = $(this);
    var $btnSubmit = lockForm($form);
    var $this = $(this);

    $options = {
        target: $this.data("target")
    };

    $.ajax({
        "dataType": "json",
        "type": "POST",
        "url": $form.attr("action"),
        "data": $form.serialize()
    }).done(function (data) {
        data.__serialized = $form.serializeJSON();
        clearErrors($form);
        actions($this, data, $options);
    }).fail(function () {
        unlockForm($btnSubmit);
        validateForm($form, {
            "general": "A problem occurred, please try again"
        });
    }).always(function () {
        unlockForm($btnSubmit);
    });
});
$(document).on("click", ".action-multiple-submit:not([data-disabled]), .formsubmit:not([data-disabled])", function (event) {
    event.preventDefault();

    var $this = $(this);
    var $form = $($this.data("target"));
    var $btnSubmit = lockForm($form);

    $.ajax({
        dataType: "json",
        type: "POST",
        url: $form.attr("action"),
        data: $form.serialize()
    })
            .done(function (data) {
                data.__serialized = $form.serializeJSON();
                clearErrors($form);

                actions($form, data);

            })
            .fail(function () {
                unlockForm($btnSubmit);
                validateForm($form, {
                    general: 'A problem occurred, please try again'
                });
            })
            .always(function () {
                unlockForm($btnSubmit);
            });
});
$(document).on("blur", "[data-submit-onblur]", function (event) {
    event.preventDefault();

    var $this = $(this);
    var $form = $($this.data("target"));
    var $btnSubmit = lockForm($form);

    $.ajax({
        dataType: "json",
        type: "POST",
        url: $this.data("submit-onblur"),
        data: $form.serialize()
    })
            .done(function (data) {
                data.__serialized = $form.serializeJSON();
                clearErrors($form);

                actions($form, data);

            })
            .fail(function () {
                unlockForm($btnSubmit);
                validateForm($form, {
                    general: 'A problem occurred, please try again'
                });
            })
            .always(function () {
                unlockForm($btnSubmit);
            });
});

window.actions = function ($this, data, options) {



    if (typeof (data.callbacks) === "undefined") {
        return;
    }

    //need object-keys polyfill for retrocompatibility
    Object.keys(data.callbacks).forEach(function (key) {
        //[$this, data, options] are default params, to those one we add eventually other params (data.callbacks[key].params)
        window[key].apply(null, [$this, data, options].concat(data.callbacks[key].params));
    });
};

window.showLoader = function () {
    $("body").append('<div class="service-loader ajax-progress ajax-progress-throbber"><div class="throbber">&nbsp;</div><div class="message">Please wait...</div></div>');
};

window.removeLoader = function () {
    $(".service-loader").remove();
};

window.lockForm = function (form) {
    showLoader();

    return form.find("input[type='submit'], .form-submit")
            .attr("disabled", "disabled");
};

window.unlockForm = function ($btnSubmit) {
    removeLoader();

    $btnSubmit.removeAttr('disabled');
};

window.clearErrors = function ($form) {

    $form.find(".form-general-feedback").html("");
    var errorMessages = $form.find(".info-error");
    errorMessages.parents("fieldset").removeClass("form-error");
    errorMessages.remove();
};

window.validateForm = function ($form, data, options, errors) {

    //console.log(errors);
    //console.log(param2);

    clearErrors($form);

    $form.find(".form-general-feedback").css({display: 'block'}).html(data.message);

    if (!$.isEmptyObject(errors)) {
        $.each(errors, function (inputgroupname, inputgroups) {

            $.each(inputgroups, function (label, inputerrors) {

                $.each(inputerrors, function (error, message) {

                    if (inputgroupname == "default") {
                        $input = $form.find("[name=" + label + "], [name=" + label + "\\[\\]]");
                    }
                    //array input, example: user[firstname]
                    else {
                        $input = $form.find("[name=" + inputgroupname + "\\[" + label + "\\]], [name=" + inputgroupname + "\\[\\]], [name=" + inputgroupname + "\\[" + label + "\\]\\[\\]]");
                    }

                    $input
                            .parents("fieldset")
                            .addClass("form-error")
                            .append("<em class='info-error'>" + message + "</em>");
                });

            });
        });
    }
};

window.reload = function ($this, data, options) {
    window.location.reload();
};

window.redirect = function ($this, data, options, url) {
    window.location.href = url;
};

window.clearFields = function ($form, data, options) {
    $form[0].reset();
};

window.render = function ($form, data, options, template) {
    $(options.target).html(template);
};
window.hide = function ($this, data, options, element) {
    $(element).hide();
};
window.openFancyBox = function($form, data, options, triggerId, popupId, message){
    $("#" + triggerId).trigger('click');
    $("#" + popupId).find('p').html(message);
};





