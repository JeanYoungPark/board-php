function askDelete(){
    return (confirm("삭제하시겠습니까?")?true:false);
}

function join_validate(form){

}

//join 유효성 체크 (사용자 편의성)
$('#join_form input').on('focusout',function(){
    var me = $(this);
    var name = me.attr('name');
    var value = me.val();
    $.ajax({
        url:'/process/join_process.php',
        data:{
            key:name,
            value:value
        },
        type:'post',
        datatype:'json'
    }).done(function(data){
        data = JSON.parse(data);
        if(data) me.siblings('.warn').text(data.ans);
        else me.siblings('.warn').text('');
    });
});