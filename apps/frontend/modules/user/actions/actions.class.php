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

    if ($request->isMethod('post') && $request->getParameter('user'))
    {
      $this->form->bind($request->getParameter('user'));
      $captcha = array(
        'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
        'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
      );
      $this->form->bind(array_merge($request->getParameter('user'), array('captcha' => $captcha)));

      if ($this->form->isValid())
      {
        $user = $request->getParameter('user');

        $id = uniqid('U');

        $sfUser = new sfGuardUser();
        $sfUser->username = $user['username'];
        $sfUser->password = $user['password'];
        $sfUser->Profile->email = $user['email'];
        $sfUser->Profile->activate_code = $id;
        $sfUser->save();

        $request->setParameter('email', $user['email']);
        $request->setParameter('username', $user['username']);
        $request->setParameter('id', $id);

        //$this->forward('mailer', 'validateEmail');
      }
    }
  }
}

?>
