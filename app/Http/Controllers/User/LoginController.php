<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
//引用对应的控制器
use App\Http\Controllers\Controller;

//引用对应的命名空间
use Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

//使用数据库操作DB
use DB;
//引入验证控制
use Auth;

class LoginController extends Controller
{
	/******************************************
    ****@AuThor : rubbish@163.com
    ****@Title  : 登录页面
    ****@param  : 
    ****@return : Response
    *******************************************/
     public function login(Request $request)
    {
    	$website['title']=trans('login.name').'-'.trans('admin.website_type');
        $website['login_name']=trans('login.name');
        $website['website_center_tip']=trans('admin.website_center_tip');
    	$website['copyrights']=trans('admin.website_name').trans('admin.website_rightinfo');
        $website['type']=$request->route('type')?$request->route('type'):2;
        return view('user/login')->with('website',$website);
    }
    /******************************************
    ****@AuThor : rubbish@163.com
    ****@Title  : 登录验证
    ****@param  : 
    ****@return : Response
    *******************************************/
    public function login_action(Request $request)
    {
        $code = $request->get('code');
        if (Session::get('admincaptcha') == $code) 
        {
            $rule=0;
            $guard="admin";
            $success_msg=trans('login.success');
            $errory_msg=trans('login.failure');

            switch ($request->get('type')) 
            {
                case 1:
                    $user = DB::table('users')->where('email', $request->get('email'))->first();
                    if(empty($user))
                    {
                        $rule=11;
                        $errory_msg=trans('login.failure_11');
                    }
                    break;
                case 2:
                    $user = DB::table('users')->where('username', $request->get('username'))->first();
                    if(empty($user))
                    {
                        $rule=12;
                        $errory_msg=trans('login.failure_12');
                    }
                    break;
                case 3:
                    $user = DB::table('users')->where('mobile', $request->get('mobile'))->first();
                    if(empty($user))
                    {
                        $rule=13;
                        $errory_msg=trans('login.failure_13');
                    }
                    break;    
                default:
                        
                    break;
            }
            if($rule<10)
            {
                switch ($request->get('type')) 
                {
                    case 1:
                        // 尝试登录
                        if (Auth::guard($guard)->attempt(['email' => $request->get('email'), 'password' => $request->get('userpwd') ,'is_lock' => 0 ,'role_group'=>1 ])) 
                        {
                            // 认证通过...
                            $rule=1;
                            //return redirect()->intended('/admin');
                        }
                        break;
                    case 2:
                        // 尝试登录
                        if (Auth::guard($guard)->attempt(['username' => $request->get('username'), 'password' => $request->get('userpwd') ,'is_lock' => 0 ,'role_group'=>1 ])) 
                        {
                            // 认证通过...
                            $rule=1;
                            //return redirect()->intended('/admin');
                        }
                        break;
                    case 3:
                        // 尝试登录
                        if (Auth::guard($guard)->attempt(['mobile' => $request->get('mobile'), 'password' => $request->get('userpwd') ,'is_lock' => 0 ,'role_group'=>1 ])) 
                        {
                            // 认证通过...
                            $rule=1;
                            //return redirect()->intended('/admin');
                        }
                        break;    
                    default:
                            
                        break;
                }

            }

            if($rule == 1)
            {
                $user =Auth::guard($guard)->user();
                /*******************
                 +记录日志 【      
                ********************/
                $log_data['type']=1;
                $log_data['user_id']=$user->id;
                $log_data['name']=$user->username;
                $log_data['info']=trans('login.action');
                $log_data['ip']=$request->getClientIp();
                in_log($log_data);
                /*******************
                 +          】      
                ********************/
                $msg_array['data']['is_reload']=0;
                $msg_array['data']['curl']="/admin";
                $msg_array['info']=$success_msg;
                $json_message=json_message(1,$msg_array['data'],$msg_array['info']);
                return $json_message;
            }
            else
            {
                $msg_array['data']['is_reload']=0;
                $msg_array['data']['curl']="";
                $msg_array['info']=$errory_msg;
                $json_message=json_message(2,$msg_array['data'],$msg_array['info']);
                return $json_message;
            } 
                
        } 
        else 
        {
            $msg_array['data']['is_reload']=0;
            $msg_array['data']['curl']="";
            $msg_array['info']=trans('login.failure_code');
            $json_message=json_message(2,$msg_array['data'],$msg_array['info']);
            return $json_message;
        }
    }
    /******************************************
    ****@AuThor : rubbish@163.com
    ****@Title  : 验证码
    ****@param  : int  $tmp
    ****@return : Response
    *******************************************/
    public function captcha($tmp) 
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 200, $height = 40, $font = null );
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('admincaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();

    }
    /******************************************
    ****@AuThor : rubbish@163.com
    ****@Title  : 退出登录
    ****@param  : 
    ****@return : Response
    *******************************************/
     public function logout()
    {
       $guard="admin";
       Auth::guard($guard)->logout();
       return redirect('/user/login');
    }

}