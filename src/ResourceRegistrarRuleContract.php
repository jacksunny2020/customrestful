<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\CustomRestful;

use Illuminate\Routing\ResourceRegistrar;

/**
 *
 * @author 施朝阳
 * @date 2017-6-7 10:13:21
 */
interface ResourceRegistrarRuleContract {

    //得到资源url的/mymodel后面部分，含斜杠
    function getResourceUriPostfix($name, $base, $controller, $options);

    //得到对应控制器方法名称
    function getActionName($name, $base, $controller, $options);

    //得到只需要支持的http请求方法名称的数组如 ['GET','POST']
    function getMatchHttpMethodArray($name, $base, $controller, $options);
}
