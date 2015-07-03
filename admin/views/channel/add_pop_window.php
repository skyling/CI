<div id="addChannel" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
    <h2 id="firstModalTitle">添加栏目</h2>
    <?=form_open('',array('id'=>"add-channel-form"))?>
    <fieldset>
        <div class="row">
            <div class="large-10 large-offset-2 columns">
                <div class="row collapse">
                    <div class="large-2 columns">
                        <span href="#" class="prefix">所属栏目</span>
                    </div>
                    <div class="large-6 columns">
                        <select name="pid">
                            <?php foreach($channel as $item):?>
                                <option value="<?=$item['id']?>"><?=$item['title']?></option>
                            <?endforeach;?>
                        </select>
                    </div>
                    <div class="large-4 columns">
                        <?=form_error('pid')?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="large-10 large-offset-2 columns">
                <div class="row collapse">
                    <div class="large-2 columns">
                        <span href="#" class="prefix">栏目名称</span>
                    </div>
                    <div class="large-6 columns formControls">
                        <input type="text" name="title" placeholder="请输入栏目名称" datatype="s2-16" nullmsg="栏目名称不能为空" ajaxurl="check">
                    </div>
                    <span></span>
                    <div class="large-4 columns">
                        <?=form_error('title')?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="large-10 large-offset-2 columns">
                <div class="row collapse">
                    <div class="large-2 columns">
                        <span href="#" class="prefix">栏目标识</span>
                    </div>
                    <div class="large-6 columns formControls">
                        <input type="text" name="name" placeholder="请输入栏目标识" datatype="/^[\w]{2,}$/" errormsg="必须为2个以上英文字符！" nullmsg="栏目标识不能为空" ajaxurl="check">
                    </div>
                    <div class="large-4 columns">
                        <?=form_error('name')?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="large-10 large-offset-2 columns">
                <button type="reset" class="secondary large-4">重置表单</button>
                <button type="submit" class="large-4">确认提交</button>
            </div>
        </div>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </fieldset>
    </form>
</div>

<script src="<?=config_item('foundation_dir')?>js/vendor/validform_v5.3.2.js"></script>
<script src="<?=config_item('foundation_dir')?>js/admin.js"></script>
<script>
    $(document).ready(function(){
        admin.validform('#add-channel-form');
    });
</script>