<br>
<div class="row">
    <div class="large-12 columns text-center">
        <h1>后台管理系统</h1>
    </div>
</div>
<hr>
<div class="row">

    <div class="large-6 large-offset-3 columns">
        <div class="panel">
            <?php echo form_open('/login/index');?>
            <div class="row "><input name="username" type="text" class="focusable" value="" placeholder="请输入用户名" onfocus=""/></div>
            <div class="row"> <input name="password" type="password" placeholder="情输入密码"></div>
            <div class="row"><input name="submit" type="submit" value="登录" class="button large-12 radius small btn-success"/></div>
            </form>
        </div>
    </div>
</div>