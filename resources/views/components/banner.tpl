{foreach $component->subComponents as $subComponent}
    {if $subComponent::getDefinition()->key->value === "image"}
        {include file="subComponents/image.tpl" subComponent=$subComponent}
    {/if}
{/foreach}