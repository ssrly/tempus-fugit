'use strict';

jQuery(document).ready(function() {
  defaultInputs();

  $('#btn-create').click(function() {
    defaultInputs();
    $('form').removeClass('hidden');
    $('#form-do').val('create');
  });

  //TODO: refactor
  $('.btn-update').click(function() {
        let form = $('form');
        let dbData = $(this).parent().parent().data().dbrecord;
        console.log(dbData);
        form.removeClass('hidden');

        if (form.is('#group-form')) {
          $('#form-name').val(dbData.name);
          $('#form-description').val(dbData.description);
          $('#form-is-admin').prop('checked', dbData.isAdmin === '1');
        } else if (form.is('#time-form')) {
          $('#form-start-date').val(dbData.startDate);
          $('#form-start-time').val(dbData.startTime);
          $('#form-end-date').val(dbData.endDate);
          $('#form-end-time').val(dbData.endTime);
          $('#form-description').val(dbData.description);
          $('#form-user-id').val(dbData.userId);
        }

        $('#form-id').val(dbData.id);
        $('#form-do').val('update');
      },
  );

  $('.btn-delete').click(function() {
    let dbData = $(this).parent().parent().data().dbrecord;
    $('#form-id').val(dbData.id);
    $('#form-do').val('delete');
    $('#form-name').prop('required', false);
    $('#form-submit').click();
  });

//TODO: refactor
  $('.btn-detail').click(function() {
    $('.modal-detail').removeClass('hidden');
    let form = $('form');
    let body = $('.detail-body');
    let dbData = $(this).parent().parent().data().dbrecord;
    body.empty();
    if (form.is('#group-form')) {
      $('#modal-headline').text(`Details ${dbData.name}:`);
      body.append(getHeadline('Description:'));
      body.append(getParagraph(dbData.description));
      body.append(getHeadline('Has Amin Rights:'));
      body.append(getParagraph((dbData.isAdmin === '1' ? 'Yes' : 'No')));
      body.append(getHeadline('Created at:'));
      body.append(getParagraph(dbData.createdAt));
      body.append(getHeadline('Updated at:'));
      body.append(getParagraph(dbData.updatedAt));
    } else if (form.is('#time-form')) {
      $('#modal-headline').text('Details Time Record:');
      body.append(getHeadline('Start at:'));
      body.append(getParagraph(`${dbData.startDate} ${dbData.startTime}`));
      body.append(getHeadline('End at:'));
      body.append(getParagraph(`${dbData.dataRecord} ${dbData.endTime}`));
      body.append(getHeadline('Duration:'));
      body.append(getParagraph(dbData.duration));
      body.append(getHeadline('Description:'));
      body.append(getParagraph(dbData.description));
      body.append(getHeadline('Created at:'));
      body.append(getParagraph(dbData.createdAt));
      body.append(getHeadline('Updated at:'));
      body.append(getParagraph(dbData.updatedAt));
      body.append(getHeadline('Last Update by:'));
      body.append(getParagraph(dbData.userName));

    } else if (form.is('#user-form')) {}
    $('#form-id').val(dbData.id);
  });

  $('.close').click(function() {
    $(this).parent().parent().addClass('hidden');
  });

  $('form').submit(function() {
    //TODO: validation
  });

  /** sets form fields to default **/
  function defaultInputs() {
    $('#form-reset').click();

    $('input[type="date"]').each(function() {
      $(this).val(getDateFormat());
    });

    $('input[type="time"]').each(function() {
      $(this).val(getTimeFormat());
    });
  }

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

});