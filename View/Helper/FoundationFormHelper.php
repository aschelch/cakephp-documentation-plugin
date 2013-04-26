<?php

App::uses('FormHelper', 'View/Helper');

class FoundationFormHelper extends FormHelper {

    public function create($model = null, $options = array()) {
        $defaultOptions = array(
            'inputDefaults' => array(
                'div' => array('class'=>'large-12 columns'),
                'error' => array('wrap' => 'small')
            )
        );      

        if(!empty($options['inputDefaults'])) {
            $options = array_merge($defaultOptions['inputDefaults'], $options['inputDefaults']);
        } else {
            $options = array_merge($defaultOptions, $options);
        }
        return parent::create($model, $options);
    }
}