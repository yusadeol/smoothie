{foreach $page->components as $component}
    {include file="components/{$component::getDefinition()->key}.tpl" component=$component}
{/foreach}