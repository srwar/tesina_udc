<?php

/**
 * personaFisica actions.
 *
 * @package    tesina_udc
 * @subpackage personaFisica
 * @author     Your name here
 */
class personaFisicaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->PersonaFisicas = PersonaFisicaQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PersonaFisicaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PersonaFisicaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $PersonaFisica = PersonaFisicaQuery::create()->findPk($request->getParameter('id_persona_fisica'));
    $this->forward404Unless($PersonaFisica, sprintf('Object PersonaFisica does not exist (%s).', $request->getParameter('id_persona_fisica')));
    $this->form = new PersonaFisicaForm($PersonaFisica);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $PersonaFisica = PersonaFisicaQuery::create()->findPk($request->getParameter('id_persona_fisica'));
    $this->forward404Unless($PersonaFisica, sprintf('Object PersonaFisica does not exist (%s).', $request->getParameter('id_persona_fisica')));
    $this->form = new PersonaFisicaForm($PersonaFisica);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $PersonaFisica = PersonaFisicaQuery::create()->findPk($request->getParameter('id_persona_fisica'));
    $this->forward404Unless($PersonaFisica, sprintf('Object PersonaFisica does not exist (%s).', $request->getParameter('id_persona_fisica')));
    $PersonaFisica->delete();

    $this->redirect('personaFisica/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $PersonaFisica = $form->save();

      $this->redirect('personaFisica/index');
      //$this->redirect('personaFisica/edit?id_persona_fisica='.$PersonaFisica->getIdPersonaFisica());
    }
  }
}
