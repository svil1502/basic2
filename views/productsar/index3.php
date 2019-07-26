<?php

use yii\grid\GridView;


//            'id',
//
//           'categoryId',
//            'price',
//            'hidden',

//$resultData = [
//    array("id"=>1,"name"=>"Cyrus","email"=>"risus@consequatdolorvitae.org"),
//    array("id"=>2,"name"=>"Justin","email"=>"ac.facilisis.facilisis@at.ca"),
//    array("id"=>3,"name"=>"Mason","email"=>"in.cursus.et@arcuacorci.ca"),
//    array("id"=>4,"name"=>"Fulton","email"=>"a@faucibusorciluctus.edu"),
//    array("id"=>5,"name"=>"Neville","email"=>"eleifend@consequatlectus.com"),
//    array("id"=>6,"name"=>"Jasper","email"=>"lectus.justo@miAliquam.com"),
//    array("id"=>7,"name"=>"Neville","email"=>"Morbi.non.sapien@dapibusquam.org"),
//    array("id"=>8,"name"=>"Neville","email"=>"condimentum.eget@egestas.edu"),
//    array("id"=>9,"name"=>"Ronan","email"=>"orci.adipiscing@interdumligulaeu.com"),
//    array("id"=>10,"name"=>"Raphael","email"=>"nec.tempus@commodohendrerit.co.uk"),
//];
//debug($resultData);

$resultData=$array_products['item'];
//debug($resultData);
function filter_price($item) {
    $pricefilter = (String)Yii::$app->request->getQueryParam('filtereprice', '');

    if ((strlen($pricefilter) > 0))
    {
        if (strpos($item['price'], $pricefilter) !== false)
        {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}
function filter_hidden($item) {
    $hiddenfilter = (String)Yii::$app->request->getQueryParam('filterehidden', '');

    if ((strlen($hiddenfilter) > 0))
    {
        if (strpos($item['hidden'], $hiddenfilter) !== false)
        {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function filter_categoryId($item) {
    $categoryIdfilter = (String)Yii::$app->request->getQueryParam('filterecategoryId', '');

    if ((strlen($categoryIdfilter) > 0))
    {
        if (strpos($item['categoryId'], $categoryIdfilter) !== false)
        {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function filterid($item) {
    $idfilter = (String)Yii::$app->request->getQueryParam('filtereid', '');

    if ((strlen($idfilter) > 0))
    {
        if (strpos($item['id'], $idfilter) !== false)
        {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}


$filteredresultData_price = array_filter($resultData, 'filter_price');

$filteredresultData_hidden = array_filter($filteredresultData_price, 'filter_hidden');

$filteredresultData_categoryId = array_filter($filteredresultData_hidden, 'filter_categoryId');

$filteredresultData = array_filter($filteredresultData_categoryId, 'filterid');

$pricefilter = Yii::$app->request->getQueryParam('filtereprice', '');
$categoryIdfilter = Yii::$app->request->getQueryParam('filtercategoryId', '');
$hiddenfilter = Yii::$app->request->getQueryParam('filterhidden', '');

$searchModel = ['id' => null, 'categoryId' => $categoryIdfilter, 'price' => $pricefilter, 'hidden' => $hiddenfilter];

$dataProvider = new \yii\data\ArrayDataProvider([
    'key'=>'id',
    'allModels' => $filteredresultData,
    'sort' => [
        'attributes' => ['id', 'categoryId', 'price','hidden'],
    ],
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,

    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            'filter' => '<input class="form-control" name="filtereid" value="'. $searchModel['id'] .'" type="text">',
            'value' => 'id',
        ],

        [
            'attribute' => 'categoryId',
            'filter' => '<input class="form-control" name="filterecategoryId" value="'. $searchModel['categoryId'] .'" type="text">',
            'value' => 'categoryId',
        ],
        [
            "attribute" => "price",
            'filter' => '<input class="form-control" name="filtereprice" value="'. $searchModel['price'] .'" type="text">',
            'value' => 'price',
        ],
        [
            'attribute' => 'hidden',
            'filter' => '<input class="form-control" name="filterehidden" value="'. $searchModel['hidden'] .'" type="text">',
            'value' => 'hidden',
        ],

    ]
]);

echo $pricefilter;
debug($filteredresultData);
//собираем данные в 1 общий массив
//for ($i = 0; $i < count($products); $i++){
//    $cat_name = $categories[array_search($products[$i]['categoryId'], array_column($categories, 'id'))]['name'];
//    $products[$i]['category'] = $cat_name;
//    unset($products[$i]['categoryId']);
//}