import e2SpinningAnimationStartStop from './e2-modules/e2SpinningAnimationStartStop'
import e2Ajax from './e2-modules/e2Ajax'
import e2NiceError from './e2-modules/e2NiceError'

var e2TimeOut = null
var dbCount = 0
var bingo = false
var serverResponse = false
var initialCheck = true
var xhrCheckDBConfig, xhrListDatabases

var $spinner = $('.e2-ajax-loading')
var spinnerHiddenModifier = 'e2-ajax-loading_hidden'

var formElementToggledHiddenModifier = 'form-element-toggled_hidden'

var $formInstall = $('#form-install')
var $submitButton = $formInstall.find('#submit-button')
var $dbServer = $formInstall.find('#db-server')
var $dbUser = $formInstall.find('#db-user')
var $dbPassword = $formInstall.find('#db-password')
var $dbDatabase = $formInstall.find('#db-database')
var $dbDatabaseParent = $dbDatabase.parents('.form-element-toggled')
var $dbDatabaseList = $formInstall.find('#db-database-list')
var $dbDatabaseListParent = $dbDatabaseList.parents('.form-element-toggled')
var $e2Password = $formInstall.find('#password')

function e2UpdateSubmittability () {
  $submitButton.prop('disabled',
    (!bingo) ||
    /^ *$/.test($e2Password.val())
  )
}

function e2AllCompleted () {
  if (xhrCheckDBConfig) xhrCheckDBConfig.abort()
  if (xhrListDatabases) xhrListDatabases.abort()
  if (Boolean(dbCount) === ($dbDatabaseListParent.hasClass(formElementToggledHiddenModifier))) {
    $dbDatabaseListParent.add($dbDatabaseParent).toggleClass(formElementToggledHiddenModifier)
  }
  initialCheck = false
}

function e2CheckServerResponse () {
  $('.db-everything-ok').removeClass('e2-verified').addClass('e2-wrong')

  if (typeof serverResponse.data === 'undefined' || !serverResponse.data['db-responding']) return false

  $('.db-server-ok').removeClass('e2-wrong').addClass('e2-verified')
  if (initialCheck) $dbUser.focus()

  if (!serverResponse.data['db-connected']) return

  $('.db-user-password-ok').removeClass('e2-wrong').addClass('e2-verified')

  if (!serverResponse.data['db-found']) return

  $('.db-database-ok').removeClass('e2-wrong').addClass('e2-verified')

  $('#db-database-message-text').text(serverResponse.data.message)

  if (serverResponse.data.message) {
    $('#db-database-message').slideDown(333)
  } else {
    $('#db-database-message').slideUp(333)
  }

  if (!serverResponse.data['db-compatible']) return
  if (!serverResponse.data['db-good']) return

  $('.db-everything-ok').removeClass('e2-wrong').addClass('e2-verified')

  if (initialCheck) $e2Password.focus()

  // if (serverResponse.data['db-occupied']) {
  //   if (serverResponse.data['db-migrateable']) {
  //     $('#db-database-exists').slideDown(333)
  //     $('#db-database-incomplete').slideUp(333)
  //     if (initialCheck) $e2Password.focus()
  //     $('.db-everything-ok').removeClass('e2-wrong').addClass('e2-verified')
  //   } else {
  //     $('#db-database-incomplete').slideDown(333)
  //     $('#db-database-exists').slideUp(333)
  //     $('.db-server-ok, .db-user-password-ok').removeClass('e2-wrong').addClass('e2-verified')
  //   }
  // } else {
  //   $('#db-database-incomplete').slideUp(333)
  //   $('#db-database-exists').slideUp(333)
  //   if (initialCheck) $e2Password.focus()
  //   $('.db-everything-ok').removeClass('e2-wrong').addClass('e2-verified')
  // }
}

