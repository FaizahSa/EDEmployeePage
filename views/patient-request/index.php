<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-request-index">

    <h1>Current <?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'Request_Id',
            'Patient_Id',
            'RequestTime',
            'Request_Status',
            'Request_Type',
            //'Info',
            //'Estimated_score',
            //'Estimated_Level',
        
            ['class' => 'yii\grid\ActionColumn',
            
              'template' => '{myButton}', 
             
            'buttons' => [
                 'myButton' => function($url, $model,$key)   {
            return Html::a('<button class="btn btn-success">View</button>',['../index.php'],);
                    },]
            ],
        ],
    ]); ?>


</div>