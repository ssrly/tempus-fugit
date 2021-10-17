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
    $('#form-isadmin').prop('checked', groupData.isAdmin === '1');
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
    let body = $('.detail-body');
    $('.modal-detail').removeClass('hidden');
    body.empty();
    body.append(getHeadline('Name:'));
    body.append(getParagraph(groupData.name));
    body.append(getHeadline('Description:'));
    body.append(getParagraph(groupData.description));
    body.append(getHeadline('Has Amin Rights:'));
    body.append(getParagraph((groupData.isAdmin === '1' ? 'Yes' : 'No')));
    body.append(getHeadline('Created at:'));
    body.append(getParagraph(groupData.createdAt));
    body.append(getHeadline('Updated at:'));
    body.append(getParagraph(groupData.updatedAt));
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