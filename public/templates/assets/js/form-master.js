
$(document).ready(function() {
    
    $('#product-summary').summernote(
        {
              placeholder: 'write here...',
              toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]
        }
    );

    
});
  
function resetForm(){
    $('#product-summary').summernote('reset');
}
$('.dropifyForm').dropify();
$('#addFileUploadProduct').on('click', function(){
    let html = '<div class="col-lg-6 cardUploadFile">'
        html += '<div class="mt-3">'
        html += '<input type="file" name="files[]" onchange="loadFileName(this)" data-plugins="dropify" data-height="300" data-allowed-file-extensions=\'["jpg", "png", "jpeg"]\' data-height="300" class="dropifyForm file-form-product" />'
        html += '<input type="hidden" name="existFiles[]" value=""></div>';
    $('#fileUploadProduct').append(html);
    $('.dropifyForm').dropify();

    $('#rmFileUploadProduct').removeClass('d-none');
})


$(".dropify-clear").on("click", function(){
    $(this).prev('input[type="file"]').addClass('file-form-product')
})

function loadFileName(element) {
    let fileName = $(element).val().replace(/.*(\/|\\)/, '');
    $(element).parent().next().val(fileName)
}

function checkFormData(form){
    let isValid = true;
    $(`.input-${form}`).each(function(){
        console.log($(this).val());
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').text(``);
        $(this).next('.invalid-feedback').addClass('d-none');

        if($(this).val() == ""){
            let attr = $(this).attr('data-error-label');
            $(this).addClass('is-invalid');
            $(this).next('.invalid-feedback').text(`${attr} tidak boleh kosong!`);
            $(this).next('.invalid-feedback').removeClass('d-none');
            isValid = false;
        }
    })

    $(`.file-${form}`).each(function(){
        console.log($(this).val());
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').text(``);
        $(this).next('.invalid-feedback').addClass('d-none');

        if($(this).val() == ""){
            let attr = $(this).attr('data-error-label');
            $(this).addClass('is-invalid');
            $(this).next('.invalid-feedback').text(`${attr} tidak boleh kosong!`);
            $(this).next('.invalid-feedback').removeClass('d-none');
            isValid = false;
        }
    })

    $(`.file-${form}`).each(function(){
        $(this).parent('.dropify-wrapper').css({"border-color": "#E5E5E5", 
            "border-width":"2px", 
            "border-style":"solid"});

        if($(this).val() == ""){
           
            $(this).parent('.dropify-wrapper').css({"border-color": "red", 
                "border-width":"2px", 
                "border-style":"solid"});
                isValid = false;
        }
    });
    
    if (isValid) $(`#${form}`).submit();
}

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

