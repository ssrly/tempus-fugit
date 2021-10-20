'use strict';

jQuery(document).ready(function() {
  setDefaultInputs();

  if (!isLoggedIn()) {
    $('.login-out').click(function(event) {
      event.preventDefault();
      $('#login-form').toggleClass('hidden');
    });
  } else {
    setLogoutLink();
  }

  $('#btn-create').click(function() {
    setDefaultInputs();
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

  $('.btn-register').click(function() {
    redirect('registration');
  });

  $('.btn-time').click(function() {
    redirect('times', $(this).data().uid);
  });

  $('.close').click(function() {
    $(this).parent().parent().addClass('hidden');
  });

  if ($('.container').is('#registration-container')) {
    $('#user-form').toggleClass('hidden');
  }

  //TODO: validate
  $('form').submit(function(event) {
    // event.preventDefault();
    // if (form.is('#time-form')) {
    //   validateUserForm($(this));
    // } else if (form.is('#time-form')) {
    //   validateTimeForm($(this));
    // }
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
  function setDefaultInputs() {
    $('#form-reset').click();

    $('input[type="date"]').each(function() {
      $(this).val(getDateFormat());
    });

    $('input[type="time"]').each(function() {
      $(this).val(getTimeFormat());
    });
  }

  /**
   * checks cookies
   * @returns {boolean}
   */
  function isLoggedIn() {
    let cookies = document.cookie.split(';');
    for (let cookie of cookies) {
      cookie = cookie.split('=');
      if (cookie[0] === 'logged_in') {
        return true;
      }
    }
    return false;
  }

  /** sets Login to Logout **/
  function setLogoutLink() {
    let loginOut = $('.login-out');
    loginOut.click(function() {
      setLogoutForm();
    });
    loginOut.find('span').text('Logout');
    loginOut.find('i').toggleClass('fa-sign-in-alt');
    loginOut.find('i').toggleClass('fa-sign-out-alt');
  }

  /** removes form sets logout form **/
  function setLogoutForm() {
    let modalContent = $('.modal-content');
    modalContent.find('form').remove();
    $.get({
      url: './tmpl/form/logout.inc.php',
      dataType: 'text',
    }).done(function(data) {
      modalContent.append(data);
    });
  }

  /**
   * @param {string} page
   * @param {string} uid
   */
  function redirect(page, uid = '') {
    let root = window.location.href;
    root = root.substr(0, root.indexOf('?page='));
    page = `${root}?page=${page}`;
    if (uid) {
      page = `${page}&uid=${uid}`;
    }
    window.location.replace(page);
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

  $.validator.addMethod('nameFormat', function(value) {
    return value.match(/^[a-z\s\-\.]*$/i);
  });

  $.validator.addMethod('mailFormat', function(value) {
    return value.match(/^[^@\s]+@[^@\s]+\.[^@\s]+$/);
  });

  $.validator.addMethod('userNumberFormat', function(value) {
    return value.match(/^[0-9a-z\s\-\.]*$/i);
  });

  $.validator.addMethod('pwdFormat', function(value) {
    return value.match(/^[0-9a-z\s\-\.]*$/i);
  });

  function validateUserForm(form) {
    form.validate({
      rules: {
        name: {
          required: true,
          nameFormat: true,
        },
        firstname: {
          required: true,
          nameFormat: true,
        },
        email: {
          required: true,
          mailFormat: true,
        },
        pwd: {
          required: true,
          pwdFormat: true,
        },
        pwd_repeat: {
          required: true,
          equalTo: '#form-pwd-repeat',
        },
      },
      messages: {
        name: {
          required: 'Bitte Nachname eingeben',
          nameFormat: 'Nur Buchstaben, Leerzeichen, - und . sind erlaubt',
        },
        firstname: {
          required: 'Bitte Vorname eingeben',
          firstNameFormat: 'Nur Buchstaben, Leerzeichen, - und . sind erlaubt',
        },
        email: {
          required: 'Bitte E-Mail eingeben',
          mailFormat: '@-Zeichen muss vorhanden sein',
        },
        pwd: {
          required: 'Bitte Passwort eingeben',
          rangelength: '6 bis 12 Zeichen werden benoetigt',
        },
        pwd_repeat: {
          required: 'Bitte Passwort wiederholen',
          equalTo: 'Passwörter stimmen nicht überein',
        },
      },
    });
  }

});