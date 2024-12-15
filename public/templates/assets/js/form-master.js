
$('.dropifyForm').dropify();
$('#addFileUploadProduct').on('click', function(){
    let html = '<div class="col-lg-6 cardUploadFile">'
        html += '<div class="mt-3">'
        html += '<input type="file" name="files[]" data-plugins="dropify" data-height="300" class="dropifyForm"/></div></div>';
    $('#fileUploadProduct').append(html);
    $('.dropifyForm').dropify();

    $('#rmFileUploadProduct').removeClass('d-none');
})

function removeFileUploadForm (){
   let length =  $('.cardUploadFile').length;
   if(length > 1) $('.cardUploadFile').last().remove();
   length =  $('.cardUploadFile').length;
   if(length == 1)  $('#rmFileUploadProduct').addClass('d-none');
}

function confirmDeleteData(routes, id){
    Swal.fire({
        title: "Anda yakin ingin menghapus data?",
        text: "Data yang dihapus akan hilang sepenuhnya!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus data ini!"
      }).then((result) => {
        if (result.isConfirmed) {  
            window.location.href = `${routes}/${id}`;
        }
      });
}