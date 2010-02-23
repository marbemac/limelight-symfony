<?php

/**
 * Person form base class.
 *
 * @method Person getObject() Returns the current form's model object
 *
 * @package    limelight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'specialty'  => new sfWidgetFormInputText(),
      'graduation' => new sfWidgetFormInputText(),
      'promotion'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 50)),
      'last_name'  => new sfValidatorString(array('max_length' => 50)),
      'type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'specialty'  => new sfValidatorString(array('max_length' => 50)),
      'graduation' => new sfValidatorString(array('max_length' => 20)),
      'promotion'  => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

}
