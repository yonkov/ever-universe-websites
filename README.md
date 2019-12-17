# ever-website

The code that powers "Ever Universe" websites:
- https://ever.co
- https://services.ever.co
- ...

## Services-Ever-Co

### Theme

This website uses the Ever theme, developed by Atanas Yonkov in 2019. The Ever theme is a child theme of the [Scaffold theme](https://wordpress.org/themes/scaffold/), lightweight WordPress theme issued under the GPL License.
The theme code is available under  `services_ever_co/themes` folder. The two main  theme's files are functions.php and style.css (as per wp docs, nothing exciting here).

### Plugins

The website uses the following plugins:

* Contact Form 7 - With this plugin are built all contact forms. To edit an existing contact form, go to `dashboard->contact->contact forms`
  and click on the form you want to edit. It is fairly easy to use, however, if you need further assistance, they have an awesome [documentation](https://contactform7.com/docs/) that you can always refer to.

* Counter Number Showcase - A very simple plugin that animates the statistics tab on the home page. You can edit the options from `dashboard->counter numbers-> all counters`. It is very intuitive and easy to use.

* Loco translate - It helps creating and maintaining .po and .mo translation files from the browser. You can use this plugin to translate plugins, themes or custom strings via the wordpress dashboard. To translate a plugin, e.g. simple job board, go to `dashboard -> loco translate -> plugins -> simple job board plugin`. Click on the desired translation (edit) and start translating! As simple as that.
* Polylang - the plugin that makes it possible to have pages on different languages. To set this plugin up, you need to assign a language to each page and then add translations to it. You basically have to create different page for each language andPolylang takes care for the rest. Check their [docs](https://polylang.wordpress.com/documentation/) for further guidance.
* Simple Job Board - This plugin creates custom post types Jobs and lets the admin post a new job. It is very easy to use, you just create a new Job from the admin as if you are creating a page or a post.
* WP-Optimize - Clean, Compress, Cache - This is my favourite lightweight plugin. It empowers me to clean up the database from unnecessary rows, expired transient options etc without having to write manual SQL queries. Safe, efficient and fast. With this plugin you can also compress images that have already been uploaded to the website's `uploads` folder.