<?php

namespace tests\overrides;
use dosamigos\leaflet\plugins\markercluster\MarkerCluster;

class TestMarkerCluster extends MarkerCluster
{
    public function registerAssetBundle($view)
    {
        TestMarkerClusterAsset::register($view);

        return $this;
    }
}
