/**
 * Created by lance on 1/23/14.
 */
define(['data/data'], function (Data) {

    return function (webAppPath) {
        var data = new Data(webAppPath);

        function getAllUnits() {
            var url = data.urls.units + "?action=getAll";
            var promise = data.ajax(url, false, false, 'json', data.contentTypes.json);

            return promise;
        }

        function getUnit(id) {
            if (!id) return $.Deferred().reject('invalid id');
            var url = data.urls.units + '?action=get&data={"id":"' + id + '"}';
            var promise = data.ajax(url, false, false, 'json', data.contentTypes.json);

            return promise;
        }

        function save(unit) {
            var promise = data.ajax(
                data.urls.units + '?action=update', JSON.stringify(unit), true, 'json', data.contentTypes.json
            );

            return promise;
        }


        this.getAllUnits = getAllUnits;
        this.save = save;
        this.getUnit = getUnit;
    };

});