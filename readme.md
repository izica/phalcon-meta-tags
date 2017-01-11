Usage:
Register service:
$di = new DI();
$di->set('metatag', function() use ($config) {
	return new IzicaMetaTags();
});

Set meta info:
$this->metatag->setTitle("Phalcon MetaTags Service");

$this->metatag->setCustom("charset", ['charset' => 'UTF-8']);
$this->metatag->setCustom("http", ['http-equiv' => 'content-type', 'content' => 'text/html; charset=UTF-8']);

$this->metatag->setByName("description", "phalcon php metatags");

$this->metatag->setByProperty("og:description", "When Great Minds Don’t Think Alike");

Example view:
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

Output:
<title>Phalcon MetaTags Service</title>        
<meta name="description" content="phalcon php metatags">
<meta property="og:description" content="When Great Minds Don’t Think Alike">
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">  
