/**
 * Created by lance on 2/6/14.
 */

define(function () {

    return function (controller) {


        function data(viewData) {

            if (!viewData) {
                return {
                    id: $('#buildings').val(),
                    name: '',
                    health: $('#BuildingHealth').val(),
                    can_parent: $('#can_parent').is(':checked'),
                    pop_provided: $('#PopProvided').val()
                };
            }

            $('#buildings').val(viewData.id);
            $('#BuildingHealth').val(viewData.health);
            $('#can_parent').attr('checked', viewData.can_parent);
            $('#PopProvided').val(viewData.pop_provided);


        }

        function loadBuildingTypes(buildings) {
            if (!buildings) return;
            var i = 0;

            $('#buildings').append($('<option val=""> </option>'));

            for (i = 0; i < buildings.length; i++) {
                $('#buildings').append($('<option val="{0}">{0}</option>'.replace(/\{0\}/g, buildings[i].id)));
            }

        }

        function init() {
            $('#submit').on('mouseup', function () {
                controller.save();
            });

            $('#buildings').on('change', function () {
                controller.buildingChange();

            });

        }

        init();


    }

});
