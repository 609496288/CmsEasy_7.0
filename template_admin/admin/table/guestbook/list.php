<div class="main-right-box">
<h5>留言列表</h5>
<div class="blank20"></div>
<div class="box">

<form name="listform" id="listform"  action="<?php echo uri();?>" method="post">
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr class="th">
<th class="s_out"><input title="点击可全选本页的所有项目"  onclick="CheckAll(this.form)" type="checkbox" name="chkall" class="checkbox" /> </th>
          <th class="catid" align="center"><!--id-->编号</th>
          <th class="catname" align="center"><!--username-->用户</th>
          <th class="htmldir" align="center"><!--adddate-->时间</th>
          <th class="htmldir" align="center"><!--title-->标题</th>
		  <th class="htmldir" align="center"><!--tel-->电话</th>
		  <th class="htmldir" align="center"><!--tel-->邮箱</th>
		  <th class="htmldir" align="center"><!--tel-->QQ</th>
          <th class="htmldir" align="center"><!--content-->内容</th>
          <th class="htmldir" align="center"><!--reply-->回复</th>
          <th class="manage" align="center">操作</th>
        </tr>
</thead>
<tbody>

{loop $data $d}
<tr>

<td class="s_out" align="center" ><input onclick="c_chang(this)" type="checkbox" value="{$d.$primary_key}" name="select[]" class="checkbox" /> </td>

<td class="catid" align="center">{cut($d['id'])}</td>
<td class="catname" align="center">{$d['username']}</td>
<td class="htmldir" align="center">{$d['adddate']}</td>
<td align="left"  class="htmldir">{$d['title']}</td>
<td class="htmldir" align="center">{$d['guesttel']}</td>
<td class="htmldir" align="center">{$d['guestemail']}</td>
<td class="htmldir" align="center">{$d['guestqq']}</td>
<td align="left" class="htmldir">{$d['content']}</td>
<td class="htmldir" align="center">{$d['reply']}</td>

<td class="manage" align="center">
<a href="<?php echo modify("act/edit/table/$table/id/$d[$primary_key]");?>" title="回复"><i class="glyphicon glyphicon-comment"></i></a>
<a onclick="javascript: return confirm('确定要删除吗?');" href="<?php echo modify("/act/delete/table/$table/id/$d[$primary_key]/token/$token");?>" title="删除"><i class="glyphicon glyphicon-trash"></i></a>
</td>
</tr>
{/loop}

</tbody>
</table>


<div class="page"><?php if(get('table')!='type' && front::get('case')!='field') echo pagination::html($record_count); ?></div>

</div>
<div class="blank30"></div>
<div class="line"></div>
<div class="blank30"></div>

<input type="hidden" name="batch" value="" class="button" />
<input  class="btn btn-secondary" type="button" value=" 删除 " name="delete" onclick="if(getSelect(this.form) && confirm('确实要删除ID为('+getSelect(this.form)+')的记录吗?')){this.form.action='<?php echo modify("/act/delete/table/$table/id/$d[$primary_key]/token/$token");?>'; this.form.batch.value='delete'; this.form.submit();}"/>

<input  class="btn btn-primary" type="button" value=" 清空 " name="clearall" onclick="if(confirm('确实要清空吗?')){this.form.action='<?php echo modify("/act/clearall/table/$table/token/$token");?>'; this.form.batch.value='clearall'; this.form.submit();}"/>

<input  class="btn btn-success" type="button" value=" 导出 " name="export" onclick="this.form.action='<?php echo modify("/act/batch/table/$table/token/$token");?>'; this.form.batch.value='export'; this.form.submit();"/>

</form>
<div class="blank30"></div>
</div>
</div>


<div class="blank30"></div>
</div>
</div>
