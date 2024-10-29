@include('template.partials.menu-item', [
    'label' => 'Dashboard',
    'icon' => 'home',
    'url' => route('admin.dashboard.dashboard'),
])

@include('template.partials.menu-item', [
    'label' => 'Sliders',
    'icon' => 'sliders',
    'url' => route('admin.sliders.list'),
])

@include('template.partials.menu-item', [
    'label' => 'Services',
    'icon' => 'truck',
    'url' => route('admin.services.list'),
])

@include('template.partials.menu-item', [
    'label' => 'Products',
    'icon' => 'shopping-cart',
    'url' => route('admin.products.list'),
])

{{-- @include('template.partials.menu-item', [
    'label' => 'Customer Inquires',
    'icon' => 'book-open',
    'url' => route('admin.customer-inquiries.list'),
]) --}}

@include('template.partials.menu-item', [
    'label' => 'Pages',
    'icon' => 'book',
    'url' => route('admin.pages.list'),
])

{{-- @include('template.partials.menu-item', [
    'label' => 'Testimonials',
    'icon' => 'award',
    'url' => route('admin.testimonials.list'),
]) --}}

@include('template.partials.menu-item', [
    'label' => 'Settings',
    'icon' => 'settings',
    'url' => route('admin.settings.list'),
])
