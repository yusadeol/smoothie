{extends file='layout.tpl'}

{block name=styles}
    {foreach $components as $component}
        <link rel="stylesheet" href="{asset path="css/components/{$component->definition->name}.css"}">
    {/foreach}
{/block}

{block name=scripts}
    {foreach $components as $component}
        <script src="{asset path="css/components/{$component->definition->name}.js"}" defer></script>
    {/foreach}
{/block}

{block name=content}
    {foreach $components as $component}
        {include file="components/{$component->definition->name}.tpl" component=$component}
    {/foreach}
{/block}
