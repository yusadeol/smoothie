{foreach $componentChildren as $componentChild}
    {include file="framework/componentChild/{$componentChild['type']}.tpl"}
{/foreach}