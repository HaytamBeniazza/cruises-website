<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {
    // Load model

    // Load view
    public function view($view, $data = [], $data2=[], $data3=[]){
      // Check for view file
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }

    function model($model)
    {
      require_once '../app/models/'.$model.'.php';
      return new $model;
    }
  }