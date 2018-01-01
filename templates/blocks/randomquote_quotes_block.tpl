<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_RANDOMQUOTE_ID}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_QUOTE}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_AUTHOR}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_ONLINE}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_CREATED}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_CID}></th>
    </tr>
    <{foreachq item=quotes from=$block}>
    <tr class="<{cycle values = 'even,odd'}>">
        <td>
            <{$quotes.id}>
            <{$quotes.quote}>
            <{$quotes.author}>
            <{$quotes.online}>
            <{$quotes.created}>
            <{$quotes.cid}>
        </td>
    </tr>
    <{/foreach}>
</table>
