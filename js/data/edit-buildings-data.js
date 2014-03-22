/**
 * Created by lance on 2/6/14.
 */

define(['data/data'], function (Data) {

    return function (webAppPath) {
        var data = new Data(webAppPath);


        function getAll() {
            var url = data.urls.buildings + "?action=getAll";
            var promise = data.ajax(url, false, false, 'json', data.contentTypes.json);

            return promise;
        }


    }
});