# Ever Universe Websites

The code that powers "Ever Universe" websites:
- https://ever.co
- https://services.ever.co
- ...

# Services.ever.co

### Theme

This website is powered by [WordPress](https://wordpress.org/download/) and uses the Ever theme. The Ever theme is a custom WordPress theme inspired by [ever theme](https://wordpress.org/themes/ever/), lightweight theme issued under the GPL License.
The theme code is available under  `services_ever_co/themes` folder. The two main files in the Ever theme are functions.php and style.css (the way it is shown in the [WordPress documentation](https://developer.wordpress.org/themes/advanced-topics/child-themes/)). The theme supports the following custom post types: 
* jobs 
* projects 
* testimonials
* team members
  
It uses shortcodes to display the custom post types on the homepage. The theme also supports the option to upload logo and to customize the primary menu from the WordPress dashboard. The theme templates can be found under the `source` folder. 

### Plugins

The website uses the following plugins:

* Contact Form 7 - The most popular and acknowledged free plugin for creating contact forms. To edit an existing contact form on the website, go to `dashboard->contact->contact forms`
  and click on the form you want to edit. It is fairly easy to use, however, if you need further assistance, they provide an awesome [documentation](https://contactform7.com/docs/) that you can always refer to.

* Counter Number Showcase - A very simple plugin that animates the statistics tab on the home page. You can edit the options from `dashboard->counter numbers-> all counters`. Very intuitive and easy to use.

* Loco translate - It helps creating and maintaining .po and .mo translation files directly from the browser. You can use this plugin to translate plugins, themes or custom strings via the WordPress dashboard. To translate a plugin, e.g. simple job board, go to `dashboard -> loco translate -> plugins -> simple job board plugin`. Click on the desired translation (edit) and start translating! As simple as that.

* Polylang - the plugin that makes it possible to have pages on different languages. To set this plugin up, you need to assign a language to each page and then add translations to it. You basically have to create different page for each language and Polylang takes care for the rest. Check their extensive [docs](https://polylang.wordpress.com/documentation/) for further guidance.

* Simple Job Board - This plugin creates custom post types Jobs and lets the admin post a new job. It is very easy to use, you just create a new Job from the admin, as if you are creating a page or a post.

* WP-Optimize - Clean, Compress, Cache - This is my favourite lightweight plugin. It empowers the user to clean up the database from unnecessary rows, expired transient options, etc., without having to write manual SQL queries. Safe, efficient and fast. With this plugin, you can also compress images that have already been uploaded to the WordPress `uploads` folder.

* Multiple Post Thumbnails - Adds the ability to add multiple post thumbnails to a post type.

## Attribution

The Ever theme's code structure is based on the [Scaffold theme](https://wordpress.org/themes/scafold/) by Danny Cooper, lightweight WordPress theme issued under the GPL License.

View full list of our [contributors](https://github.com/ever-co/ever-website/graphs/contributors).

## Contributors

- [Atanas Yonkov](https://github.com/yonkov) - Wordpress Themes
- [Dimana Tsvetkova](https://github.com/DimanaTsvetkova) - HTML/CSS/JS
- [Milena Dimova](https://www.linkedin.com/in/dimova-milena-31010414) (UI/UX Designer)
- [Ruslan Konviser](https://github.com/evereq) - Idea / Business / Content

## Contact Us

-   For business inquiries: <mailto:ever@ever.co>
-   Please report security vulnerabilities to <mailto:security@ever.co>

## Trademarks

**Ever**® is a registered trademark of [Ever Co. LTD](https://ever.co).

**Ever® Platform™**, **Ever® Platform Community™**, **Ever® Platform Small Business™** and **Ever® Platform Enterprise™** are all trademarks of [Ever Co. LTD](https://ever.co).

**Gauzy™** is a trademark of [Ever Co. LTD](https://ever.co).

The trademarks may only be used with the written permission of Ever Co. LTD. and may not be used to promote or otherwise market competitive products or services.

All other brand and product names are trademarks, registered trademarks or service marks of their respective holders.

#### Copyright © 2019-present, Ever Co. LTD. All rights reserved.
