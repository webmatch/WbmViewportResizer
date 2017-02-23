WbmViewportResizer - preview predefined viewports
=====
**This plugin is currently in beta phase and not yet fully tested**

This plugin makes use of [jResize](https://github.com/toddmotto/jResize) jquery plugin 
to present the frontend of the shop within an iframe, that can be adjusted to the width of
the various predefined viewports.

![WbmViewportResizer](https://www.webmatch.de/wp-content/uploads/2017/02/viewportresizer.png)

Requirements
-----
* Shopware >= 5.2.0

Installation
====
Clone this repository into a folder **WbmViewportResizer** within the **custom/plugins** directory of the Shopware installation.

* Install the plugin through the Plugin-Manager within the Shopware backend. 
* Activate the plugin and when prompted allow for the clearing of the listed caches.

Usage
=====
Navigate to *your-shop.tld/viewportresizer* to browse your shop through the adjustable iframe.

To navigate directly to a certain page you can use the *path*  GET parameter e.g. *?path=account/index*

Use the top menu bar to switch between viewports. The width of each viewport will be the minimal width of each viewport 
(except for the smallest mobile viewport where it is the maximal width).