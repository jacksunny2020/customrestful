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
 * @author Ê©³¯Ñô
 * @date 2017-6-7 10:13:21
 */
class ResourceRegistrarRuleIndex implements ResourceRegistrarRuleContract {

    public function getResourceUriPostfix($name, $base, $controller, $options) {
        return '/query';
    }

    public function getActionName($name, $base, $controller, $options) {
        return 'index';
    }

    public function getMatchHttpMethodArray($name, $base, $controller, $options) {
        return ['GET', 'HEAD'];
    }

}
