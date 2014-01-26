# Cherry Bootstrap Plugin

Cherry is a Twitter Bootstrap plugin for CakePHP

## Requirements

The master branch has the following requirements:

* CakePHP 2.2.0 or greater.
* PHP 5.3.0 or greater.

## Installation

1. Clone/Copy the files in this directory into `app/Plugin/Cherry`.
2. Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Cherry');`.
3. Include the form helper in your `AppController.php`:
	* `public $helpers = array('Form' => array('className' => 'Cherry.CherryForm'));`
4. Copy the `app/Plugin/Cherry/View/Layouts/default.ctp` file over your current `default.ctp` file to gain access to Bootstrap in your views.
5. Modify `default.ctp` and any of your views to take advantage of Bootstrap's functionality.

### Install as Git submodule

You can replace Step 1 above with the following to add Cherry to your CakePHP project as a submodule:

```
$ cd /path/to/CakePHP/project/
$ git submodule add https://github.com/thisishuey/Cherry.git app/Plugin/Cherry
```

# Documentation

## Cherry Console Templates

We have included Console Templates to allow you to easily bake a project and gain Bootstrap functionality throughout.

To utilize the Console Templates simply bake your project like usual but select `Cherry` when it asks you which template you would like to use.

## Cherry Form Helper

The CherryFormHelper was built to take advantage of Bootstrap's form layouts. It will wrap form elements in the appropriate classes but passes on everything else to the default FormHelper.

To change a form from a regular CakePHP form to a Bootstrap form all you need to do is add `'cherry' => true` to the FormHelper `create` method.

* For example: `<?php echo $this->Form->create('User', array('cherry' => true)); ?>`

You can also utilize Bootstrap's build in form classes by passing them in the FormHelper `create` method instead.

* For example: `<?php echo $this->Form->create('User', array('cherry' => 'form-horizontal')); ?>`

In most cases you will create form elements just like you would with CakePHP's default FormHelper, Cherry's FormHelper will take care of making the default elements compatible with Bootstrap.

## Bootstrap Modal Functions

There are three functions in the core.js file to help use Bootstrap modals:

1. modal(args)
2. alertModal(message)
3. confirmModal(message, callback(confirmed))

### modal(args)

The `modal(args)` function can be used to easily create a quick modal that will be added to the DOM on call and then destroyed when it is closed. The following args can be passed:

* `modalTitle` is used to set the title of the modal, defaults to `"The page at <domain> says:"` to match javascripts default alert and confirm popups.
* `modalBody` is used to set the body of the modal, defaults to `undefined`.
* `modalIframe` can be used to load an iframe into the modal, it will overwrite `modalBody` if present.
* `cancelText` can be used to set the text of the cancel button, if it's set to `false` the cancel button will not be shown, defaults to `false`.
* `cancelClass` can be used to set the class of the cancel button using Bootstrap's built in button classes, defaults to `btn btn-default`.
* `cancelCallback` can be used to pass in a callback function that is executed when the cancel button is pushed, defaults to `function(confirmed) {};` and it gets pass a confirmed boolean that will always be false, this is useful if you want to use the same function for both cancel and confirm and determine what to do inside the function itself, see confirmModal below.
* `confirmText` can be used to set the text of the confirm button, if it's set to `false` the confirm button will not be shown, defaults to `false`.
* `confirmClass` can be used to set the class of the confirm button using Bootstrap's built in button classes, defaults to `btn btn-success`.
* `confirmCallback` can be used to pass in a callback function that is executed when the confirm button is pushed, defaults to `function(confirmed) {};` and it gets pass a confirmed boolean that will always be true, this is useful if you want to use the same function for both cancel and confirm and determine what to do inside the function itself, see confirmModal below.

### alertModal(message)

The `alertModal(message)` function can be used to create a quick alert modal that will be added to the DOM on call and then destroyed when it is closed. The follwing args can be passed:

* `message` this is the message you would like to display in the modal, defaults to `undefined`.

The `alertModal(message)` function also goes ahead and sets `confirmText = 'OK'` and can also be passed an object instead of `message` to take advantage of any of the modal args.

### confirmModal(message, callback)

The `confirmModal(message, callback)` function can be used to create a quick confirm modal that will be added to the DOM on call and then destroyed when it is closed. The following args can be passed:

* `message` this is the message that you would like to display in the modal, defaults to `undefined`.
* `callback` this is the callback that you would like to use on confirmation. This callback is passed to both `cancelCallback` and `confirmCallback` and is passed back a `confirmed` argument that can be used to determine what to do in the function.

The `confirmModal(message, callback)` function also goes ahead and sets `cancelText = 'Cancel'` and  `confirmText = 'OK'` and can also be passed an object instead of `message` to take advantage of any of the modal args.

The `confirmModal(message, callback)` is being used by the CherryFormHelper for postLink confirmations.

# TODO

* Clean up postLink and delete links to allow for more than just 'Delete' confirmation as postLink could be used in many different places
* Override HtmlHelper to give some advanced functionality for images and confirmation links, etc.
* Add MenuHelper to help create dynamic menus or add menus to the HtmlHelper
