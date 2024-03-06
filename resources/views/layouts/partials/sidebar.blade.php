<x-maz-sidebar :href="route('dashboard')" :logo="asset('front-end/images/logo-light.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Enquiry" :link="route('transaction.sales.index')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    
    <!-- <x-maz-sidebar-item name="Pembelian" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="Pembelian" :link="route('transaction.purchasing.index')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Penerimaan" :link="route('receive_item.index')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item> -->
    <!-- <x-maz-sidebar-item name="Vendor" :link="route('vendor.index')" icon="bi bi-grid-fill"></x-maz-sidebar-item> -->


    <x-maz-sidebar-item name="Item" icon="bi bi-stack">
         <!-- Kategori-->
         <x-maz-sidebar-sub-item name="Kategori" :link="route('category.index')"></x-maz-sidebar-sub-item>
          <!-- Merek-->
        <x-maz-sidebar-sub-item name="Merek" :link="route('brand.index')"></x-maz-sidebar-sub-item>
        <!-- Current stock + Item-->
        <x-maz-sidebar-sub-item name="Item" :link="route('item.index')"></x-maz-sidebar-sub-item>
      
    </x-maz-sidebar-item>

    <x-maz-sidebar-item name="Laporan" icon="bi bi-stack">
        <!-- <x-maz-sidebar-sub-item name="Stock" :link="route('report.stock.index')"></x-maz-sidebar-sub-item> -->
        <!-- <x-maz-sidebar-sub-item name="Mutasi Stock" :link="route('report.stock-mutation.index')"></x-maz-sidebar-sub-item> -->
        <x-maz-sidebar-sub-item name="Pengguna" :link="route('report.user.index')"></x-maz-sidebar-sub-item>
        <x-maz-sidebar-sub-item name="Pendapatan" :link="route('report.income.index')"></x-maz-sidebar-sub-item>
        <!-- <x-maz-sidebar-sub-item name="HPP" :link="route('report.hpp.index')"></x-maz-sidebar-sub-item> -->
        <!-- <x-maz-sidebar-sub-item name="Gross" :link="route('report.gross.index')"></x-maz-sidebar-sub-item> -->
        <x-maz-sidebar-sub-item name="Wishlist" :link="route('report.wishlist.index')"></x-maz-sidebar-sub-item>
        <!-- <x-maz-sidebar-sub-item name="Cart" :link="route('report.cart.index')"></x-maz-sidebar-sub-item> -->
        <x-maz-sidebar-sub-item name="Share Produk" :link="route('report.share-product.index')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>

    <!-- Master Data -->

    <!-- Promosi-->
    <!-- <x-maz-sidebar-item name="Promosi" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="Promosi" :link="route('promotions.index')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item> -->
    
    <x-maz-sidebar-item name="Pengaturan" icon="bi bi-stack">
        <!-- Pengaturan Company-->
        <x-maz-sidebar-sub-item name="Umum" :link="route('general.index')"></x-maz-sidebar-sub-item>
        <!-- <x-maz-sidebar-sub-item name="Aplikasi Mobile" :link="route('mobile_app.index')"></x-maz-sidebar-sub-item> -->
        <!-- Pengguna User + Membership-->
        <x-maz-sidebar-sub-item name="Pelanggan" :link="route('customer.index')"></x-maz-sidebar-sub-item>
        <!-- Pengguna Admin -->
        <x-maz-sidebar-sub-item name="Staf" :link="route('staff.index')"></x-maz-sidebar-sub-item>
        <!-- Pengguna Hak Akses -->
        <x-maz-sidebar-sub-item name="Hak Akses" :link="route('role.index')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>

</x-maz-sidebar>