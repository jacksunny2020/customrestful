<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Jacksunny\CustomRestful;

use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;

/**
 * Description of ExtendedResourceRegistrar
 *
 * @author ʩ����
 * @date 2017-5-5 14:38:13
 */
class CustomResourceRegistrar extends ResourceRegistrar {

    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];

    public function __construct(Router $router) {
        parent::__construct($router);
    }

    protected $rule_update;
    protected $rule_destroy;
    protected $rule_index;
    protected $rule_create;
    protected $rule_store;
    protected $rule_show;
    protected $rule_edit;

    public function addRuleUpdate(ResourceRegistrarRuleContract $rule) {
        $this->rule_update = $rule;
        return $this;
    }

    public function addRuleDestroy(ResourceRegistrarRuleContract $rule) {
        $this->rule_destroy = $rule;
        return $this;
    }

    public function addRuleIndex(ResourceRegistrarRuleContract $rule) {
        $this->rule_index = $rule;
        return $this;
    }

    public function addRuleCreate(ResourceRegistrarRuleContract $rule) {
        $this->rule_create = $rule;
        return $this;
    }

    public function addRuleStore(ResourceRegistrarRuleContract $rule) {
        $this->rule_store = $rule;
        return $this;
    }

    public function addRuleShow(ResourceRegistrarRuleContract $rule) {
        $this->rule_show = $rule;
        return $this;
    }

    public function addRuleEdit(ResourceRegistrarRuleContract $rule) {
        $this->rule_edit = $rule;
        return $this;
    }

    private function addResourceAction(ResourceRegistrarRuleContract $rule, $name, $base, $controller, $options) {
        $postfix = $rule->getResourceUriPostfix($name, $base, $controller, $options);
        $uri = $this->getResourceUri($name) . $postfix;

        $name = $rule->getActionName($name, $base, $controller, $options);
        $action = $this->getResourceAction($name, $controller, $name, $options);
        $method_array = $rule->getMatchHttpMethodArray($name, $base, $controller, $options);
        return $this->router->match($method_array, $uri, $action);
    }

    /**
     * Add the update method for a resourceful route.
     * ֧��·�� /mymodel/update 
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceUpdate($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_update, $name, $base, $controller, $options);
    }

    /**
     * Add the destroy method for a resourceful route.
     * ֧��·�� /mymodel/remove
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDestroy($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_destroy, $name, $base, $controller, $options);
    }

    /**
     * Add the index method for a resourceful route.
     * ֧��·�� /mymodel/query
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceIndex($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_index, $name, $base, $controller, $options);
    }

    /**
     * Add the create method for a resourceful route.
     * ֧��·�� /mymodel/blanknew
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceCreate($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_create, $name, $base, $controller, $options);
    }

    /**
     * Add the store method for a resourceful route.
     * ֧��·�� /mymodel/create
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceStore($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_store, $name, $base, $controller, $options);
    }

    /**
     * Add the show method for a resourceful route.
     * ֧��·�� /mymodel/view
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceShow($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_show, $name, $base, $controller, $options);
    }

    /**
     * Add the edit method for a resourceful route.
     * ֧��·�� /mymodel/edit
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceEdit($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_edit, $name, $base, $controller, $options);
    }

}
