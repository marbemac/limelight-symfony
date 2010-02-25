
<div id="register_container">
  <div class="sr_head">Create a New Account</div>
  <div id="r_user_url">your personal url: techlimelight.com/<span><?php echo ($form['username']->getValue() ? $form['username']->getValue() : '?') ?></span></div>
  
  <?php echo form_tag_for($form, '@user') ?>
    <?php foreach ($form as $field): ?>
    <div class="reg_field_name">
      <?php if($field->getName() != '_csrf_token') echo $field->renderLabel(); ?>
      <span id="<?php echo $field->getName() ?>_error" class="reg_error rnd_5 <?php if(!$field->hasError()) echo 'hide' ?> <?php if ($field->getName() == '_csrf_token' || $field->getName() == 'captcha') echo 'reg_error2' ?>">
        <?php if($field->hasError()) echo $field->getError(); ?>
      </span>
    </div>
    <div><?php echo $field->render() ?></div>
    <?php endforeach; ?>
    <div>* A confirmation code will be sent to your email address.</div>
    <div>** We will NEVER share your personal information.</div>
    <?php echo submit_tag('', array('id' => 'reg_button')) ?>
  </form>
</div>

<div id="register_info">
* Privacy<br />
* Features<br />
Pretty screens pictures etc
</div>