<header class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg flex items-center text-gray-600 sidebar-toggle">
        <i class='bx bx-menu'></i>
    </button>
    <div class="flex justify-between w-full">
        <ul class="flex items-center text-sm ml-4">
            <li class="mr-2"><a href="dashboard" class="text-gray-400 hover:text-gray-600 font-medium">Home</a></li>
            <li class="mr-2"><a href="javascript:void(0)" class="text-gray-400 font-medium">/</a></li>
            <li class="mr-2"><a href="javascript:void(0)" class="text-gray-400 font-medium"><?= uri_segment(1) ?></a></li>
            <?php if (uri_segment(2)) : ?>
                <li class="mr-2"><a href="javascript:void(0)" class="text-gray-600 font-medium">/</a></li>
                <li class="mr-2"><a href="javascript:void(0)" class="text-gray-600 font-medium"><?= uri_segment(2) ?></a></li>
            <?php endif ?>
        </ul>
        <div class="dropdown">
            <button type="button" class="dropdown-toggle flex items-center"><i class='bx bxs-user-circle rounded w-8 h-8 block align-middle bx-md relative'></i></button>
            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px] scale-0 transition-all duration-300 ease-in-out !mt-11" data-popper-id="popper-2" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-24px, 48px);" data-popper-placement="bottom-end">
                <li>
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                </li>
                <li>
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                </li>
                <li>
                    <button type="button" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50 btnclick" data-aksi="logout">Logout</button>
                </li>
            </ul>
        </div>
    </div>
</header>