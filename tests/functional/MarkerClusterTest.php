<?php

namespace tests;


use dosamigos\leaflet\layers\Marker;
use dosamigos\leaflet\plugins\markercluster\MarkerCluster;
use dosamigos\leaflet\types\LatLng;
use tests\overrides\TestMarkerCluster;

class MarkerClusterTest extends TestCase
{
    public function testEncode()
    {
        $latLng = new LatLng(['lat' => 51.508, 'lng' => -0.11]);
        $marker = new Marker(
            [
                'latLng' => $latLng,
                'popupContent' => 'test!'
            ]
        );

        $plugin = new MarkerCluster();

        $this->assertEquals($marker, $plugin->addMarker($marker)->getMarkers()[0]);

        $plugin->map = 'testMap';
        $this->assertEquals('plugin:markercluster', $plugin->getPluginName());
        $contents = $plugin->encode();
        $this->assertEquals(file_get_contents(__DIR__ . '/data/markercluster-no-url-encode.bin'), $contents);

        $plugin->clientOptions = [];
        $plugin->url = 'http://example.com/json/';
        $contents = $plugin->encode();
        $this->assertEquals(file_get_contents(__DIR__ . '/data/markercluster-with-url-encode.bin'), $contents);

        $plugin = new MarkerCluster();

        $this->assertEmpty($plugin->encode());
    }

    public function testRegister()
    {
        $view = $this->getView();
        $plugin = new TestMarkerCluster();

        $this->assertEquals($plugin, $plugin->registerAssetBundle($view));

        $this->assertCount(3, $view->assetBundles);

        $this->assertArrayHasKey('tests\overrides\TestMarkerClusterAsset', $view->assetBundles);

        $this->assertEquals(
            'js/leaflet.markercluster-src.js',
            $view->assetBundles['tests\overrides\TestMarkerClusterAsset']->js[0]
        );
    }

}
