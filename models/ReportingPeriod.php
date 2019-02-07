<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporting_period".
 *
 * @property int $id
 * @property string $date_start
 * @property string $date_end
 * @property string $name
 * @property int $state
 * @property int $is_988
 */
class ReportingPeriod extends \yii\db\ActiveRecord
{
    const STATE_CURRENT = 1;
    const STATE_ARCHIVE = 2;

    const DT_IS_731 = 0;
    const DT_IS_988 = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporting_period';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'state', 'is_988'], 'required'],
            [['date_start', 'date_end'], 'safe'],
            [['state', 'is_988'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['date_start', 'date_end'], 'default', 'value' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'name' => 'Наименование',
            'state' => 'Состояние',
            'is_988' => 'Форма отчёта',
        ];
    }

    public static function getStateList()
    {
        return [
            self::STATE_CURRENT => 'Текущий',
            self::STATE_ARCHIVE => 'Архивный'
        ];
    }

    public function getStateName()
    {
        $stateList = self::getStateList();

        return $stateList[$this->state];
    }

    public static function getDocTypeList()
    {
        return [
            self::DT_IS_731 => 'Старая форма (№731)',
            self::DT_IS_988 => 'Новая форма (№988)'
        ];
    }

    public function getDocTypeName()
    {
        $docTypeList = self::getDocTypeList();

        return $docTypeList[$this->is_988];
    }
}
