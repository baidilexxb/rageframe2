<?php
namespace addons\RfDemo;

use Yii;
use backend\interfaces\WechatMessageInterface;

/**
 * AddonMessage
 *
 * Class AddonMessage
 * @package addons\RfDemo
 */
class AddonMessage implements WechatMessageInterface
{
    /**
     * @param $message
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function run($message)
    {
        return '示例模块' . Yii::$app->formatter->asDatetime(time());
    }
}