# Learning ModulesList

    ``learning/module-moduleslist``

## Main Functionalities
To get list of all third party modules on link baseUrl/modules/show/

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Learning`
 - Enable the module by running `php bin/magento module:enable Learning_ModulesList`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## Specifications

 - Block
	- ModulesList > moduleslist.phtml



