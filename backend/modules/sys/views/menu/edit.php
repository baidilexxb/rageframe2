<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableAjaxValidation' => true,
    'validationUrl' => Url::toRoute(['edit','id' => $model['id']]),
    'fieldConfig' => [
        'template' => "<div class='col-sm-3 text-right'>{label}</div><div class='col-sm-9'>{input}\n{hint}\n{error}</div>",
    ]
]);
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
    <h4 class="modal-title">上级目录：<?php echo $parent_title?></h4>
</div>
<div class="modal-body">
    <?php echo $form->field($model, 'title')->textInput() ?>
    <?php echo $form->field($model, 'url')->textInput()->hint("例如：index/index") ?>
    <?php echo $form->field($model, 'menu_css')->textInput()->hint('详情请参考：<a href="http://fontawesome.dashgame.com" target="_blank">http://fontawesome.dashgame.com</a>')?>
    <?php echo $form->field($model, 'sort')->textInput() ?>
    <?php echo $form->field($model, 'dev')->radioList(['1' => '是','0' => '否'])->hint('去 网站设置->系统设置 里面开启或关闭开发模式,开启后才可显示该菜单') ?>
    <?php echo $form->field($model, 'status')->radioList(['1' => '启用','0' => '禁用']) ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
    <button class="btn btn-primary" type="submit">保存</button>
</div>
<?php ActiveForm::end(); ?>