function e2CheckDbConfig () {
  dbCount = 0

  var completedCheckDBConfig, completedListDatabases

  e2SpinningAnimationStartStop($spinner, 1)
  $spinner.removeClass(spinnerHiddenModifier)

  var ajaxData = {
    'db-server': $dbServer.val(),
    'db-user': $dbUser.val(),
    'db-password': $dbPassword.val(),
    'db-database': $dbDatabase.val()
  }

  $dbServer.data('e2OldValue', ajaxData['db-server'])
  $dbUser.data('e2OldValue', ajaxData['db-user'])
  $dbPassword.data('e2OldValue', ajaxData['db-password'])
  $dbDatabase.data('e2OldValue', ajaxData['db-database'])
  $dbDatabaseList.data('e2OldValue', ajaxData['db-database'])

  if (e2TimeOut) clearTimeout(e2TimeOut)

  e2TimeOut = setTimeout(function () {
    if (xhrCheckDBConfig) xhrCheckDBConfig.abort()
    if (xhrListDatabases) xhrListDatabases.abort()

    xhrCheckDBConfig = e2Ajax({
      url: $formInstall.attr('data-action-database-config'),
      data: ajaxData,
      success: function (response) {
        if (typeof response.data === 'undefined') {
          e2NiceError({
            message: 'er--js-server-error',
            debug: {
              message: 'Server response malformed',
              data: {
                response: response
              }
            }
          })
          return false
        }

        serverResponse = response

        e2CheckServerResponse()

        if (serverResponse.data['db-connected']) {
          if (xhrCheckDBConfig) xhrCheckDBConfig.abort()
          if (xhrListDatabases) xhrListDatabases.abort()

          xhrListDatabases = e2Ajax({
            url: $formInstall.attr('data-action-databases-list'),
            data: ajaxData,
            success: function (response) {
              if (typeof response.data === 'undefined' || typeof response.data['databases-list'] === 'undefined') {
                e2NiceError({
                  message: 'er--js-server-error',
                  debug: {
                    message: 'Server response malformed',
                    data: {
                      response: response
                    }
                  }
                })
                return false
              }

              var dbs = response.data['databases-list']
              var valBefore = $dbDatabase.val()

              if ($dbDatabase.val() === '') {
                $dbDatabase.val(dbs[0])
              } else {
                for (var i in dbs) {
                  if (dbs[i].match(RegExp('^' + $dbDatabase.val() + ''))) {
                    $dbDatabase.val(dbs[i])
                    break
                  }
                }
              }

              $dbDatabaseList.empty()

              if (!dbs.length) return

              for (var k in dbs) {
                ++dbCount
                var selectedness = ''
                if (dbs[k] === $dbDatabase.val()) selectedness = ' selected'
                $dbDatabaseList
                  .append(
                    '<option' + selectedness + '>' +
                    dbs[k] +
                    '<' + '/option>'
                  )
              }

              $dbDatabase.val($dbDatabaseList.find('option:selected').val())
              $dbDatabaseList.addClass('e2-verified')

              if (valBefore !== $dbDatabase.val()) {
                e2CheckDbConfig()
              }
            },
            error: function () {
              if (initialCheck) $dbDatabase.focus()
            },
            complete: function () {
              completedListDatabases = true
              if (completedCheckDBConfig && completedListDatabases) e2AllCompleted()
            }
          })
        } else {
          completedListDatabases = true
        }

        bingo = serverResponse.data['db-good']

        e2UpdateSubmittability()
      },
      error: function () {
        if (initialCheck) {
          $('.input-editable').prop('disabled', false)
          $dbServer.add($dbUser).add($dbPassword).add($dbDatabase).val('')
          $dbServer.focus()
          initialCheck = false
        }
      },
      complete: function () {
        $('.input-editable').prop('disabled', false)
        completedCheckDBConfig = true
        if (completedCheckDBConfig && completedListDatabases) e2AllCompleted()
        e2SpinningAnimationStartStop($spinner, 0)
        $spinner.addClass(spinnerHiddenModifier)
      }
    })
  }, 333)
}

function e2InitDatabaseListChange () {
  $dbDatabaseList.on('change', function () {
    $dbDatabase.val($dbDatabaseList.val())
    e2CheckDbConfig()
  })
}

function e2InitLivecheckableInputs () {
  $('.e2-livecheckable')
    .on('input', function () {
      bingo = false
      $('.db-everything-ok').removeClass('e2-verified').removeClass('e2-wrong')
      e2UpdateSubmittability()
    })
    .on('blur', function () {
      var $this = $(this)
      var thisValue = $(this).val()

      if (typeof $this.data('e2OldValue') !== 'undefined') {
        if (thisValue === $this.data('e2OldValue')) {
          e2CheckServerResponse()
        } else {
          $this.removeClass('e2-verified').removeClass('e2-wrong')
          e2CheckDbConfig()
        }
      } else {
        $this.removeClass('e2-verified').removeClass('e2-wrong')
        e2CheckDbConfig()
      }
    })
}

function e2InitPasswordInputChange () {
  $e2Password.on('input', e2UpdateSubmittability)
}

e2InitDatabaseListChange()
e2InitLivecheckableInputs()
e2InitPasswordInputChange()

$('.input-editable').prop('disabled', true)
e2CheckDbConfig()
