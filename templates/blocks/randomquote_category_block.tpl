<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_RANDOMQUOTE_ID}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_PID}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_TITLE}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_DESCRIPTION}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_IMAGE}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_WEIGHT}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_COLOR}></th>
        <th><{$smarty.const.MB_RANDOMQUOTE_ONLINE}></th>
    </tr>
    <{foreachq item=category from=$block}>
    <tr class="<{cycle values = 'even,odd'}>">
        <td>
            <{$category.id}>
            <{$category.pid}>
            <{$category.title}>
            <{$category.description}>
            <{$category.image}>
            <{$category.weight}>
            <{$category.color}>
            <{$category.online}>
        </td>
    </tr>
    <{/foreach}>
</table>
