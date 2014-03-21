/**
 *
 * Created by lance on 1/23/14.
 */

define(['data/edit-units-data', 'views/edit-units-view'], function (Data, View) {

    return function (webAppPath) {
        var me = this;
        var data = new Data(webAppPath);
        var view = new View(me);

        var allUnits = [];

        function save() {
            var viewData = view.viewData();
            $.when(data.save(viewData))
                .done(function (d) {
                })
                .fail(function (f) {
                    console.log(f);
                });
        }

        function unitChange() {
            var viewData = view.viewData();
            var id = viewData.id;

            if (!id) return;

            $.when(data.getUnit(id))
                .done(function (d) {
                    view.viewData(d.value);
                    console.log(d);
                })
                .fail(function (f) {
                    console.log(f);

                });
        }


        function init() {
            $.when(data.getAllUnits())
                .done(function (d) {
                    view.loadUnitTypes(d.value);

                })
                .fail(function (f) {
                    console.log(f);
                });


        }

        init();

        this.save = save;
        this.unitChange = unitChange;

    };

});

