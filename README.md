# FlexiSlide 0.1

A custom WordPress slider plugin that uses [FlexSlider](https://www.woothemes.com/flexslider/) and custom post types.

### Shortcode

You can either enter the shortcode `[fs-slider]` in the WordPress WYSIWYG editor or insert `<?php echo do_shortcode('[fs_slider]') ?>` into the template file you want the slider to display in.

### Setup

To add a link and caption to a particular slide, just add the `image_caption` and `image_link` custom field keys, respectively.

### Customize

You can customize the slider object's properties on line 33 of `flexslide.php`. For a comprehensive list of all properties and options visit [https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties](https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties)