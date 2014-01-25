# Cherry Bootstrap Plugin

Cherry is a Twitter Bootstrap plugin for CakePHP

## Requirements

The master branch has the following requirements:

* CakePHP 2.2.0 or greater.
* PHP 5.3.0 or greater.

## Installation

* Clone/Copy the files in this directory into `app/Plugin/Cherry`
* Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Cherry');`
* Include the form helper in your `AppController.php`:
   * `public $helpers = array('Form' => array('className' => 'Cherry.CherryForm'));`
* Copy the `app/Plugin/Cherry/View/Layouts/default.ctp` file over your current 'default.ctp' file to gain access to bootstrap in your views
* Modify `default.ctp` and any of your views to take advantage of Twitter Bootstrap's functionality

# Documentation

## Cherry Console Templates

We have included Console Templates to allow you to easily bake a project and gain bootstrap functionality throughout.

To utilize the Console Templates simply bake your project like usual but select `Cherry`

## Cherry Form Helper

The Cherry Form Helper was built to take advantage of Twitter Bootstrap's form layouts. It will wrap form elements in the appropriate classes but passes on everything else to the default Form Helper.

To change a form from a regular CakePHP form to a Bootstrap form all you need to do is add `'cherry' => true` to the Form Helper `create` method.

* For example: `<?php echo $this->Form->create('User', array('cherry' => true)); ?>`

You can also utilize Twitter Bootstrap's build in form classes by passing them in the Form Helper `create` method instead.

* For example: `<?php echo $this->Form->create('User', array('cherry' => 'form-horizontal')); ?>`
