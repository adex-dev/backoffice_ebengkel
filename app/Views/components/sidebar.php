<aside class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 sidebar-menu transition-transform shadow">
    <a href="javascript:void(0)" class="flex items-center flex-col pb-4 border-b border-b-gray-600">
        <img src="<?= base_url('repo/assets/img/logo.png')  ?>" alt="logo" class="w-20 h-20 rounded object-cover">
        <span class="text-lg font-bold text-dark ml-3">Backoffice E-bangkel</span>
    </a>
    <ul class="mt-4">
        <?php
        switch (uri_segment(2)):
            case 'dashboard':
                $dashboard = 'selected';
                break;
            case 'addproduct':
            case 'category':
            case "product":
                $product = 'selected';
                break;
        endswitch ?>
        <li class="mb-1 group sidebaritem <?= empty($dashboard) ? '' :$dashboard ?>" data-aksi="dashboard"><a href="dashboard" class="menu-item group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"><i class='bx bx-home bx-sm'></i><span class="text-sm capitalize">Dashboard</span></a></li>
        <li class="mb-1 group sidebaritem <?= !empty($product) ? $product : '' ?>" data-aksi="product"><a href="javascript:void(0)" class="menu-item group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle"><i class='bx bx-spreadsheet bx-sm'></i><span class="text-sm capitalize">Product</span><i class='bx bx-chevron-right ml-auto group-[.selected]:rotate-90 transition-all ease-in-out duration-500'></i></a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">

                <li class="mb-4 <?= uri_segment(2) == 'product' ? 'actived' : '' ?>"><a href="product" class="text-dark text-sm flex items-center hover:text-dark capitalize before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300  before:mr-3 ">Item Product</a></li>
                <li class="mb-4 <?= uri_segment(2) == 'category' ? 'actived' : '' ?>"><a href="category" class="text-dark text-sm flex items-center hover:text-dark capitalize before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300  before:mr-3">Category Product</a></li>

            </ul>
        </li>
        <li class="mb-1 group"><a href="javascript:void(0)" class="menu-item group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle"><i class='bx bx-spreadsheet bx-sm'></i><span class="text-sm capitalize">Surver</span><i class='bx bx-chevron-right ml-auto group-[.selected]:rotate-90 transition-all ease-in-out duration-500'></i></a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4"><a href="javascript:void(0)" class="text-dark text-sm flex items-center hover:text-dark capitalize before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300  before:mr-3">Item Product</a></li>
                <li class="mb-4"><a href="javascript:void(0)" class="text-dark text-sm flex items-center hover:text-dark capitalize before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300  before:mr-3">Category Product</a></li>
            </ul>
        </li>
        <li class="mb-1 group"><a href="<?= site_url('log')  ?>" class="menu-item group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"><i class='bx bx-data bx-sm'></i><span class="text-sm capitalize">Logs</span></a></li>
    </ul>
</aside>
<!-- endsidebar -->
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay">&nbsp;</div>
<!-- content -->