/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    var form = $(".login-form");

    form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
    });
});
$(function () {
    var form = $(".student-form");

    form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
    });
});

$(this).ready(function () {
    $("#Std_Name").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "lookupStud",
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
    $("#Assoc").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: "lookupAssoc",
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



