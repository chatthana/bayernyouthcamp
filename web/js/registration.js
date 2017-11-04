// Birthdate object
var birthdate = {
  "date":"",
  "month":"",
  "year":"",
  assign: function(element) {
    if(this.validate()) {
      $(element).val(this.year + '-' + this.month + '-' + this.date);
    }
  },
  validate: function() {
    if (this.date == '' || this.month == '' || this.year == '') {
      return false;
    }
    return true;
  },
  getAge: function() {
    if (this.validate()) {
      var yearNow = new Date().getFullYear();
      return yearNow - this.year;
    }
  }
};

$('.registration-form-arenas input[type=radio]').change(function() {
  $('.registration-form-arenas .radio-label-input-group').removeClass('checked');
  $('.registration-form-arenas label + label').css('color', 'inherit');
  $(this).parent().addClass('checked');
  console.log($('.registration-form-arenas input[type=radio]:checked').val());
  $(this).parent().parent().next().css('color', '#005f9a');
});

$('#registration-form input[type=file]').change(function(e) {
  $('#id-card-uploader').css('background-color', '#dadada');
});

$('.acceptance input[type=radio]').change(function(e) {
  $('.acceptance .radio-label-input-group').removeClass('checked');
  $(this).parent().addClass('checked');
});

$('select[name=birthdate], select[name=birthmonth], select[name=birthyear]').change(function(e) {
  birthdate[$(this).attr('name').substring(5)] = $(this).val();
  if (birthdate.validate()) {
    birthdate.assign('#registrationform-birthdate');
    $('#registrationform-age').val(birthdate.getAge());
    return true;
  }
  return false;
});$('#arena-selector-container .submit-button-container button').on('click', function(e) {
  e.preventDefault();
  if ($('#registrationform-arena').val()) {
    $(this).parent().parent().hide();
    $('#main-registration-form').fadeIn();
  }
});
