<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    limelight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'       => new sfWidgetFormInputText(),
      'last_name'        => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'status'           => new sfWidgetFormChoice(array('choices' => array('active' => 'active', 'pending' => 'pending', 'flagged' => 'flagged', 'disabled' => 'disabled'))),
      'activate_code'    => new sfWidgetFormInputText(),
      'activated'        => new sfWidgetFormInputText(),
      'profile_image'    => new sfWidgetFormInputText(),
      'score'            => new sfWidgetFormInputText(),
      'login_count'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'first_name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'            => new sfValidatorEmail(array('max_length' => 255)),
      'status'           => new sfValidatorChoice(array('choices' => array(0 => 'active', 1 => 'pending', 2 => 'flagged', 3 => 'disabled'), 'required' => false)),
      'activate_code'    => new sfValidatorString(array('max_length' => 14)),
      'activated'        => new sfValidatorInteger(array('required' => false)),
      'profile_image'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'score'            => new sfValidatorInteger(array('required' => false)),
      'login_count'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
