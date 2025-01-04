function loadSuccessSwal(title, msg){
    Swal.fire({
        title: title,
        text: msg,
        icon: "success"
     });
}

function loadFailSwal(title, msg){
    Swal.fire({
        title: title,
        text: msg,
        icon: "error"
     });    
}