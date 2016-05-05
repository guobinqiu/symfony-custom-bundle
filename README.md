# Create your own Symfony2 bundle

Tutorial of creating your own Symfony2 bundle

## How to do?

### 1. Install Symfony
<http://symfony.cn/docs/quick_tour/the_big_picture.html>

### 2. Create a new empty symfony project

	symfony new DemoBundle 2.3 

(**2.3** is my symfony version)

### 3. Enter into the project directory

	cd DemoBundle

### 4. Generate a new bundle

	php app/console generate:bundle
	
this will ask you to answer questions. For Bundle namespace set to *DataSpring/DemoBundle* (CompanyName / BundleName).

### 5. Enter into the bundle directory

	cd src/DataSpring/DemoBundle
	
### 6. Init your github repository

Create a new repository in your github first then run the following command lines:

```
git init 
touch README.md
git add .
git commit -m "initial commit"
git remote add origin git@github.com:YourAccount/DemoBundle.git
git push -u origin master
```

### 7. Add a composer.json file

In the `src/DataSpring/DemoBundle/` folder, manually add a `composer.json` file. 

or run

	composer init

to get a simpliest file before changing it.

<br>

A composer.json file would look like so:

```
{
    "name": "dataspring/demo-bundle",
    "description": "Demo Bundle",
    "type": "symfony-bundle",
    "keywords": ["dataspring"],
    "license": "MIT",
    "homepage": "http://github.com/guobinqiu/DemoBundle",
    "authors": [
        {
            "name": "Guobin",
            "email": "qracle@126.com"
        }
    ],
    "require": {
        "php": "~5.3"
    },
    "autoload": {
        "psr-4": {
            "DataSpring\\DemoBundle\\": ""
        }
    },
    "extra": {
        "branch-alias": {
            "dev-master": "0.1.x-dev"
        }
    }
}
```



### 8. Add a MIT license file

In the `src/DataSpring/DemoBundle/` folder, add a `LICENSE` file

> https://opensource.org/licenses/MIT

Your can borrow from the above licence reference as your own license content. Also see [LICENSE](https://github.com/guobinqiu/DemoBundle/blob/master/LICENSE) 


### 9. Create a controller and its routing

Controller Code:

```
<?php

namespace Dataspring\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DataSpringDemoBundle:Default:index.html.twig');
    }
}

```

In the `src/Resources/config/routing.yml` to add:

```
demo_index:
    path:      /index
    defaults:  { _controller: DataSpringDemoBundle:Default:index }
```

Notice that when creating your own bundle, `Annotation` way is not supported!


### 10. Tag/Release it in the Github

```
git tag -a VERSION -m "MESSAGE"
git push origin VERSION
```
or [Release in Github](https://help.github.com/articles/creating-releases/)


### 11. Put it in the Packagist

- [Getting Started](https://packagist.org/)

- [Submit your own bundle](https://packagist.org/packages/submit)

- Install [GitHub Service Hook](https://packagist.org/about#how-to-update-packages) to ensure that your package will always be updated instantly when you push to GitHub


## Use it in another project

### 1. Add Composer Dependencies

#### Add it to the composer.json file:

```
{
    ...,
    "require": {
        ...,
		"dataspring/demo-bundle": "^0.1.4"
    }
}
```

#### Update the dependency
	
	php composer.phar update dataspring/demo-bundle
	
or update all dependencies
	
	php composer.phar update
	
or you can do this in one command:

	php composer.phar require dataspring/demo-bundle

### 2. Enable the Bundle

```
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
        	...,
            new DataSpring\DemoBundle\DataSpringDemoBundle()
        );
        ...
    }
}
```

### 3. Add into your project main routing file

```
data_spring_demo:
    resource: "@DataSpringDemoBundle/Resources/config/routing.yml"
    prefix:   /demo

```

### 4. Finally

Typing `http://YourDomain:port/demo/index` in your web browser to access!
