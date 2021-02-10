<?php
namespace Src\traits;

trait UrlParser {
    #dividi a url em um array
   public function parserURL(){
       
       return explode("/",  rtrim($_GET['url']),FILTER_SANITIZE_URL);
       
   }
 
    
}
