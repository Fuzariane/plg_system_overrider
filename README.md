# Template libs overrider plugin

![Joomla 3 Ready](https://img.shields.io/badge/Joomla-3.x-yellow.svg?style=flat-square)
![System Group Plugin](https://img.shields.io/badge/Plugin-System-blue.svg?style=flat-square)
![Licence](https://img.shields.io/badge/Licence-MIT-green.svg?style=flat-square)

Joomla dont give a simple way to override JHtml and others core libraries from template.

This plugin is here to give a plaster.

### How can i use plugin for my template?
If you have a folders structure like that in your template:
* tmpl_folder
    * ...
    * override
        * cms
            * html
                * bootstrap.php
                * actionsdropdown.php
                * jgrid.php
    * ...

---

```xml
<!-- templateDetails.xml -->
<override>
    <libraries>
        <library name="JHtmlBootstrap" path="/override/cms/html/bootstrap.php" />
        <library name="JHtmlActionsDropdown" path="/override/cms/html/actionsdropdown.php" />
        <library name="JHtmlJGrid" path="/override/cms/html/jgrid.php" />
    </libraries>
</override>
```