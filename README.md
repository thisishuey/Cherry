# Cherry Bootstrap Plugin

Cherry is a Twitter Bootstrap plugin for CakePHP

## Requirements

The master branch has the following requirements:

* CakePHP 2.2.0 or greater.
* PHP 5.3.0 or greater.

## Installation

1. Clone/Copy the files in this directory into `app/Plugin/Cherry`
2. Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Cherry');`
3. Include the form helper in your `AppController.php`:
	* `public $helpers = array('Form' => array('className' => 'Cherry.CherryForm'));`
4. Copy the `app/Plugin/Cherry/View/Layouts/default.ctp` file over your current `default.ctp` file to gain access to bootstrap in your views
5. Modify `default.ctp` and any of your views to take advantage of Twitter Bootstrap's functionality

### Install as Git submodule

You can replace step 1 above with the following to add Cherry to your CakePHP project as a submodule

```
$ cd /path/to/CakePHP/project/
$ git submodule add https://github.com/thisishuey/Cherry.git app/Plugin/Cherry
```

# Documentation

## Cherry Console Templates

We have included Console Templates to allow you to easily bake a project and gain bootstrap functionality throughout.

To utilize the Console Templates simply bake your project like usual but select `Cherry` when it asks you which template you would like to use.

## Cherry Form Helper

The CherryFormHelper was built to take advantage of Twitter Bootstrap's form layouts. It will wrap form elements in the appropriate classes but passes on everything else to the default FormHelper.

To change a form from a regular CakePHP form to a Bootstrap form all you need to do is add `'cherry' => true` to the FormHelper `create` method.

* For example: `<?php echo $this->Form->create('User', array('cherry' => true)); ?>`

You can also utilize Twitter Bootstrap's build in form classes by passing them in the FormHelper `create` method instead.

* For example: `<?php echo $this->Form->create('User', array('cherry' => 'form-horizontal')); ?>`

In most cases you will create form elements just like you would with CakePHP's default FormHelper, Cherry's FormHelper will take care of making the default elements compatible with Twitter Bootstrap.
