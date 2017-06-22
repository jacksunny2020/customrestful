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
class ResourceRegistrarRuleMini extends ResourceRegistrarRuleShow implements ResourceRegistrarRuleContract {

    public function getResourceUriPostfix($name, $base, $controller, $options) {
        return '/mini';
    }
    public function getActionName($name, $base, $controller, $options) {
        return 'mini';
    }
}
