<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Device;
use yii\helpers\Html;

/**
 * DeviceSearch represents the model behind the search form of `frontend\models\Device`.
 */
class DeviceSearch extends Device
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_store'], 'integer'],
            [['serial_number_device', 'create_date', 'update_date', 'store.store_name', 'store.id'], 'safe'],
        ];
    }

    public function attributes() {
        return array_merge(parent::attributes(), ['store.store_name', 'store.id']);
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Device::find()->select('device.*, store.store_name')->joinWith('store', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id_store' => [
                        'asc' => ['store.store_name' => SORT_ASC],
                        'desc' => ['store.store_name' => SORT_DESC],
                    ],
                    'serial_number_device' => [
                        'asc' => ['serial_number_device' => SORT_ASC],
                        'desc' => ['serial_number_device' => SORT_DESC],
                    ],
                    'create_date' => [
                        'asc' => ['create_date' => SORT_ASC],
                        'desc' => ['create_date' => SORT_DESC],
                    ],
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_store' => $this->id_store,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
        ]);

        if($this->id_store != 0)
            $query->andFilterWhere([
                'device.id_store' => $this->id_store,
            ]);

        $query->andFilterWhere(['like', 'serial_number_device', $this->serial_number_device]);

        return $dataProvider;
    }

    public function searchDeviceInStore($post) {
        $id_store = (!empty($post['id_store'])) ? $post['id_store'] : 0;
        $query = Device::find()->select('device.*')->where(['id_store' => $id_store])->asArray()->all();

        $html = "<table class='table table-striped table-bordered'>";
        $html .= "<thead>"
            . "<tr>"
            . "<th>ИД</th>"
            . "<th>Серийный номер</th>"
            . "<tr>"
            . "</thead>";

        for($i = 0; $i < count($query); $i++) {
            $html .= "<td>" . $query[$i]['id'] . "</td>";

            $html .= "<td>"
                . Html::a(Html::encode($query[$i]['serial_number_device']), ['/device/', 'DeviceSearch[serial_number_device]' => $query[$i]['serial_number_device']], ['target' => '_blank'])
                . "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";

        return $html;
    }
}
