<?php

namespace tests;

use tests\overrides\TestMarkerClusterAsset;
use yii\web\AssetBundle;

class MarkerClusterAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestMarkerClusterAsset::register($view);
        $this->assertCount(3,$view->assetBundles);
        $this->assertTrue($view->assetBundles['tests\\overrides\\TestMarkerClusterAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('leaflet.css', $content);
        $this->assertContains('MarkerCluster.css', $content);
        $this->assertContains('leaflet.markercluster-src.js', $content);

    }
}
