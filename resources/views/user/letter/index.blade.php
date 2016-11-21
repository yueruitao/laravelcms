@extends('layouts.user')
@section('content')
<!-- 内容区域 -->
<div class="row-content am-cf" id="app-content">
    <div class="row">
        @include('user.letter.nav')
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf">{{$website['cursitename']}}</div>
                </div>
                <div class="widget-body  am-fr">

                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="am-form-group tpl-table-list-select">
                            <select class="common_select_search" v-model="pageparams.way" >
                              <option v-for="item in pageparams.wayoption" value="@{{ item.value }}">@{{ item.text }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                        <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                <input type="text" class="am-form-field " v-model="pageparams.keyword" value="@{{ pageparams.keyword }}" >
                                <span class="am-input-group-btn">
                                  <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button" @click="search_list_action()" ></button>
                                </span>
                        </div>
                    </div>

                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                              <tr>
                                <th>{{trans('admin.fieldname_item_id')}}</th>
                                <th>{{trans('admin.fieldname_item_isstar')}}</th>
                                <th>{{trans('admin.fieldname_item_title')}}</th>
                                <th>{{trans('admin.fieldname_item_to_user')}}</th>
                                <th>{{trans('admin.fieldname_item_created_at')}}</th>
                                <th>{{trans('admin.fieldname_item_option')}}</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr v-for="item in datalist" >
                                <td class="mailbox-id">@{{ item.id }}</td>
                                <td class="mailbox-star" v-if="item.isstar_from == 1 && item.email_from == email " ><a href="javascript:void(0);" @click="get_one_action(item.id,'isstar_from')" ><i class="am-icon-star "></i></a></td>
                                <td class="mailbox-star" v-if="item.isstar_from == 0 && item.email_from == email " ><a href="javascript:void(0);" @click="get_one_action(item.id,'isstar_from')"><i class="am-icon-star-o "></i></a></td>
                                <td class="mailbox-star" v-if="item.isstar_to == 1 && item.email_to == email " ><a href="javascript:void(0);" @click="get_one_action(item.id,'isstar_to')" ><i class="am-icon-star "></i></a></td>
                                <td class="mailbox-star" v-if="item.isstar_to == 0 && item.email_to == email " ><a href="javascript:void(0);" @click="get_one_action(item.id,'isstar_to')"><i class="am-icon-star-o "></i></a></td>
                                <td class="mailbox-subject"><b>@{{ item.title }}</b></td>
                                <td class="mailbox-attachment">@{{ item.email_to }}</td>
                                <td class="mailbox-date">@{{ item.created_at }}</td>
                                @if($website['actionname']=='index')
                                <td>
                                  <div class="tools">
                                    <button v-if="actionname =='index' && item.istrash_to == 0 && item.isdel_to == 0 "  type="button" @click="get_one_action(item.id,'istrash_to')"  class="am-btn  am-btn-secondary am-btn-xs" > <i class="am-icon-toggle-on"></i> {{trans('admin.website_action_trash')}}</button>
                                  </div>
                                </td>
                                @endif
                                @if($website['actionname']=='send')
                                <td>
                                  <div class="tools">
                                    <button v-if="actionname =='send' && item.istrash_from == 0 && item.isdel_from == 0 "  type="button" @click="get_one_action(item.id,'istrash_from')"  class="am-btn  am-btn-secondary am-btn-xs " > <i class="am-icon-toggle-off"></i> {{trans('admin.website_action_trash')}}</button>
                                  </div>
                                </td>
                                @endif
                                @if($website['actionname']=='star')
                                <td>
                                  <div class="tools">
                                    <button v-if="actionname =='star' && item.istrash_from == 0  && item.isdel_from == 0 && item.email_from == email"  type="button" @click="get_one_action(item.id,'istrash_from')"  class="am-btn  am-btn-secondary am-btn-xs" > <i class="am-icon-toggle-on"></i> {{trans('admin.website_action_trash')}}</button>
                                    <button v-if="actionname =='star' && item.istrash_to == 0 && item.isdel_to == 0 && item.email_to == email"  type="button" @click="get_one_action(item.id,'istrash_to')"  class="am-btn  am-btn-secondary am-btn-xs" > <i class="am-icon-toggle-on"></i> {{trans('admin.website_action_trash')}}</button>
                                  </div>
                                </td>
                                @endif
                                @if($website['actionname']=='trash')
                                <td>
                                  <div class="tools">
                                    <button v-if="actionname =='trash' && item.istrash_from == 1  && item.isdel_from == 0 && item.email_from == email"  type="button" @click="get_one_action(item.id,'istrash_from')"  class="am-btn am-btn-danger am-btn-xs" > <i class="am-icon-toggle-on"></i> {{trans('admin.website_action_back')}}</button>
                                    <button v-if="actionname =='trash' && item.istrash_to == 1 && item.isdel_to == 0 && item.email_to == email"  type="button" @click="get_one_action(item.id,'istrash_to')"  class="am-btn am-btn-danger am-btn-xs" > <i class="am-icon-toggle-on"></i> {{trans('admin.website_action_back')}}</button>
                                    @ability('admin', 'delete')
                                    <button v-if="actionname =='trash' && item.istrash_from == 1 && item.isdel_from == 0 " type="button" @click="get_one_action(item.id,'isdel_from')" class="am-btn am-btn-danger am-btn-xs" > <i class="am-icon-trash"></i> {{trans('admin.website_action_delete')}}</button>
                                    <button v-if="actionname =='trash' && item.istrash_to == 1 && item.isdel_to == 0 " type="button" @click="get_one_action(item.id,'isdel_to')" class="am-btn am-btn-danger am-btn-xs" > <i class="am-icon-trash"></i> {{trans('admin.website_action_delete')}}</button>
                                    @endability
                                  </div>
                                </td>
                                @endif
                              </tr>
                              </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr">
                            <ul class="am-pagination tpl-pagination">
                                <li><a href="javascript:void(0);">@{{ totals_title }}</a></li>
                                <li><a href="javascript:void(0);" @click="btnClick(first_page)" >{{trans('admin.website_first_page_title')}}</a></li>
                                <li><a href="javascript:void(0);" @click="btnClick(prev_page)" >{{trans('admin.website_prev_page_title')}}</a></li>
                                <li v-for="index in totals"  v-bind:class="{ 'am-active': current_page == index+1}">
                                    <a href="javascript:void(0);" @click="btnClick(index+1)" >@{{ index+1 }} </a>
                                </li>
                                <li><a href="javascript:void(0);" @click="btnClick(next_page)" >{{trans('admin.website_next_page_title')}}</a></li>
                                <li><a href="javascript:void(0);" @click="btnClick(last_page)" >{{trans('admin.website_last_page_title')}}</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
new Vue({
    el: '#app-content',
    data: {
             apiurl_list          :'{{ route("post.user.letter.api_list") }}',
             apiurl_one_action    :'{{ route("post.user.oneactionapi.api_one_action") }}',
             apiurl_count         :'{{ route("post.user.letter.api_count") }}',
             email                :'{{$website["website_user"]["email"]}}' ,
             actionname           :'{{getCurrentMethodName()}}',
             totals               : 0,
             totals_title         :"{{trans('admin.website_page_total')}}",  
             first_page           :1,//首页
             prev_page            :1,//上一页
             current_page         :1,//当前页
             next_page            :1,//下一页
             last_page            :1,//尾页
             datalist :           [],//列表数据
             pageparams:           
             {
                    page           :1,
                    way            :'{{$website["way"]}}',
                    wayoption      :eval(htmlspecialchars_decode('{{$website["wayoption"]}}')),
                    keyword        :'',
                    actionname     :'{{getCurrentMethodName()}}', 
             },
             paramsdata:
             {
                    id             :'',
                    fields         :'',
                    modelname      :'{{$website["modelname"]}}',
             },
             countdata:
             {
                    count_index    :0,
                    count_send     :0,
                    count_star     :0,
                    count_trash    :0,
             }
             
          },
    ready: function ()
            { 
            this.pageparams.actionname=this.actionname;  
            //这里是vue初始化完成后执行的函数 
            this.get_list_action();
            },
    methods: {
            //获取列表数据
            get_count_action:function()
            {
              this.$http.post(this.apiurl_count,{'email':this.email},{
                before:function(request)
                {
                  loadi=layer.load("...");
                },
              })
              .then((response) => 
              {
                  layer.close(loadi);
                  var statusinfo=response.data;
                  if(statusinfo.status==1)
                  {
                      this.countdata=statusinfo.resource;
                  }

              },(response) => 
              {
                //响应错误
                layer.close(loadi);
                var msg="{{trans('admin.message_outtime')}}";
                layermsg_error(msg);
              })
              .catch(function(response) {
                //异常抛出
                layer.close(loadi);
                var msg="{{trans('admin.message_error')}}";
                layermsg_error(msg);
              })

            },
            get_list_action:function()
            {

              this.$http.post(this.apiurl_list,this.pageparams,{
                before:function(request)
                {
                  loadi=layer.load("...");
                },
              })
              .then((response) => 
              {
                this.do_list_action(response);
                this.get_count_action();
              },(response) => 
              {
                //响应错误
                layer.close(loadi);
                var msg="{{trans('admin.message_outtime')}}";
                layermsg_error(msg);
              })
              .catch(function(response) {
                //异常抛出
                layer.close(loadi);
                var msg="{{trans('admin.message_error')}}";
                layermsg_error(msg);
              })

            },
            //处理列表数据
            do_list_action:function(response)
            {
                this.datalist=[];
                //响应成功
                layer.close(loadi);
                var statusinfo=response.data;
                //console.log(statusinfo);
                if(statusinfo.status==1)
                {
                    /*
                     |---------------------------------------------
                     | 查询条件数据赋值
                     |---------------------------------------------
                     |
                     */
                    if(statusinfo.keyword)
                    {
                      this.pageparams.way=response.way;
                      this.pageparams.keyword=response.keyword;
                    }
                    /*
                     |---------------------------------------------
                     | 分页参数赋值
                     |---------------------------------------------
                     |
                     */
                    this.current_page=statusinfo.resource.current_page;//当前页数据
                    this.totals_title=statusinfo.resource.total+' {{trans('admin.website_page_total_tip')}}';//总记页数标题
                    this.totals=Math.ceil(statusinfo.resource.total/statusinfo.resource.per_page);//总记录页数
                    this.last_page=statusinfo.resource.last_page;//尾页数据
                    //下一页数据
                    if(this.current_page==this.totals)
                    {
                      this.next_page=this.totals;
                    }
                    else
                    {
                      this.next_page=this.current_page+1;
                    }
                    //上一页数据
                    if(this.current_page==1)
                    {
                      this.prev_page=1;
                    }
                    else
                    {
                      this.prev_page=this.current_page-1;
                    }
                    /*
                     |---------------------------------------------
                     | 渲染列表数据
                     |---------------------------------------------
                     |
                     */
                    this.datalist=statusinfo.resource.data;
                }
                else
                {
                    layermsg_error(statusinfo.info);
                }
            },
            //点击搜索获取列表数据
            search_list_action:function()
            {
              this.get_list_action();
            },
            //点击页码获取列表数据
            btnClick: function(data)
            {   
                if(data != this.current_page)
                {
                   // this.current_page = data ;
                   this.pageparams.page=data;
                   this.get_list_action();
                }
            },
             //点击删除
            delete_action:function(data)
            {
              var deletedata={'id':data,'modelname':'{{ $website["modelname"]}}'};
              this.$http.post(this.apiurl_delete,deletedata,{
                before:function(request)
                {
                  loadi=layer.load("...");
                },
              })
              .then((response) => 
              {
                this.return_info_action(response);

              },(response) => 
              {
                //响应错误
                layer.close(loadi);
                var msg="{{trans('admin.message_outtime')}}";
                layermsg_error(msg);
              })
              .catch(function(response) {
                //异常抛出
                layer.close(loadi);
                var msg="{{trans('admin.message_error')}}";
                layermsg_error(msg);
              })
            },
            //点击获取一键操作
            get_one_action:function(data,fields)
            {
              this.paramsdata.id=data;
              this.paramsdata.fields=fields;
              this.$http.post(this.apiurl_one_action,this.paramsdata,{
                before:function(request)
                {
                  loadi=layer.load("...");
                },
              })
              .then((response) => 
              {
                this.return_info_action(response);

              },(response) => 
              {
                //响应错误
                layer.close(loadi);
                var msg="{{trans('admin.message_outtime')}}";
                layermsg_error(msg);
              })
              .catch(function(response) {
                //异常抛出
                layer.close(loadi);
                var msg="{{trans('admin.message_error')}}";
                layermsg_error(msg);
              })
            },
            //返回信息处理
            return_info_action:function(response)
            {
              layer.close(loadi);
              var statusinfo=response.data;
              if(statusinfo.status==1)
              {
                  if(statusinfo.is_reload==1)
                  {
                    layermsg_success_reload(statusinfo.info);
                  }
                  else
                  {
                    if(statusinfo.curl)
                    {
                      layermsg_s(statusinfo.info,statusinfo.curl);
                    }
                    else
                    {
                      layermsg_success(statusinfo.info);
                      this.get_list_action();
                    }
                  }
              }
              else
              {
                  if(statusinfo.curl)
                  {
                    layermsg_e(statusinfo.info,statusinfo.curl);
                  }
                  else
                  {

                    layermsg_error(statusinfo.info);
                  }
              }
            },

        }            
})
</script>
@endsection