gp-master-glossary
==================

GlotPress plugin that allows to define a project as source of a master (base) glossary.

The glossary for the same locale translation set of that project will be merged with the project glossary.

Installation
------------

Add this to your `wp-config.php` file and change `123` to the id of the project that should be the source of the master glossary.
```
define( 'GP_MASTER_GLOSSARY_PROJECT', 123 );
```
