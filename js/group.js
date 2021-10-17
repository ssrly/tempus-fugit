"use strict";

jQuery(document).ready(function () {

    $('#btn-create').click(function () {
        //    TODO: show
    })

    $('.btn-update').click(function () {
        //    TODO: show
        let groupData = $(this).parent().parent().data().group;
        $('#form-name').val(groupData.name);
        $('#form-description').val(groupData.description);
        if (groupData.isAdmin === '1') {
            $('#form-isadmin').prop("checked", true);
        } else {
            $('#form-isadmin').prop("checked", false);
        }
        $('#form-id').val(groupData.groupId);
        $('#form-do').val('update');
    })

    $('.btn-delete').click(function () {
        let groupData = $(this).parent().parent().data().group;
        $('#form-id').val(groupData.groupId);
        $('#form-do').val('delete');
        $('#form-name').prop("required", false);
        $('#form-submit').click();
    })


    $('.btn-detail').click(function () {
        console.log($(this));
        $(this).find("i").toggleClass('fa-chevron-left');
        $(this).find("i").toggleClass('fa-chevron-down');
        // $(this).parent().parent().append()
    })

});