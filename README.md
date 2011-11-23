## Installation

1. Add this bundle to your project:

```
[BootstrapBundle]
    git=http://github.com/yoye/ContactBundle.git
    target=/bundles/Yoye/Bundle/ContactBundle

```

2. Add namespace

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'Yoye'        => __DIR__.'/../vendor/bundles',
));
```

3. Register this bundle

``` php
// application/ApplicationKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Yoye\BootstrapBundle\YoyeContactBundle(),
        // ...
    );
}
```

## Usage

1. Configuration

You can change some default features like form view or message view.

Add this lines to your config.yml

```yml
yoye_contact:
    email: 'foo@bar.com'     # required
    success_message: 'Congratz !'  # This appear in a flash message with "success" has key
    success_redirect: 'homepage'   # Route to redirect after form submit
    message_view: 'AcmeBundle:Contact:message.html.twig' # View form message
    form_view: 'AcmeBundle:Contact:form.html.twig' # Form view
```
