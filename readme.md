##Class functions:
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

#Usage:
##Register service:
```php
    $di = new DI();
    $di->set('metatag', function() {
    	return new IzicaMetaTags();
    });
```
##Set meta info:
```php
    $this->metatag->setTitle("Phalcon MetaTags Service");

    $this->metatag->setCustom("charset", ['charset' => 'UTF-8']);
    $this->metatag->setCustom("http", ['http-equiv' => 'content-type', 'content' => 'text/html; charset=UTF-8']);

    $this->metatag->setByName("description", "phalcon php metatags");

    $this->metatag->setByProperty("og:description", "When Great Minds Don’t Think Alike");
```
##Example view:
```php
<!DOCTYPE html>
    <html>
        <head>
            <?=$this->metatag->getTitle();?>
            <?=$this->metatag->getMeta();?>
        </head>
        <body>
             <?php echo $this->getContent(); ?>
        </body>
    </html>
```
Output:
```html
    <title>Phalcon MetaTags Service</title>        
    <meta name="description" content="phalcon php metatags">
    <meta property="og:description" content="When Great Minds Don’t Think Alike">
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">  
```
