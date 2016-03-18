# VCG FlexiSlide 1.0.0

A custom WordPress slider plugin that uses [FlexSlider](https://www.woothemes.com/flexslider/) for VCG's internal use.

### Shortcode

You can either enter the shortcode `[vcg-fs-slider]` in the WordPress WYSIWYG editor or insert `<?php echo do_shortcode('[vcg_fs_slider]') ?>` into the template file you want the slider to display in.

### Setup

To add a link and caption to a particular slide, just add the `image_caption` and `image_link` custom field keys, respectively.

### Customize

You can customize the slider object's properties on line 33 of `vcg-flexslide.php`. For a comprehensive list of all properties and options visit [https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties](https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties)