var base_url = $("#baseurl").attr('href');
$(document).ready(function(){
    $("#timkiem").change(function(){
        var loai = $("#timkiem").val();
       alert(loai);
       
    })

    $("#searchbtn").click(function(){
        var key = $("#search").val();
        alert(key);
    })
});