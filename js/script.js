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
        form.removeClass('hidden');

        if (form.is('#time-form')) {
          setTimeFormFields(dbData);
        } else if (form.is('#user-form')) {
          setUserFormFields(dbData);
        }

        $('#form-id').val(dbData.id);
        $('#form-do').val('update');
      },
  );

  $('.btn-delete').click(function() {
    let dbData = $(this).parent().parent().data().dbrecord;
    $('input').each(function() {
      $(this).prop('required', false);
    });
    $('#form-id').val(dbData.id);
    $('#form-do').val('delete');
    $('#form-submit').click();
  });

//TODO: refactor
  $('.btn-detail').click(function() {
    $('.modal-detail').removeClass('hidden');
    let dbData = $(this).parent().parent().data().dbrecord;
    let form = $('form');
    let body = $('.detail-body');
    body.empty();

    if (form.is('#time-form')) {
      setTimeDetail(body, dbData);
    } else if (form.is('#user-form')) {
      setUserDetail(body, dbData);
    }
    setDetail(body, dbData);

    $('#form-id').val(dbData.id);
  });

  $('.close').click(function() {
    $(this).parent().parent().addClass('hidden');
  });

  $('form').submit(function() {
    //TODO: validation
  });

  /**
   * @param {HTMLElement} body
   * @param {JSON} data
   */
  function setDetail(body, data) {
    body.append(getHeadline('Description:'));
    body.append(getParagraph(data.description));
    body.append(getHeadline('Created at:'));
    body.append(getParagraph(data.createdAt));
    body.append(getHeadline('Updated at:'));
    body.append(getParagraph(data.updatedAt));
  }

  /**
   * @param {HTMLElement} body
   * @param {JSON} data
   */
  function setTimeDetail(body, data) {
    $('#modal-headline').text('Details Time Record:');
    body.append(getHeadline('Start at:'));
    body.append(getParagraph(`${data.startDate} ${data.startTime}`));
    body.append(getHeadline('End at:'));
    body.append(getParagraph(`${data.endDate} ${data.endTime}`));
    body.append(getHeadline('Duration:'));
    body.append(getParagraph(data.duration));
  }

  /**
   * @param {HTMLElement} body
   * @param {JSON} data
   */
  function setUserDetail(body, data) {
    $('#modal-headline').text(`Details ${data.firstname} ${data.name}:`);
    body.append(getHeadline('Email:'));
    body.append(getParagraph(data.email));
    body.append(getHeadline('User Number:'));
    body.append(getParagraph(data.userNumber));
    body.append(getHeadline('Has Amin Rights:'));
    body.append(getParagraph((data.isAdmin === '1' ? 'Yes' : 'No')));
  }

  /**
   * @param {JSON} data
   */
  function setTimeFormFields(data) {
    $('#form-start-date').val(data.startDate);
    $('#form-start-time').val(data.startTime);
    $('#form-end-date').val(data.endDate);
    $('#form-end-time').val(data.endTime);
    $('#form-description').val(data.description);
    $('#form-user-id').val(data.userId);
  }

  /**
   * @param {JSON} data
   */
  function setUserFormFields(data) {
    $('#form-name').val(data.name);
    $('#form-firstname').val(data.firstname);
    $('#form-description').val(data.description);
    $('#form-email').val(data.email);
    $('#form-user-number').val(data.userNumber);
    $('#form-is-admin').prop('checked', data.isAdmin === '1');
  }

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

  /**
   * @param {string} text
   * @param {string} tag
   * @returns {*|jQuery}
   */
  function getHeadline(text, tag = 'h4') {
    return $(document.createElement(tag)).text(text);
  }

  /**
   * @param {string} text
   * @returns {*|jQuery}
   */
  function getParagraph(text) {
    return $(document.createElement('p')).text(text);
  }

});