<?php

namespace App\Providers;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Forms\Contact;
use App\Models\Forms\Subscriber;
use App\Models\General\Footerlink;
use App\Models\General\MediaCategory;
use App\Models\General\MediaItem;
use App\Models\General\MediaType;
use App\Models\General\Socialmedia;
use App\Models\Navigation\Menu;
use App\Models\Navigation\Menuitem;
use App\Models\Products\Product;
use App\Models\Products\Type;
use App\Models\WebContents\Faq;
use App\Models\WebContents\Page;
use App\Models\WebContents\SiteFeature;
use App\Policies\Blog\CategoryPolicy;
use App\Policies\Blog\PostPolicy;
use App\Policies\Forms\ContactPolicy;
use App\Policies\Forms\SubscriberPolicy;
use App\Policies\General\FooterlinkPolicy;
use App\Policies\General\MediaCategoryPolicy;
use App\Policies\General\MediaItemPolicy;
use App\Policies\General\MediaTypePolicy;
use App\Policies\General\SocialmediaPolicy;
use App\Policies\Navigation\MenuitemPolicy;
use App\Policies\Navigation\MenuPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\Products\ProductPolicy;
use App\Policies\Products\TypePolicy;
use App\Policies\RolePolicy;
use App\Policies\WebContents\FaqPolicy;
use App\Policies\WebContents\PagePolicy;
use App\Policies\WebContents\SiteFeaturePolicy;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                ->label('Web Contents')
                ->collapsed(),
            
            NavigationGroup::make()
                ->label('Navigations')
                ->collapsed(),
            
            NavigationGroup::make()
                ->label('File Manager')
                ->collapsed(),
            
            NavigationGroup::make()
                ->label('Blog')
                ->collapsed(),
            
            NavigationGroup::make()
                ->label('Products')
                ->collapsed(),
            NavigationGroup::make()
                ->label('Forms')
                ->collapsed(),
            
            NavigationGroup::make()
                ->label('Settings')
                ->collapsed(),
            NavigationGroup::make()
                ->label('User Accounts')
                ->collapsed(),
            
            ]);
        });
        Filament::registerNavigationItems([
            NavigationItem::make('API DOCUMENTATION')
                ->url('/docs', shouldOpenInNewTab: true)
                ->icon('heroicon-o-newspaper')
                ->activeIcon('heroicon-s-presentation-chart-line')
                ->sort(8),
        ]);


        RateLimiter::for('forms', function ($request) {
            if(app()->isLocal()){
                return;
            }
            $ip = $request->ip(); 
            return Limit::perMinute(10)->by($ip); 
        });

        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::policy(Post::class, PostPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Footerlink::class, FooterlinkPolicy::class);
        Gate::policy(MediaCategory::class, MediaCategoryPolicy::class);
        Gate::policy(MediaItem::class, MediaItemPolicy::class);
        Gate::policy(MediaType::class, MediaTypePolicy::class);
        Gate::policy(Socialmedia::class, SocialmediaPolicy::class);
        Gate::policy(Menu::class, MenuPolicy::class);
        Gate::policy(Menuitem::class, MenuitemPolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Type::class, TypePolicy::class);
        Gate::policy(Faq::class, FaqPolicy::class);
        Gate::policy(Page::class, PagePolicy::class);
        Gate::policy(SiteFeature::class, SiteFeaturePolicy::class);
        Gate::policy(Subscriber::class, SubscriberPolicy::class);
        Gate::policy(Contact::class, ContactPolicy::class);




    }
}
