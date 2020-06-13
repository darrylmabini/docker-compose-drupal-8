<?php

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

$cache_bins = [
  'bootstrap',
  'config',
  'data',
  'default',
  'discovery',
  'dynamic_page_cache',
  'entity',
  'menu',
  'migrate',
  'render',
  'rest',
  'static',
  'toolbar',
];

foreach ($cache_bins as $bin) {
  $settings['cache']['bins'][$bin] = 'cache.backend.null';
}

$settings['extension_discovery_scan_tests'] = FALSE;