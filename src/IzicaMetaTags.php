<?php

class IzicaMetaTags
{
    public $title = "";
    public $meta_custom = array();
    public $meta_name = array();
    public $meta_property = array();

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        if($this->title != "")
            return '<title>'.$this->title.'</title>';
        else
            return "";
    }

    public function setByProperty($property, $content)
    {
        $this->meta_property[$property] = htmlentities($content);
    }

    public function unsetByProperty($properties){
        if(is_array($properties)){
            foreach ($properties as $property) {
                if(isset($this->meta_property[$property]))
                    unset($this->meta_property[$property]);
            }
        }else{
            if(isset($this->meta_property[$properties]))
                unset($this->meta_property[$properties]);
        }

    }

    public function setByName($name, $content)
    {
        $this->meta_name[$name] = htmlentities($content);
    }

    public function unsetByName($names){
        if(is_array($names)){
            foreach ($names as $name) {
                if(isset($this->meta_name[$name]))
                    unset($this->meta_name[$name]);
            }
        }else{
            if(isset($this->meta_name[$names]))
                unset($this->meta_name[$names]);
        }

    }

    public function setCustom($key, $attributes)
    {
        foreach ($attributes as &$value) {
            $value = htmlentities($value);
        }
        $this->meta_custom[$key] = $attributes;
    }

    public function unsetCustom($keys){
        if(is_array($keys)){
            foreach ($keys as $key) {
                if(isset($this->meta_custom[$key]))
                    unset($this->meta_custom[$key]);
            }
        }else{
            if(isset($this->meta_custom[$keys]))
                unset($this->meta_custom[$keys]);
        }
    }

    public function getMeta()
    {
        $result = "";
        foreach ($this->meta_name as $name => $content) {
            $result .= '<meta name="'.$name.'" content="'.$content.'"/>';
        }
        foreach ($this->meta_property as $property => $content) {
            $result .= '<meta property="'.$property.'" content="'.$content.'"/>';
        }
        foreach ($this->meta_custom as $meta) {
            $tag = "<meta";
            foreach ($meta as $attr => $value) {
                $tag .= ' '.$attr.'="'.$value.'"';
            }
            $tag .= "/>";
            $result .= $tag;
        }
        return $result;
    }
}
