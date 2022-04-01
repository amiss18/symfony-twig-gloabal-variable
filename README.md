Symfony 5 Webpack-encore & bootstrap 5
====================================

This is an example web app using  Symfony 5 , and Carousel Bootstrap 5-alpha.

![Alt text](screenshot/header.png?raw=true "home page")

Requirements
------------

  * PHP 8.0 or higher;
  * and the [usual Symfony application requirements][1].

Installation
------------
- Clone the repo
- Install dependencies using composer


```bash
$ composer install
```



- CSS & JS 

CSS can be found in the `assets/css` folder and JS can be found in the `assets/js` folder

```bash
$ yarn install
```

Build assets

```bash
$ yarn run dev
```

New files will be generated in `public/build/` directory.


Usage
-----
- Run the PHP webserver:


```bash
$ php -S localhost:8000 -t public
```
 Access from a browser using this URL: `http://localhost:8000`


[1]: https://symfony.com/doc/current/reference/requirements.html