<div class="header">
    <span class="left"><b><{$smarty.const.MD_RANDOMQUOTE_TITLE}></b>&#58;&#160;</span>
    <span class="left"><{$smarty.const.MD_RANDOMQUOTE_DESC}></span><br>
</div>
<div class="head">
    <{if $adv != ''}>
        <div class="center"><{$adv}></div>
    <{/if}>
</div>
<br>
<ul class="nav nav-pills">
    <li class="active"><a href="<{$randomquote_url}>"><{$smarty.const.MD_RANDOMQUOTE_INDEX}></a></li>

    <li><a href="<{$randomquote_url}>/quotes.php"><{$smarty.const.MD_RANDOMQUOTE_QUOTES}></a></li>
    <li><a href="<{$randomquote_url}>/category.php"><{$smarty.const.MD_RANDOMQUOTE_CATEGORY}></a></li>
</ul>

<br>
