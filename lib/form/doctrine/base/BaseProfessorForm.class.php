<?php

/**
 * Professor form base class.
 *
 * @method Professor getObject() Returns the current form's model object
 *
 * @package    limelight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfessorForm extends PersonForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('professor[%s]');
  }

  public function getModelName()
  {
    return 'Professor';
  }

}
