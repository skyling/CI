<div class="row large-8 small-10">
<br><br><br><br><br>
    <?=form_open('');?>
    <fieldset>
        <legend>用户[<?=get_admin_field('username');?>]密码修改</legend>
        <?=form_hidden('id',get_admin_field('id'));?>
        <div class="row">
            <div class="large-10 large-offset-2 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-2 columns">
                        <span class="prefix">旧密码</span>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="oldpwd" value="<?=set_value('oldpwd');?>" placeholder="请输入旧密码">
                    </div>
                    <div class="small-2 small-offset-0 text-center columns">
                        <?php echo form_error('oldpwd');?>
                    </div>

                </div>

            </div>

            <div class="large-10 large-offset-2 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-2 columns">
                        <span class="prefix">新密码</span>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="newpwd" value="<?=set_value('newpwd');?>" placeholder="请输入新密码">
                    </div>
                    <div class="small-2 small-offset-0 text-center columns">
                        <?php echo form_error('newpwd');?>
                    </div>
                </div>
            </div>

            <div class="large-10 large-offset-2 columns">
                <div class="row collapse prefix-radius">
                    <div class="small-2 columns">
                        <span class="prefix">确认密码</span>
                    </div>
                    <div class="small-8 columns">
                        <input type="password" name="reqpwd" value="<?=set_value('reqpwd');?>"  placeholder="请确认新密码">
                    </div>
                    <div class="small-2 small-offset-0 text-center columns">
                        <?php echo form_error('reqpwd');?>
                    </div>
                </div>

            </div>

            <?php if(isset($message)):?>
            <div class="large-8 large-offset-2 columns">
                <div data-alert class="alert-box alert small round">
                    <?=$message?>
                    <a href="#" class="close">&times;</a>
                </div>
            </div>
            <?php endif;?>

            <div class="large-8 large-pull-2 columns ">
                    <button type="reset" class="button secondary radius small large-4 large-offset-2">全部重置</button>
                    <button type="submit" class="button radius small large-4">确认修改</button>
            </div>
        </div>
    </fieldset>
    </form>
</div>