/**
 * Created by lance on 1/23/14.
 */

define(function () {
    return function (controller) {
        var me = this;

        function viewData(unit) {
            if (!unit) {
                return {
                    id: $('#unit_id').find(':selected').val(),
                    description: $('#UnitDescription').val(),
                    health: $('#UnitHealth').val(),
                    weak_curse_mod: $('#WeakCurseMod').val(),
                    weak_buff_mod: $('#WeakBuffMod').val(),
                    strong_curse_mod: $('#StrongCurseMod').val(),
                    strong_buff_mod: $('#StrongBuffMod').val(),
                    parent_building: $('#Parent_Structure').val(),
                    has_super_powers: $('#has_superpower').is(':checked'),
                    can_fly: $('#can_fly').is(':checked'),
                    can_drive: $('#can_drive').is(':checked')

                };

            }

//            $('#unit_id').val(unit.id);
            $('#UnitDescription').val(unit.description);
            $('#UnitHealth').val(unit.health);
            $('#WeakCurseMod').val(unit.weak_curse_mod);
            $('#WeakBuffMod').val(unit.weak_buff_mod);
            $('#StrongCurseMod').val(unit.strong_curse_mod);
            $('#StrongBuffMod').val(unit.strong_buff_mod);
            $('#Parent_Structure').val(unit.parent_building);
            $('#has_superpower').attr('checked', unit.has_super_powers);
            $('#can_fly').attr('checked', unit.can_fly);
            $('#can_drive').attr('checked', unit.can_drive);

            return me;

        }

        function loadUnitTypes(units) {
            if (!units) return;
            var i = 0;

            $('#unit_id').append($('<option val=" "> </option>'));

            for (i = 0; i < units.length; i++) {
                $('#unit_id').append($('<option val="{0}">{0}</option>'.replace(/\{0\}/g, units[i].id)));
            }

        }

        function init() {
            $('#submit').on('mouseup', function () {
                controller.save();
            });

            $('#unit_id').on('change', function () {
                controller.unitChange();

            });


        }

        init();


        this.viewData = viewData;
        this.loadUnitTypes = loadUnitTypes;

    };
});

