<{foreach item=quotes from=$block name=lp}>
    <{if $smarty.foreach.lp.first}>
        <style
        ="list-style-type: none;"><{/if}>
    <style
    ="padding-left: 2em; text-indent: -2em;">
    <em><{$quotes.quote}></em>
    <div class="txtright bold"><{$quotes.author}></div>
    <{if $smarty.foreach.lp.last}><{/if}>
    <{if false }>
        <{if $smarty.foreach.lp.first}><table class='outer'><{/if}>
        <tr class='<{cycle values = " even, odd"}>'>
            <td><em><{$quotes.quote}></em>
                <p class='txtright bold'><{$quotes.author}></p>
            </td>
        </tr>
        <{if $smarty.foreach.lp.last}></table><{/if}>
    <{/if}>
<{/foreach}>
