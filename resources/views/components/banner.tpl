{foreach $component->getSubComponents() as $subComponent}
    {if $subComponent->definition->name->value === "image"}
        <img src="{$subComponent->getField('url'|key)->value}" alt="">
    {/if}
{/foreach}