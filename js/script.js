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
    $('#form-is-admin').prop('checked', groupData.isAdmin === '1');
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

  $(this).find('input[type="date"]').each(function() {
    $(this).val(getDateFormat());
  });

  $(this).find('input[type="time"]').each(function() {
    $(this).val(getTimeFormat());
  });

  /**
   * @returns {string}
   */
  function getDateFormat() {
    let now = new Date();
    let month = ('0' + (now.getMonth() + 1)).slice(-2);
    let day = ('0' + now.getDate()).slice(-2);

    return `${now.getFullYear()}-${month}-${day}`;
  }

  /**
   * @param {Date} time
   * @returns {string}
   */
  function getTimeFormat(time) {
    let now = new Date();
    let hours = ('0' + now.getHours()).slice(-2);
    let minutes = ('0' + now.getMinutes()).slice(-2);

    return `${hours}:${minutes}`;
  }

  function getHeadline(text, tag = 'h4') {
    return $(document.createElement(tag)).text(text);
  }

  function getParagraph(text) {
    return $(document.createElement('p')).text(text);
  }

})
;