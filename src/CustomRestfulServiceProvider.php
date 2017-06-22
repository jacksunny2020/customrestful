<?php

namespace Jacksunny\CustomRestful;

use Illuminate\Support\ServiceProvider;

class CustomRestfulServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //注册resource路由对应的路由匹配类，使用自定义的路由规则 CustomResourceRegistrar
        \App::bind('Illuminate\Routing\ResourceRegistrar', function () {
            $registrar = \App::make(CustomResourceRegistrar::class);
            return $registrar->addRuleUpdate(new ResourceRegistrarRuleUpdate())
                            ->addRuleCreate(new ResourceRegistrarRuleCreate())
                            ->addRuleDestroy(new ResourceRegistrarRuleDestroy())
                            ->addRuleEdit(new ResourceRegistrarRuleEdit())
                            ->addRuleIndex(new ResourceRegistrarRuleIndex())
                            ->addRuleStore(new ResourceRegistrarRuleStore())
                            ->addRuleShow(new ResourceRegistrarRuleShow())
                            ->addRuleCard(new ResourceRegistrarRuleCard())
                            ->addRuleMini(new ResourceRegistrarRuleMini())
                            ->addRuleItem(new ResourceRegistrarRuleItem())
                            ->addRuleBlock(new ResourceRegistrarRuleBlock())
                            ->addRulePopup(new ResourceRegistrarRulePopup())
                            ->addRuleHome(new ResourceRegistrarRuleHome())
                            ->addRuleProfile(new ResourceRegistrarRuleProfile())
                            ->addRuleDashboard(new ResourceRegistrarRuleDashboard())
                            ->addRuleListing(new ResourceRegistrarRuleListing())
                            ->addRuleDetail(new ResourceRegistrarRuleDetail())
            ;
        });
    }

}
