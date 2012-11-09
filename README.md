#apostropheGalleryViewerPlugin v1.0.1
========
This plugin offers the possibility to include a gallery viewer in your apostrophe website in 5 minutes !
You must have been installed the [sfMultipleAjaxUploadGalleryPlugin](http://www.symfony-project.org/plugins/sfMultipleAjaxUploadGalleryPlugin) before


* Requirements														

1. [sfMultipleAjaxUploadGalleryPlugin](http://www.symfony-project.org/plugins/sfMultipleAjaxUploadGalleryPlugin)
2. sfJqueryReloadedPlugin


* Tutorial : 

1. you can follow the instructions below
2. you can follow the instructions in the [plugin page](http://www.leny-bernard.com/en/blog/show/apostropheGalleryViewerPlugin) 

## Installation: 
In order to install the plugin apostropheGalleryViewerPlugin :
Type one of these symfony commands :

		plugin:install apostropheGalleryViewerPlugin

OR

Download the file [here](http://www.leny-bernard.com/uploads/plugins/apostropheGalleryViewerPlugin.zip "download the archive")

Then extract its content in the plugins directory of your project :

		plugin:install apostropheGalleryViewerPlugin

Get the plugin's resources by typing :

		symfony publish-assets
Then clear the cache :

		symfony cc

A last task to do is to enable the gallery and photos modules (backend) and the slideshow module (frontend) in the settings.yml specific app config's folder.
/apps/backend/settings.yml
You have to enter if it doesn't already exist this line
	
	all:  
	  .settings:
	    enabled_modules: [smaugvSlot]

/apps/frontend/settings.yml
On va dans le fichier de configuration app.yml ou sont définis les autres configurations et on ajoute ceci :

	all:
	  a:
	    slot_types:
	      smaugv: Galleries Component

Now, add the slot in the templates you want to be able to include inside.
For example : 
/apps/frontend/templates/homeTemplate

	a_area("body",array("allowed_types" => array("contact")));

You can now insert this kind of slot.
Remember that you're using the [sfMultipleAjaxUploadGalleryPlugin](http://www.symfony-project.org/plugins/sfMultipleAjaxUploadGalleryPlugin) so, you have to configure it before.

![alt text](http://www.leny-bernard.com/uploads/plugins/apostropheIntegration.png "Apostrophe Integration")
![alt text](http://www.leny-bernard.com/uploads/plugins/pagination.png "Paginated list of galleries")
![alt text](http://www.leny-bernard.com/uploads/plugins/sfMultipleAjaxUploadGalleryPluginBackend.png "awesome backend")

CREDITS :

SPECIAL THANKS TO THE APOSTROPHE AND THE [PLUGIN](http://www.symfony-project.org/plugins/sfMultipleAjaxUploadGalleryPlugin) COMMUNITY
