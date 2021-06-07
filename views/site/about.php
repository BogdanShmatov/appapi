<?php

/* @var $this yii\web\View */

use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
<?php


$gridColumns = [
    [
        'attribute' => 'id',
    ],
    [
        'attribute' => 'course_description',
    ],
[
    'class' => 'kartik\grid\EditableColumn',
    'attribute' => 'id',
],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'course_name',
        'readonly' => function($model, $key, $index, $widget) {
            return false; // do not allow editing of inactive records
        },
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'course_author',
        'readonly' => function($model, $key, $index, $widget) {
            return false; // do not allow editing of inactive records
        },
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'course_price',
        'readonly' => function($model, $key, $index, $widget) {
            return false; // do not allow editing of inactive records
        },
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'course_price',
        'readonly' => function($model, $key, $index, $widget) {
            return false; // do not allow editing of inactive records
        },
        'value' => function ($data) {
            return Html::dropDownList(null, null, [1,2,3,4,5,12,15,2002]);
        },
        'format' => 'raw'
    ],
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'pageSummary' => '<small>(amounts in $)</small>',
        'pageSummaryOptions' => ['colspan' => 3, 'data-colspan-dir' => 'rtl']
    ],

];
echo GridView::widget([
    'moduleId' => 'gridviewKrajee',
    'id' => 'kv-grid-demo',
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
]);