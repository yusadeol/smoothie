{foreach $components as $component}
    {include file="components/{$component->definition->name}.tpl" component=$component}
{/foreach}