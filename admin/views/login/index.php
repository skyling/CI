<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?=config_item('foundation_dir')?>css/foundation.css" />
    <script src="<?=config_item('foundation_dir')?>js/vendor/modernizr.js"></script>
</head>
<body>
<br>
<div class="row">
    <div class="large-12 columns text-center">
        <h1>个人博客系统</h1>
    </div>
</div>
<hr>
<div class="row">
    <?php echo form_open('/login/index');?>
        <fieldset>
            <legend>管理员登录</legend>
                <div class="large-10 large-offset-2 columns">
                    <div class="row collapse prefix-radius">
                        <div class="small-2 columns">
                            <span class="prefix">用户名</span>
                        </div>
                        <div class="small-8 columns">
                            <input type="text" name="username" value="<?=set_value("username")?>" placeholder="请输入用户名">
                        </div>
                        <div class="small-2 columns text-center">
                            <?=form_error('username')?>
                        </div>
                    </div>
                </div>
            <div class="large-10 large-offset-2 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-2 columns">
                        <span class="prefix">密码</span>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="password" varlue="<?=set_value('password')?>"placeholder="请输入密码">
                    </div>
                    <div class="small-2 columns text-center">
                        <?=form_error('password');?>
                    </div>
                </div>
            </div>
            <div class="large-10 large-offset-2 columns">
                <input name="submit" type="submit" value="登录" class="button large-10 radius small btn-success"/>
            </div>

        </fieldset>
    </form>
</div>
<script src="<?=config_item('foundation_dir')?>js/vendor/jquery.js"></script>
<script src="<?=config_item('foundation_dir')?>js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<div class="row success">

</div>
</body>
</html>