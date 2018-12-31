$("form#data").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: './upload.php?up=yes',
        type: 'POST',
        data: formData,
        success: function (data) {
            //alert(data)
            if(data == 1){
                $(".msg").html('<br><br><b>Escolha</b> um <b>arquivo para</b> fazer <b>upload</b><br><br>');
                console.log('You cannot upload files of this type!');
            }else{
                $(".msg").html('');
                
                $(".lista").load('./show_list.php');
                $("#descri").val('');
                $("#file").val('');
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

function deleteFile(s){
    $.ajax({
        url: './update.php?inf='+s,
        type: "post",
        data: $( "form#a"+s ).serialize(),
        success: function (data) {
            //alert(data);
            $(".lista").load('./show_list.php'); 
        },
        cache: false,
        //contentType: false,
        processData: false
    });
};