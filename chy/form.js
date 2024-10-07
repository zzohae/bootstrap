$(document).ready(function () {
  $('input[name="options"]').on('change', function () {
      $('.form-container').removeClass('d-block').addClass('d-none'); // 모든 폼 숨김
      $('#form' + this.value).removeClass('d-none').addClass('d-block'); // 선택된 폼만 보임
  });
});