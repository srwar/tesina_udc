<?php

/**
 * principal actions.
 *
 * @package    pelota_paleta
 * @subpackage principal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class principalActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {    
    $loc = array();
    $this->loc = LocalidadQuery::create()->find();
            
    /*foreach ($loc as $l){
        echo "--> ".$l."\n";
    }*/
  }
}
