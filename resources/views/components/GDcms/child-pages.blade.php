@props([
    'childPages' => [],
    'currentChildRoute' => '',
])


<div class="flex space-x-10">
    @foreach ($childPages as $childPage)
        @if ($childPage['params'])
            <x-nav-link :href="route($childPage['routeName'], $childPage['params'])" :active="$currentChildRoute == $childPage['routeName'] &&
                request()->route()->parameters() == $childPage['params']">
                {{ __($childPage['name']) }}
            </x-nav-link>
        @else
            <x-nav-link :href="route($childPage['routeName'])" :active="$currentChildRoute == $childPage['routeName']">
                {{ __($childPage['name']) }}
            </x-nav-link>
        @endif
    @endforeach
</div>
