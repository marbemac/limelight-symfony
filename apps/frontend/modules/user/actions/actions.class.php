<?php

/**
 * user actions.
 *
 * @package    user
 * @subpackage user
 * @author     marc m
 */
class userActions extends sfActions {
  /**
   * executeNewUser
   * Displays the register user form and handles submission and creation of user
   */
  public function executeNew(sfWebRequest $request)
  {
    $user = $this->getUser();
    if ($user->isAuthenticated())
      return $this->redirect('@homepage');

    $this->form = new RegisterForm();
  }

  public function executeCreate(sfWebRequest $request) {
    $this->form = new RegisterForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function processForm(sfWebRequest $request, sfForm $form) {
    $captcha = array(
      'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
      'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
    );
    $this->form->bind(array_merge($request->getParameter($form->getName()), array('captcha' => $captcha)));

    if ($this->form->isValid())
    {
      $user = $request->getParameter('user');
      $sfUser = new sfGuardUser();
      $sfUser->username = $user['username'];
      $sfUser->password = $user['password'];
      $sfUser->Profile->email = $user['email'];
      $sfUser->Profile->activate_code = uniqid('U');
      $sfUser->save();

      $this->redirect('@homepage');
      //$request->setParameter('email', $user['email']);
      //$request->setParameter('username', $user['username']);
      //$request->setParameter('id', $id);
      //$this->forward('mailer', 'validateEmail');
    }
  }
}

?>
