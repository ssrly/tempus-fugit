'use strict';

jQuery(document).ready(function() {

  $('#btn-create').click(function() {
    $('#form').removeClass('hidden');
  });

  $('.btn-update').click(function() {
    $('#form').removeClass('hidden');
    let groupData = $(this).parent().parent().data().group;
    $('#form-name').val(groupData.name);
    $('#form-description').val(groupData.description);
    if (groupData.isAdmin === '1') {
      $('#form-isadmin').prop('checked', true);
    } else {
      $('#form-isadmin').prop('checked', false);
    }
    $('#form-id').val(groupData.groupId);
    $('#form-do').val('update');
  });

  $('.btn-delete').click(function() {
    let groupData = $(this).parent().parent().data().group;
    $('#form-id').val(groupData.groupId);
    $('#form-do').val('delete');
    $('#form-name').prop('required', false);
    $('#form-submit').click();
  });

  $('.btn-detail').click(function() {
    let groupData = $(this).parent().parent().data().group;
    $('.modal-detail').removeClass('hidden');
    $('.detail-body').empty();
    $('.detail-body').append(getHeadline('Name:'));
    $('.detail-body').append(getParagraph(groupData.name));
    $('.detail-body').append(getHeadline('Description:'));
    $('.detail-body').append(getParagraph(groupData.description));
    $('.detail-body').append(getHeadline('Has Amin Rights:'));
    $('.detail-body').
        append(getParagraph((groupData.isAdmin === '1' ? 'Yes' : 'No')));
    $('.detail-body').append(getHeadline('Created at:'));
    $('.detail-body').append(getParagraph(groupData.createdAt));
    $('.detail-body').append(getHeadline('Updated at:'));
    $('.detail-body').append(getParagraph(groupData.updatedAt));
  });

  $('.close').click(function() {
    $(this).parent().parent().addClass('hidden');
  });

  $('#form').submit(function() {
    //TODO: validation
  });

  function getHeadline(text, tag = 'h4') {
    return $(document.createElement(tag)).text(text);
  }

  function getParagraph(text) {
    return $(document.createElement('p')).text(text);
  }

});