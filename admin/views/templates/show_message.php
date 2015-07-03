<div class="row large-8">
    <br><br><br><br><br><br>
    <?php
        $types = array('success','warning','info','alert','secondary');
        $type = in_array($type, $types) ? $type : $types[0];
        $message = isset($message) ? $message : '操作成功！';
        $redirect_url = isset($redirect_url) ? $redirect_url : '/admin.php';
        $auto_redirect_time = isset($auto_redirect_time)&& is_numeric($auto_redirect_time) ? $auto_redirect_time : 5;
        if($auto_redirect_time > 0) $message .= '&nbsp;&nbsp;&nbsp;页面将在<span id="auto-time">'.$auto_redirect_time.'</span>秒后自动跳转';

        echo '<div data-alert class="alert-box '.$type.' radius">'.$message.'</div><a href="'.$redirect_url.'" class="button secondary small right">返回</a>';
        if($auto_redirect_time > 0):
    ?>
            <script>
                var time = <?=$auto_redirect_time?>,
                    t_obj = document.getElementById('auto-time'),
                    r_url = "<?=$redirect_url?>";
             //定时跳转
            setInterval(function(){
                t_obj.innerHTML=time-- + "";
                if(time == 0){
                    location.href = r_url;
                }
            },1000);
            </script>
    <?php endif;?>


</div>
