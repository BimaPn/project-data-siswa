$(document).ready(function () {
    $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('.button-delete').click(function () { 
  const card = $(this).parent().parent().parent();
  let warning = confirm('apakah anda yakin ?')
  if(warning){
    $.ajax({
      type: "DELETE",
      url: '/dashboard/siswa/' + $(this).data('id'),
      data: "data",
      success: function (result) {
        $(card).remove();
      }
    });
  }
});
});