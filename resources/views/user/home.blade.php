@extends('layouts.user')
@section('content')
<script type="text/javascript">
/*
 window.onload = function() {
  var show = document.getElementById("show");
  setInterval(function() 
  {
   var time = new Date();
   // 程序计时的月从0开始取值后+1
   var m = time.getMonth() + 1;
   var d = time.getDate();
   var h = time.getHours();
   var mt= time.getMinutes();
   var ms = time.getSeconds();
   if(m<10)
   {m='0'+m;}
   if(d<10)
   {d='0'+d;}
   if(h<10)
   {h='0'+h;}
   if(mt<10)
   {mt='0'+mt;}
   if(ms<10)
   {ms='0'+ms;}
   var t = time.getFullYear() + "-" + m + "-" + d + " " + h + ":" + mt + ":" + ms;
   show.innerHTML = t;
  }, 1000);
 };
 */
</script>
<!--common-->
<div class="row-content am-cf">
    <div class="row  am-cf">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">月度财务收支计划</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-fl">
                        <div class="widget-fluctuation-period-text">
                            ￥61746.45
                            <button class="widget-fluctuation-tpl-btn">
            <i class="am-icon-calendar"></i>
            更多月份
            </button>
                        </div>
                    </div>
                    <div class="am-fr am-cf">
                        <div class="widget-fluctuation-description-amount text-success" am-cf>
                            +￥30420.56
                        </div>
                        <div class="widget-fluctuation-description-text am-text-right">
                            8月份收入
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
            <div class="widget widget-primary am-cf">
                <div class="widget-statistic-header">
                    本季度利润
                </div>
                <div class="widget-statistic-body">
                    <div class="widget-statistic-value">
                        ￥27,294
                    </div>
                    <div class="widget-statistic-description">
                        本季度比去年多收入 <strong>2593元</strong> 人民币
                    </div>
                    <span class="widget-statistic-icon am-icon-credit-card-alt"></span>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
            <div class="widget widget-purple am-cf">
                <div class="widget-statistic-header">
                    本季度利润
                </div>
                <div class="widget-statistic-body">
                    <div class="widget-statistic-value">
                        ￥27,294
                    </div>
                    <div class="widget-statistic-description">
                        本季度比去年多收入 <strong>2593元</strong> 人民币
                    </div>
                    <span class="widget-statistic-icon am-icon-support"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row am-cf">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12 widget-margin-bottom-lg">
            <div class="widget am-cf widget-body-lg">
                <div class="widget-body  am-fr">
                    <div class="am-scrollable-horizontal ">
                        <table width="100%" class="am-table am-table-compact am-text-nowrap tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>文章标题</th>
                                    <th>作者</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX">
                                    <td>新加坡大数据初创公司 Latize 获 150 万美元风险融资</td>
                                    <td>张鹏飞</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>自拍的“政治角色”：观众背对希拉里自拍合影表示“支持”</td>
                                    <td>天纵之人</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="gradeX">
                                    <td>关于创新管理，我想和你当面聊聊。</td>
                                    <td>王宽师</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>究竟是趋势带动投资，还是投资引领趋势？</td>
                                    <td>着迷</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争</td>
                                    <td>醉里挑灯看键</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>


                                <!-- more data -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div> 
@endsection