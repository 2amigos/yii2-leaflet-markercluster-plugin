Marker Cluster Plugin
=====================

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-leaflet-markercluster-plugin.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-leaflet-markercluster-plugin/tags)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-leaflet-markercluster-plugin/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-leaflet-markercluster-plugin)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-leaflet-markercluster-plugin.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-leaflet-markercluster-plugin/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-leaflet-markercluster-plugin.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-leaflet-markercluster-plugin)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-leaflet-markercluster-plugin.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-leaflet-markercluster-plugin)

Yii 2 [LeafletJs](http://leafletjs.com/) Plugin to provide beautiful, sophisticated, high performance marker clustering solution with smooth
animations and lots of great features. This Plugin works in conjunction with [LeafLet](https://github.com/2amigos/yii2-leaflet-extension)
library for [Yii 2](https://github.com/yiisoft/yii2) framework.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require 2amigos/yii2-leaflet-markercluster-plugin:~1.0
```
or add

```json
"2amigos/yii2-leaflet-markercluster-plugin" : "~1.0"
```

to the require section of your application's `composer.json` file.

Usage
-----

Using an external json url source:

```
// LeafLet initialization component
// ...

// create cluster plugin
$cluster = new dosamigos\leaflet\plugins\markercluster\MarkerCluster([
     'jsonUrl' =>  Yii::$app->controller->createUrl('site/json')
]);

// install to LeafLet component
$leafLet->plugins->install($cluster);

// done render widget
echo $leafLet->widget(['options' => ['style' => 'height: 400px']]);

```

The example action returning the markers:

```
public function actionJson()
{
    Yii::$app->getResponse()->format = Response::FORMAT_JSON;
    echo json_encode([
        "markers" =>  [
            ["lat"=>-37.8210922667, "lng"=>175.2209316333, "popup" => "2"],
            ["lat"=>-37.8210819833, "lng"=>175.2213903167, "popup" => "3"],

        ]
    ]);
}

```

Now, adding markers as we create them:

```
// LeafLet initialization component
// ...

// create cluster plugin
$cluster = new dosamigos\leaflet\plugins\markercluster\MarkerCluster([
     'jsonUrl' =>  Yii::$app->controller->createUrl('site/json')
]);

// sample location
$center = new dosamigos\leaflet\types\LatLng(['lat' => 51.508, 'lng' => -0.11]);

$marker1 = new dosamigos\leaflet\layers\Marker([
    'latLng' => $center,
    'popupContent' => 'Hey! I am a marker'
]);

$marker2 = new dosamigos\leaflet\layers\Marker([
     'latLng' => $center,
     'popupContent' => 'Hey! I am a second marker'
]);

// add them to the cluster plugin
$cluster
    ->addLayer($marker1)
    ->addLayer($marker2);

// install to LeafLet component
$leafLet->plugins->install($cluster);


```

> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)
