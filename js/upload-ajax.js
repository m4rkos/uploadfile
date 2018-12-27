$("form#data").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: './upload.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            //alert(data)
            $(".lista").load('./show_list.php'); 
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