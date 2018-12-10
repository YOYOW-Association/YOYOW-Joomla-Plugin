function getScript(url, success) {
    var script = document.createElement('script');
    script.src = url;
    var head = document.getElementsByTagName('head')[0],
        done = false;
    // Attach handlers for all browsers
    script.onload = script.onreadystatechange = function () {
        if (!done && (!this.readyState
            || this.readyState == 'loaded'
            || this.readyState == 'complete')) {
            done = true;
            success();
            script.onload = script.onreadystatechange = null;
            head.removeChild(script);
        }
    };
    head.appendChild(script);
}

jQuery(function () {
    jQuery('#button-connect-yoyow').click(function () {
        jQuery.ajax({
            url: "index.php?option=com_yoyow&task=ApiYoyow.getSign",
            context: document.body
        }).done(function (response) {
            let authData = JSON.parse(response);
            checkUserLoged(authData);

            let data = authData['data'];
            let url = data['url'];
            delete data['url'];
            let out = [];

            for (let key in data) {
                if (data.hasOwnProperty(key)) {
                    out.push(key + '=' + encodeURIComponent(data[key]));
                }
            }

            out = out.join('&');
            window.location.href = url + '?' + out;
        });
    });

    jQuery('#button-connect-yoyow-qr').click(function () {

        jQuery.ajax({
            url: "index.php?option=com_yoyow&task=ApiYoyow.getSign",
            data: {'isqr': true},
            context: document.body
        }).done(function (response) {
            response = JSON.parse(response);
            checkUserLoged(response);
            jQuery('#imageQR').attr("src", "data:image/png;base64," + response['data']);
        });


    });

    function checkUserLoged(authData){
        if (authData['error']) {
            Joomla.renderMessages({'error': [Joomla.JText._(authData['error'])]});
            exit;
        }
    }

    jQuery('#deleteYoyowAccount').click(function () {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "index.php?option=com_yoyow&task=ApiYoyow.deleteUser", true);
        xhttp.send();
    });
});