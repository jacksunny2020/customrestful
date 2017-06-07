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
class ResourceRegistrarRuleShow implements ResourceRegistrarRuleContract {

    public function getResourceUriPostfix($name, $base, $controller, $options) {
        return '/view';
    }

    public function getActionName($name, $base, $controller, $options) {
        return 'show';
    }

    public function getMatchHttpMethodArray($name, $base, $controller, $options) {
        return ['GET', 'HEAD'];
    }

}
