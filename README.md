# RRZE Base

Basic template and requirements for all WordPress RRZE plugins.

## Recommended directory scheme

```sh
rrze-base/
├── src/                             	Source files directory
|   ├── sass/                           Sass files directory
|   └── js/                             JS files directory
├── assets/                             Assets files directory
|   ├── js/                             Minified JS files directory
|   └── css/                            Minified CSS files directory
|   └── img/                            Image files directory
├── settings/                           Settings files directory
├── includes/                           PHP files (mainly classes) directory
|   ├── Main.php                        Main class file
|   └── AnotherClass.php                Another class file
├── languages/                          Language files directory
|   ├── rrze-base.pot                   Template file
|   ├── rrze-base-de_DE.po              German translation file
|   ├── rrze-base-de_DE.mo              German translation file
|   ├── rrze-base-de_DE_formal.po       German formal translation file
|   └── rrze-base-de_DE_formal.mo       German formal translation file
├── vendor/                             Vendors directory (composer)
├── .gitignore                          Gitignore file
├── composer.json                       Composer settings file
├── composer.lock                       Composer lock file
├── rrze-base.php                       Main plugin file
├── README-TEMPLATE.md                  README Template file
└── README.md                           Notes on using the plugin (this file)
```
