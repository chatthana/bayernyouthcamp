var birthdate = function() {
  this.date = null;
  this.month = null;
  this.year = null;
  this.validate = function() {
    if (this.date == null || this.month == null || this.year == null) {
      return false;
    }
    return true;
  };
  this.assign = function(element) {
    if (this.validate()) {
      $(element).val(this.year + '-' + this.month + '-' + this.date);
      return true;
    }
    return false;
  };
  this.getAge = function() {
    if (this.validate()) {
      var currentYear = new Date().getFullYear();
      return currentYear - this.year;
    }
    return false;
  };
}

var birthdates = [];

for (var i = 0; i < $('.each-form.player').length; i++) {
  birthdates.push(new birthdate());
}

$('.each-form').hide();

$('.each-form[data-sequence=1]').show();

$('.id-card-uploader input[type=file]').change(function(e) {
  $(this).parent().addClass('attached');
});

$('.each-form a, a.form-navigator').click(function(e) {
  e.preventDefault();
  var target_sequence = $(this).attr('data-target-sequence');
  $('.each-form').hide();
  $('.each-form[data-sequence='+ target_sequence +']').fadeIn(500);

  $('.form-navigator').removeClass('selected');
  $('.form-navigator[data-target-sync='+ target_sequence +']').addClass('selected');
});

$('.birthdate-date-selector, .birthdate-month-selector, .birthdate-year-selector').change(function(e) {
  var ref = $(this).parent().attr('data-seq-ref');
  birthdates[ref][$(this).attr('name').substring(5)] = $(this).val();
  if (birthdates[ref].validate()) {
    birthdates[ref].assign('#teamregistrationform-' + ref + '-birthdate');
    $('#teamregistrationform-' + ref + '-age').val(birthdates[ref].getAge());
  }
});

$('.registration-form-arenas input[type=radio]').change(function() {
  console.log($(this).val());
  $('.registration-form-arenas ul > div .radio-label-input-group').removeClass('checked');
  $('.registration-form-arenas ul > div label + label').css('color', 'inherit');
  $(this).parent().addClass('checked');
  $(this).parent().parent().next().css('color', '#961933');
});
