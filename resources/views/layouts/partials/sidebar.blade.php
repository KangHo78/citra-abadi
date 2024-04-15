<x-maz-sidebar :href="route('dashboard')" :logo=" \Illuminate\Support\Facades\Storage::disk('local')->url('front-end/images/logo-light.png') ">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @can('enquiry-read')
    <x-maz-sidebar-item name="Enquiry" :link="route('transaction.sales.index')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @endcan

    <x-maz-sidebar-item name="Item" icon="bi bi-stack">
          <!-- Merek-->
        <x-maz-sidebar-sub-item name="Merek" :link="route('brand.index')"></x-maz-sidebar-sub-item>
        <!-- Current stock + Item-->
        <x-maz-sidebar-sub-item name="Item" :link="route('item.index')"></x-maz-sidebar-sub-item>
      
    </x-maz-sidebar-item>

    <x-maz-sidebar-item name="Laporan" icon="bi bi-stack">
        <!-- <x-maz-sidebar-sub-item name="Stock" :link="route('report.stock.index')"></x-maz-sidebar-sub-item> -->
        <!-- <x-maz-sidebar-sub-item name="Mutasi Stock" :link="route('report.stock-mutation.index')"></x-maz-sidebar-sub-item> -->
        @can('report-enquirer')
        <x-maz-sidebar-sub-item name="Enquirer" :link="route('report.user.index')"></x-maz-sidebar-sub-item>
        @endcan
        @can('report-item')
        <x-maz-sidebar-sub-item name="Item" :link="route('report.income.index')"></x-maz-sidebar-sub-item>
        @endcan
        <!-- <x-maz-sidebar-sub-item name="HPP" :link="route('report.hpp.index')"></x-maz-sidebar-sub-item> -->
        <!-- <x-maz-sidebar-sub-item name="Gross" :link="route('report.gross.index')"></x-maz-sidebar-sub-item> -->
        @can('report-wishlist')
        <x-maz-sidebar-sub-item name="Wishlist" :link="route('report.wishlist.index')"></x-maz-sidebar-sub-item>
        @endcan
        <!-- <x-maz-sidebar-sub-item name="Cart" :link="route('report.cart.index')"></x-maz-sidebar-sub-item> -->
        @can('report-share-product')
        <x-maz-sidebar-sub-item name="Share Produk" :link="route('report.share-product.index')"></x-maz-sidebar-sub-item>
        @endcan
    </x-maz-sidebar-item>

    <!-- Master Data -->

    <!-- Promosi-->
    <!-- <x-maz-sidebar-item name="Promosi" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="Promosi" :link="route('promotions.index')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item> -->
    
    <x-maz-sidebar-item name="Pengaturan" icon="bi bi-stack">
        <!-- Pengaturan Company-->
        @can('settings-general')
        <x-maz-sidebar-sub-item name="Umum" :link="route('general.index')"></x-maz-sidebar-sub-item>
        @endcan
        <!-- <x-maz-sidebar-sub-item name="Aplikasi Mobile" :link="route('mobile_app.index')"></x-maz-sidebar-sub-item> -->
        <!-- Pengguna User + Membership-->
        <x-maz-sidebar-sub-item name="Enquirer" :link="route('customer.index')"></x-maz-sidebar-sub-item>
        <!-- Pengguna Admin -->
        @can('settings-staff-read')
        <x-maz-sidebar-sub-item name="Staf" :link="route('staff.index')"></x-maz-sidebar-sub-item>
        @endcan
        <!-- Pengguna Hak Akses -->
        @can('settings-role-read')
        <x-maz-sidebar-sub-item name="Hak Akses" :link="route('role.index')"></x-maz-sidebar-sub-item>
        @endcan
        @can('settings-about-us-update')
        <x-maz-sidebar-sub-item name="About Us" :link="route('front-end.about-us.index')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Services" :link="route('front-end.services.index')"></x-maz-sidebar-sub-item>
        @endcan
    </x-maz-sidebar-item>

</x-maz-sidebar>