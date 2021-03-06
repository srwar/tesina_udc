<?php

/**
 * direccion actions.
 *
 * @package    tesina_udc
 * @subpackage direccion
 * @author     Your name here
 */
class direccionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Direccions = DireccionQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DireccionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DireccionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Direccion = DireccionQuery::create()->findPk($request->getParameter('id_direccion'));
    $this->forward404Unless($Direccion, sprintf('Object Direccion does not exist (%s).', $request->getParameter('id_direccion')));
    $this->form = new DireccionForm($Direccion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Direccion = DireccionQuery::create()->findPk($request->getParameter('id_direccion'));
    $this->forward404Unless($Direccion, sprintf('Object Direccion does not exist (%s).', $request->getParameter('id_direccion')));
    $this->form = new DireccionForm($Direccion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Direccion = DireccionQuery::create()->findPk($request->getParameter('id_direccion'));
    $this->forward404Unless($Direccion, sprintf('Object Direccion does not exist (%s).', $request->getParameter('id_direccion')));
    $Direccion->delete();

    $this->redirect('direccion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Direccion = $form->save();

      $this->redirect('direccion/index');
      //$this->redirect('direccion/edit?id_direccion='.$Direccion->getIdDireccion());
    }
  }
}
