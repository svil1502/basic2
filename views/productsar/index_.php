<?php

use yii\grid\GridView;

//echo \yii\grid\GridView::widget(
//    [
//
//        'dataProvider' => $dataProvider,
//
//        'columns' => [
//
//            [
//                'class' => \yii\grid\SerialColumn::class,
//            ],
//
//            'id',
//
//            'name',
//
//        ],
//    ]
//);

//echo \yii\grid\GridView::widget(
//    [
//
//        'dataProvider' => $dataProvider,
//
//        'columns' => [
//
//            [
//                'class' => \yii\grid\SerialColumn::class,
//            ],
//
//            'id',
//
//           'categoryId',
//            'price',
//            'hidden',
//
//        ],
//    ]
//);

//debug($array['item']);
//debug($array_products['item']);

//debug($array_products['item']);
//$resultData=$array_products['item'];
$resultData = [
    array("id"=>1,"name"=>"Cyrus","email"=>"risus@consequatdolorvitae.org"),
    array("id"=>2,"name"=>"Justin","email"=>"ac.facilisis.facilisis@at.ca"),
    array("id"=>3,"name"=>"Mason","email"=>"in.cursus.et@arcuacorci.ca"),
    array("id"=>4,"name"=>"Fulton","email"=>"a@faucibusorciluctus.edu"),
    array("id"=>5,"name"=>"Neville","email"=>"eleifend@consequatlectus.com"),
    array("id"=>6,"name"=>"Jasper","email"=>"lectus.justo@miAliquam.com"),
    array("id"=>7,"name"=>"Neville","email"=>"Morbi.non.sapien@dapibusquam.org"),
    array("id"=>8,"name"=>"Neville","email"=>"condimentum.eget@egestas.edu"),
    array("id"=>9,"name"=>"Ronan","email"=>"orci.adipiscing@interdumligulaeu.com"),
    array("id"=>10,"name"=>"Raphael","email"=>"nec.tempus@commodohendrerit.co.uk"),
];
debug($resultData);
function filter($item) {
    $mailfilter = Yii::$app->request->getQueryParam('filteremail', '');
    if (strlen($mailfilter) > 0) {
        if (strpos($item['email'], $mailfilter) != false) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

$filteredresultData = array_filter($resultData, 'filter');


$mailfilter = Yii::$app->request->getQueryParam('filteremail', '');
$namefilter = Yii::$app->request->getQueryParam('filtername', '');

$searchModel = ['id' => null, 'name' => $namefilter, 'email' => $mailfilter];

$dataProvider = new \yii\data\ArrayDataProvider([
    'key'=>'id',
    'allModels' => $filteredresultData,
    'sort' => [
        'attributes' => ['id', 'name', 'email'],
    ],
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',

        [
            'attribute' => 'name',
            'value' => 'name',
        ],
        [
            "attribute" => "email",
            'filter' => '<input class="form-control" name="filteremail" value="'. $searchModel['email'] .'" type="text">',
            'value' => 'email',
        ]

    ]
]);
echo $mailfilter;
debug($filteredresultData);