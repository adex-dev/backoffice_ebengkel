<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md !w-full min-h-[90vh]">
    <div class="flex justify-between mb-4 border-b pb-6">
        <div class="font-medium font-mona-reg">Dashboard</div>
        <div class="flex space-x-3">
            <a href="updatestock" class="inline-flex overflow-hidden text-white bg-gray-900 rounded group">
                <span class="px-3.5 py-2 text-white bg-primary group-hover:bg-primary flex items-center justify-center">
                    <i class='bx bx-folder-plus'></i>
                </span>
                <span class="pl-4 pr-5 py-2.5 font-mona-ultralight">Update Stock</span>
            </a>
            <a href="addproduct" class="inline-flex overflow-hidden text-white bg-gray-900 rounded group">
                <span class="px-3.5 py-2 text-white bg-purple-500 group-hover:bg-purple-600 flex items-center justify-center">
                    <i class='bx bx-folder-plus'></i>
                </span>
                <span class="pl-4 pr-5 py-2.5 font-mona-ultralight">Add Product</span>
            </a>
        </div>
    </div>
    <div class="grid  gap-4 grid-cols-1">
        <div class="!h-full relative w-full">
            <table id="datatables" class="stripe hover" style="width:100%;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Original Buy</th>
                        <th>Sell Member</th>
                        <th>Sell NonMember</th>
                        <th>Disc</th>
                        <th>Stock</th>
                        <th>Ean</th>
                        <th>Status</th>
                        <th>Create</th>
                        <th data-priority="10">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (sesion_get('productitem') != null) : foreach (sesion_get('productitem') as  $value) : ?>
                            <tr>
                                <td><?= $value['id_product'] ?></td>
                                <td><?= $value['product_name'] ?></td>
                                <td><?= $value['name_kategori'] ?></td>
                                <td><?= rupiah($value['item_price']) ?></td>
                                <td><?= rupiah($value['purchase_sell1']) ?></td>
                                <td><?= rupiah($value['purchase_sell2']) ?></td>
                                <td><?= $value['disc'] == 'valid' ? 'true' : 'false' ?></td>
                                <td><?= rupiah($value['stock']) ?></td>
                                <td><?= $value['ean'] ?></td>
                                <td><label class="inline-flex items-center cursor-pointer">
                                        <input <?= $value['status'] == 'active' ? 'checked' : '' ?> type="checkbox" value="" class="sr-only peer">
                                        <div class="toggle  peer peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-primary dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    </label></td>
                                <td><?= $value['addons'] ?></td>
                                <td><a href="javascript:void(0)" class="btntools group btnclick" data-aksi="editproduct" data-uid="<?= $value['id_product'] ?>">
                                        <span class="spanstools"></span>
                                        <span class="spanstools2">Edit</span>
                                    </a></td>
                            </tr>
                    <?php endforeach;
                    endif; ?>

                </tbody>

            </table>
        </div>
    </div>
</div>