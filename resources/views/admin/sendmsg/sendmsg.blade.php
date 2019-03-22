<form action="wechat/sendmsga" method="post">
    {{csrf_field()}}
    <h2>群发消息</h2>
    <textarea name="msg" id="" cols="100" rows="20"></textarea>
    <input type="submit" vlaue="提交">
</form>
