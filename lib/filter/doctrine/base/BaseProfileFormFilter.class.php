<?php

/**
 * Profile filter form base class.
 *
 * @package    limelight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'first_name'       => new sfWidgetFormFilterInput(),
      'last_name'        => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'active' => 'active', 'pending' => 'pending', 'flagged' => 'flagged', 'disabled' => 'disabled'))),
      'activate_code'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activated'        => new sfWidgetFormFilterInput(),
      'profile_image'    => new sfWidgetFormFilterInput(),
      'score'            => new sfWidgetFormFilterInput(),
      'login_count'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'first_name'       => new sfValidatorPass(array('required' => false)),
      'last_name'        => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'status'           => new sfValidatorChoice(array('required' => false, 'choices' => array('active' => 'active', 'pending' => 'pending', 'flagged' => 'flagged', 'disabled' => 'disabled'))),
      'activate_code'    => new sfValidatorPass(array('required' => false)),
      'activated'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profile_image'    => new sfValidatorPass(array('required' => false)),
      'score'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'login_count'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sf_guard_user_id' => 'ForeignKey',
      'first_name'       => 'Text',
      'last_name'        => 'Text',
      'email'            => 'Text',
      'status'           => 'Enum',
      'activate_code'    => 'Text',
      'activated'        => 'Number',
      'profile_image'    => 'Text',
      'score'            => 'Number',
      'login_count'      => 'Number',
    );
  }
}
