<section class="c-banner">
    {foreach $component->getSubComponents('image'|key) as $subComponent}
        <figure class="c-banner__figure">
            <img
                src="{$subComponent->getField('url'|key)->value}"
                alt="{$subComponent->getField('alt'|key)->value|default:'Imagem do banner'}"
                class="c-banner__image"
                loading="lazy"
            >
        </figure>
    {/foreach}
</section>
