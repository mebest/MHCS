$(function () {
    var form = $(".medi-form");

    form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
    });
});

$(this).ready(function () {
    $("#complaint").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "complaintlookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                                function (data) {
                                    if (data.response == "true") {
                                        add(data.message);
                                        console.log(data);
                                    }
                                },
                    });
                },
    });
});

$(this).ready(function () {
    $("#treatment").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "treatmentlookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                                function (data) {
                                    if (data.response == "true") {
                                        add(data.message);
                                       
                                        console.log(data.message);
                                    }
                                },
                    });
                },
    });
});
$(this).ready(function () {
    $("#medication").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "medicationlookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                                function (data) {
                                    if (data.response == "true") {
                                        add(data.message);
                                        console.log(data);
                                    }
                                },
                    });
                },
    });
});
$(this).ready(function () {
    $("#disposition").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "dispositionlookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                                function (data) {
                                    if (data.response == "true") {
                                        add(data.message);
                                        console.log(data);
                                    }
                                },
                    });
                },
    });
});
$(this).ready(function () {
    $("#remarks").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "remarkslookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                                function (data) {
                                    if (data.response == "true") {
                                        add(data.message);
                                        console.log(data);
                                    }
                                },
                    });
                },
    });
});

$(document).ready(function () {
    $('.sidebar').hover(function () {
        $(".sidebar").removeClass("compact");
    });
    $('.sidebar').mouseleave(function () {
        $(".sidebar").addClass("compact");
    });
});

$(document).ready(function() {
        $("#lightgallery").lightGallery(); 
    });