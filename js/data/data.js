/**
 * Created by David on 11/19/13.
 */

define(function () {
    return function (webAppName) {
        var contentTypes = {
            url: 'application/x-www-form-urlencoded; charset=UTF-8',
            json: 'application/json; charset=UTF-8'
        };

        function ajax(url, data, isPost, dataType, contentType) {

            return $.ajax({
                url: webAppName + url,
                type: isPost ? "POST" : "GET",
                data: data || '',
                dataType: dataType || '',
                contentType: contentType || contentTypes.url
            }).promise();

        }

        this.ajax = ajax;
        this.contentTypes = contentTypes;
        this.urls = {
            editUnits: '/EditUnits.php',
            editBuildings: '/EditBuildings.php',
            units: '/controllers/units.php',
            buildings: '/controllers/buildings.php'

        };

    };
});
