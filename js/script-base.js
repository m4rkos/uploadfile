function loadList(){
    $(".lista").load('./show_list.php'); 
    var a = 'y';
    checkChange(a);
}
function loadLogStatus(){
    var datax = $(".log_id").load('./log_access.php');  
    
    //checkChange(dataz);
}
function checkChange(a){
    $(".log_id").load('./log_access.php?log='+a);
}