var web;
$(document).ready(function () {
    jQuery.ajax({
        type: "POST",
        url: "fetch_alert_Status",
        dataType: 'json',
        success: function (data) {
            var key = Object.keys(data.data).length;
            var i;      
            for (i = 0; i < key; i++) {
                var s = data.data[i].id;
//                $.Notify({
//                    timeout: 13256,
//                    type: 'warning',
//                    caption: 'Out of Stock',
//                    content: s
//                });
                if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new window.Notification('Not Enough Left:', {
      icon: '../images/TranscodedWallpaper.png',
      body: "Item: "+s,
    });

    notification.onclick = function () {
      window.open("Inventory_Management");      
    };

  }
            }
        }
    });
});


$(document).ready(function () {
    jQuery.ajax({
        type: "POST",
        url: "fetch_alert_stock",
        dataType: 'json',
        success: function (data) {
            var key = Object.keys(data.data).length;
            var i;      
            for (i = 0; i < key; i++) {
                var s = data.data[i].id;
//                $.Notify({
//                    timeout: 13256,
//                    type: 'warning',
//                    caption: 'Out of Stock',
//                    content: s
//                });
                if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new window.Notification('Out of Stock', {
      icon: '../images/TranscodedWallpaper.png',
      body: "Item: "+s,
    });

    notification.onclick = function () {
      window.open("Inventory_Management");      
    };

  }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

