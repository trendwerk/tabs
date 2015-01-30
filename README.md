Tabs
====

JavaScript tabs for WordPress. Use in templates or with shortcodes.

## Installation
If you're using Composer to manage WordPress, add this plugin to your project's dependencies. Run:
```sh
composer require trendwerk/tabs 1.0.0
```

Or manually add it to your `composer.json`:
```json
"require": {
	"trendwerk/tabs": "1.0.0"
},
```

## Usage

### Shortcode
Use the shortcodes to create tabs

	[tabs]
		[tab label="Tab 1"]
			This is tab 1 content
		[/tab]
		[tab label="Tab 2"]
			This content belongs to the second tab
		[/tab]
	[/tabs]

### Template
If you're using Emmet, you can use the following code to create 3 tabs

	(div.tabs>a.tab[href=#tab$]*3)+(div.tab-content-wrapper>div#tab$.tab-content*3)

	
If you're still using HTML, use this to use tabs in your template

```html
<div class="tabs">

	<a class="tab" href="#tab1">
		Tab 1
	</a>

	<a class="tab" href="#tab2">
		Tab 2
	</a>

</div>

<div class="tab-content-wrapper">

	<div id="tab1" class="tab-content">
		This is tab 1 content. Of course you can fill this with amazing dynamic content!
	</div>

	<div id="tab2" class="tab-content">
		This content belongs to the second tab
	</div>

</div>
```

## Options

### Link
You can also add a tab that just points to a link

	[tab label="About us" link="http://www.my-website.com/about-us/" /]
	
### Link relations
Maybe the link is external or you don't want to follow the link

	[tab label="About us" link="http://www.my-website.com/about-us/" rel="external" /]
