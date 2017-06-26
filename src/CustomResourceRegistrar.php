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
    //protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];
    //protected $resourceDefaults = ['index', 'add', 'store', 'show', 'modify', 'update', 'destroy', 'card', 'mini', 'item', 'block', 'popup', 'home', 'profile', 'dashboard', 'listing', 'detail'];
    protected $resourceDefaults = ['index', 'store', 'show', 'update', 'destroy', 'card', 'mini', 'item', 'block', 'popup', 'home', 'profile', 'dashboard', 'listing', 'detail', 'form'];

    public function __construct(Router $router) {
        parent::__construct($router);
    }

    protected $rule_update;
    protected $rule_destroy;
    protected $rule_index;
    protected $rule_add;
    protected $rule_store;
    protected $rule_show;
    protected $rule_modify;
    protected $rule_card;

    public function addRuleCard(ResourceRegistrarRuleContract $rule) {
        $this->rule_card = $rule;
        return $this;
    }

    protected function addResourceCard($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_card, $name, $base, $controller, $options);
    }

    protected $rule_mini;

    public function addRuleMini(ResourceRegistrarRuleContract $rule) {
        $this->rule_mini = $rule;
        return $this;
    }

    protected function addResourceMini($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_mini, $name, $base, $controller, $options);
    }

    protected $rule_item;

    public function addRuleItem(ResourceRegistrarRuleContract $rule) {
        $this->rule_item = $rule;
        return $this;
    }

    protected function addResourceItem($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_item, $name, $base, $controller, $options);
    }

    protected $rule_block;

    public function addRuleBlock(ResourceRegistrarRuleContract $rule) {
        $this->rule_block = $rule;
        return $this;
    }

    protected function addResourceBlock($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_block, $name, $base, $controller, $options);
    }

    protected $rule_popup;

    public function addRulePopup(ResourceRegistrarRuleContract $rule) {
        $this->rule_popup = $rule;
        return $this;
    }

    protected function addResourcePopup($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_popup, $name, $base, $controller, $options);
    }

    protected $rule_home;

    public function addRuleHome(ResourceRegistrarRuleContract $rule) {
        $this->rule_home = $rule;
        return $this;
    }

    protected function addResourceHome($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_home, $name, $base, $controller, $options);
    }

    protected $rule_profile;

    public function addRuleProfile(ResourceRegistrarRuleContract $rule) {
        $this->rule_profile = $rule;
        return $this;
    }

    protected function addResourceProfile($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_profile, $name, $base, $controller, $options);
    }

    protected $rule_dashboard;

    public function addRuleDashboard(ResourceRegistrarRuleContract $rule) {
        $this->rule_dashboard = $rule;
        return $this;
    }

    protected function addResourceDashboard($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_dashboard, $name, $base, $controller, $options);
    }

    protected $rule_listing;

    public function addRuleListing(ResourceRegistrarRuleContract $rule) {
        $this->rule_listing = $rule;
        return $this;
    }

    protected function addResourceListing($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_listing, $name, $base, $controller, $options);
    }

    protected $rule_detail;

    public function addRuleDetail(ResourceRegistrarRuleContract $rule) {
        $this->rule_detail = $rule;
        return $this;
    }

    protected function addResourceDetail($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_detail, $name, $base, $controller, $options);
    }
    
    protected $rule_form;

    public function addRuleForm(ResourceRegistrarRuleContract $rule) {
        $this->rule_form = $rule;
        return $this;
    }

    protected function addResourceForm($name, $base, $controller, $options) {
        return $this->addResourceAction($this->rule_form, $name, $base, $controller, $options);
    }
    

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

    public function addRuleAdd(ResourceRegistrarRuleContract $rule) {
        $this->rule_add = $rule;
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

    public function addRuleModify(ResourceRegistrarRuleContract $rule) {
        $this->rule_modify = $rule;
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
        return $this->addResourceAction($this->rule_add, $name, $base, $controller, $options);
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
        return $this->addResourceAction($this->rule_modify, $name, $base, $controller, $options);
    }

}
