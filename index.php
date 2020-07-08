<?php

Kirby::plugin('monoeq/kprops', [
  'options' => [
    'key' => 'props'
  ]
]);

/**
 * Returns an array with a new Content object assigned to a `props` key
 *
 * @param array|null $data
 * @param object|null $parent
 * @param bool|null $raw
 */

function kprops (array $data = [ ], $parent = null, $raw = null) {
  $props = new Kirby\Cms\Content($data, $parent ? $parent : page());

  if ($raw) {
    return $props;
  } else {
    return [
      option('monoeq.kprops.key', 'props') => $props
    ];
  }
}