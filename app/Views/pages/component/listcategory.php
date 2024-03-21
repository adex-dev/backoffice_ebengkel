<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md !w-full min-h-[90vh]">
    <div class="flex justify-between mb-4 border-b pb-6">
        <div class="font-medium font-mona-reg">Manage Categories</div>
        <a href="addcategory" class="inline-flex overflow-hidden text-white bg-gray-900 rounded group">
            <span class="px-3.5 py-2 text-white bg-purple-500 group-hover:bg-purple-600 flex items-center justify-center">
                <i class='bx bx-folder-plus'></i>
            </span>
            <span class="pl-4 pr-5 py-2.5 font-mona-ultralight">Add Category</span>
        </a>
    </div>
    <div class="grid  gap-4 grid-cols-1">
        <div class="!h-full relative w-full">
            <table id="datatables" class="stripe hover" style="width:100%;">
                <thead>
                    <tr>
                        <th data-priority="1">Id</th>
                        <th data-priority="2">Name</th>
                        <th data-priority="3">Status</th>
                        <th data-priority="9">Create</th>
                        <th nowrap data-priority="10">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (sesion_get('categoriitem') != null) : foreach (array_reverse(sesion_get('categoriitem')) as  $value) : ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['name_kategori'] ?></td>
                                <td><label class="inline-flex items-center cursor-pointer">
                                        <input <?= $value['status'] == 'active' ? 'checked' : '' ?> type="checkbox" value="" class="sr-only peer">
                                        <div class="toggle  peer peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-primary dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    </label></td>
                                <td><?= $value['addons'] ?></td>
                                <td><div class="flex justify-center"><a href="javascript:void(0)" class="btntools group btnclick" data-aksi="editcategory" data-uid="<?= $value['id'] . '/' . $value['name_kategori'] ?>">
                                        <span class="spanstools"></span>
                                        <span class="spanstools2">Edit</span>
                                    </a><a href="javascript:void(0)" class="btntools group btnclick" data-aksi="deletecategory" data-uid="<?= $value['id'] ?>">
                                        <span class="spanstools !bg-primary"></span>
                                        <span class="spanstools2">Delete</span>
                                    </a> </div></td>
                            </tr>
                    <?php endforeach;
                    endif; ?>

                </tbody>

            </table>
        </div>
    </div>
</div>