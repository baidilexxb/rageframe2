<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = '编辑';
$this->params['breadcrumbs'][] = ['label' => '后台用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<?php echo $this->render('_form', [
    'model' => $model,
    'backBtn' => '<span class="btn btn-white" onclick="history.go(-1)">返回</span>',
]) ?>
