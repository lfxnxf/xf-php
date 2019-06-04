
var common = new Common();

$(function () {
    common.hProseHttp({
        url: 'user/login',
        param: {
            userName: 'XueFeng',
            password: 'cxu_abc'
        },
        success: function (result) {
            console.log(result);
        }
    });
});

