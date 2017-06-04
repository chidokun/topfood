
var base_url = 'http://localhost/topfood/';
$(document).ready(function(){
    //alert('jjjjjj');
    $("#timkiem").change(function(){
        var loai = $("#timkiem").val();
       alert(loai);
       
    })

    $("#searchbtn").click(function(){
        var key = $("#search").val();
        alert(key);
    })
});