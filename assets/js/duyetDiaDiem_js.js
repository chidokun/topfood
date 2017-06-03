$(document).ready(function(){
    $("#submit").click(function(){
        $.post(
            base_url + 'duyetDiaDiemCho/likeReview',
            { 
                maDiaDiem = $('#maDGDD').val() 
            },
             function(result){
                if(result)
                {
                    $('#maDGDD').remove();
                }
                else{
                    return false;
                }
            }
        )
    });
});