function Common() {
    this.hProseHttp = hProseHttp;
    this.baseUrl = 'http://www.xf-php.com/index.php'
    this.client = new HproseHttpClient(this.baseUrl,
        ['run'], {timeout: 100000});
}

function hProseHttp(data) {
    this.client.run(data.url, data.param,
        function (result) {
            data.success(result);
        }, function (name, err) {
            console.log(err);
        });
}