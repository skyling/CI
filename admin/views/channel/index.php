<?php
    function show_item($channel_sort){?>
        <dl class="accordion" data-accordion>
            <?php if(empty($channel_sort)):?>
                <h2>暂无子栏目，请先添加！</h2>
            <?php else:?>
                <?php foreach($channel_sort as $item):?>
                    <dd class="accordion-navigation">
                        <a href="#panel_<?=$item['name']?>"><?=$item['title']?>
                            <?php if($item['status']==1):?>
                                <span class="label success right round">
                                    已启用
                                </span>
                            <?php else: ?>
                                <span class="label alert right round">
                                    已禁用
                                </span>
                            <?php endif;?>
                        </a>
                        <div id="panel_<?=$item['name']?>" class="content">
                            <!--sub-->
                            <dl class="accordion" data-accordion>
                                <div class="title">
                                    <h6 class="left">栏目数:<span class="label success"><?=count($item['sub'])?></span>文章总数：<span class="label success"><?=$item['number']?></span></h6>
                                    <!--<a href="#" class="label  large-offset-1"></a>-->
                                    <button data-data="{id:<?=$item['id']?>}" data-url="delete" class="ajax-submit alert right button">删除</button>
                                    <button data-data="{id:<?=$item['id']?>,status:<?=abs($item['status']-1)?>}" data-url="set_status" class="ajax-submit right info  button">
                                        <?php if($item['status']==1):?>
                                            禁用
                                        <?php else: ?>
                                            启用
                                        <?php endif;?>
                                    </button>
                                    <a href="modify/<?=$item['id']?>" class="secondary right button">修改</a>
                                    <a href="<?=$item['id']?>" class="right warning  button">查看文章</a>
                                </div>
                                <?show_item($item['sub']);?>
                            </dl>
                            <!--/sub-->
                        </div>
                    </dd>
                <?php endforeach;?>
            <?php endif;?>
</dl>
    <?php }?>
<section class="main">
    <div class="row">
        <div class="row">
            <h2 class="large-offset-0 left">栏目管理</h2><a href="#" data-reveal-id="addChannel" class="add-channel right radius button">添加栏目</a>
        </div>

        <div class="panel callout radius">
            <h5>所有栏目</h5><hr>
            <p>博客栏目管理</p>
            <?show_item($channel_sort);?>
        </div>
    </div>
</section>
<a href="#" data-reveal-id="myModal">Click Me For A Modal</a>

<div id="myModal" class="" data-reveal >
    <div data-alert class="alert-box success radius reveal-modal" aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
        This is a success alert with a radius.
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>

</div>



<script>
    $(document).ready(function(){
        admin.set_status('.ajax-change-status');
        admin.ajax('.ajax-submit');
    });
</script>