/**
 * Created by v_frli on 2015/7/2.
 */
var admin = {
    validform : function(selector){
        $(selector).Validform({
            ajaxPost:true,
            tiptype:2,
            callback:function(data){
                if(data.status == 'y'){
                    location.reload();
                }
            }
        });
    },
    set_status : function(selector){
        $(selector).on('click',function(){
            id = $(this).attr('data-id');
            url = $(this).attr('data-url');
            status = $(this).attr('data-status');
            if(id >0 && url != '' && (status==0 || status==1 )){
                $.ajax({
                    url:url,
                    type:"POST",
                    data:{status:status,id:id},
                    success:function(data){
                        data = $.parseJSON(data);
                        if(data.status == 'y'){
                            alert(data.info);
                            location.reload();
                        }else{
                            alert(data.info);
                        }
                    }
                });
            }
        });
    },
    ajax : function(selector) {
        $(selector).on('click', function () {
            var data = $(this).attr('data-data'),
            url = $(this).attr('data-url');
            if(data != undefined && url != undefined){
                data = eval('('+data+')');
                $.ajax({
                    url:url,
                    type:"POST",
                    data:data,
                    success : function(data){
                        data = $.parseJSON(data);
                        if(data.status == 'y'){
                            alert(data.info);
                            location.reload();
                        }else{
                            alert(data.info);
                        }
                    }
                });
            }else{
                alert("数据错误！");
            }
        });

    }
};