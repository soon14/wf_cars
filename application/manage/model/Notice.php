<?php

namespace app\manage\model;

use app\common\model\Model;

/**
 * This is the model class for table "wf_notice".
 *
 * @property integer $id
 * @property string $create_time
 * @property integer $is_delete
 * @property string $remark
 * @property string $update_time
 * @property integer $app_user_id
 * @property string $content
 * @property integer $readed
 * @property string $title
 */
class Notice extends Model
{
    /**
     * 数据库表名
     * 加格式‘{{%}}’表示使用表前缀，或者直接完整表名
     * @author Sir Fu
     */
    protected $table = '{{%notice}}';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['is_delete', 'app_user_id', 'readed'], 'integer'],
            [['remark', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'app', 'id',
            'create_time' => 'app', '创建时间',
            'is_delete' => 'app', '删除标识  默认值1',
            'remark' => 'app', '备注字段',
            'update_time' => 'app', '修改时间',
            'app_user_id' => 'app', 'App User ID',
            'content' => 'app', '内容',
            'readed' => 'app', '是否阅读  0:未读  1:已读',
            'title' => 'app', '通知标题',
        ];
    }

    /**
     * @return Object|\think\Validate
     */
    public static function getValidate(){
        return CarValidate::load();
    }

    /**
     * @param $data
     * @param string $scene
     * @return bool
     */
    public static function check($data,$scene = ''){
        $validate = self::getValidate();

        //设定场景
        if (is_string($scene) && $scene !== ''){
            $validate->scene($scene);
        }

        return $validate->check($data);
    }
}
