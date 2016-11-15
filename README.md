# joy-flow-panels
Panels with an image and text. full, half, third, and quarter panels that stretch the full width  of their container

## installation 
```sh
composer require dunatron/joy-flow-panels
```

## What happens
A new Page type gets created 'FlowLandingPage' this page type has a panel tab in the cms, where it will build Panels.

## CMS Use
### Panel Title
This does not do anything in the out of box template and is just used for reference by the user
### Panel Text
The body of text contained within the panel. If the texts exceeds the height of the panel the overflow will scroll, meaning the text box is scrollable
### Panel Url Link
This field will take the entire url of the page it is linking to.

e.g. linking to 'about-us' page the value will be http://mysite/about-us
### Hash Color
This is the color of the panel, It will apply inline css to the template and can accept either hash or rgb colors

e.g. #FF5733 OR rgb(255,87,51)

### Panel Type
OPTIONS: full, half, third, quarter

used to specify how much width the panel will consume within its container
### Panel Image
The background image used for the panel

##CSS Override
There are a few ways to do this.

### 1) new Page type.
Instead of extending FlowLandingPage_Controller like this 
```sh
MyLandingPage_Controller extends FlowLandingPage_Controller
```
(which includes the css).
`You can extend extend off your base page controller instead e.g. Page_Controller

### 2) clear your controller of requirements
```sh
public function init()
{
   parent::init();
   Requirements::clear();   
}
```


##ToDo/Config
As it currently stands to get more functionality out of this page you would create your own page type extending FlowLandingPage.
e.g. MyLandingPage extends FlowLandingPage.

I would like to add be able to apply these fields to any other page (some sort of extend in yml file)
