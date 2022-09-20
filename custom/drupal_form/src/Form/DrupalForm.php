<?php

namespace Drupal\drupal_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class DrupalForm extends FormBase
{

  public function getFormId() {
    return 'drupalup_form';
  }


  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
    ];

    $form['subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subject'),
    ];

    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
    ];

    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('E-mail'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }


  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

    $email = $form_state->getValue('email');

    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
      $form_state->setErrorByName('email', $this->t('Check your email'));
    }

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message('Form submitted successfully');
    $message = $form_state->getValue('email');
    \Drupal::logger('DrupalForm')->notice($message);
  }


}
