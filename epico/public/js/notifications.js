Notifications = {
    data: [],

    initNotifications: function(){
        this.ajaxCall();
        this.initTimer();
    },

    initTimer: function() {
        setInterval(this.ajaxCall, 10000);
    },

    ajaxCall: function() {
        $.get({
            method: "get",
            //dataType: "json",
            url: "/notifications/get",
            //data: this.data,
            success: function(data) {
                $('.notifications').html(data);
            }
        });
    }
};

$(document).ready(function(){
    Notifications.initNotifications();
});