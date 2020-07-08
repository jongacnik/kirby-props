# Kirby Props → `kprops`

Helper to convert arrays to [`Kirby\Cms\Content`](https://getkirby.com/docs/reference/@/classes/cms/content) objects, particularly useful for snippets:

**Pass props**

```php
snippet('some-snippet', kprops([
  'text' => 'Here *is* some **text**',
  'image' => 'filename.jpg',
  'page' => 'some/page'
]));
```

**Access in `some-snippet`**

```php
<?= $props->text()->kirbytext() ?>
<?= $props->image()->toFile()->url() ?>
<?= $props->page()->toPage()->url() ?>
```

## Usage

### `kprops($data, $parent, $raw)`

- `Array $data` **\*required** → array to convert to [`Kirby\Cms\Content`](https://getkirby.com/docs/reference/@/classes/cms/content)
- `Page $parent` → parent `Page` object for the content object. Defaults to current page.
- `Boolean $raw` → if `true` returns content object directly. Default `false`.

## Details

Use the `$parent` argument when passing values (such as a filename), that belong to a specific page.

```php
$data = [ 'image' => 'filename.jpg' ]; // <- let’s say this file belongs to `some/page`
$page = page('some/page');

snippet('some-snippet', kprops($data, $page));
```

---

`kprops` returns an array which looks like:

```php
$output = kprops([]); // => [ 'props' => Kirby\Cms\Content ]
```

This is ideal for snippets which expect arrays. That said, the `$raw` argument can be passed to directly return the `Content`:

```php
$output = kprops([], page(), true); // => Kirby\Cms\Content
```

This is useful when using `kprops` outside of the context of snippets, or, if passing additional values into a snippet:

```php
snippet('some-snippet', [
  'key' => 'value',
  'props' => kprops([], page(), true)
]);
```

## Configuration

You can set the `key` content is assigned to:

**config.php**

```php
[
  'monoeq.kprops.key' => 'props' // default
]
```

## Installation

```
composer require monoeq/kirby-props
```

<details>
  <summary>Other installation methods</summary>

### Download

Download and copy this repository to `/site/plugins/kirby-props`.

### Git submodule

```
git submodule add https://github.com/jongacnik/kirby-props.git site/plugins/kirby-props
```
</details>