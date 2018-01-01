<{foreachq item=quotes from=$block name=lp}>
<{if $smarty.foreach.lp.first}>
    <style="list-style-type: none;"><{/if}>
<div><em><{$quotes.quote}></em></div>
    <div class="txtright bold"><{$quotes.author}><br><br>
    </div>
    <{if $smarty.foreach.lp.last}><{/if}>
    <{if false }>
        <{if $smarty.foreach.lp.first}><table class='outer'><{/if}>
        <tr class='<{cycle values="odd,even"}>'>
            <td>
                <em><{$quotes.quote}></em>
                <p class="right bold"><{$quotes.author}></p><br>
            </td>
        </tr>
        <{if $smarty.foreach.lp.last}></table><{/if}>
    <{/if}>
    <{/foreach}>
