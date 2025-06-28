{foreach $components as $component}
    {include file="framework/components/{$component['type']}.tpl" componentChildren=$component['componentChildren']}
{/foreach}