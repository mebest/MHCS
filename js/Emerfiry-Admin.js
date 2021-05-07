
$(this).ready(function () {
    $("#manageStudentTable").DataTable({
        ajax: {
            "url": "fetch_data",
            "type": "POST"
        }
    });
});

$(this).ready(function () {
    $("#manageStudentAccountingTable").DataTable({     
        ajax: {
            "url": "fetch_data_account",
            "type": "POST",
            
        }
    });
});

$(this).ready(function () {
    $("#manageStudentAssessTable").DataTable({     
        ajax: {
            "url": "fetch_dataAssess",
            "type": "POST",
            
        }
    });
});

$(this).ready(function () {
    $("#manageStudentRecordTable").DataTable({
        ajax: {
            "url": "student_data",
            "type": "POST"
        }
    });
});
$(this).ready(function () {
    $("#manageProcessTable").DataTable({
        ajax: {
            "url": "Complain_Process",
            "type": "POST"
        }
    });
});

$(this).ready(function () {
    $("#studentAccountTable").DataTable({
        ajax: {
            "url": "studentaccount_data",
            "type": "POST"
        }
    });
});
$(this).ready(function () {
    $("#adminAccountTable").DataTable({
        ajax: {
            "url": "adminaccount_data",
            "type": "POST"
        }
    });
});
$(this).ready(function () {
    $("#parentAccountTable").DataTable({
        ajax: {
            "url": "parentaccount_data",
            "type": "POST"
        }
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

function openCustom(code) {
    metroDialog.create({
        options: {  
            overlayColor: "op-dark",
            overlayClickClose: true
        },
        title: "<span class='mif-info'></span> Removing Item",
        content: "Are You Sure To Delete The Item?",
        actions: [
            {
                title: "Ok",
                onclick: function (el) {
                    location.href='deleteItem?Token='+code;
                }
            },
            {
                title: "Cancel",
                cls: "js-dialog-close"
            }
        ]     
    });
}


function confirmation() {
    return confirm('Are you sure?');
}

