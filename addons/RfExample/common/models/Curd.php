<?php
namespace addons\RfExample\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%addon_example_curd}}".
 *
 * @property string $id ID
 * @property string $title 标题
 * @property string $cate_id 分类ID(单选)
 * @property string $manager_id 管理员ID
 * @property int $sort 排序
 * @property int $position 推荐位
 * @property int $sex 性别1男2女
 * @property string $content 内容
 * @property string $cover 图片
 * @property string $covers 图片组
 * @property string $file 文件
 * @property string $files 文件组
 * @property string $attachfile 附件
 * @property string $keywords 关键字
 * @property string $description 描述
 * @property double $price 价格
 * @property string $views 点击
 * @property int $stat_time 开始时间
 * @property int $end_time 结束时间
 * @property string $email
 * @property string $provinces
 * @property string $city
 * @property string $area
 * @property string $ip ip
 * @property int $status 状态
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Curd extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%addon_example_curd}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_id', 'manager_id', 'sort', 'position', 'sex', 'views', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'content', 'covers', 'files', 'cover', 'file'], 'required'],
            [['content', 'covers', 'files'], 'string'],
            [['price'], 'number'],
            [['stat_time', 'end_time'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['cover', 'attachfile', 'keywords'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 60],
            [['provinces', 'city', 'area'], 'integer'],
            [['ip'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'cate_id' => '分类ID',
            'manager_id' => '创建者ID',
            'sort' => '排序',
            'position' => '推荐位',
            'sex' => '性别',
            'content' => '内容',
            'cover' => '封面',
            'covers' => '轮播图',
            'file' => '文件',
            'files' => '多文件上传',
            'attachfile' => '附件',
            'keywords' => '关键字',
            'description' => '简单介绍',
            'price' => '价格',
            'views' => '浏览量',
            'stat_time' => '开始时间',
            'end_time' => '结束时间',
            'status' => '状态',
            'email' => '邮箱',
            'provinces' => '省',
            'city' => '市',
            'area' => '区',
            'ip' => 'ip',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        //创建时候插入
        if($this->isNewRecord)
        {
            $this->ip = Yii::$app->request->userIP;
            $this->manager_id = Yii::$app->user->id;
        }

        return parent::beforeSave($insert);
    }
}
