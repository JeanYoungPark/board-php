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

$('#pgNumBtn span').on('click',function(){
    if($(this).attr('pg')) {
        $.ajax({
            url:"/",
            type:'get',
            data:{pg:$(this).attr('pg')},
            datatype:'html'
        }).done(function(data){
            var htmlData = $(data).find('.tbody').html();
            var pgBtnData = $(data).find('#pgNumBtn').html();
            $('.tbody').html(htmlData);
            $('#pgNumBtn').html(pgBtnData);
        });
    }
});