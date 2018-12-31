function loadList(){
    $(".lista").load('./show_list.php'); 
    //var a = 'y';
    //checkChange(a);
}
function loadLogStatus(){
    $(".log_id").load('./log_access.php');  
    setInterval(function(){checkChange('y')}, 3000);
    //checkChange(dataz);
}
function checkChange(a){

    $.ajax({
        url: './log_access.php?log=' + a,
        type: 'GET',
        success: function (data) {
            //alert(data)
            var res = data.split(" ");
            console.log(data);
            if(res[0] == 'y'){
                $(".log_id").html(res[1]);
            }else{
                
                $(".lista").load('./show_list.php');
                $(".log_id").html(res[1]);
                
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}