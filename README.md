Laravel Banner Carousel Slider
================================
This laravel package gives a banner management panel for a website. Also, it gives functionality for representing/displaying the managed banners as slide show in the website.

How to Install
=================
1. Download the package through composer by adding "solvercircle/scbanner": "dev-master" in your project's composer.json
2. add 'Solvercircle\Scbanner\ScbannerServiceProvider' in the providers array under app.php config file
3. Run the following command
```
php artisan scbanner:install
```
Usage
=======
You will get the banner management panel at http://yoursite/banners url. After installing, you need to set the settings for the banners of your site at first. You can do that on http://localhost/banners/settings url. Atleast you must set the File Upload Path there at first.

To display banners as slide show, you just need to call the following function in your laravel view or layout.
```
Solvercircle\Scbanner\BannerUI::display();
```

To get more information including screen shots and other details, you can visit [here]( http://wordpress-expert.codeinterest.com/laravel/laravel-banner-carousel).
