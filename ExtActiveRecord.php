<?php

namespace olgert\yii2;

use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * Class ExtActiveRecord
 * @package olgert\yii2
 *
 * @property integer $id
 */
abstract class ExtActiveRecord extends ActiveRecord
{
    const SCENARIO_SEARCH = 'search';

    /**
     * @param $params
     * @return \yii\db\ActiveQuery
     */
    abstract public function getSearchQuery( $params );

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave( $insert )
    {
        if( parent::beforeSave($insert) === false )
            return false;

        if( $insert == false && isset($this->t_updated) )
            $this->t_updated = date("Y-m-d H:i:s");

        return true;
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();

        return [
            self::SCENARIO_SEARCH => $scenarios[parent::SCENARIO_DEFAULT],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search( $params )
    {
        $this->scenario = self::SCENARIO_SEARCH;

        $query = $this->getSearchQuery($params);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }


}