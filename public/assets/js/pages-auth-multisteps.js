/**
 *  Page auth register multi-steps
 */

'use strict';

// Select2 (jquery)
$(function () {
  var select2 = $('.select2');

  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'Select your current garde',
        dropdownParent: $this.parent()
      });
    });
  }
});

// Multi Steps Validation
// --------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    const stepsValidation = document.querySelector('#multiStepsValidation');
    if (typeof stepsValidation !== undefined && stepsValidation !== null) {
      // Multi Steps form
      const stepsValidationForm = stepsValidation.querySelector('#multiStepsForm');
      // Form steps
      const stepsValidationFormStep1 = stepsValidationForm.querySelector('#accountDetailsValidation');
      const stepsValidationFormStep2 = stepsValidationForm.querySelector('#personalInfoValidation');
      const stepsValidationFormStep3 = stepsValidationForm.querySelector('#billingLinksValidation');
      // Multi steps next prev button
      const stepsValidationNext = [].slice.call(stepsValidationForm.querySelectorAll('.btn-next'));
      const stepsValidationPrev = [].slice.call(stepsValidationForm.querySelectorAll('.btn-prev'));

      const multiStepsExDate = document.querySelector('.multi-steps-exp-date'),
        multiStepsCvv = document.querySelector('.multi-steps-cvv'),
        multiStepsMobile = document.querySelector('.multi-steps-mobile'),
        multiStepsPincode = document.querySelector('.multi-steps-pincode'),
        multiStepsCard = document.querySelector('.multi-steps-card');

      // Expiry Date Mask
      if (multiStepsExDate) {
        new Cleave(multiStepsExDate, {
          date: true,
          delimiter: '/',
          datePattern: ['m', 'y']
        });
      }

      // CVV
      if (multiStepsCvv) {
        new Cleave(multiStepsCvv, {
          numeral: true,
          numeralPositiveOnly: true
        });
      }

      // Mobile
      if (multiStepsMobile) {
        new Cleave(multiStepsMobile, {
          phone: true,
          phoneRegionCode: 'ET'
        });
      }

      // Pincode
      if (multiStepsPincode) {
        new Cleave(multiStepsPincode, {
          delimiter: '',
          numeral: true
        });
      }

      // Credit Card
      if (multiStepsCard) {
        new Cleave(multiStepsCard, {
          creditCard: true,
          onCreditCardTypeChanged: function (type) {
            if (type != '' && type != 'unknown') {
              document.querySelector('.card-type').innerHTML =
                '<img src="' + assetsPath + 'img/icons/payments/' + type + '-cc.png" height="28"/>';
            } else {
              document.querySelector('.card-type').innerHTML = '';
            }
          }
        });
      }

      let validationStepper = new Stepper(stepsValidation, {
        linear: true
      });

      document.querySelector('#multiStepsEmail').addEventListener('keyup', () => {
        document.querySelector('#error_email').innerText = '';
      });

      document.querySelector('#multiStepsUsername').addEventListener('keyup', () => {
        document.querySelector('#error_username').innerText = '';
      });

      document.querySelector('#multiStepsMobile').addEventListener('keyup', () => {
        document.querySelector('#error_phone').innerText = '';
      });

      // Account details
      const multiSteps1 = FormValidation.formValidation(stepsValidationFormStep1, {
        fields: {
          multiStepsUsername: {
            validators: {
              notEmpty: {
                message: 'Please enter username'
              },
              stringLength: {
                min: 6,
                max: 30,
                message: 'The name must be more than 6 and less than 30 characters long'
              },
              regexp: {
                regexp: /^[a-zA-Z0-9 ]+$/,
                message: 'The name can only consist of alphabetical, number and space'
              }
            }
          },
          multiStepsEmail: {
            validators: {
              notEmpty: {
                message: 'Please enter email address'
              },
              emailAddress: {
                message: 'The value is not a valid email address'
              }
            }
          },
          multiStepsPass: {
            validators: {
              notEmpty: {
                message: 'Please enter password'
              }
            }
          },
          multiStepsConfirmPass: {
            validators: {
              notEmpty: {
                message: 'Confirm Password is required'
              },
              identical: {
                compare: function () {
                  return stepsValidationFormStep1.querySelector('[name="multiStepsPass"]').value;
                },
                message: 'The password and its confirm are not the same'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: '.col-sm-6'
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        $.ajax({
          type: 'POST',
          url: '/registeration-checker',
          data: {
            user_name: multiStepsUsername.value,
            email: multiStepsEmail.value
          },
          success: function (data) {
            if (data.username != 0 || data.email != 0) {
              if (data.username != 0) {
                document.querySelector('#multiStepsUsername').classList.add('is-invalid');
                document.querySelector('#error_username').innerText =
                  'Username is already taken please use another one';
              }
              if (data.email != 0) {
                document.querySelector('#multiStepsEmail').classList.add('is-invalid');
                document.querySelector('#error_email').innerText = 'Email is already taken please use another one';
              }
            } else {
              document.querySelector('#error_username').innerText = '';
              document.querySelector('#error_email').innerText = '';

              validationStepper.next();
            }
          },
          error: function (e) {
            console.log(e);
          }
        });
      });

      // Personal info
      const multiSteps2 = FormValidation.formValidation(stepsValidationFormStep2, {
        fields: {
          multiStepsFirstName: {
            validators: {
              notEmpty: {
                message: 'Please enter first name'
              }
            }
          },
          multiStepsLastName: {
            validators: {
              notEmpty: {
                message: 'Please enter last name'
              }
            }
          },
          multiStepsMobile: {
            validators: {
              notEmpty: {
                message: 'Please enter phone number'
              },
              stringLength: {
                min: 9,
                max: 9,
                message: 'mobile number must be 9 digit long'
              },
              regexp: {
                regexp: /^9\d{1,}$/,
                message: 'The mobile number must start with 9 and can only consist of numbers'
              }
            }
          },
          multiStepsSchool: {
            validators: {
              notEmpty: {
                message: 'Please enter your school name'
              }
            }
          },
          grade: {
            validators: {
              notEmpty: {
                message: 'Please select your current grade'
              }
            }
          },
          multiStepsCity: {
            validators: {
              notEmpty: {
                message: 'Please select your region'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {
                case 'multiStepsFirstName':
                  return '.col-sm-6';
                case 'multiStepsAddress':
                  return '.col-md-12';
                default:
                  return '.row';
              }
            }
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        $.ajax({
          type: 'POST',
          url: '/registeration-phone-checker',
          data: {
            phone: document.querySelector('#multiStepsMobile').value
          },
          success: function (data) {
            if (data.phone != 0) {
              // document.querySelector('#multiStepsMobile').parentElement.classList.add('has-validation');
              document
                .querySelector('#personal')
                .classList.replace('fv-plugins-bootstrap5-row-valid', 'fv-plugins-bootstrap5-row-invalid');
              document.querySelector('#multiStepsMobile').classList.add('is-invalid');
              document.querySelector('#error_phone').innerText =
                'Mobile number is already taken please use another one';
            } else {
              document.querySelector('#multiStepsMobile').innerText = '';
              validationStepper.next();
            }
          },
          error: function (e) {
            console.log(e);
          }
        });
      });

      // Social links
      const multiSteps3 = FormValidation.formValidation(stepsValidationFormStep3, {
        fields: {
          multiStepsCard: {
            validators: {
              notEmpty: {
                message: 'Please enter card number'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {
                case 'multiStepsCard':
                  return '.col-md-12';

                default:
                  return '.col-dm-6';
              }
            }
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        toastr.success('Thank you for registering with us!');

        setTimeout(() => {
          stepsValidationForm.submit();
        }, 2000);
      });

      stepsValidationNext.forEach(item => {
        item.addEventListener('click', event => {
          // When click the Next button, we will validate the current step
          switch (validationStepper._currentIndex) {
            case 0:
              multiSteps1.validate();
              break;

            case 1:
              multiSteps2.validate();
              break;

            case 2:
              multiSteps3.validate();
              break;

            default:
              break;
          }
        });
      });

      stepsValidationPrev.forEach(item => {
        item.addEventListener('click', event => {
          switch (validationStepper._currentIndex) {
            case 2:
              validationStepper.previous();
              break;

            case 1:
              validationStepper.previous();
              break;

            case 0:

            default:
              break;
          }
        });
      });
    }
  })();
});
