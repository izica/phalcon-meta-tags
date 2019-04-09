# About
Phalcon meta tags plugin for PhalconPHP.

This plugin allows you to easily and flexibly customize the meta tags of your view.

If this plugin helped you, be glad to see your star, thank you.

Check out new validation package for PhalconPHP
https://github.com/izica/phalcon-validation

* [Install](#Install)
* [Plugin functions](#Plugin-functions)
* [Usage](#Usage)
    * [Register plugin as service](#Register-plugin-as-service)
    * [Add data to your layout](#Add-data-to-your-layout)
    * [Use service in controller, view or middleware(anywhere)](#use-service-in-controller-view-or-middlewareanywhere)
    * [Example of output](#Example-of-output)

# Install
```bash
    composer require izica/phalcon-meta-tags
```

# Plugin functions

```php
    setTitle($title)
    getTitle()
    setByProperty($property, $content)
    unsetByProperty($properties) //array or single property name

    setByName($name, $content)
    unsetByName($properties) //array or single name

    setCustom($key, $attributes) //unique key and attributes array
    unsetCustom($keys) //array or single value
    getMeta() // return metas string
```

# Usage:
## Register plugin as service:
```php
    $di = new DI();
    $di->set('metatag', function() {
    	return new IzicaMetaTags();
    });
```

## Add data to your layout:
```php
    <!DOCTYPE html>
    <html>
        <head>
            <?php echo $this->metatag->getTitle();?>
            <?php echo $this->metatag->getMeta();?>
        </head>
        <body>
             <?php echo $this->getContent(); ?>
        </body>
    </html>
```

## Use service in controller, view or middleware(anywhere):
```php
    use Phalcon\Mvc\Controller;

    class IndexController extends Controller
    {
        public function indexAction()
        {
            $this->metatag->setTitle("Phalcon MetaTags Service");

            $this->metatag->setCustom("charset", ['charset' => 'UTF-8']);
            $this->metatag->setCustom("http", ['http-equiv' => 'content-type', 'content' => 'text/html; charset=UTF-8']);

            $this->metatag->setByName("description", "phalcon php metatags");

            $this->metatag->setByProperty("og:description", "When Great Minds Don’t Think Alike");
        }
    }
```


## Example of output:
```html
    <title>Phalcon MetaTags Service</title>        
    <meta name="description" content="phalcon php metatags">
    <meta property="og:description" content="When Great Minds Don’t Think Alike">
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">  
```

