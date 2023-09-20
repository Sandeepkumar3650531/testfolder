<?php
namespace Drupal\module_build\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Routing;

class module_buildForm extends ConfigFormBase
{
    protected function getEditableConfigNames()
    {
        return [
            'module_build.settings',
        ];
    }


    public function getFormId()
    {
        return 'settings_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {

          die("sdfsdfsdf");

        $config = $this->config('module_build.settings');
        //name; 
        $form['name.'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Candidate name'),
            '#default_value' => $config->get('name'),
        );
        //contact no;
        $form['Contact no.'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Contact no.'),
            '#default_value' => $config->get('Contact no.'),
        );
        // email        
        $form['email Id.'] = array(
            '#type' => 'email',
            '#title' => $this->t('email Id.'),
            '#default_value' => $config->get('email Id.'),
        );
        // email        
        $form['DOB.'] = array(
            '#type' => 'date',
            '#title' => $this->t('DOB'),
            '#default_value' => $config->get('email Id.'),
        );
        //address ;
        $form['Address.'] = array(
            '#type' => 'textarea',
            '#title' => $this->t('Address.'),
            '#default_value' => $config->get('Address.'),
        );
        return parent::buildForm($form, $form_state);
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {

        parent::submitForm($form, $form_state);
        $this->config('module_build.settings')
            ->set('bio', $form_state->getValue('bio'))
            ->save();



    }
}