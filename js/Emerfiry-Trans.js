/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var comp = document.getElementById('complainttitle');
var compdown = document.getElementById('complaint');

compdown.onchange = function () {
    comp.value = this.value; //to appened
    //mytextbox.innerHTML = this.value;
};

var disp = document.getElementById('dispositiontitle');
var dispdown = document.getElementById('disposition');

dispdown.onchange = function () {
    disp.value = this.value; //to appened
    //mytextbox.innerHTML = this.value;
};

var rema = document.getElementById('remarkstitle');
var remadown = document.getElementById('remakrs');

remadown.onchange = function () {
    rema.value = this.value; //to appened
    //mytextbox.innerHTML = this.value;
};

$(document).ready(function () {
    $('.sidebar').hover(function () {
        $(".sidebar").removeClass("compact");
    });
    $('.sidebar').mouseleave(function () {
        $(".sidebar").addClass("compact");
    });
});
 

